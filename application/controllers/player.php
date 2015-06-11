<?php
class Player extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($player_id) {
		$data['content'] = 'invocador/home';
		$this->load->view('estrutura/main', $data);
	}

	public function resume($player_id = 0){
		$this->load->helper('php-riot-api');
		$this->load->helper('filesystemcache');

		$riot_api 			= new riotapi('br', new FileSystemCache('./cache/'));
		$user 				= $riot_api->getGame($player_id);

		if($user == 'NOT_FOUND'):
			$this->session->set_userdata(array('error' => 'Erro ao carregar usuário.'));
			redirect(base_url());
		else:

			$tier_user 			= new riotapi('br', new FileSystemCache('./cache/'));
			$data_tier 			= $tier_user->getLeague($player_id);
			$tier_json 			= json_decode($data_tier);
			$data['tier']		= $tier_json;

			$player_user		= new riotapi('br', new FileSystemCache('./cache/'));
			$data_player		= $player_user->getSummoner($player_id);
			$player_json 		= json_decode($data_player);
			$data['player']		= $player_json;


			$user_json 			= json_decode($user);
			$data['result']		= $user_json;

			$data['content']	= 'player/resume';
			$this->load->view('estrutura/main', $data);
		endif;
	}

	public function search(){
		$this->load->helper('php-riot-api');
		$this->load->helper('filesystemcache');

		$summoner_name = strtolower(db_safe($this->input->post('player', TRUE)));

		$riot_api 			= new riotapi('br', new FileSystemCache('./cache/'));
		$user 				= $riot_api->getSummonerByName($summoner_name);

		if($user == 'NOT_FOUND'):
			$this->session->set_userdata(array('error' => 'Usuário nao encontrado.'));
			redirect(base_url());
		else:
			$summoner_name 		= str_replace(' ', '', $summoner_name);
			$user_new			= json_decode($user);
			$user_id			= $user_new->$summoner_name->id;
			redirect(base_url('player/resume/'.$user_id));
		endif;
	}

	public function history($player_id){
		$this->load->helper('php-riot-api');
		$this->load->helper('filesystemcache');

		$riot_api 			= new riotapi('br', new FileSystemCache('./cache/'));
		$user 				= $riot_api->getGame($player_id);

		if($user == 'NOT_FOUND'):
			$this->session->set_userdata(array('error' => 'Erro ao carregar usuário.'));
			redirect(base_url());
		else:

			$tier_user 			= new riotapi('br', new FileSystemCache('./cache/'));
			$data_tier 			= $tier_user->getLeague($player_id);
			$tier_json 			= json_decode($data_tier);
			$data['tier']		= $tier_json;

			$player_user		= new riotapi('br', new FileSystemCache('./cache/'));
			$data_player		= $player_user->getSummoner($player_id);
			$player_json 		= json_decode($data_player);
			$data['player']		= $player_json;


			$user_json 			= json_decode($user);
			$data['result']		= $user_json;

			$data['content']	= 'player/history';
			$this->load->view('estrutura/main', $data);
		endif;	
	}

	public function error(){
		$data['content']	= 'error';
		$this->load->view('estrutura/main', $data);
	}


}
<?php
class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->helper('php-riot-api');
		$this->load->helper('filesystemcache');

		$riot_api 				= new riotapi('br', new FileSystemCache('./cache/'));
		$data_free_week 		= $riot_api->getChampionFreeWeek();
		$data_free_week_json 	= json_decode($data_free_week);
		$data['free_week']		= $data_free_week_json;

		$data['content'] = 'home/home';
		$this->load->view('estrutura/main', $data);
	}
}
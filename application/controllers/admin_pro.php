<?php
class Admin_pro extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Users_model', 'users');
	    if($this->router->fetch_method() != 'login' && $this->router->fetch_method() != 'index' && $this->router->fetch_method() != 'logout'):
	      $this->users->is_logged();
	    endif;
	}

	public function index() {
		$data['content'] = 'admin/login';
		$this->load->view('estrutura/main', $data);
	}

	

	  public function logout()
	  {
	    $this->session->sess_destroy();
	    redirect(base_url());
	  }

}
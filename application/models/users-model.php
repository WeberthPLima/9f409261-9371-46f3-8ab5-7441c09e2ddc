<?php

class Users_model extends DataMapper {

 	var $table = 'users';

	public function is_logged(){
	    $CI =& get_instance();
	    if(!$CI->session->userdata('logged')):
	    	redirect(base_url("admin_pro/logout"));
	    endif;
	}



}

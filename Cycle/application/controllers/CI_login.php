<?php

class CI_login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
// 		$this->load->model('news_model');
	}

	public function login() {
		
		if ($this->session->userdata('username')) {
			// check if a session exist or not
			redirect('CI_home/home','refresh');
		} else {		
			// load login page if there is no valid session
			$this->load->view('login.php');
		}
	}
	
	public function loginCheck() {
		if ($this->input->post('username')) {
			// if form is submitted
			$loginCred = array(	'username' => $this->input->post('username'),
								'password' => $this->input->post('password'));
			// set session
			$this->session->set_userdata($loginCred);
		
			// load home page
			redirect('CI_home/home','refresh');
		
		} else {
			// if form is not submitted
			redirect('CI_login/login','refresh');
		}
	}
}

?>
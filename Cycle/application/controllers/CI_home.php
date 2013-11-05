<?php

class CI_home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('search');
	}

	public function home() {
		if ($this->session->userdata('username')) {
			// session exists
			
			// HTTP header for no-cache
			$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate');
			$this->load->view('home.php');
			
		} else {
			// session doesn't exist
			
			// redirect to login page
			redirect('CI_login/login','refresh');
		}
	}
	
	public function logout() {
		// destroy session
		$this->session->sess_destroy();
		
		// redirect to login page
		redirect('CI_login/login','refresh');
	}
	
	public function search() {
		// retrieving the post request
		$cycle = $this->input->post('cycle');
		
		// search for cycle in DB
		$result = $this->search->getResult($cycle);

		// sending json back to front end
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
}

?>
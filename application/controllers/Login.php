<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('log-in');
		} else {
			redirect('home');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
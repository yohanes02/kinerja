<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Auth_m']);
	}
	
	public function index() {
		/**
		 * HRD = 1
		 * KABAG = 2
		 * DIREKTUR = 3
		 */

		if($this->session->userdata('user_type') == 1) {
			redirect('hrd');
		} elseif ($this->session->userdata('user_type') == 2) {
			redirect('kabag');
		} elseif ($this->session->userdata('user_type') == 3) {
			redirect('direk');
		} else {
			$this->load->view('components/header');
			$this->load->view('v_login');
			$this->load->view('components/footer');
		}
	}

	public function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$userData = $this->Auth_m->getUser($username, md5($password))->row_array();

		if(empty($userData)) {
			redirect('auth');
		}

		$dataSession = array(
			'name'		=> $userData['username'],
			'user_type'	=> $userData['type']
		);

		if($userData['type'] == 2) {
			$dataSession['department_id'] = $userData['department_id'];
		}

		$this->session->set_userdata($dataSession);

		if($this->session->userdata('user_type') == 1) {
			redirect('hrd');
		} elseif ($this->session->userdata('user_type') == 2) {
			redirect('kabag');
		} elseif ($this->session->userdata('user_type') == 3) {
			redirect('direk');
		}
	}

	public function forgot_pass() {
		$this->load->view('components/header');
		$this->load->view('v_forgot_pass');
		$this->load->view('components/footer');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('auth');
	}
}

?>

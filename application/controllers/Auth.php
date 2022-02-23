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
		} elseif ($this->session->userdata('user_type') == 4) {
			redirect('karyawan');
		} else {
			$jsFile['jsFile'] = 'login';
			$this->load->view('components/header');
			$this->load->view('v_login_karyawan');
			$this->load->view('components/footer', $jsFile);
		}
	}

	public function login($type = null) {
		if ($type == null) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
	
			$userData = $this->Auth_m->getUser($username, md5($password))->row_array();
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
	
			$userData = $this->Auth_m->getKaryawan($email, md5($password))->row_array();
		}

		if(empty($userData)) {
			redirect('auth');
		}

		$dataSession = array(
			'name'		=> $userData['username'],
			'user_type'	=> $userData['type']
		);

		if($type == 4) {
			$userData['type'] = 4;
			$dataSession = array(
				'id'		=> $userData['id'],
				'email'		=> $userData['email'],
				'user_type'	=> $userData['type']
			);
		}


		if($userData['type'] == 2) {
			$dataSession['department_id'] = $userData['department_id'];
		}

		if ($userData['type'] == 4) {	
			$dataSession['karyawan_id'] = $userData['id'];
		}

		$this->session->set_userdata($dataSession);

		if($this->session->userdata('user_type') == 1) {
			redirect('hrd');
		} elseif ($this->session->userdata('user_type') == 2) {
			redirect('kabag');
		} elseif ($this->session->userdata('user_type') == 3) {
			redirect('direk');
		} elseif ($this->session->userdata('user_type') == 4) {
			redirect('karyawan');
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

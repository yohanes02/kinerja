<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(["Auth_m"]);
	}

	public function index()
	{
		if($this->session->userdata('utype') == 1) {
			redirect('hrd');
		} elseif ($this->session->userdata('utype') == 2) {
			redirect('kabag');
		} elseif ($this->session->userdata('utype') == 3) {
			redirect('direk');
		} elseif ($this->session->userdata('utype') == 4) {
			redirect('karyawan');
		} else {
			// $this->load->view('components/v_open');
			// $this->load->view('components/v_sidebar');
			// $this->load->view('components/v_topbar');
			// $this->load->view('v_dashboard');
			// $this->load->view('components/v_close');
			$this->load->view('v_login');
		}
	}

	public function login() {
		$post = $this->input->post();
		// print_r($post);die;
		$username = $post['username'];
		$password = md5($post['password']);

		$userData = $this->Auth_m->getUser($username, $password)->row_array();

		if(empty($userData)) {
			redirect('auth');
		}

		$dataSession = array(
			'id'		=> $userData['id'],
			'uname'	=> $userData['username'],
			'utype'	=> $userData['type'],
			'fname'	=> $userData['fname'],
			'lname'	=> $userData['lname']
		);

		if($userData['type'] == 2) {
			$dataSession['dept_id'] = $userData['dept_id'];
		}

		$this->session->set_userdata($dataSession);

		if($this->session->userdata('utype') == 1) {
			redirect('hrd');
		} elseif ($this->session->userdata('utype') == 2) {
			redirect('kabag');
		} elseif ($this->session->userdata('utype') == 3) {
			redirect('direk');
		} elseif ($this->session->userdata('utype') == 4) {
			redirect('karyawan');
		}

	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('auth');
	}
}

?>

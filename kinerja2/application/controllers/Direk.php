<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Direk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('utype') != 3) {
			redirect('auth');
		}
		// $this->load->model(['Hrd_m', 'Core_m', 'Kabag_m']);
	}
	
	public function index()
	{
		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('v_dashboard');
		$this->load->view('components/v_close');
	}

}


?>

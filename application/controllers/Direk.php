<?php 

class Direk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_type') != 3) {
			redirect('auth');
		}
		// $this->load->model(['Hrd_m']);
	}

	public function index() {
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('direktur/v_index');
		$this->load->view('components/footer');
	}
}

?>

<?php 

class Kabag extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_type') != 2) {
			redirect('auth');
		}
		$this->load->model(['Kabag_m', 'Core_m']);
	}

	public function index() {
		$this->load->view('components/header');
		$this->load->view('kabag/v_index');
		$this->load->view('components/footer');
	}

	public function kriteria() {
		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();
		$criteria_used = $criteria_used_row['version'];
		$data['criteria_data'] = $this->Kabag_m->getCriteriaData($this->session->userdata('department_id'), $criteria_used)->result_array();

		// print_r($data);die;

		$jsFile['jsFile'] = 'kabag';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_kriteria', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function detail_kriteria($id) {
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_sub_kriteria');
		$this->load->view('components/footer');
	}

	public function penilaian() {
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_penilaian');
		$this->load->view('components/footer');
	}

	public function penilaian_kinerja() {
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_data_penilaian');
		$this->load->view('components/footer');
	}

	public function riwayat() {
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_riwayat');
		$this->load->view('components/footer');
	}

	public function insert_criteria() {
		$post = $this->input->post();
		$criteria_length = intval($post['kriteria_length']);

		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();

		if($criteria_used_row == null) {
			$ins = [
				'department_id' => $this->session->userdata('department_id'),
				'version' => 1,
			];

			$this->Core_m->insertData($ins, "used_criteria");
		}

		for ($i=1; $i <= $criteria_length; $i++) { 
			if(!empty($post['criteria_new_name'.$i])) {
				$ins = [
					'name' => $post['criteria_new_name'.$i],
					'weight' => $post['criteria_new_rating'.$i],
					'department_id' => $this->session->userdata('department_id'),
					'version' => 1,
				];
				$this->Core_m->insertData($ins, "criteria");
			}
		}

		redirect('kabag/kriteria');
	}

	public function update_criteria() {
		$post = $this->input->post();
		// print_r($post);

		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();
		$criteria_used = $criteria_used_row['version'];
		$criteria_data = $this->Kabag_m->getCriteriaData($this->session->userdata('department_id'), $criteria_used)->result_array();

		// print_r($criteria_data);die;

		for ($i=0; $i < count($criteria_data); $i++) { 
			$kriteria_id = $post['criteria_id'.$i];
			$data = [
				'name' => $post['criteria_name'.$i],
				'weight' => $post['criteria_rating'.$i],
			];

			$this->Core_m->updateData($kriteria_id, $data, 'criteria');
		}

		redirect('kabag/kriteria');
	}

	public function update_criteria_name() {
		$post = $this->input->post();

			$kriteria_id = $post['kriteria_id'];
			$data = [
				'name' => $post['kriteria_name'],
			];

			$this->Core_m->updateData($kriteria_id, $data, 'criteria');

		redirect('kabag/kriteria');
	}
}

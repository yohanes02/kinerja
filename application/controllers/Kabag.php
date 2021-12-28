<?php

class Kabag extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_type') != 2) {
			redirect('auth');
		}
		$this->load->model(['Kabag_m', 'Core_m']);
	}

	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('kabag/v_index');
		$this->load->view('components/footer');
	}

	public function kriteria()
	{
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

	public function detail_kriteria($id)
	{
		$sub_criteria_data = $this->Kabag_m->getSubCriteriaData($id)->result_array();
		$data['sub_criteria_data'] = $sub_criteria_data;
		$data['criteria_id'] = $id;

		$jsFile['jsFile'] = 'kabag';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_sub_kriteria', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function penilaian()
	{
		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();
		$criteria_used = $criteria_used_row['version'];
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('department_id'), $criteria_used)->result_array();
		$criterias_id = array();
		foreach ($criterias as $criteria) {
			array_push($criterias_id, $criteria['id']);
		}
		$employee_data = $this->Kabag_m->getEmployeeData($this->session->userdata('department_id'))->result_array();

		for ($i = 0; $i < count($employee_data); $i++) {
			$month = date('m') - 1;
			$rating = $this->Kabag_m->getPenilaian($employee_data[$i]['id'], $criterias_id, $month)->result_array();
			$employee_data[$i]['count_rating'] = count($rating);
		}

		$this->calculateVikor($rating);

		$data['criteria_length'] = count($criterias);
		$data['employee_data'] = $employee_data;
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_penilaian', $data);
		$this->load->view('components/footer');
	}

	public function penilaian_kinerja($employee_id)
	{
		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();
		$criteria_used = $criteria_used_row['version'];
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('department_id'), $criteria_used)->result_array();
		$criterias_id = array();
		foreach ($criterias as $criteria) {
			array_push($criterias_id, $criteria['id']);
		}
		for ($i = 0; $i < count($criterias); $i++) {
			$sub_criterias = $this->Kabag_m->getSubCriteriaData($criterias[$i]['id'])->result_array();
			$criterias[$i]['sub_criterias'] = $sub_criterias;
		}
		$month = date('m') - 1;
		$rating = $this->Kabag_m->getPenilaian($employee_id, $criterias_id, $month)->result_array();

		$data['criteria_data'] = $criterias;
		$data['rating_data'] = $rating;
		$data['employee_id'] = $employee_id;
		// print_r($data);die;
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_data_penilaian', $data);
		$this->load->view('components/footer');
	}

	public function riwayat()
	{
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('kabag/v_riwayat');
		$this->load->view('components/footer');
	}

	public function insert_criteria()
	{
		$post = $this->input->post();
		$criteria_length = intval($post['kriteria_length']);

		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();

		if ($criteria_used_row == null) {
			$ins = [
				'department_id' => $this->session->userdata('department_id'),
				'version' => 1,
			];

			$this->Core_m->insertData($ins, "used_criteria");
		}

		for ($i = 1; $i <= $criteria_length; $i++) {
			if (!empty($post['criteria_new_name' . $i])) {
				$ins = [
					'name' => $post['criteria_new_name' . $i],
					'weight' => $post['criteria_new_rating' . $i],
					'department_id' => $this->session->userdata('department_id'),
					'version' => 1,
				];
				$this->Core_m->insertData($ins, "criteria");
			}
		}

		redirect('kabag/kriteria');
	}

	public function update_criteria()
	{
		$post = $this->input->post();
		// print_r($post);

		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();
		$criteria_used = $criteria_used_row['version'];
		$criteria_data = $this->Kabag_m->getCriteriaData($this->session->userdata('department_id'), $criteria_used)->result_array();

		// print_r($criteria_data);die;

		for ($i = 0; $i < count($criteria_data); $i++) {
			$kriteria_id = $post['criteria_id' . $i];
			$data = [
				'name' => $post['criteria_name' . $i],
				'weight' => $post['criteria_rating' . $i],
			];

			$this->Core_m->updateData($kriteria_id, $data, 'criteria');
		}

		redirect('kabag/kriteria');
	}

	public function update_criteria_name()
	{
		$post = $this->input->post();

		$kriteria_id = $post['kriteria_id'];
		$data = [
			'name' => $post['kriteria_name'],
		];

		$this->Core_m->updateData($kriteria_id, $data, 'criteria');

		redirect('kabag/kriteria');
	}

	public function insert_sub_criteria()
	{
		$post = $this->input->post();
		$criteria_length = intval($post['kriteria_length']);

		for ($i = 1; $i <= $criteria_length; $i++) {
			if (!empty($post['criteria_new_name' . $i])) {
				$ins = [
					'name' => $post['criteria_new_name' . $i],
					'weight' => $post['sub_criteria_new_rating' . $i],
					'criteria_id' => $post['criteria_parent']
				];
				$this->Core_m->insertData($ins, "sub_criteria");
			}
		}

		redirect('kabag/detail_kriteria/' . $post['criteria_parent']);
		// redirect('kabag/kriteria');
	}

	public function update_sub_criteria()
	{
		$post = $this->input->post();
		$criteria_length = intval($post['sub_kriteria_length_edit']);
		// echo $criteria_length;die;

		for ($i = 0; $i < $criteria_length; $i++) {
			if (!empty($post['sub_criteria_name' . $i])) {
				$sub_kriteria_id = $post['sub_criteria_id' . $i];
				// echo $sub_kriteria_id."\n";
				$data = [
					'name' => $post['sub_criteria_name' . $i],
					'weight' => $post['sub_criteria_rating' . $i]
				];
				// print_r($data);
				$this->Core_m->updateData($sub_kriteria_id, $data, 'sub_criteria');
			}
		}

		// die;
		redirect('kabag/detail_kriteria/' . $post['criteria_parent']);
	}

	public function insert_penilaian()
	{
		$post = $this->input->post();
		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();
		$criteria_used = $criteria_used_row['version'];
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('department_id'), $criteria_used)->result_array();
		$month = date('m') - 1;
		for ($i=0; $i < count($criterias); $i++) { 
			$criteriaValue = $post['kriteria'.$i];
			$ratingValue = $post['rating'.$i];
			$data = [
				"criteria_id" => $criteriaValue,
				"sub_criteria_id" => $ratingValue,
				"criteria_version" => $criteria_used,
				"month" => $month,
				"karyawan_id" => $post['karyawan_id']
			];
			$this->Core_m->insertData($data, 'rating');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_penilaian()
	{
		$post = $this->input->post();
		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($this->session->userdata('department_id'))->row_array();
		$criteria_used = $criteria_used_row['version'];
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('department_id'), $criteria_used)->result_array();
		$month = date('m') - 1;
		for ($i=0; $i < count($criterias); $i++) { 
			$criteriaValue = $post['kriteria'.$i];
			$ratingValue = $post['rating'.$i];
			$id = $post['rating_id'.$i];
			$data = [
				"criteria_id" => $criteriaValue,
				"sub_criteria_id" => $ratingValue
			];
			$this->Core_m->updateData($id, $data, 'rating');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	private function calculateVikor($data)
	{
	}
}

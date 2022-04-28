<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('utype') != 1) {
			redirect('auth');
		}
		$this->load->model(['Hrd_m', 'Kabag_m', 'Core_m']);
	}
	
	public function index()
	{
		// $this->load->view('components/v_open');
		// $this->load->view('components/v_sidebar');
		// $this->load->view('components/v_topbar');
		// $this->load->view('hrd/v_index');
		// $this->load->view('components/v_close');
		$employees = $this->Hrd_m->getEmployee()->result_array();

		$data['employees'] = $employees;
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_employee', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function employee()
	{
		$employees = $this->Hrd_m->getEmployee()->result_array();

		$data['employees'] = $employees;
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_employee', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function addEmployee()
	{
		$departments = $this->Core_m->getAll('department')->result_array();

		$data['departments'] = $departments;
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_add_employee', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function submitNewEmployee() {
		$post = $this->input->post();
		// print_r($post);die;
		
		$ins = array(
			'fname' => $post['fname'],
			'lname' => $post['lname'],
			'email' => $post['email'],
			'sex' => $post['sex'],
			'birth_place' => $post['birth_place'],
			'birth_date' => date('Y-m-d H:i:s', strtotime($post['birth_date'])),
			'dept_id' => $post['dept_work'],
			'join_date' => date('Y-m-d H:i:s', strtotime($post['join_date'])),
			'address' => $post['address'],
		);

		$this->Core_m->insertData($ins, 'employee');

		redirect('hrd/employee');
	}

	public function editEmployee($id)
	{
		$employee = $this->Core_m->getById($id, 'employee')->row_array();
		$departments = $this->Core_m->getAll('department')->result_array();

		$data['employee'] = $employee;
		$data['departments'] = $departments;
		$jsData['page'] = 'hrd';
		
		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_edit_employee', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function submitEditEmployee($id) {
		$post = $this->input->post();
		// print_r($post);die;
		
		$ins = array(
			'fname' => $post['fname'],
			'lname' => $post['lname'],
			'email' => $post['email'],
			'sex' => $post['sex'],
			'birth_place' => $post['birth_place'],
			'birth_date' => date('Y-m-d H:i:s', strtotime($post['birth_date'])),
			'dept_id' => $post['dept_work'],
			'join_date' => date('Y-m-d H:i:s', strtotime($post['join_date'])),
			'address' => $post['address'],
		);

		$this->Core_m->updateData($id, $ins, 'employee');

		redirect('hrd/employee');
	}


	public function deleteEmployee() {
		$jsonData = json_decode(file_get_contents('php://input'),true);
		$employeeId = $jsonData['employee_id'];

		$this->Core_m->deleteData($employeeId, 'employee');
		echo json_encode('Delete Successfully');
	}

	public function deleteData() {
		$jsonData = json_decode(file_get_contents('php://input'),true);
		$employeeId = $jsonData['id'];
		$tableName = $jsonData['table'];

		$this->Core_m->deleteData($employeeId, $tableName);
		echo json_encode('Delete Successfully');
	}

	public function user()
	{
		$users = $this->Hrd_m->getUser()->result_array();

		$data['users'] = $users;
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_user', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function addUser()
	{
		$departments = $this->Core_m->getAll('department')->result_array();

		$data['departments'] = $departments;
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_add_user', $data);
		$this->load->view('components/v_close', $jsData);
	}
	
	public function submitNewUser() {
		$post = $this->input->post();
		
		$ins = array(
			'fname' => $post['fname'],
			'lname' => $post['lname'],
			'email' => $post['email'],
			'username' => $post['uname'],
			'sex' => $post['sex'],
			'password' => md5(date('Ymd', strtotime($post['birth_date']))),
			'birth_place' => $post['birth_place'],
			'birth_date' => date('Y-m-d H:i:s', strtotime($post['birth_date'])),
			'type' => $post['user_type'],
			'address' => $post['address'],
		);

		if($post['user_type'] == '2') {
			$ins['dept_id'] = $post['dept_work'];
		}

		$this->Core_m->insertData($ins, 'user');

		redirect('hrd/user');
	}

	public function editUser($id)
	{
		$user = $this->Core_m->getById($id, 'user')->row_array();
		$departments = $this->Core_m->getAll('department')->result_array();

		$data['user'] = $user;
		$data['departments'] = $departments;
		$jsData['page'] = 'hrd';
		
		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_edit_user', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function submitEditUser($id) {
		$post = $this->input->post();
		
		$ins = array(
			'fname' => $post['fname'],
			'lname' => $post['lname'],
			'email' => $post['email'],
			'username' => $post['uname'],
			'sex' => $post['sex'],
			'password' => md5(date('Y-m-d H:i:s', strtotime($post['birth_date']))),
			'birth_place' => $post['birth_place'],
			'birth_date' => date('Y-m-d H:i:s', strtotime($post['birth_date'])),
			'type' => $post['user_type'],
			'address' => $post['address'],
		);

		if($post['user_type'] == '2') {
			$ins['dept_id'] = $post['dept_work'];
		} else {
			$ins['dept_id'] = null;
		}

		$this->Core_m->updateData($id, $ins, 'user');

		redirect('hrd/user');
	}

	public function resetPassword($id) {
		$userData = $this->Core_m->getById($id, 'user')->row_array();

		$ins = array(
			'password' => md5(date('Ymd', strtotime($userData['birth_date']))),
		);

		$this->Core_m->updateData($id, $ins, 'user');

		redirect('hrd/user');
	}

	public function criteria()
	{
		$departments = $this->Core_m->getAll('department')->result_array();
		$aspectData = $this->Core_m->getAll('aspect')->result_array();

		$data['aspect_data'] = $aspectData;
		$data['criteria_datas'] = [];

		for ($i=0; $i < count($departments); $i++) {
			$criteria_data = $this->Kabag_m->getCriteriaData($departments[$i]['id'])->result_array();
			// print_r($criteria_data);
			// echo "<br>";
			// echo "<br>";
			array_push($data['criteria_datas'], $criteria_data);
		}
		
		$data['departments'] = $departments;
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_criteria', $data);
		$this->load->view('components/v_close', $jsData);
	}
	
	public function addCriteria($dept_id)
	{
		$deptData = $this->Core_m->getById($dept_id, 'department')->row_array();
		$aspectData = $this->Core_m->getAll('aspect')->result_array();
		
		$data['dept_data'] = $deptData;
		$data['aspects'] = $aspectData;
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_add_criteria', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function submitCriteria($dept_id) {
		$post = $this->input->post();

		$criteriaLength = (int) $post['criteria-length'];

		for ($i=1; $i <= $criteriaLength; $i++) {
			if(trim($post['criteria'.$i]) != '' && trim($post['criteria'.$i]) != null) {
				$ins = array(
					'name' => $post['criteria'.$i],
					'type' => $post['type'.$i],
					'target' => $post['target'.$i],
					'aspect_id' => $post['aspect'.$i],
					'dept_id' => $dept_id
				);
	
				$this->Core_m->insertData($ins, 'criteria');
			}
		}

		redirect('hrd/criteria');
	}

	public function update_criteria_name() {
		$post = $this->input->post();

		$kriteria_id = $post['kriteria_id'];
		$data = [
			'name' => $post['kriteria_name'],
		];

		$this->Core_m->updateData($kriteria_id, $data, 'criteria');

		redirect('hrd/criteria');
	}

	public function addAspect()
	{
		$jsData['page'] = 'hrd';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('hrd/v_add_aspect');
		$this->load->view('components/v_close', $jsData);
	}

	public function submitAspect() {
		$post = $this->input->post();

		$aspectLength = (int) $post['aspect-length'];

		for ($i=1; $i <= $aspectLength; $i++) {
			$checkName = trim($post['aspect'.$i]) != '' && trim($post['aspect'.$i]) != null;
			$checkCore = trim($post['coreWeight'.$i]) != '' && trim($post['coreWeight'.$i]) != null;
			$checkSecondary = trim($post['secondaryWeight'.$i]) != '' && trim($post['secondaryWeight'.$i]) != null;
			if($checkName && $checkCore && $checkSecondary) {
				$ins = array(
					'name' => $post['aspect'.$i],
					'core_weight' => $post['coreWeight'.$i],
					'secondary_weight' => $post['secondaryWeight'.$i],
					'weight' => $post['aspectWeight'.$i],
				);

				$this->Core_m->insertData($ins, 'aspect');
			}
		}

		redirect('hrd/criteria');
	}

	public function getAspects() {
		$aspectData = $this->Core_m->getAll('aspect')->result_array();

		echo json_encode($aspectData);
	}
}


?>

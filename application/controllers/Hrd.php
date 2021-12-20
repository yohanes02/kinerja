<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_type') != 1) {
			redirect('auth');
		}
		$this->load->model(['Hrd_m', 'Core_m']);
	}

	public function index() {
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_index');
		$this->load->view('components/footer');
	}

	public function karyawan() {
		$data['employees'] = $this->Hrd_m->getDataEmployees()->result_array();
		$data['departments'] = $this->Core_m->getAll('departemen')->result_array();
		$jsFile['jsFile'] = 'hrd';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_karyawan', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function detail_karyawan($id) {
		$data['detail'] = $this->Hrd_m->getEmployeeById($id)->row_array();
		$data['departments'] = $this->Core_m->getAll('departemen')->result_array();
		$jsFile['jsFile'] = 'hrd';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_detail_karyawan', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function bagian() {
		$data['departments'] = $this->Core_m->getAll('departemen')->result_array();
		$jsFile['jsFile'] = 'hrd';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_bagian', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function user() {
		$data['users'] = $this->Core_m->getAll('user')->result_array();
		$data['departments'] = $this->Core_m->getAll('departemen')->result_array();
		$jsFile['jsFile'] = 'hrd';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_user', $data);
		$this->load->view('components/footer', $jsFile);
	}

	// ACTION
	public function insertKaryawan() {
		$post = $this->input->post();
		
		$firstName = $post['first_name'];
		$lastName = $post['last_name'];
		$birthPlace = $post['birth_place'];
		$birthDate = $post['birth_date'];
		$fee = $post['fee'];
		$joinDate = $post['join_date'];
		$address = $post['address'];
		$departmentId = $post['department'];

		$birthDate = date_format(date_create($birthDate), 'Y-m-d');
		$joinDate = date_format(date_create($joinDate), 'Y-m-d');

		$ins = [
			'first_name'	=> $firstName,
			'last_name'	=> $lastName,
			'birth_place'			=> $birthPlace,
			'birth_date'			=> $birthDate,
			'fee'			=> $fee,
			'join_date'			=> $joinDate,
			'address'			=> $address,
			'departemen_id' => $departmentId
		];
		
		$this->Core_m->insertData($ins, 'karyawan');
		redirect('hrd/karyawan');
	}

	public function updateKaryawan() {
		$post = $this->input->post();
		
		$employeeId = $post['karyawan_id'];
		$firstName = $post['first_name'];
		$lastName = $post['last_name'];
		$birthPlace = $post['birth_place'];
		$birthDate = $post['birth_date'];
		$fee = $post['fee'];
		$joinDate = $post['join_date'];
		$address = $post['address'];
		$departmentId = $post['department'];

		$birthDate = date_format(date_create($birthDate), 'Y-m-d');
		$joinDate = date_format(date_create($joinDate), 'Y-m-d');

		$ins = [
			'first_name'	=> $firstName,
			'last_name'	=> $lastName,
			'birth_place'			=> $birthPlace,
			'birth_date'			=> $birthDate,
			'fee'			=> $fee,
			'join_date'			=> $joinDate,
			'address'			=> $address,
			'departemen_id' => $departmentId
		];
		
		$this->Core_m->updateData($employeeId, $ins, 'karyawan');
		redirect('hrd/karyawan');
	}

	public function insertUser() {
		$post = $this->input->post();

		$username = $post['username'];
		$password = $post['password'];
		$userType = $post['tipe_user'];
		$email = $post['email'];

		$ins = [
			'username'	=> $username,
			'password'	=> md5($password),
			'type'			=> $userType,
			'email'			=> $email
		];

		if($userType == "2") {
			$ins['department_id'] = $post['departemen'];
		}

		$this->Core_m->insertData($ins, 'user');
		redirect('hrd/user');
	}

	public function insertBagian() {
		$post = $this->input->post();

		$bagianName = $post['bagian_name'];

		$ins = [
			'name'	=> $bagianName
		];

		$this->Core_m->insertData($ins, 'departemen');
		redirect('hrd/bagian');
	}

	public function changePass() {
		$post = $this->input->post();

		$userId = $post['user_id'];
		$currentPassword = $post['current_password'];
		$newPassword = $post['new_password'];
		
		$checkCurrentPassSend = $this->Hrd_m->checkPassword($userId, $currentPassword)->row_array();

		if (empty($checkCurrentPassSend)) {
			redirect('hrd/user');
		}

		$this->Hrd_m->changePassword($userId, $newPassword);
		redirect('hrd/user');
	}

	public function updateBagian() {
		$post = $this->input->post();

		$bagianId = $post['bagian_id'];
		$bagianName = $post['bagian_name'];

		$ins = [
			'name'	=> $bagianName
		];

		$this->Core_m->updateData($bagianId, $ins, 'departemen');
		redirect('hrd/bagian');

	}

	public function updateUser() {
		$post = $this->input->post();

		$userId = $post['user_id'];
		$username = $post['username'];
		$userType = $post['tipe_user'];
		$email = $post['email'];

		$ins = [
			'username'	=> $username,
			'type'			=> $userType,
			'email'			=> $email
		];

		if($userType == "2") {
			$ins['department_id'] = $post['departemen'];
		}

		$this->Core_m->updateData($userId, $ins, 'user');
		redirect('hrd/user');

	}

	public function deleteKaryawan() {
		$post = $this->input->post();
		$employeeId = $post['karyawan_id'];

		$this->Core_m->deleteData($employeeId, 'karyawan');
		redirect('hrd/karyawan');
	}

	public function deleteUser() {
		$post = $this->input->post();
		$userId = $post['user_id'];

		$this->Core_m->deleteData($userId, 'user');
		redirect('hrd/user');
	}

	public function deleteBagian() {
		$post = $this->input->post();
		$userId = $post['bagian_id'];

		$this->Core_m->deleteData($userId, 'departemen');
		redirect('hrd/bagian');
	}
}
?>

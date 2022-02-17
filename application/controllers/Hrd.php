<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_type') != 1) {
			redirect('auth');
		}
		$this->load->model(['Hrd_m', 'Core_m', 'Kabag_m']);
	}

	public function index() {
		$data['sumEmployee'] = count($this->Core_m->getAll('karyawan')->result_array());
		$data['sumDepartment'] = count($this->Core_m->getAll('departemen')->result_array());
		$jsFile['jsFile'] = 'hrd';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_index', $data);
		$this->load->view('components/footer', $jsFile);
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

	public function kriteria() {
		$jsFile['jsFile'] = 'hrd';

		$data['departments'] = $this->Core_m->getAll('departemen')->result_array();
		$data['criteria_datas'] = [];

		$departments = $data['departments'];
		for ($i=0; $i < count($departments); $i++) {
			$criteria_used_row = $this->Kabag_m->getCriteriaUsed($departments[$i]['id'])->row_array();
			if($criteria_used_row == null) {
				$criteria_used = -1;
			} else {
				$criteria_used = $criteria_used_row['version'];
			}
			$criteria_data = $this->Kabag_m->getCriteriaData($departments[$i]['id'], $criteria_used)->result_array();
			array_push($data['criteria_datas'], $criteria_data);
		}
		// print_r($data['criteria_datas'][0][0]['department_id']);die;
		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_kriteria', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function detail_kriteria($id)
	{
		$sub_criteria_data = $this->Kabag_m->getSubCriteriaData($id)->result_array();
		$data['sub_criteria_data'] = $sub_criteria_data;
		$data['criteria_id'] = $id;

		$jsFile['jsFile'] = 'hrd';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_sub_kriteria', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function insert_criteria()
	{
		$post = $this->input->post();
		$criteria_length = intval($post['kriteria_length']);
		$deptId = $post['dept_id'];

		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($deptId)->row_array();

		if ($criteria_used_row == null) {
			$ins = [
				'department_id' => $deptId,
				'version' => 1,
			];
			// print_r($ins);
			// echo "<br><br><br><br>";

			$this->Core_m->insertData($ins, "used_criteria");
		}

		for ($i = 1; $i <= $criteria_length; $i++) {
			if (!empty($post['criteria_new_name' . $i])) {
				$ins = [
					'name' => $post['criteria_new_name' . $i],
					'weight' => $post['criteria_new_rating' . $i],
					'department_id' => $deptId,
					'version' => 1,
				];
				$this->Core_m->insertData($ins, "criteria");
				// print_r($ins);
				// echo "<br><br>";
			}
		} 
		// die;

		redirect('hrd/kriteria');
	}

	public function update_criteria()
	{
		$post = $this->input->post();
		$deptId = $post['dept_id'];
		// print_r($post);die;

		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($deptId)->row_array();
		if($criteria_used_row == null) {
			$criteria_used = -1;
		} else {
			$criteria_used = $criteria_used_row['version'];
		}
		$criteria_data = $this->Kabag_m->getCriteriaData($deptId, $criteria_used)->result_array();

		// print_r($criteria_data);die;

		for ($i = 0; $i < count($criteria_data); $i++) {
			$kriteria_id = $post['criteria_id' . $i];
			$data = [
				'name' => $post['criteria_name' . $i],
				'weight' => $post['criteria_rating' . $i],
			];
			// echo $kriteria_id;
			// echo "<br>";
			// print_r($data);
			// echo "<br>";
			// echo "<br>";

			$this->Core_m->updateData($kriteria_id, $data, 'criteria');
		}
		// die;

		redirect('hrd/kriteria');
	}

	public function update_criteria_name()
	{
		$post = $this->input->post();

		$kriteria_id = $post['kriteria_id'];
		$data = [
			'name' => $post['kriteria_name'],
		];
		// print_r($data);die;

		$this->Core_m->updateData($kriteria_id, $data, 'criteria');

		redirect('hrd/kriteria');
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

		// redirect('kabag/detail_kriteria/' . $post['criteria_parent']);
		redirect('hrd/kriteria');
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
		// redirect('kabag/detail_kriteria/' . $post['criteria_parent']);
		redirect('hrd/kriteria');
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

	public function kinerja() {
		$data['employees'] = $this->Hrd_m->getDataEmployees()->result_array();
		$data['departments'] = $this->Core_m->getAll('departemen')->result_array();
		$jsFile['jsFile'] = 'hrd';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('hrd/v_kinerja', $data);
		$this->load->view('components/footer', $jsFile);
	}

	// ACTION
	public function insertKaryawan() {
		$post = $this->input->post();
		
		$firstName = $post['first_name'];
		$lastName = $post['last_name'];
		$birthPlace = $post['birth_place'];
		$birthDate = $post['birth_date'];
		$jk = $post['jenis_kelamin'];
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
			'jk'			=> $jk,
			'fee'			=> $fee,
			'join_date'			=> $joinDate,
			'address'			=> $address,
			'departemen_id' => $departmentId
		];

		$checkFullName = $this->Hrd_m->checkFullName($firstName, $lastName)->result_array();

		if(count($checkFullName) > 0) {
			$this->session->set_flashdata('errInsEmployee', 'Menambahkan karyawan tidak berhasil');
			redirect('hrd/karyawan');
		}
		
		$this->Core_m->insertData($ins, 'karyawan');
		$this->session->set_flashdata('successInsEmployee', 'Karyawan berhasil ditambahkan');
		redirect('hrd/karyawan');
	}

	public function updateKaryawan() {
		$post = $this->input->post();
		
		$employeeId = $post['karyawan_id'];
		$firstName = $post['first_name'];
		$lastName = $post['last_name'];
		$birthPlace = $post['birth_place'];
		$birthDate = $post['birth_date'];
		$jk = $post['jenis_kelamin'];
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
			'jk'			=> $jk,
			'fee'			=> $fee,
			'join_date'			=> $joinDate,
			'address'			=> $address,
			'departemen_id' => $departmentId
		];

		$checkFullName = $this->Hrd_m->checkFullName($firstName, $lastName)->result_array();

		$continue = true;

		if(count($checkFullName) > 0) {
			foreach ($checkFullName as $dt) {
				if ($dt['id'] != $employeeId) {
					$continue = false;
				}
			}

			if(!$continue) {
				$this->session->set_flashdata('errUpdEmployee', 'Update data karyawan tidak berhasil');
				redirect('hrd/karyawan');
			}
		}
		
		$this->Core_m->updateData($employeeId, $ins, 'karyawan');
		$this->session->set_flashdata('successUpdEmployee', 'Update data karyawan berhasil');
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

		$uname = $this->Hrd_m->checkUnameExist($username)->result_array();
		$mail = $this->Hrd_m->checkEmailExist($email)->result_array();

		if(count($uname) > 0 || count($mail) > 0) {
			$this->session->set_flashdata('errIns', 'Menambahkan user tidak berhasil, email atau username sudah terdaftar pada user lain.');
			redirect('hrd/user');
		}

		if($userType == "2") {
			$ins['department_id'] = $post['departemen'];
		}

		$this->Core_m->insertData($ins, 'user');
		$this->session->set_flashdata('successIns', 'User berhasil ditambahkan.');
		redirect('hrd/user');
	}

	public function insertBagian() {
		$post = $this->input->post();

		$bagianName = $post['bagian_name'];

		$ins = [
			'name'	=> $bagianName
		];

		$bagianExist = $this->Hrd_m->checkBagianExist($bagianName)->result_array();

		if(count($bagianExist) > 0) {
			$this->session->set_flashdata('errInsBagian', 'Data bagian gagal ditambahkan.');
			redirect('hrd/bagian');
		}

		$this->Core_m->insertData($ins, 'departemen');
		$this->session->set_flashdata('successInsBagian', 'Data bagian berhasil ditambahkan');
		redirect('hrd/bagian');
	}

	public function changePass() {
		$post = $this->input->post();

		$userId = $post['user_id'];
		$currentPassword = $post['current_password'];
		$newPassword = $post['new_password'];
		
		$checkCurrentPassSend = $this->Hrd_m->checkPassword($userId, $currentPassword)->row_array();

		if (empty($checkCurrentPassSend)) {
			$this->session->set_flashdata('errChangePass', 'Ganti Password gagal, password yang dimasukkan tidak sesuai.');
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

		$bagianExist = $this->Hrd_m->checkBagianExist($bagianName)->result_array();

		$continue = true;

		if(count($bagianExist) > 0) {

			foreach ($bagianExist as $dt) {
				if($dt['id'] != $bagianId) {
					$continue = false;
				}
			}
			if(!$continue) {
				$this->session->set_flashdata('errUpdBagian', 'Update data bagian gagal');
				redirect('hrd/bagian');
			}
			
		}

		$this->Core_m->updateData($bagianId, $ins, 'departemen');
		$this->session->set_flashdata('successUpdBagian', 'Update data bagian berhasil');
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

		$uname = $this->Hrd_m->checkUnameExist($username)->result_array();
		$mail = $this->Hrd_m->checkEmailExist($email)->result_array();

		$continue = true;

		if(count($uname) > 0 || count($mail) > 0) {
			foreach ($uname as $dt) {
				if($dt['id'] != $userId) {
					$continue = false;
				}
			}
			foreach ($mail as $dt) {
				if($dt['id'] != $userId) {
					$continue = false;
				}
			}
			if (!$continue) {
				$this->session->set_flashdata('errUpd', 'Update tidak berhasil, email atau username sudah terdaftar pada user lain.');
				redirect('hrd/user');
			}
		}

		if($userType == "2") {
			$ins['department_id'] = $post['departemen'];
		}

		$this->Core_m->updateData($userId, $ins, 'user');
		$this->session->set_flashdata('successUpd', 'Update data user berhasil.');
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

	public function getEmployeeByGender() {
		echo json_encode($this->Hrd_m->getEmployeeByGender()->result());
	}

	public function getEmployeeByGenderByDepartment() {
		$arr = array();
		$departments = $this->Core_m->getAll('departemen')->result_array();
		foreach ($departments as $department) {
			$a = array();
			$a['dept_name'] = $department['name'];

			$datas = $this->Hrd_m->getEmployeeByGenderByDepartment($department['id'])->result_array();
			// print_r($datas); echo "<br><br>";
			$pria = 0;
			$wanita = 0;
			if(empty($datas) == false) {
				foreach ($datas as $data) {
					// echo $data['name'];print_r($data);echo "<br><br>";
					if($data['jk'] == 1) {
						$pria = $data['jml'];
					} else {
						$wanita = $data['jml'];
					}
				}
			} else {
				$pria = 0;
				$wanita = 0;
			}
			$a['gender'] = [$pria, $wanita];
			array_push($arr, $a);
		}
		echo json_encode($arr);
		// die;
	}

	public function getPenilaian() {
		$jsonData = json_decode(file_get_contents('php://input'),true);
		// print_r($jsonData);die;
		
		$months = $jsonData['months'];
		// $months = [9,10,11];
		$years = $jsonData['years'];
		// $years = [2021,2021,2021];
		$department = $jsonData['department'];
		// $department = "all";
		$employee = $jsonData['employee'];
		// $employee = "all";
		
		if($department == "all" && $employee == "all") {
			$departments = $this->Core_m->getAll('departemen')->result_array();
		}
		
		if(isset($departments)) {
			$this->allDept($departments, $employee, $months, $years);
		} else {
			// echo $department." ";
			// echo $employee." ";
			// echo "<br/><br/>";
			// print_r($months);
			// echo "<br/><br/>";
			// print_r($years);
			// echo "<br/><br/>";
			// if($employee != "all" && $department == "all") {

			// } else {
				$this->singleDept($department, $employee, $months, $years);die;
			// }
		}

	}

	private function allDept($departments, $employee, $months, $years) {
		$resArr2 = array();
		foreach ($departments as $dept) {
			$resArr = array();
			$resArr['dept_name'] = $dept['name'];
			$resArr['data'] = array();
			$criteria_used_row = $this->Kabag_m->getCriteriaUsed($dept['id'])->row_array();
			if($criteria_used_row == null) {
				$criteria_used = -1;
			} else {
				$criteria_used = $criteria_used_row['version'];
			}
			$criterias = $this->Kabag_m->getCriteriaData($dept['id'], $criteria_used)->result_array();
			$criterias_name = array();
			$criterias_id = array();
			foreach ($criterias as $criteria) {
				array_push($criterias_name, $criteria['name']);
				array_push($criterias_id, $criteria['id']);
			}
			$resArr['dept_criteria'] = $criterias_name;
			for ($i = 0; $i < count($criterias); $i++) {
				$sub_criterias = $this->Kabag_m->getSubCriteriaData($criterias[$i]['id'])->result_array();
				$criterias[$i]['sub_criterias'] = $sub_criterias;
			}
	
			if($employee == 'all') {
				$employee_data = $this->Kabag_m->getEmployeeData($dept['id'])->result_array();
			} else {
				$employee_data = $this->Core_m->getById($employee,'karyawan')->result_array();
			}
			// print_r($employee_data);die;
	
			for ($h=0; $h < count($months); $h++) { 
				$arr = array();
				// $arr['month'] = $months[$h];
				for ($i = 0; $i < count($employee_data); $i++) {
					$a = array();
					$a['k_id'] = $employee_data[$i]['id'];
					$a['k_name'] = $employee_data[$i]['first_name'].' '.$employee_data[$i]
					['last_name'];
					// $month = date('m') - 1;
					$month = $months[$h];
					$year = $years[$h];
					$aa = array();
					if($criterias_id != []) {
						$rating = $this->Kabag_m->getPenilaian($employee_data[$i]['id'], $criterias_id, $month, $year)->result_array();
						
						for ($j=0; $j < count($rating); $j++) { 
							$b = array($rating[$j]['criteria_id'], $rating[$j]['name'], $rating[$j]['weight']);
							array_push($aa, $b);
						}
						$a['cr'] = $aa;
					}
		
					$where = [
						"karyawan_id" => $employee_data[$i]['id'],
						"month" => $month,
						"year" => $year,
						"version" => $criteria_used
					];
			
					$resp= $this->Kabag_m->getResult($where)->row_array();
					if($resp != null) {
						$result = $resp['result'];
						$a['result'] = $result;
					}
					if($resp != null) {
						// $a = array();
						array_push($arr, $a);
					}
		
				}
	
				usort($arr, function ($item1, $item2) {
					if(isset($item1['result'])) {
						if ($item1['result'] == $item2['result']) return 0;
						return $item1['result'] < $item2['result'] ? -1 : 1;
					}
				});
	
				// var_dump($arr['result']);echo "<br/><br/>";
	
				array_push($resArr['data'], $arr);
	
				// print_r($arr);
				// echo "<br/>";
				// echo "<br/>";
			}

			array_push($resArr2, $resArr);
		}
		echo json_encode($resArr2);
	}

	private function singleDept($department_id, $employee, $months, $years) {
		$resArr = array();
		$resArr['data'] = array();

		if($employee != "all" && $department_id == "all") {
			$employee_dept_id = $this->Core_m->getById($employee,'karyawan')->row_array();
			$employee_dept_id = $employee_dept_id['departemen_id'];
			$department_id = $employee_dept_id;
		}

		$criteria_used_row = $this->Kabag_m->getCriteriaUsed($department_id)->row_array();
		if($criteria_used_row == null) {
			$criteria_used = -1;
		} else {
			$criteria_used = $criteria_used_row['version'];
		}
		$criterias = $this->Kabag_m->getCriteriaData($department_id, $criteria_used)->result_array();
		$criterias_id = array();
		$criterias_name = array();
		foreach ($criterias as $criteria) {
			array_push($criterias_id, $criteria['id']);
			array_push($criterias_name, $criteria['name']);
		}
		$resArr['dept_criteria'] = $criterias_name;
		for ($i = 0; $i < count($criterias); $i++) {
			$sub_criterias = $this->Kabag_m->getSubCriteriaData($criterias[$i]['id'])->result_array();
			$criterias[$i]['sub_criterias'] = $sub_criterias;
		}

		if($employee == 'all') {
			$employee_data = $this->Kabag_m->getEmployeeData($department_id)->result_array();
		} else {
			$employee_data = $this->Core_m->getById($employee,'karyawan')->result_array();
		}
		// print_r($employee_data);die;

		for ($h=0; $h < count($months); $h++) { 
			$arr = array();
			// $arr['month'] = $months[$h];
			for ($i = 0; $i < count($employee_data); $i++) {
				$a = array();
				$a['k_id'] = $employee_data[$i]['id'];
				$a['k_name'] = $employee_data[$i]['first_name'].' '.$employee_data[$i]
				['last_name'];
				// $month = date('m') - 1;
				$month = $months[$h];
				$year = $years[$h];
				if($criterias_id != []) {
					$rating = $this->Kabag_m->getPenilaian($employee_data[$i]['id'], $criterias_id, $month, $year)->result_array();
					$aa = array();
					for ($j=0; $j < count($rating); $j++) { 
						$b = array($rating[$j]['criteria_id'], $rating[$j]['name'], $rating[$j]['weight']);
						array_push($aa, $b);
					}
					$a['cr'] = $aa;
				}
	
				$where = [
					"karyawan_id" => $employee_data[$i]['id'],
					"month" => $month,
					"year" => $year,
					"version" => $criteria_used
				];
		
				$resp= $this->Kabag_m->getResult($where)->row_array();
				if($resp != null) {
					$result = $resp['result'];
					$a['result'] = $result;
				}
				if($resp != null) {
					// $a = array();
					array_push($arr, $a);
				}
	
			}

			usort($arr, function ($item1, $item2) {
				if(isset($item1['result'])) {
					if ($item1['result'] == $item2['result']) return 0;
					return $item1['result'] < $item2['result'] ? -1 : 1;
				}
			});

			// var_dump($arr['result']);echo "<br/><br/>";

			array_push($resArr['data'], $arr);

			// print_r($arr);
			// echo "<br/>";
			// echo "<br/>";
		}

		// print_r($resArr);

		echo json_encode($resArr);
	}

	public function getEmployeeByDept() {
		$jsonData = json_decode(file_get_contents('php://input'),true);
		$department = $jsonData['dept_id'];

		$employees = $this->Hrd_m->getEmployeeByDept($department)->result_array();

		echo json_encode($employees);
	}
}
?>

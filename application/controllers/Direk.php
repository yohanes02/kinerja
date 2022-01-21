<?php 

class Direk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_type') != 3) {
			redirect('auth');
		}
		$this->load->model(['Direk_m', 'Core_m', 'Kabag_m']);
	}

	public function index() {
		$data['sumEmployee'] = count($this->Core_m->getAll('karyawan')->result_array());
		$data['sumDepartment'] = count($this->Core_m->getAll('departemen')->result_array());
		$data['avgByDept'] = $this->getAvgAllDept();
		$data['sumEmployeeDept'] = $this->getEmployeePerDept();

		$jsFile['jsFile'] = 'direk';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('direktur/v_index', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function kinerja() {
		$data['employees'] = $this->Direk_m->getDataEmployees()->result_array();
		$data['departments'] = $this->Core_m->getAll('departemen')->result_array();
		$jsFile['jsFile'] = 'direk';

		$this->load->view('components/header');
		$this->load->view('components/top_bar');
		$this->load->view('direktur/v_kinerja', $data);
		$this->load->view('components/footer', $jsFile);
	}

	public function getAvgAllDept() {
		$result = array();
		$deparments = $this->Core_m->getAll('departemen')->result_array();

		foreach ($deparments as $dept) {
			// $arr = array();
			$arr['dept_name'] = $dept['name'];
			$criteria_used_row = $this->Kabag_m->getCriteriaUsed($dept['id'])->row_array();
			if($criteria_used_row == null) {
				$criteria_used = -1;
			} else {
				$criteria_used = $criteria_used_row['version'];
			}
			$employee_data = $this->Kabag_m->getEmployeeData($dept['id'])->result_array();
			$employee_ids = array();
			foreach ($employee_data as $employee) {
				array_push($employee_ids, $employee['id']);
			}
			$avg = 0;
			$sum = 0;
			if($employee_ids != array()) {
				$dataResult = $this->Direk_m->getResultInId($employee_ids, $criteria_used)->result_array();
				foreach ($dataResult as $dt) {
					$sum = $sum + $dt['result'];
				}
				if($sum!=0) {
					$avg = $sum / count($dataResult);
				}
			}
			$arr['avg'] = $avg;
			array_push($result, $arr);
		}
		// print_r($result);die;
		return $result;
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
				$this->singleDept($department, $employee, $months, $years);
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
					if ($item1['result'] == $item2['result']) return 0;
					return $item1['result'] < $item2['result'] ? -1 : 1;
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
				if ($item1['result'] == $item2['result']) return 0;
				return $item1['result'] < $item2['result'] ? -1 : 1;
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

		$employees = $this->Direk_m->getEmployeeByDept($department)->result_array();

		echo json_encode($employees);
	}

	public function getEmployeePerDept() {
		$result = array();
		$deparments = $this->Core_m->getAll('departemen')->result_array();
		foreach ($deparments as $deparment) {
			$dataEmployee = $this->Direk_m->getEmployeeSumByDept($deparment['id'])->result_array();
			$arr['sum'] = count($dataEmployee);
			$arr['name'] = $deparment['name'];
			array_push($result, $arr);
		}
		// print_r($result);die;
		return $result;
	}
}

?>

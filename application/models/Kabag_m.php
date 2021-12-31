<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kabag_m extends CI_Model
{
	function __construct()
  {
    parent::__construct();
  }

	function getCriteriaUsed($department_id) {
		$this->db->where(["department_id" => $department_id]);
		return $this->db->get('used_criteria');
	}

	function getCriteriaData($department_id, $version) {
		$this->db->where(["department_id" => $department_id, "version"=>$version]);
		return $this->db->get('criteria');
	}
	
	function getSubCriteriaData($criteria_id) {
		$this->db->where(["criteria_id" => $criteria_id]);
		return $this->db->get('sub_criteria');
	}

	function getEmployeeData($department_id) {
		$this->db->where(["departemen_id" => $department_id]);
		return $this->db->get('karyawan');
	}

	function getPenilaian($employee_id, $criterias_id, $month, $year) {
		$criterias_id = join(',',$criterias_id);
		$sql = "SELECT r.*, c.weight, sc.weight, sc.name, c.weight as cweight from rating r left join criteria c on c.id = r.criteria_id left join sub_criteria sc on sc.id = r.sub_criteria_id where r.karyawan_id = $employee_id and r.criteria_id in ($criterias_id) and r.month = $month and r.year = $year";
		return $this->db->query($sql);
	}

	function getPenilaian2($employee_id, $criterias_id, $month) {
		$criterias_id = join(',',$criterias_id);
		$sql = "SELECT sc.weight as scWeight, sc.name from rating r left join criteria c on c.id = r.criteria_id left join sub_criteria sc on sc.id = r.sub_criteria_id where r.karyawan_id = $employee_id and r.criteria_id in ($criterias_id) and r.month = $month";
		return $this->db->query($sql);
	}

	function maxminSubBobot($criteria_id) {
		$sql = "select max(weight) as max, min(weight) as min from sub_criteria where criteria_id = $criteria_id";
		return $this->db->query($sql);
	}

	function getResult($where) {
		$this->db->where($where);
		return $this->db->get('result_penilaian');
	}

}

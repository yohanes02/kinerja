<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Direk_m extends CI_Model
{
	function __construct()
  {
    parent::__construct();
  }

	public function getDataEmployees() {
		$sql = "SELECT K.*, D.name as departemen_name FROM karyawan K LEFT JOIN departemen D ON D.id = K.departemen_id";
		return $this->db->query($sql);
	}

	function getResultInId($employees_id, $version) {
		$this->db->where('version', $version);
		$this->db->where_in('karyawan_id', $employees_id);
		return $this->db->get('result_penilaian');
	}

	function getEmployeeByDept($dept_id) {
		$this->db->where(['departemen_id'=>$dept_id]);
		return $this->db->get('karyawan');
	}
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hrd_m extends CI_Model
{
	function __construct()
  {
    parent::__construct();
  }

	public function checkPassword($id, $password) {
		$this->db->where(["id"=>$id, "password"=>md5($password)]);
		return $this->db->get('user');
	}

	public function changePassword($id, $password) {
		$this->db->where(["id"=>$id])->update("user", ["password"=>md5($password)]);
		return $this->db->affected_rows();
	}

	public function getDataEmployees() {
		$sql = "SELECT K.*, D.name as departemen_name FROM karyawan K LEFT JOIN departemen D ON D.id = K.departemen_id";
		return $this->db->query($sql);
	}

	public function getEmployeeById($id) {
		$this->db->where(['id'=>$id]);
		return $this->db->get('karyawan');
	}

	public function getEmployeeByGender() {
		$sql = "SELECT jk, count(*) as jml FROM `karyawan` GROUP by jk";
		return $this->db->query($sql);
	}
}

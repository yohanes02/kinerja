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

	public function checkUnameExist($uname) {
		$this->db->where(["username"=>$uname]);
		return $this->db->get('user');
	}

	public function checkEmailExist($email) {
		$this->db->where(["email"=>$email]);
		return $this->db->get('user');
	}

	public function checkBagianExist($name) {
		$this->db->where(["name"=>$name]);
		return $this->db->get('departemen');
	}

	public function checkFullName($fname, $lname) {
		$this->db->where(["first_name"=>$fname, "last_name"=>$lname]);
		return $this->db->get('karyawan');
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

	public function getEmployeeByGenderByDepartment($department_id) {
		$sql = "SELECT d.name, k.jk, count(*) as jml FROM `karyawan` k left join departemen d on d.id = k.departemen_id where departemen_id = $department_id GROUP by jk";
		return $this->db->query($sql);
	}

	public function getEmployeeByDept($dept_id) {
		$this->db->where(['departemen_id'=>$dept_id]);
		return $this->db->get('karyawan');
	}
}

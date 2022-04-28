<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hrd_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getEmployee()
	{
		$sql = "select a.*, b.dept_name FROM employee a left join department b on b.id = a.dept_id";
		return $this->db->query($sql);
	}

	public function getUser()
	{
		$sql = "select a.*, b.dept_name FROM user a left join department b on b.id = a.dept_id";
		return $this->db->query($sql);
	}

}

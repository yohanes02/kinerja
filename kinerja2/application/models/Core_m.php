<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getAll($table)
	{
		return $this->db->get($table);
	}

	public function getById($id, $table) {
		$this->db->where(['id'=>$id]);
		return $this->db->get($table);
	}

	public function insertData($ins, $table) {
		$this->db->insert($table, $ins);
		return $this->db->affected_rows();
	}

	public function updateData($id, $ins, $table) {
		$this->db->where(["id"=>$id])->update($table, $ins);
		return $this->db->affected_rows();
	}

	public function deleteData($id, $table) {
		$this->db->where(["id"=>$id])->delete($table);
		return $this->db->affected_rows();
	}
}

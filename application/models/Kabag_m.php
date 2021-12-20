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
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kabag_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getCriteriaData($dept_id) {
		// $this->db->where(["dept_id" => $dept_id]);
		// $this->db->order_by('aspect_id', 'asc');
		// $this->db->order_by('type', 'asc');
		// return $this->db->get('criteria');
		$sql = "SELECT C.*, A.name as aspect_name FROM criteria C LEFT JOIN aspect A on C.aspect_id = A.id WHERE C.dept_id = $dept_id and A.id = C.aspect_id ORDER BY C.aspect_id ASC, C.type ASC";
		return $this->db->query($sql);
	}

	public function getEmployee($dept_id) {
		$this->db->where(["dept_id" => $dept_id]);
		return $this->db->get('employee');
	}

	public function getPenilaian($employee_id, $criterias_id, $month, $year) {
		$criterias_id = join(',',$criterias_id);
		$sql = "SELECT r.*, c.name as cname from rating r left join criteria c on c.id = r.criteria_id where r.employee_id = $employee_id and r.criteria_id in ($criterias_id) and r.month = $month and r.year = $year";

		return $this->db->query($sql);
	}
}

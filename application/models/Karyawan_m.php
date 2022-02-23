<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getPekerjaan($month, $year, $karyawanId) {
		// echo $month . " - ".$year." - ".$karyawanId;die;
		$this->db->where(["month" => $month, "year" => $year, "karyawan_id" => $karyawanId]);
		return $this->db->get('work');
	}
}

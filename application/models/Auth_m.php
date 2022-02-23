<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_m extends CI_Model
{
	function __construct()
  {
    parent::__construct();
  }

	public function getUser($username, $pass)
	{
    $this->db->where(['username' => $username, 'password' => $pass]);
    return $this->db->get("user");
	}

  public function getKaryawan($email, $pass)
	{
    $this->db->where(['email' => $email, 'password' => $pass]);
    return $this->db->get("karyawan");
	}
}

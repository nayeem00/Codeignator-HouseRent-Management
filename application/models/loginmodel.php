<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function verifyUser($username, $password)
	{
		
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('user');

		
		$row = $result->row_array();
		if($row)
		{
			
			$this->session->set_userdata('UserStatus', $row['UserStatus']);
			$this->session->set_userdata('UserId', $row['UserId']);
			$this->session->set_userdata('UserFullName', $row['FullName']);
			return true;
		}
		else
		{
			return false;
		}

	}

	
}
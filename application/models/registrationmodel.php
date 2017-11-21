<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registrationmodel extends CI_Model {

	public function registeruser($data)
	{
		$this->db->insert('user', $data); 

	}
	public function Usernamecheck($username)
	{
		$this->db->where('username', $username);
		$result = $this->db->get('user');

		
		$result = $result->result_array();
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		} 

	}

	
}
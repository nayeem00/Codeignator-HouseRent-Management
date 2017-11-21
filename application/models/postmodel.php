<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class postmodel extends CI_Model {

	public function getarea()
	{
		
		$arealist = $this->db->get('area');

		return  $arealist->result_array() ; 


	}

	public function post($data)
	{
		$this->db->insert('post', $data); 

	}

	
}
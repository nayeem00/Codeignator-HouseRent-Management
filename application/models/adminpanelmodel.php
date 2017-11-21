<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminpanelmodel extends CI_Model {

	

	public function getApprovedpostList()
	{
		$this->db->select('*');
        $this->db->from('post');
         $this->db->where('Approval',"1");
        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}
	public function getPendingpostList()
	{
		$this->db->select('*');
        $this->db->from('post');
         $this->db->where('Approval',"0");
        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}
	public function getAreaList()
	{
		$this->db->select('*');
        $this->db->from('area');
        $this->db->order_by('AreaName');
		$post= $this->db->get();
		return $post->result_array();
		
	}
	public function getAdminList()
	{
		$this->db->select('*');
        $this->db->from('user');
         $this->db->where('UserStatus',"admin");
        $this->db->order_by('FullName');
		$post= $this->db->get();
		return $post->result_array();
		
	}
	public function getUserList()
	{
		$this->db->select('*');
        $this->db->from('user');
         $this->db->where('UserStatus',"user");
        $this->db->order_by('FullName');
		$post= $this->db->get();
		return $post->result_array();
		
	}


	public function deletePost($id)
	{
		$this->db->where('PostId', $id);
        $this->db->delete('post');
	}
	public function approvePost($id,$data)
	{
		$this->db->where('PostId', $id);
      $this->db->update('post', $data); 
	}
	public function deleteArea($id)
	{
		$this->db->where('AreaId', $id);
        $this->db->delete('area');
	}
	public function deleteUser($id)
	{
		$this->db->where('UserId', $id);
        $this->db->delete('user');
	}
	public function MakeAdmin($id,$data)
	{
		$this->db->where('UserId', $id);
        $this->db->update('user', $data); 
	}

	public function MaXArea()
	{
		$this->db->select('AreaName',"count('Area')");
        $this->db->from('post','area');
         $this->db->where('HireStatus','0');
         $this->db->where('Approval','1');
        $this->db->group_by('Area');

        $this->db->order_by("count('Area')",'desc');
        $this->db->join('area', 'area.AreaId = post.Area');
		$post= $this->db->get();
		return $post->row_array();
		
	}

	public function MostActiveUser()
	{
		$this->db->select('UserName',"count('CreatedBy')");
        $this->db->from('post','user');
        $this->db->group_by('CreatedBy');

        $this->db->order_by("count('CratedBy')",'desc');
        $this->db->join('user', 'user.UserId = post.CreatedBy');
		$post= $this->db->get();
		return $post->row_array();
		
	}

	public function MostSearchKeyword()
	{
		$this->db->select('Keyword',"count('Keyword')");
        $this->db->from('searchhistory');
        $this->db->group_by('Keyword');

        $this->db->order_by("count('Keyword')",'desc');
		$post= $this->db->get();
		return $post->row_array();
		
	}
	public function MostSearchIp()
	{
		$this->db->select('Ip',"count('Ip')");
        $this->db->from('searchhistory');
        $this->db->group_by('Ip');

        $this->db->order_by("count('Ip')",'desc');
		$post= $this->db->get();
		return $post->row_array();
		
	}

	

	


	
}
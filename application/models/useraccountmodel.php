<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Useraccountmodel extends CI_Model {

	

	public function getActivePostList($id)
	{
		$this->db->select('*');
        $this->db->from('post');
         $this->db->where('HireStatus',"0");
         $this->db->where('CreatedBy',$id);
        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}
	public function getInActivePostList($id)
	{
		$this->db->select('*');
        $this->db->from('post');
         $this->db->where('HireStatus',"1");
         $this->db->where('CreatedBy',$id);
        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}
	


	public function deletePost($id)
	{
		$this->db->where('PostId', $id);
        $this->db->delete('postt');
	}
	public function ActivatePost($id,$data)
	{
		$this->db->where('PostId', $id);
      $this->db->update('post', $data); 
	}
	
	public function DisablePost($id,$data)
	{
		$this->db->where('PostId', $id);
		$this->db->update('post', $data); 
	}

	

	


	
}
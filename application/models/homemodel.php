<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homemodel extends CI_Model {

	

	public function getpostList()
	{
		$this->db->select('*');
        $this->db->from('post');
        $this->db->where('Approval',"1");
        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}

	public function getpostListBySearch($key)
	{
		$this->db->select('*');
        $this->db->from('post','area');
        $this->db->where('Approval',"1");
        $this->db->like('AreaName',$key);

        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}

	public function getpostListById($id)
	{
		$this->db->select('*');
        $this->db->from('post','area');
        $this->db->where('PostId',$id);

        $this->db->join('area', 'area.AreaId = post.Area');
		$post= $this->db->get();
		return $post->result_array();
		
	}

	public function postComment($data)
	{
		$this->db->insert('commnet', $data); 
		
	}

	public function getCommentListById($id)
	{
		$this->db->select('*');
        $this->db->from('commnet','user');
        $this->db->where('postId',$id);

        $this->db->join('user', 'user.userId = commnet.userId');
		$post= $this->db->get();
		return $post->result_array();
		
	}
	public function getAreaNames($id)
	{
		$this->db->like('AreaName', $id);
		$result = $this->db->get('area');
		$list = $result->result_array();
		$names = array();
		foreach ($list as $area) {
			array_push($names, $area['AreaName']);
		}
		return $names;
		
	}


	public function getpostListValidKey($validkey)
	{
		//filter detect funtionality
		$SearchBoxValue = false;
		$PriceFilteValue = false;
		$RoomFilteValue = false;
		$CategoryFilteValue = false;
		foreach ($validkey as $key => $value) {
			if($key=="SearchBoxValue")
			{
				$SearchBoxValue = true;
			}
			elseif ($key=="PriceFilteValue") {
				$PriceFilteValue = true;
			}
			elseif ($key=="RoomFilteValue") {
				$RoomFilteValue = true;
			}
			elseif ($key=="CategoryFilteValue") {
				$CategoryFilteValue = true;
			}
		}


		$this->db->select('*');
        $this->db->from('post','area');
        $this->db->where('Approval',"1");
        if ($SearchBoxValue) {
        	$this->db->like('AreaName',$validkey['SearchBoxValue']);
        }
        if ($PriceFilteValue) {
        	$range = explode("-", $validkey['PriceFilteValue']);
        		
        		$this->db->where('Rent >=',$range[0]);
        		$this->db->where('Rent <',$range[1]);
        		
        	
        }
        if ($RoomFilteValue) {
        	
        		$this->db->where('BedRoom >',$validkey['RoomFilteValue']);
        	
        	
        	
        }
        if ($CategoryFilteValue) {
        	$this->db->like('Category',$validkey['CategoryFilteValue']);
        	
        }
        

        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}



	public function getSuggetionListValidKey($validkey)
	{
		//filter detect funtionality
		$SearchBoxValue = false;
		$PriceFilteValue = false;
		$RoomFilteValue = false;
		$CategoryFilteValue = false;
		foreach ($validkey as $key => $value) {
			if($key=="SearchBoxValue")
			{
				$SearchBoxValue = true;
			}
			elseif ($key=="PriceFilteValue") {
				$PriceFilteValue = true;
			}
			elseif ($key=="RoomFilteValue") {
				$RoomFilteValue = true;
			}
			elseif ($key=="CategoryFilteValue") {
				$CategoryFilteValue = true;
			}
		}


		$this->db->select('*');
        $this->db->from('post','area');
        $this->db->where('Approval',"1");
        if ($SearchBoxValue) {
        	$this->db->like('AreaName',$validkey['SearchBoxValue']);
        }
        if ($PriceFilteValue) {
        	$range = explode("-", $validkey['PriceFilteValue']);
        		
        		
        		$this->db->where('Rent <',$range[1]);
        		
        	
        }
        if ($RoomFilteValue) {
        	
        		$this->db->where('BedRoom >=',$validkey['RoomFilteValue']);
        	
        	
        	
        }
        if ($CategoryFilteValue) {
        	$this->db->like('Category',$validkey['CategoryFilteValue']);
        	
        }
        

        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}

	

	public function insertSearch($data)
	{
		$this->db->insert('searchhistory', $data); 
		
	}



	public function getSurroundingArea($key)
	{
		$this->db->select('SurroundingArea');
        $this->db->from('area');
        $this->db->where('AreaName',$key);
		$post= $this->db->get();
		return $post->row_array();
		
	}

	public function getSelectedColumnById($id)
	{
		$this->db->select('AreaName,Rent,BedRoom,Category');
        $this->db->from('post','area');
        $this->db->where('PostId',$id);

        $this->db->join('area', 'area.AreaId = post.Area');
		$post= $this->db->get();
		return $post->row_array();
		
	}


	public function getSuggetionListValidKey2($validkey,$id)
	{
		//filter detect funtionality
		$SearchBoxValue = false;
		$PriceFilteValue = false;
		$RoomFilteValue = false;
		$CategoryFilteValue = false;
		foreach ($validkey as $key => $value) {
			if($key=="SearchBoxValue")
			{
				$SearchBoxValue = true;
			}
			elseif ($key=="PriceFilteValue") {
				$PriceFilteValue = true;
			}
			elseif ($key=="RoomFilteValue") {
				$RoomFilteValue = true;
			}
			elseif ($key=="CategoryFilteValue") {
				$CategoryFilteValue = true;
			}
		}


		$this->db->select('*');
        $this->db->from('post','area');
        $this->db->where('Approval',"1");
        $this->db->where('postId !=', $id);
        if ($SearchBoxValue) {
        	$this->db->like('AreaName',$validkey['SearchBoxValue']);
        }
        if ($PriceFilteValue) {
        	$range = explode("-", $validkey['PriceFilteValue']);
        		
        		
        		$this->db->where('Rent <=',$range[1]);
        		
        	
        }
        if ($RoomFilteValue) {
        	
        		$this->db->where('BedRoom >=',$validkey['RoomFilteValue']);
        	
        	
        	
        }
        if ($CategoryFilteValue) {
        	$this->db->like('Category',$validkey['CategoryFilteValue']);
        	
        }
        

        $this->db->join('area', 'area.AreaId = post.Area');
        $this->db->order_by('postId',"desc");
		$post= $this->db->get();
		return $post->result_array();
		
	}

	


	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		

		$this->load->model('homemodel');

			$this->session->set_userdata('PriceFilteValue',"");
			$this->session->set_userdata('RoomFilteValue',"");
			$this->session->set_userdata('CategoryFilteValue',"");
	}

	public function index()
	{
		if($this->session->userdata('loggedin'))
		{
			$data['username'] = $this->session->userdata('UserFullName').")";
			$data['action'] = base_url()."home/logout";
			$data['label'] = "Logout(";
			$data['postad'] = base_url()."home/postad";
			$data['RegistrationLabel'] = "";
			//user based option
			
			if($this->session->userdata('UserStatus')== "admin"){
				$data['AccountOption'] = "Admin Panel";
				$data['accclass'] = "btn custombtn" ;
				$data['AccountOptionAction'] = base_url()."home/AdminPanel";
			}
			else
			{
				$data['AccountOption'] = "Your Account";
				$data['accclass'] = "btn custombtn" ;
			    $data['AccountOptionAction'] = base_url()."home/UserAccount";
			}
			
		}
		else
		{
			$data['username'] = "";
			$data['AccountOption'] = "";
			$data['accclass'] = "" ;
			$data['action'] = base_url()."home/login";
			$data['label'] = "Login";
			$data['RegistrationAction'] = base_url()."home/Registration";
			$data['RegistrationLabel'] = "Registration";
			$data['postad'] = base_url()."home/login";
			$data['regclass'] = "btn custombtn";
		}
		$data['base'] = base_url();
		$data['message'] = $this->session->userdata('Message');
		$this->session->set_userdata('Message', "");



		if($this->input->post('Search'))
		{



			//search result
			$searchKey = $this->input->post('SearchBox');
			$this->session->set_userdata('SearchBoxValue', $searchKey);
			if($searchKey==""){
				$data['message'] = "Search Field Empty";
				$data['SearchBoxValue'] = "";
			    $data['post'] = $this->homemodel->getpostList();
			}
			else
			{
				//search data insert
			
					$Sdata =  array(

					'Keyword' => $this->session->userdata('SearchBoxValue'),
					'PriceFilter' => $this->session->userdata('PriceFilteValue'),
					'RoomFilter' => $this->session->userdata('RoomFilteValue'),
					'CategoryFilter' => $this->session->userdata('CategoryFilteValue'),
					'SearchTime' => date("Y-m-d H:i:s"),
					'Ip' => $_SERVER['REMOTE_ADDR']


				 );

				$this->homemodel->insertSearch($Sdata);
				//
				$data['post'] = $this->homemodel->getpostListBySearch($searchKey);

			 $data['SearchBoxValue'] = $this->session->userdata('SearchBoxValue');
			if(empty($data['post']))
			{
				$data['message'] = "No Post Found";
			}
			

			}

			//Suggetion collect
			$Sarea = $this->homemodel->getSurroundingArea($searchKey);
			if (!empty($Sarea)) {
						$Sarea = explode(",", $Sarea['SurroundingArea']);
					// print_r($Sarea);
					// die();
					$SugestedPost = array();
					foreach ($Sarea as $value) {
						$temp = $this->homemodel->getpostListBySearch($value);
						
						foreach ($temp as $item) {
							array_push($SugestedPost, $item);
						}
					}
					$data['SuggetionTitle'] = "You may also Like";
					$data['SuggestedPost'] = $SugestedPost;
					
			}
			else
			{
				$data['SuggetionTitle'] = "";
				$data['SuggestedPost'] = array( );;

			}
			

			
			
			

		}
		elseif ($this->input->post('filterSubmit')) {
			//filter search
			$this->session->set_userdata('PriceFilteValue',$this->input->post('priceRange'));
			$this->session->set_userdata('RoomFilteValue',$this->input->post('RoomNumber'));
			$this->session->set_userdata('CategoryFilteValue',$this->input->post('Category'));
			$tempkey =  array(

				'SearchBoxValue' => $this->session->userdata('SearchBoxValue'),
				'PriceFilteValue' => $this->session->userdata('PriceFilteValue'),
				'RoomFilteValue' => $this->session->userdata('RoomFilteValue'),
				'CategoryFilteValue' => $this->session->userdata('CategoryFilteValue'),


			 );


				
			$validkey = array();

			foreach ($tempkey as $key => $item) {
				if($item != ""){
				$validkey[$key]=$item;
				}
				
			}
			$data['SearchBoxValue'] = $this->session->userdata('SearchBoxValue');
			
			$data['post'] = $this->homemodel->getpostListValidKey($validkey);
			if(empty($data['post']))
			{
				$data['message'] = "No Post Found";
			}

			//search data insert
				if ( !empty($validkey)) {
						$Sdata =  array(

						'Keyword' => $this->session->userdata('SearchBoxValue'),
						'PriceFilter' => $this->session->userdata('PriceFilteValue'),
						'RoomFilter' => $this->session->userdata('RoomFilteValue'),
						'CategoryFilter' => $this->session->userdata('CategoryFilteValue'),
						'SearchTime' => date("Y-m-d H:i:s"),
						'Ip' => $_SERVER['REMOTE_ADDR']


					 );

					$this->homemodel->insertSearch($Sdata);
				}


				//sugested post collect
				$Sarea = $this->homemodel->getSurroundingArea($this->session->userdata('SearchBoxValue'));
					if (!empty($Sarea)) {
								$Sarea = explode(",", $Sarea['SurroundingArea']);
							// print_r($Sarea);
							// die();
							$SugestedPost = array();
							foreach ($Sarea as $value) {
								$validkey['SearchBoxValue']= $value;
								$temp = $this->homemodel->getSuggetionListValidKey($validkey);
								
								foreach ($temp as $item) {
									array_push($SugestedPost, $item);
								}
							}
							$data['SuggetionTitle'] = "You may also Like";
							$data['SuggestedPost'] = $SugestedPost;
							if (empty($SugestedPost)) {
								$data['SuggetionTitle'] = "";
							}
							
					}
					else
					{
						$data['SuggetionTitle'] = "";
						$data['SuggestedPost'] = array( );;

					}
			
			

			
			}
		else
		{

			//withoutsearch rsult
			$data['SuggetionTitle'] = "";
						$data['SuggestedPost'] = array( );
			$this->session->set_userdata('SearchBoxValue',"");
			$data['SearchBoxValue'] = $this->session->userdata('SearchBoxValue');
			$data['post'] = $this->homemodel->getpostList();

		}
		
		
		$this->parser->parse('home_view', $data);
		// no php tag in view ,, 2nd parameter must
	}
	public function login()
	{
		redirect(base_url().'login', 'refresh');
	}
	public function logout()
	{
		
		$this->session->set_userdata('loggedin', false);
		redirect(base_url().'home', 'refresh');
	}
	public function Registration()
	{
		redirect(base_url().'Registration', 'refresh');
	}

	public function postad()
	{
		redirect(base_url().'post', 'refresh');
	}
	public function postDetail($id)
	{
		//coment on post
		if($this->input->post('CommentSubmit'))
		{
			
			if(!$this->session->userdata('loggedin'))
			{
				redirect(base_url().'login', 'refresh');
			}
			$newComment = array(
				   
				   'postId' => $id ,
				   'userId' => $this->session->userdata('UserId') ,
				   'Commnet' => $this->input->post('comment') 
				   
				   );
			if($this->input->post('comment')!="")
			{
				 $this->homemodel->postComment($newComment);
			}

		}
		//
		$data['commentList'] = $this->homemodel->getCommentListById($id);
		$data['base'] = base_url();
		$data['post'] = $this->homemodel->getpostListById($id);

		//suggetionpost
		$result = $this->homemodel->getSelectedColumnById($id);
		$validkey =  array(

				'SearchBoxValue' => $result['AreaName'],
				'PriceFilteValue' => "0-".$result['Rent'],
				'RoomFilteValue' => $result['BedRoom'],
				'CategoryFilteValue' => $result['Category'],


			 );

		$Sarea = $this->homemodel->getSurroundingArea($result['AreaName']);
					
								$Sarea = explode(",", $Sarea['SurroundingArea']);
							// print_r($Sarea);
							// die();
								$cat = explode(",", $result['Category']);
							$SugestedPost = array();
							foreach ($Sarea as $value) {
								$validkey['SearchBoxValue']= $value;
								
								foreach ($cat as $tempcat) {
									$validkey['CategoryFilteValue']= $tempcat;
									$temp = $this->homemodel->getSuggetionListValidKey2($validkey,$id);
									foreach ($temp as $item) {
									array_push($SugestedPost, $item);
									}
								}
								
							}
							//for current area
							$validkey['SearchBoxValue']= $result['AreaName'];
								$temp2 = $this->homemodel->getSuggetionListValidKey2($validkey,$id);
								
								foreach ($temp2 as $item) {
									array_push($SugestedPost, $item);
								}
							$data['SuggetionTitle'] = "You may also Like";
							$data['SuggestedPost'] = $SugestedPost;
							if (empty($SugestedPost)) {
								$data['SuggetionTitle'] = "";
							}
							
					
		//end
		$this->parser->parse('postDetail_view', $data);
	}


	public function AdminPanel()
	{
		redirect(base_url().'admin', 'refresh');
	}
	public function UserAccount()
	{
		redirect(base_url().'UserAccount', 'refresh');
	}
	public function getSearchResult()
	{
		$keyword = $this->input->get('term');
		$result = $this->homemodel->getAreaNames($keyword);
		echo json_encode($result);
		
	}

	



}

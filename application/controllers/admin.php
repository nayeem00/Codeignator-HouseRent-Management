<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin') || $this->session->userdata('UserStatus')=="user")
		{
			redirect(base_url().'login', 'refresh');
		}
		
		$this->load->model('AdminPanelmodel');
		
	}

	public function index()
	{
		$data['message'] = $this->session->userdata('Message');
		$this->session->set_userdata('Message', "");

		$data['Approvedpost'] = $this->AdminPanelmodel->getApprovedpostList();
		$data['Pendingpost'] = $this->AdminPanelmodel->getPendingpostList();
		$data['Area'] = $this->AdminPanelmodel->getAreaList();
		$data['Admin'] = $this->AdminPanelmodel->getAdminList();
		$data['User'] = $this->AdminPanelmodel->getUserList();

		
		$data['base'] = base_url();
		$this->parser->parse('AdminPnale_view',$data);
	}

	public function deletePost($id)
	{
		$this->AdminPanelmodel->deletePost($id);
		$this->session->set_userdata('Message', "Post Deleted");
		redirect(base_url()."admin","refresh");
	}
	public function approvePost($id)
	{
		$data = array(
               'Approval' => "1",
               'ApprovedDate' => date('Y-m-d H:i:s')
               
            );
		$this->AdminPanelmodel->approvePost($id,$data);
		$this->session->set_userdata('Message', "Post Approved");
		redirect(base_url()."admin","refresh");
	}
	public function deleteArea($id)
	{
		$this->AdminPanelmodel->deleteArea($id);
		$this->session->set_userdata('Message', "Area Deleted");
		redirect(base_url()."admin","refresh");
	}
	public function deleteUser($id)
	{
		$this->AdminPanelmodel->deleteUser($id);
		$this->session->set_userdata('Message', "User Deleted");
		redirect(base_url()."admin","refresh");
	}
	public function MakeAdmin($id)
	{
		$data = array(
               'UserStatus' => "admin"

               
            );
		$this->AdminPanelmodel->MakeAdmin($id,$data);
		$this->session->set_userdata('Message', "New Admin Added");
		redirect(base_url()."admin","refresh");
	}

	public function report()
	{

			 

			 	   foreach ($this->AdminPanelmodel->MaXArea() as $key => $value) {
			 	   	$data[$key] = $value; 
			 	   }
			 	   foreach ($this->AdminPanelmodel->MostActiveUser() as $key => $value) {
			 	   	$data[$key] = $value; 
			 	   }
			 	   foreach ($this->AdminPanelmodel->MostSearchKeyword() as $key => $value) {
			 	   	$data[$key] = $value; 
			 	   }
			 	   foreach ($this->AdminPanelmodel->MostSearchIp() as $key => $value) {
			 	   	$data[$key] = $value; 
			 	   }


		
		$data['base']=base_url();
		$this->parser->parse('Report_view',$data);
	}


		
}

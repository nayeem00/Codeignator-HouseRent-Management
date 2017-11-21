<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserAccount extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin') || $this->session->userdata('UserStatus')=="admin")
		{
			redirect(base_url().'login', 'refresh');
		}
		
		$this->load->model('UserAccountModel');
		
	}

	public function index()
	{
		$data['message'] = $this->session->userdata('Message');
		$this->session->set_userdata('Message', "");

		$data['ActivePost'] = $this->UserAccountModel->getActivePostList($this->session->userdata('UserId'));
		$data['InActivePost'] = $this->UserAccountModel->getInActivePostList($this->session->userdata('UserId'));
		

		
		$data['base'] = base_url();
		$this->parser->parse('UserAccount_view',$data);
	}

	public function deletePost($id)
	{
		$this->UserAccountModel->deletePost($id);
		$this->session->set_userdata('Message', "Post Deleted");
		redirect(base_url()."UserAccount","refresh");
	}
	public function ActivatePost($id)
	{
		$data = array(
               'HireStatus' => "0",
               'UpdatedDate' => date('Y-m-d H:i:s')
               
            );
		$this->UserAccountModel->ActivatePost($id,$data);
		$this->session->set_userdata('Message', "House Available");
		redirect(base_url()."UserAccount","refresh");
	}
	
	public function DisablePost($id)
	{

		$data = array(
               'HireStatus' => "1",
               'UpdatedDate' => date('Y-m-d H:i:s')
               
            );
		$this->UserAccountModel->DisablePost($id,$data);
		$this->session->set_userdata('Message', "House Hired");
		redirect(base_url()."UserAccount","refresh");
	}
		
}

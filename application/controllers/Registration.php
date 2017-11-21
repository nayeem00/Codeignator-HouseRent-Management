<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('loggedin'))
		{
			redirect(base_url().'home', 'refresh');
		}
		
		$this->load->model('registrationmodel');

		
	}

	public function index()
	{
		if(!$this->form_validation->run('registration'))
		{
			$data['base'] = base_url();
                $data['message']=validation_errors();
                $data['HomeAction'] = base_url()."home";
		 		$this->parser->parse('registration_view',$data);
		 		$data['base'] = base_url();
		 		return;
		}

			if($this->input->post('RegistrationBtn'))
			{
				if($this->registrationmodel->Usernamecheck($this->input->post('username')))
				{
					$data['message'] = "UserName Already Taken";
					$data['HomeAction'] = base_url()."home";
					$data['base'] = base_url();
				    $this->parser->parse('registration_view',$data);
				}
				else
				{
					$data = array(
				   
				   'UserName' => $this->input->post('username') ,
				   'Password' => $this->input->post('password') ,
				   'FullName' => $this->input->post('FullName') ,
				   'PhoneNo' => $this->input->post('PhoneNo') ,
				   'UserStatus' => 'user' ,

				);

				
				
				$this->registrationmodel->registeruser($data);

				
				$this->session->set_userdata('Message', "Registration Sucsessfull");
				redirect(base_url().'home', 'refresh');
					
				}
				

			}
			else
			{
				$data['message'] = "";
				$data['HomeAction'] = base_url()."home";
				$data['base'] = base_url();
				$this->parser->parse('registration_view',$data);
			}
			
	}
	public function validPhoneNo($PhoneNo)
			{
					$pattern = '/[0-9]{11}/';
					if(preg_match($pattern, $PhoneNo))
					{
						return true;
					}
					else
					{
						$this->form_validation->set_message('validPhoneNo', 'Invalid Phone number');
						return false;
					}
			}
}

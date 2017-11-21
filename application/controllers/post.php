<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedin'))
		{
			redirect(base_url().'login', 'refresh');
		}
		
		$this->load->model('postmodel');
		
	}

	public function index()
	{
		if(!$this->form_validation->run('post'))
		{
			
                 $data['message']=validation_errors();
                 $data['HomeAction'] = base_url()."home";
                 $data['area']=$this->postmodel->getarea();
                $data['base'] = base_url();
		  		$this->parser->parse('addpost_view',$data);
		  		return;
		 }

			if($this->input->post('postBtn'))
			{
				
				if (isset($_FILES['Image']['name']) && !empty($_FILES['Image']['name'])) {
				    
				    $pictureName = time().$_FILES['Image']['name'];
				    $pictureType = $_FILES['Image']['type'];
				    $pictureTempName = $_FILES['Image']['tmp_name'];
				    $pictureSize = $_FILES['Image']['size'];
				  
				    
				   
				    
			        move_uploaded_file($pictureTempName, "./Recources/Images/".$pictureName);
			        $fullfilepath = $pictureName;
				    
				 }



				else
				{
					$fullfilepath = "default.jpg";
				}

				if($this->input->post('Kitchen'))
				   {
				   		$kitchen = 1;
				   }
			   else
				   {
						$kitchen = 0;
			       }
			   if($this->input->post('Dining'))
				   {
				   		$Dining = 1;
				   }
			   else
				   {
				   		$Dining = 0;
				   }
			   if($this->input->post('Drawing'))
				   {
				   			$Drawing = 1;
				   }
			   else
				   {
				   		$Drawing = 0;
				   }

				 $catstr="";
				 $trim=0;
				foreach ($this->input->post('Category') as  $item) {
					if($trim==0){
                       $catstr .= $item;
                       $trim=1;
					}
					else
					{
						$catstr .= ",".$item;
					}
			 			
					 }

				   
				$data = array(
				   
				   'HouseName' => $this->input->post('HouseName') ,
				   'Address' => $this->input->post('address') ,
				   'PhoneNumber' => $this->input->post('PhoneNo') ,
				   'Floor' => $this->input->post('Floor') ,
				   'BedRoom' => $this->input->post('BedRoom') ,

				   'Kitchen' => $kitchen ,
				   'Dining' => $Dining ,
				   'Drawing' => $Drawing ,
				   'Additional' => $this->input->post('additional') ,
				   'Category' =>   $catstr,
				   'Approval' => '0' ,

				   'CreatedBy' => $this->session->userdata('UserId') ,
				   'Area' => $this->input->post('area') ,
				   'Rent' => $this->input->post('rent') ,
				   'RentStatus' => $this->input->post('rentStatus') ,
				   'Image' => $fullfilepath 

				);

				
				$this->load->model('postmodel');
				$this->postmodel->post($data);

				
				$this->session->set_userdata('Message', "Post Added Sucsessfully");
				redirect(base_url().'home', 'refresh');

			}
			else
			{
				
				$data['message'] = "";
				$data['HomeAction'] = base_url()."home";
				$data['area']=$this->postmodel->getarea();
                $data['base'] = base_url();
				$this->parser->parse('addpost_view',$data);
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

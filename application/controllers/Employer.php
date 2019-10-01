<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Employer extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
	}
	
	public function profile()	
	{
		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 3) 
		{			
			$data['districts'] = $this->Job_model->get_districts();
			$data['locations'] = $this->Job_model->get_cities();
			$data['industries'] = $this->Job_model->get_job_industries();

			$this->load->view('template/header');
			$this->load->view('employer/profile', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('/');
		}		
	}

	public function edit()
	{
		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 3) 
		{	
			$data['districts'] = $this->Job_model->get_districts();
			$data['locations'] = $this->Job_model->get_cities();
			$data['industries'] = $this->Job_model->get_job_industries();
			$user_id = $this->session->userdata('userid_mko789');
			$data['organization'] = $this->Employer_model->get_employer($user_id);
			

			$this->load->view('template/header');
			$this->load->view('employer/edit', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('/');
		}		
	}	

	private function mail($email, $password, $id, $code)
	{
		//set up email
			$config = array(
		  		'protocol' => 'smtp',
		  		'smtp_host' => 'ssl://smtp.googlemail.com',
		  		'smtp_port' => 465,
		  		'smtp_user' => 'jobs@victoryJobs.lk', 
		  		'smtp_pass' => 'Victory@123', 
		  		'mailtype' => 'html',
		  		'charset' => 'iso-8859-1',
		  		'wordwrap' => TRUE
			);

			$message = 	"
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Recruiter Account:</p>
							<p>Email: ".$email."</p>
							<p>Password: ".$password."</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."employer/activate/".$id."/".$code."'>Activate My Account</a></h4>
							<br>							
							<h5>Best Regards</h5>
							<p>victoryJobs-Team</p>							
						</body>
						</html>
						";

			$this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($config['smtp_user'], 'noreply@victoryJobs.com');
		    $this->email->to($email);
		    $this->email->subject('Signup Verification Email');
		    $this->email->message($message);

		    //sending email
		    if ($this->email->send())
		    	return true;
		    else
		    	return false;
	}

	public function create()
	{
		$output = array('error' => false);
		$this->form_validation->set_rules('org-name', 'Organization', 'required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('phone', 'Contact No', 'required|xss_clean|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules(
			'email', 'Email', 'trim|xss_clean|valid_email|required|is_unique[usr_user.user_email]',
			array('is_unique' => 'This %s already exists.')
		);
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[7]|max_length[30]');
		$this->form_validation->set_rules('confirm-password', 'Confirm Password', 'trim|xss_clean|required|min_length[7]|max_length[30]|matches[password]');	
		$this->form_validation->set_rules('logo', 'Logo', 'trim|xss_clean');
		    	
		
		if ($this->form_validation->run() == false) 
		{
			$output['error'] = true;
			$output['message'] = validation_errors();
		}
		else
		{
			//Check whether user attached the file
			$logo = '';
            if(!empty($_FILES['logo']['name']))
            {
            	$file_name = rand(0,1000).time();
                $config['upload_path'] = 'uploads/logo/';
                $config['upload_url']  = base_url().'uploads/logo/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;
                //$config['file_name'] = $_FILES['attachment']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('logo'))
                {
                    $uploadData = $this->upload->data();
                    $logo = $uploadData['file_name'];
                }
                else
                {
                	$output['error'] = true;
					$output['message'] = $this->upload->display_errors();                	
                }                
            }
            else
            {
                 $logo = '';
            }	
           
           if($output['error'] == false)
           {
	            $ref_id = md5(rand(0,10000).round(microtime(true)));
	            //generate simple random code
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$token = substr(str_shuffle($set), 0, 12);            
	            $user['ref_emp_id'] = $ref_id;
	            $user['org_name'] = $_POST['org-name'];
	            $user['username'] = $_POST['username'];
	            $user['org_telephone'] = $_POST['phone'];
				$user['email'] = $_POST['email'];
				$user['password'] = $_POST['password'];
				$user['user_access_token'] = $token;
				$user['org_logo'] = $logo;			

				$query_user = $this->Employer_model->create_employer($user);
				$status = $this->mail($_POST['email'], $_POST['password'], $ref_id, $token);

				if ($query_user) 
				{
					$output['message'] = 'Please Wait Untill sending Activation Code..';
					if ($status) 
					{
						$output['message'] = 'Activation code sent to email, Please verify email!';
					}
					else
					{
						$output['error'] = true;
						$output['message'] = 'something went wrong!';
					}
				}			
				else
				{
					$output['error'] = true;
					$output['message'] = 'Registration Failed!';
				}
			}
		}
		echo json_encode($output);	
	}

	public function activate()
	{
		$id = $this->uri->segment(3);
		$code = $this->uri->segment(4);		

		//fetch user details
		$user = $this->Employer_model->get_user($id);

		//if code matches
		if($user['user_access_token'] == $code)
		{
			//update user active status
			$data['user_is_verified'] = 1;
			$data['is_active'] = 1;
			$data['is_finish'] = 1;
			$query = $this->Employer_model->activate($data, $id);

			if($query)
			{
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else
			{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect('user/signin');
	}

	public function complete()
	{
		if ($this->session->userdata('userid_mko789') !== NULL && $this->session->userdata('userid_mko789') != "")
			$user_id = $this->session->userdata('userid_mko789');
		else
			redirect('/');
		

		$output = array('error' => false);
		$this->form_validation->set_rules('org-industry', 'Organization Industry', 'xss_clean|required');
		$this->form_validation->set_rules('preferDistrict', 'District', 'xss_clean|required');
		$this->form_validation->set_rules('preferLocation', 'Location', 'xss_clean|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean|required');
		$this->form_validation->set_rules('contact-person', 'Contact Person', 'trim|xss_clean|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'xss_clean|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('office-email', 'Email', 'trim|xss_clean|valid_email');
		$this->form_validation->set_rules('no-of-vacancy', 'No Of Vacancies', 'trim|xss_clean');
		$this->form_validation->set_rules('input-file-preview', 'Logo Upload', 'trim|xss_clean');

		if ($this->form_validation->run() == false) 
		{
			$output['error'] = true;
			$output['message'] = validation_errors();
		}
		else
		{
			$logo = "";
			if (!empty($_FILES['input-file-preview']['name'])) 
			{			
				$file_name = rand(0,1000).time();
                $config['upload_path'] = 'uploads/logo/';
                $config['upload_url']  = base_url().'uploads/logo/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;                
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('input-file-preview'))
                {
                    $uploadData = $this->upload->data();
                    $logo = $uploadData['file_name'];
                }
                else
                {
                	$output['error'] = true;
					$output['message'] = $this->upload->display_errors();                	
                }         
			}
			else
			{
				$logo = "";
			}  

			if ($output['error'] == false) 
			{		          
	            $user['ref_org_id'] = $user_id;	
	            $user['org_ind_id'] = $_POST['org-industry'];
	            $user['org_district_id'] = $_POST['preferDistrict'];		
	            $user['org_city_id'] = $_POST['preferLocation'];	
	            $user['org_address'] = $_POST['address'];	
	            $user['org_mobile'] = $_POST['mobile'];
	            $user['contact_email'] = $_POST['office-email'];	
	            $user['org_contact_person'] = $_POST['contact-person'];	
	            $user['no_of_vacancies'] = $_POST['no-of-vacancy'];
	            $user['org_logo'] = $logo;         

	            $query_user = $this->Employer_model->complete_user($user);

	            if ($query_user) 
				{
					$output['message'] = 'Profile Details Updated successfully';				
				}			
				else
				{
					$output['error'] = true;
					$output['message'] = 'Something Went Wrong!Try Agian';
				}
			}
		}
		echo json_encode($output);	
		
	}

}

 ?>
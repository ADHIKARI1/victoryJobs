<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Candidate extends CI_Controller
{	
	function __construct(){
		parent::__construct();
	}

	public function profile()	
	{
		if ($this->session->userdata('userid_mko789') !== NULL && $this->session->userdata('userid_mko789') != "" && $this->session->userdata('idtype_mko789') == 2)
			$cand_id = $this->session->userdata('userid_mko789');
		else
			redirect('/');

		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 2) 
		{
			$data['qualifications'] = $this->Candidate_model->get_hqualifications();
			$data['job_categories'] = $this->Candidate_model->get_job_category();
			$data['job_designations'] = $this->Candidate_model->get_job_designations();
			$data['districts'] = $this->Candidate_model->get_districts();
			$data['locations'] = $this->Candidate_model->get_cities();
			$data['candidate'] = $this->Candidate_model->get_candidate($cand_id);

			$this->load->view('template/header');
			$this->load->view('candidate/cand-profile-nav');
			$this->load->view('candidate/profile', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('/');
		}		
	}


	public function register(){
		
		$this->load->view('template/header');
		$this->load->view('candidate/register');
		$this->load->view('template/footer');
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

			$message = 	"<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your victory jobs Account:</p>
							<p>Email: ".$email."</p>
							<p>Password: ".$password."</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."candidate/activate/".$id."/".$code."'>Activate My Account</a></h4>
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

	public function activate()
	{
		$id = $this->uri->segment(3);
		$code = $this->uri->segment(4);		

		//fetch user details
		$user = $this->Candidate_model->get_user($id);

		//if code matches
		if($user['user_access_token'] == $code)
		{
			//update user active status
			$data['user_is_verified'] = 1;
			$data['is_active'] = 1;
			$data['is_finish'] = 1;
			$query = $this->Candidate_model->activate($data, $id);

			if($query)
			{
				$this->session->set_flashdata('message', 'User activated successfully! Please Login');
			}
			else
			{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Can"t activate account. Verification code not matched');
		}

		redirect('user/signin');
	}

	public function complete()
	{
		if ($this->session->userdata('userid_mko789')!== NULL && $this->session->userdata('userid_mko789')!= "")
			$user_id = $this->session->userdata('userid_mko789');
		else
			redirect('/');
		

		$output = array('error' => false);
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|regex_match[/^[0-9]{10}$/]');	
		$this->form_validation->set_rules('mobile', 'Mobile', 'xss_clean|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('description', 'Descrition', 'trim|xss_clean');	
		$this->form_validation->set_rules('input-file-preview', 'Image Upload', 'trim|xss_clean');

		if ($this->form_validation->run() == false) 
		{
			$output['error'] = true;
			$output['message'] = validation_errors();
		}
		else
		{
			$image = "";
			if (!empty($_FILES['input-file-preview']['name'])) 
			{			
				$file_name = rand(0,1000).time();
                $config['upload_path'] = 'uploads/image/';
                $config['upload_url']  = base_url().'uploads/image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;
                //$config['file_name'] = $_FILES['attachment']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('input-file-preview'))
                {
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }
                else
                {
                	$output['error'] = true;
					$output['message'] = $this->upload->display_errors();                	
                }         
			}
			else
			{
				$image = "";
			}  

			if ($output['error'] == false) 
			{		          
	            $user['ref_emp_id'] = $user_id;	
	            $user['user_fname'] = $_POST['firstName'];	
	            $user['user_lname'] = $_POST['lastName'];		
	            $user['user_contact_no1'] = $_POST['telephone'];	
	            $user['user_contact_no2'] = $_POST['mobile'];	
	            $user['user_address'] = $_POST['address'];
	            $user['user_gender'] = $_POST['gender'];	
	            $user['user_dob'] = $_POST['dob'];	
	            $user['user_experience_years'] = $_POST['experience'];
	            $user['user_highest_qualification'] = $_POST['CandidateHQ'];
	            $user['job_category'] = $_POST['CanJobCat'];	
	            $user['user_preference1'] = $_POST['CanPreference1'];
	            $user['user_preference2'] = $_POST['CanPreference2'];
	            $user['user_preference3'] = $_POST['CanPreference3'];
	            $user['user_cur_occupation'] = $_POST['curOccupation'];	
	            $user['user_cur_org'] = $_POST['curOrganization'];	
	            $user['user_prefer_loc'] = $_POST['preferLocation'];	
	            $user['user_description'] = $_POST['description'];	
	            $user['image_name'] = $image;

	            $query_user = $this->Candidate_model->complete_user($user);

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

	public function create()
	{
		 /*print_r($_POST);
		 print_r($_FILES);
         die();	*/
		$output = array('error' => false);
		$this->form_validation->set_rules('fullname', 'Full Name', 'required|xss_clean');
		$this->form_validation->set_rules(
			'email', 'Email', 'trim|xss_clean|valid_email|required|is_unique[usr_user.user_email]',
			array('is_unique' => 'This %s already exists.')
		);
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[7]|max_length[30]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|xss_clean|required|min_length[7]|max_length[30]|matches[password]');	
		if (empty($_FILES['attachment']['name']))
		{
		    $this->form_validation->set_rules(
		    	'attachment', 'Document', 'required|trim|xss_clean',
		    	array('required' => 'This attachment is required.')
		    	);
		}	
		
		if ($this->form_validation->run() == false) 
		{
			$output['error'] = true;
			$output['message'] = validation_errors();
		}
		else
		{
			//Check whether user attached the file
			$attachment = '';
            if(!empty($_FILES['attachment']['name']))
            {
            	$file_name = rand(0,1000).time();
                $config['upload_path'] = 'uploads/cv/';
                $config['upload_url']  = base_url().'uploads/cv/';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['file_name'] = $file_name;
                //$config['file_name'] = $_FILES['attachment']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('attachment'))
                {
                    $uploadData = $this->upload->data();
                    $attachment = $uploadData['file_name'];
                }
                else
                {
                	$output['error'] = true;
					$output['message'] = $this->upload->display_errors();                	
                }                
            }
            else
            {
                 $attachment = '';
            }	
           
           if($output['error'] == false)
           {
	            $ref_id = md5(rand(0,10000).round(microtime(true)));
	            //generate simple random code
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$token = substr(str_shuffle($set), 0, 12);            
	            $user['ref_emp_id'] = $ref_id;
	            $user['fullname'] = $_POST['fullname'];
				$user['email'] = $_POST['email'];
				$user['password'] = $_POST['password'];
				$user['user_access_token'] = $token;
				$user['cv'] = $attachment;			

				$query_user = $this->Candidate_model->create_user($user);
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

	
}



 ?>
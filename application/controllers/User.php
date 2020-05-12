<?php 

/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Mailnow');
	}

	public function index()
	{
		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 2)
		{
			redirect('candidate/profile');
		}
		else if($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 3)
		{
			$org_id = $this->session->userdata('userid_mko789');
			$status = $this->Employer_model->get_status($org_id);
			if ($status) 
				redirect('employer/edit');
			else
				redirect('employer/profile');			
		}
		else if($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 1)
		{
			redirect('admin/dashboard');
		}
		else
		{
			redirect('candidate/register');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function forgetpassword()	
	{		
		$this->load->view('template/header');
		$this->load->view('user/forget');
		$this->load->view('template/footer');
	}


	public function signin()	
	{		
		$this->load->view('template/header');
		$this->load->view('user/login');
		$this->load->view('template/footer');
	}

	public function login()
	{
		$output = array('error' => false);
		$this->form_validation->set_rules('lemail', 'E-Mail', 'required|trim|xss_clean|valid_email');
		$this->form_validation->set_rules('lpassword', 'Password', 'required|trim|xss_clean');
		if ($this->form_validation->run() == false) {
			$output['error'] = true;
			$output['lmessage'] = validation_errors();
		}
		else
		{
			$email = $_POST['lemail'];
			$password = $_POST['lpassword'];

			$ref_id = $this->User_model->login($email, $password);
			//echo $ref_id;
			//die();
			if ($ref_id) 
			{		
				$this->set_usersdata($ref_id);
				$output['lmessage'] = 'Logging in. Please wait...';	
				//$output['redirect_url'] = base_url() + "candidate/profile";			
			}
			else
			{				
				$output['error'] = true;
				$output['lmessage'] = 'Login Invalid. User not found';
			}
		}
		echo json_encode($output);	
	}

	private function set_usersdata($ref_id)
	{
		$type = $this->User_model->get_user_type($ref_id);
		$user_data = array(
			'userid_mko789' => $ref_id,
			'islogged_mko789' => true,
			'idtype_mko789' => $type
		);
		$this->session->set_userdata($user_data);
		return true;
	}

	public function forget()
	{
		$output = array('error' => false);
		try 
		{
			$this->form_validation->set_rules('lemail', 'E-Mail', 'trim|required|valid_email');		
			if ($this->form_validation->run() == false) 
			{
				$output['error'] = true;
				$output['lmessage'] = validation_errors();
			}
			else
			{
				$email = $_POST['lemail'];
				$data = $this->User_model->user_data($email);
				if ($data != null && $data != "") 
				{
					$ref_id = $data['ref_emp_id'];
					date_default_timezone_set("Asia/Colombo");
					$datetime1 = new DateTime('now');
					$string_to_encrypt = $datetime1->format('Y-m-d H:i:s');
					$password="Victory@123";
					$encrypted_string = openssl_encrypt($string_to_encrypt,"AES-128-ECB",$password);
					$encrypted_string = str_replace('/', '+fsl+', $encrypted_string);
					$status = $this->mail_reset($email,  $ref_id, $encrypted_string);

					$output['lmessage'] = 'Please Wait Untill sending password reset email..';
					if ($status) 
					{
						$output['lmessage']= 'Reset link sent to email, Please check email!';
					}
					else
					{
						$output['error'] = true;
						$output['lmessage'] = 'something went wrong!';
					}
				}
				else
				{
					$output['error'] = true;
					$output['lmessage'] = 'Sending Failed! E-Mail Can"t find';
				}				
				/*print_r($token['user_access_token']);
				die();*/
			}
			echo json_encode($output);
			
		} 
		catch (Exception $e) 
		{
			$output['error'] = true;
			$output['lmessage'] = 'something went wrong!';
			echo json_encode($output);
		}
	}

	private function mail_reset($email, $id, $code)
	{
		try {			

			$message = 	"<html>
						<head>
							<title>Reset Password</title>
						</head>
						<body>
							<h2>You have requested to reset your password</h2>						
							<p>Please click the link below to reset within 24 hours.</p>
							<h4><a href='".base_url()."user/resetPassword/".$id."/".$code."'>Reset My Password</a></h4>
							<br>							
							<h5>Best Regards</h5>
							<p>victoryJobs-Team</p>							
						</body>
						</html>
						";
			return $this->mailnow->send($email, 'Reset Password Email', $message);
			
		} catch (Exception $e) {
			return false;
		}
	}

	public function resetPassword()
	{
		$ref_id = $this->uri->segment(3);
		$code = $this->uri->segment(4);

		date_default_timezone_set("Asia/Colombo");
		$datetime1 = new DateTime('now');

		$password="Victory@123";
		$datetime_string = str_replace('+fsl+', '/', $code);
		$datetime_string = openssl_decrypt($datetime_string,"AES-128-ECB",$password);		
		$datetime2 = new DateTime($datetime_string); 	
		//$datetime2 = date_create_from_format('Y-m-d H:i:s',  $datetime_string); 		

		$interval = $datetime1->diff($datetime2);
		$hours = $interval->h + ($interval->days*24);
		if (($ref_id != "" && $ref_id != null) && ($datetime_string != "" && $datetime_string != null))
		{ 
			$log = $this->User_model->get_changelog($ref_id, $code);			
			if($log == null || $log == "")
			{
				if ($hours <= 24) 
				{
					$data['ref_id'] = $ref_id;
					$data['code'] = $code;

					$this->load->view('template/header');
					$this->load->view('user/reset', $data);
					$this->load->view('template/footer');
				}
				else
				{
					$this->session->set_flashdata('message', 'The link is already used or expired.');
					redirect('user/signin');
				}				
			}
			else
			{
				$this->session->set_flashdata('message', 'The link is already used or expired!');
				redirect('user/signin');
			}

			
		}
		else
		{
			$this->session->set_flashdata('message', 'Something went wrong!.');
			redirect('user/signin');
		}

		/*echo $ref_id;
		echo "<br>";		
		echo $datetime1->format('Y-m-d H:i:s');
		echo "<br>";
		echo $code;
		echo "<br>";
		echo $datetime_string;
		echo "<br>";
		echo $datetime2->format('Y-m-d H:i:s');
		echo "<br>";
		echo $hours;
		die();*/

	}

	public function reset()
	{

		$output = array('error' => false);
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[7]|max_length[30]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|xss_clean|required|min_length[7]|max_length[30]|matches[password]');
		if ($this->form_validation->run() == false) 
		{
			$output['error'] = true;
			$output['lmessage'] = validation_errors();
		}
		else
		{
			$options = ['cost' => 12];
			$enc_password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
			$password = $enc_password;
			$ref_id = $_POST['ref_emp_id'];
			$code = $_POST['code'];
			$data = $this->User_model->get_user($ref_id);
			if (($data != "" && $data != null) && $code != "")
			{
				$user['ref_emp_id'] = $ref_id;
				$user['user_password'] = $password;				
				$log = $this->User_model->add_changelog($ref_id, $password,  $code);
				if ($log) 
				{
					$query = $this->User_model->update_password($user);
					if($query)
					{

						$output['lmessage']= 'Password has been changed successfully!';
						$this->set_usersdata($ref_id);
					}
					else
					{					
						$output['error'] = true;
						$output['lmessage'] = 'Something went wrong..!';
					}
					
				}
				else
				{					
					$output['error'] = true;
					$output['lmessage'] = 'Something went wrong..!';
				}
			}
			else
			{
				$output['error'] = true;
				$output['lmessage'] = 'USER ERROR! Something went wrong..';
			}
		}
		echo json_encode($output);	
	}


}


 ?>
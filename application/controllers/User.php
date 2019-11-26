<?php 

/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
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

	public function signin()	
	{		
		$this->load->view('template/header');
		$this->load->view('user/login');
		$this->load->view('template/footer');
	}

	public function login()
	{
		$output = array('error' => false);
		$this->form_validation->set_rules('lemail', 'E-Mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('lpassword', 'Password', 'trim|required|min_length[7]');
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
				$type = $this->User_model->get_user_type($ref_id);
				$user_data = array(
					'userid_mko789' => $ref_id,
					'islogged_mko789' => true,
					'idtype_mko789' => $type
				);
				$this->session->set_userdata($user_data);
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


}


 ?>
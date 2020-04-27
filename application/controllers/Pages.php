<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pages extends CI_Controller
{
	
	public function view($page = 'search')
	{
		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')){
			show_404();
		}		
		
		if ($page == 'search') {
			$data['jobs'] = $this->Job_model->get_posts_home();
			//$data['categories'] = $this->Job_model->get_job_category();
			$data['categories'] = $this->Job_model->job_count_category();

			$this->load->view('template/header');
			$this->load->view('pages/' .$page);
			$this->load->view('pages/jobs', $data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header');
			$this->load->view('pages/' .$page);			
			$this->load->view('template/footer');
		}		
		
	}

	public function contact()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');		
		$this->form_validation->set_rules('phone', 'Contact No', 'required|xss_clean|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email|required');
		$this->form_validation->set_rules('message', 'Message', 'required|xss_clean');

		if ($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message', validation_errors());
            redirect('contact');
		}
		else
		{
			$name = $_POST['name'];	
	        $email = $_POST['email'];
	        $phone = $_POST['phone'];
	        $subject = $_POST['subject'];
	        $message = $_POST['message'];
			if($this->contactus_email($name, $email, $phone, $subject, $message))
			{
				$this->session->set_flashdata('message', 'your message successfully sent!');
            	redirect('contact');
			}
			else
			{
				$this->session->set_flashdata('message', 'Something went wrong!');
            	redirect('contact');
			}
		}		
	}

	private function contactus_email($name, $email, $phone, $subject, $message)
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
							<title>Contact Us - Email</title>
						</head>
						<body>
							<h2>Someone contacted you As subjected :  ".$subject."</h2>	
							<p>Name: ".$name."</p>						
							<p>Email: ".$email."</p>
							<p>Phone: ".$phone."</p>	
							<p>Message: ".$message."</p>												
							<br>							
							<h5>Best Regards</h5>
							<p>victoryJobs-Team</p>							
						</body>
						</html>
						";

			$this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($config['smtp_user'], 'noreply@victoryJobs.com');
		    $this->email->to($config['smtp_user']);
		    $this->email->subject('Contacted  From victoryJobs');
		    $this->email->message($message);

		    //sending email
		    if ($this->email->send())
		    	return true;
		    else
		    	return false;
	}

	public function team($i)
	{
		if ($i == '1') {
		$this->load->view('template/header');
		$this->load->view('team/warren');
		$this->load->view('template/footer');
		}
		if ($i == '2') {
		$this->load->view('template/header');
		$this->load->view('team/shalika');
		$this->load->view('template/footer');
		}
		if ($i == '3') {
		$this->load->view('template/header');
		$this->load->view('team/shani');
		$this->load->view('template/footer');
		}
		if ($i == '4') {
		$this->load->view('template/header');
		$this->load->view('team/tharanga');
		$this->load->view('template/footer');
		}
		if ($i == '5') {
		$this->load->view('template/header');
		$this->load->view('team/prasanna');
		$this->load->view('template/footer');
		}
		if ($i == '6') {
		$this->load->view('template/header');
		$this->load->view('team/kevin');
		$this->load->view('template/footer');
		}
		if ($i == '7') {
		$this->load->view('template/header');
		$this->load->view('team/saman');
		$this->load->view('template/footer');
		}
		if ($i == '8') {
		$this->load->view('template/header');
		$this->load->view('team/aruna');
		$this->load->view('template/footer');
		}
		if ($i == '9') {
		$this->load->view('template/header');
		$this->load->view('team/thisal');
		$this->load->view('template/footer');
		}

	}

}




?>
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Job extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		/*$config = array();
		$limit_page = 4;
        $config["base_url"] = base_url() . "job/index";
        $config["total_rows"] = $this->Job_model->get_count();
        $config["per_page"] = $limit_page;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['jobs'] = $this->Job_model->get_jobs($limit_page, $page * $limit_page);
        $data['categories'] = $this->Job_model->get_job_category();

        $this->load->view('template/header');        
        $this->load->view('job/index', $data);
        $this->load->view('template/footer');*/

        //set params
		$params = array();
		//set records per page
        $limit_pages = 5;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        $total = $this->Job_model->get_count();

        if ($total > 0) 
        {
            // get current page records
            $params['jobs'] = $this->Job_model->get_jobs($limit_pages, $page);
            $params['categories'] = $this->Job_model->get_job_category();
             
            $config['base_url'] = base_url() . 'job/index';
            $config['total_rows'] = $total;
            $config['per_page'] = $limit_pages;
            $config['uri_segment'] = 3;

            //paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            
            //bootstrap pagination 
            $config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';	
			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last &raquo';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '<li>';
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params['links'] = $this->pagination->create_links();
        }
         
        $this->load->view('template/header');        
        $this->load->view('job/index',  $params);
        $this->load->view('template/footer');
	}

	public function search()
	{
		$data['jobs'] = $this->Job_model->get_search();
		$data['categories'] = $this->Job_model->job_count_category();

		$this->load->view('template/header');
		$this->load->view('pages/search');
        $this->load->view('job/index', $data);
        $this->load->view('template/footer');
	}

	public function viewjob($id)
	{			
		$data['details'] = $this->Job_model->get_post_by_id($id);
		if($this->session->userdata('userid_mko789') !== null && $this->session->userdata('userid_mko789') != "")
		{
			$user = $this->session->userdata('userid_mko789');			
			$data['user'] = $this->Candidate_model->get_user_basic_detail($user);
		}
		$this->load->view('template/header');
		$this->load->view('job/viewjob', $data);
		$this->load->view('template/footer');					
	}

	public function postjob()
	{
		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 3) 
		{
			$data['industries'] = $this->Job_model->get_job_industries();
			$data['job_types'] = $this->Job_model->get_job_types();
			$data['qualifications'] = $this->Job_model->get_hqualifications();
			$data['job_categories'] = $this->Job_model->get_job_category();
			$data['job_designations'] = $this->Job_model->get_job_designations();
			$data['districts'] = $this->Job_model->get_districts();
			$data['locations'] = $this->Job_model->get_cities();

			$this->load->view('template/header');
			$this->load->view('job/postjob', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('/');
		}		
	}

	private function mail($post_id, $title, $org_email)
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
							<title>Alert</title>
						</head>
						<body>
							<h2>Hi,</h2>						
							<p>There is a new candidate for job post REF to #".$post_id." and the positin of ".$title." .</p>							
							<br>							
							<h5>Best Regards</h5>
							<p>victoryJobs-Team</p>							
						</body>
						</html>
						";

			$this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($config['smtp_user'], 'noreply@victoryJobs.com');
		    $this->email->to($org_email);
		    $this->email->subject('victoryJobs - Notification');
		    $this->email->message($message);

		    //sending email
		    if ($this->email->send())
		    	return true;
		    else
		    	return false;
	}

	public function applyjob()
	{		
		$output = array('error' => false);
		$this->form_validation->set_rules('app-name', 'Apply Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('input-file-preview', 'Upload CV', 'trim|xss_clean');
		$this->form_validation->set_rules('cover', 'Cover Latter', 'trim|xss_clean');
		
		
		if ($this->form_validation->run() == false) 
		{
			$output['error'] = true;
			$output['message'] = validation_errors();
		}
		else
		{
			
			$cv = '';			
            if(!empty($_FILES['input-file-preview']['name']))
            {
            	$file_name = rand(0,1000).time();
                $config['upload_path'] = 'uploads/sent/';
                $config['upload_url']  = base_url().'uploads/sent/';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['file_name'] = $file_name;                
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('input-file-preview'))
                {
                    $uploadData = $this->upload->data();
                    $cv = $uploadData['file_name'];
                }
                else
                {
                	$output['error'] = true;
					$output['message'] = $this->upload->display_errors();                	
                }                
            }
            else
            {
                 $cv = '';
            }
            	
           
           if($output['error'] == false )
           {
	                   
	            $job['ref_post_id'] = $_POST['post-id'];
	            $job['ref_emp_id'] = $_POST['org-id'];
	            $job['org_email'] = $_POST['org-email'];
	            $job['apply_name'] = $_POST['app-name'];
	            $job['applied_user'] = $_POST['app-user'];
				$job['applied_cv'] = $cv == '' ? $_POST['cv-uploaded'] : $cv;
				$job['applied_email'] = $_POST['app-email'];
				$job['cover_letter'] = $_POST['cover'];
				
					
				$status = $this->mail($_POST['post-id'], $_POST['post-title'], $_POST['org-email']);			
				if($status)
				{
					$query = $this->Job_model->apply($job);
					if ($query) 
					{

						$output['message'] = 'Successfully Applied for the job..';					
					}			
					else
					{
						$output['error'] = true;
						$output['message'] = 'Application Process Failed, Something went Wrong!';
					}
				}
				else
				{
					$output['error'] = true;
					$output['message'] = 'Something went wrong! Please try again..';
				}
			}
		}
		echo json_encode($output);
	}

	public function create()
	{
		if ($this->session->userdata('userid_mko789') !== NULL && $this->session->userdata('userid_mko789') != "")
			$user_id = $this->session->userdata('userid_mko789');
		else
			redirect('/');

		$output = array('error' => false);
		$this->form_validation->set_rules('job-title', 'job-title', 'required|xss_clean|min_length[7]');
		$this->form_validation->set_rules('job-type', 'job-type', 'required|xss_clean');
		$this->form_validation->set_rules('industry', 'Industry', 'required|xss_clean');
		$this->form_validation->set_rules('no-of-vacancy', 'No Of Vacancies', 'required|xss_clean');
		$this->form_validation->set_rules('ex-date', 'Post Expire Date', 'required|xss_clean');
		$this->form_validation->set_rules('input-file-preview', 'Advertisement Image', 'trim|xss_clean');
		$this->form_validation->set_rules('paymentSlip', 'Payment Proof Attachment', 'trim|xss_clean|');
		$this->form_validation->set_rules('overview', 'Job Overview', 'required|trim|xss_clean|min_length[7]');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');	   	
		
		if ($this->form_validation->run() == false) 
		{
			$output['error'] = true;
			$output['message'] = validation_errors();
		}
		else
		{
			
			$add = '';
			$payment = '';
            if(!empty($_FILES['input-file-preview']['name']))
            {
            	$file_name = rand(0,1000).time();
                $config['upload_path'] = 'uploads/advertisement/';
                $config['upload_url']  = base_url().'uploads/advertisement/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;                
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('input-file-preview'))
                {
                    $uploadData = $this->upload->data();
                    $add = $uploadData['file_name'];
                }
                else
                {
                	$output['error'] = true;
					$output['message'] = $this->upload->display_errors();                	
                }                
            }
            else
            {
                 $add = '';
            }	

            if($output['error'] == false && !empty($_FILES['paymentSlip']['name']))
            {
            	$file_name = rand(0,1000).time();
                $config['upload_path'] = 'uploads/payment/';
                $config['upload_url']  = base_url().'uploads/payment/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;                
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('paymentSlip'))
                {
                    $uploadData = $this->upload->data();
                    $payment = $uploadData['file_name'];
                }
                else
                {
                	$output['error'] = true;
					$output['message'] = $this->upload->display_errors();                	
                }                
            }
            else
            {
                 $payment = '';
            }	
           
           if($output['error'] == false )
           {
	                   
	            $job['ref_emp_id'] = $user_id;
	            $job['post_title'] = $_POST['job-title'];
	            $job['post_type'] = $_POST['job-type'];
	            $job['post_district_id'] = $_POST['district'];
				$job['post_city_id'] = $_POST['location'];
				$job['post_industry'] = $_POST['industry'];
				$job['post_category'] = $_POST['category'];
				$job['post_overview'] = $_POST['overview'];
				$job['post_description'] = $_POST['description'];
				$job['no_of_vacancies'] = $_POST['no-of-vacancy'];
				$job['is_image'] = isset($_POST['is-image']) ? $_POST['is-image'] : 0;
				$job['post_expire_date'] = $_POST['ex-date'];
				$job['post_image'] = $add;
				$job['payment_image'] = $payment;
				$job['post_salary'] = $_POST['salary'];				
				$job['is_intern'] = isset($_POST['intern']) ? $_POST['intern'] : 0;	
				$query_post = $this->Job_model->create_post($job);				

				if ($query_post) 
				{
					$output['message'] = 'Job Post Created Successfully..';					
				}			
				else
				{
					$output['error'] = true;
					$output['message'] = 'Job Post Saving Failed, Something went Wrong!';
				}
			}
		}
		echo json_encode($output);	
	}



}

 ?>
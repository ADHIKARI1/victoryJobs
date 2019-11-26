<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*
*
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function dashboard()
	{
		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 1) 
			$org_id = $this->session->userdata('userid_mko789');
		else
			redirect('/');

		$data['employers'] = $this->Admin_model->get_employers();

		$this->load->view('template/header');
		$this->load->view('admin/admin-dashboard-nav');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function create_employer()
	{
		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 1) 
			$org_id = $this->session->userdata('userid_mko789');
		else
			redirect('/');

		$data['districts'] = $this->Job_model->get_districts();
		$data['locations'] = $this->Job_model->get_cities();
		$data['industries'] = $this->Job_model->get_job_industries();
		$data['organization'] = $this->Employer_model->get_employer($org_id);
		$data['status'] = $this->Employer_model->get_status($org_id);

		$this->load->view('template/header');
		$this->load->view('admin/admin-dashboard-nav');
		$this->load->view('admin/create-employer', $data);
		$this->load->view('template/footer');
	}

	public function edit_employer()
	{
		if (!$this->session->userdata('islogged_mko789') && !$this->session->userdata('idtype_mko789') == 1) 			
			redirect('/');

		$data['districts'] = $this->Job_model->get_districts();
		$data['locations'] = $this->Job_model->get_cities();
		$data['industries'] = $this->Job_model->get_job_industries();	
		

		$this->load->view('template/header');
		$this->load->view('admin/admin-dashboard-nav');
		$this->load->view('admin/edit-employer', $data);
		$this->load->view('template/footer');
	}

	public function create_post()
	{
		if (!$this->session->userdata('islogged_mko789') && !$this->session->userdata('idtype_mko789') == 1) 
			redirect('/');	

		$data['industries'] = $this->Job_model->get_job_industries();
		$data['job_types'] = $this->Job_model->get_job_types();
		$data['qualifications'] = $this->Job_model->get_hqualifications();
		$data['job_categories'] = $this->Job_model->get_job_category();
		$data['job_designations'] = $this->Job_model->get_job_designations();
		$data['districts'] = $this->Job_model->get_districts();
		$data['locations'] = $this->Job_model->get_cities();		

		$this->load->view('template/header');
		$this->load->view('admin/admin-dashboard-nav');
		$this->load->view('admin/post-for-exist-org', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		if (!$this->session->userdata('islogged_mko789') && !$this->session->userdata('idtype_mko789') == 1) 
			redirect('/');		
		

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

	            $user['ref_org_id'] = $ref_id;	
	            $user['org_ind_id'] = $_POST['org-industry'];
	            $user['org_district_id'] = $_POST['preferDistrict'];		
	            $user['org_city_id'] = $_POST['preferLocation'];	
	            $user['org_address'] = $_POST['address'];	
	            $user['org_mobile'] = $_POST['mobile'];
	            $user['contact_email'] = $_POST['office-email'];	
	            $user['org_contact_person'] = $_POST['contact-person'];	
	            $user['no_of_vacancies'] = $_POST['no-of-vacancy'];
	            $user['org_logo'] = $logo;         

	            $query_user = $this->Admin_model->create($user);

	            if ($query_user) 
				{
					$output['message'] = 'Profile Details Created successfully';				
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


	public function getEmployer()
	{
		$id = $_POST['org-id'];
		if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 1) 
		{
			$aData = $this->Admin_model->get_employer($id);
			if ($aData) {
				echo json_encode($aData);
			}
		}
		else
			redirect('/');	

	}

	public function post_job()
	{
		if (!$this->session->userdata('islogged_mko789') && !$this->session->userdata('idtype_mko789') == 1) 		
			redirect('/');

		$output = array('error' => false);
		$this->form_validation->set_rules('emp-name', 'Emplyer Name', 'required|xss_clean',
			array('required' => 'Please Get Emplyer to Get Name... .'));
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
	                   
	            $job['ref_emp_id'] = $_POST['emp-ref-id'];;
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
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
			$data['categories'] = $this->Job_model->get_job_category();
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
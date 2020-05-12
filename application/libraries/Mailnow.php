<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Mailnow 
{	
	function __construct()
	{
		 $this->CI =& get_instance();
		//$CI =& get_instance();
	}

	public function send($to, $subject, $message, $from = 'jobs@victoryJobs.lk')
	{
		try {
			//set up email
			$config = array(
		  		'protocol' => 'smtp',
		  		'smtp_host' => 'ssl://smtp.googlemail.com',
		  		'smtp_port' => 465,
		  		'smtp_user' => $from, 
		  		'smtp_pass' => 'Victory@123', 
		  		'mailtype' => 'html',
		  		'charset' => 'iso-8859-1',
		  		'wordwrap' => TRUE
			);		

			$this->CI->load->library('email', $config);
		    $this->CI->email->set_newline("\r\n");
		    $this->CI->email->from($from, 'noreply@victoryJobs.com');
		    $this->CI->email->to($to);
		    $this->CI->email->subject($subject);
		    $this->CI->email->message($message);

		    //sending email
		    if ($this->CI->email->send())
		    	return true;
		    else
		    	return false;

		}catch (Exception $e) {
			return false;
		}
	}

	public function send_with_attachment($to, $subject, $message, $path, $from = 'jobs@victoryJobs.lk')
	{
		try {
			//set up email
			$config = array(
		  		'protocol' => 'smtp',
		  		'smtp_host' => 'ssl://smtp.googlemail.com',
		  		'smtp_port' => 465,
		  		'smtp_user' => $from, 
		  		'smtp_pass' => 'Victory@123', 
		  		'mailtype' => 'html',
		  		'charset' => 'iso-8859-1',
		  		'wordwrap' => TRUE
			);		

			$this->CI->load->library('email', $config);
		    $this->CI->email->set_newline("\r\n");
		    $this->CI->email->from($from, 'noreply@victoryJobs.com');
		    $this->CI->email->to($to);
		    $this->CI->email->subject($subject);
		    $this->CI->email->message($message);
		    $this->CI->email->attach($path);


		    //sending email
		    if ($this->CI->email->send())
		    	return true;
		    else
		    	return false;

		}catch (Exception $e) {
			return false;
		}
	}
}


 ?>
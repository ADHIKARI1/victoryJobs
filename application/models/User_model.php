<?php 

/**
* 
*/
class User_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//load databse connection
		$this->load->database(); 
	}

	public function login($email, $password)
	{
		$result = $this->db->get_where('usr_user', array('user_email' => $email));
		$db_pass = $result->row()->user_password;
		if (password_verify($password, $db_pass)) 
			return $result->row()->ref_emp_id;
		else
			return false;

	}

	public function get_user_type($ref_id)
	{
		$result = $this->db->get_where('usr_user', array('ref_emp_id' => $ref_id));
		$type = $result->row()->user_type;
		if ($type) 
			return $type;
		else
			return 0;

	}


}

 ?>
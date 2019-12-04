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
		try 
		{
			$result = $this->db->get_where('usr_user', array('user_email' => $email));
			if($result == NULL || $result == "")
			{
				return false;
			}
			else
			{				
				if($result->row(3) == NULL || $result->row(3) == "")
				{
					return false;
				}
				else
				{
					$db_pass = $result->row()->user_password;
					if (password_verify($password, $db_pass)) 
						return $result->row()->ref_emp_id;
					else
						return false;
				}
			}
		} catch (Exception $e) {
			return false;
		}
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

	public function is_email_unique($email)
	{
		$result = $this->db->get_where('usr_user', array('user_email' => $email));
		$existuser = $result->row_array();
		if ($existuser !== null) 
			return true;
		else
			return false;
	}


}

 ?>
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

	public function user_data($email)
	{
		try {
			$result = $this->db->get_where('usr_user', array('user_email' => $email));
			return $result->row_array();
		} catch (Exception $e) {
			return false;
		}		
		/*$token = $result->row()->user_access_token;			
		if ($token) 
			return $token;
		else
			return 0;*/		
	}

	public function get_user($id){
		try {
			$query = $this->db->get_where('usr_user',array('ref_emp_id'=>$id));
			return $query->row_array();
		} catch (Exception $e) {
			return false;
		}
	}

	public function update_password($data)
	{
		try {

			$this->db->where('usr_user.ref_emp_id', $data['ref_emp_id']);
			return $this->db->update('usr_user', $data);
			
		} catch (Exception $e) {
			return false;
		}
	}

	public function get_changelog($id, $code)
	{
		try {
			$query = $this->db->get_where('change_log',array('user_id'=>$id,'code' =>$code));
			return $query->row_array();
		} catch (Exception $e) {
			return null;
		}
	}

	public function add_changelog($ref_id, $change,  $code, $type = 'password')
	{
		try {
			if ($type == 'password') 
			{
				$data = array(
				'user_id' => $ref_id,				
				'change' => $change,
				'code' => $code,
				'is_password' => 1						
				);
				$this->db->insert('change_log', $data);
				return true;
			}
			return false;
		} catch (Exception $e) {
			return false;
		}
	}


}

 ?>
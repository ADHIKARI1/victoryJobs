<?php 

/**
* 
*/
class Candidate_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//load databse connection
		$this->load->database(); 
	}

	public function get_candidate($id){
		try {
			$query = $this->db->get_where('usr_basic',array('ref_emp_id'=>$id));
			return $query->row_array();
		} catch (Exception $e) {
			return false;
		}
	}	

	public function get_user_basic_detail($id){
		try {
			$query = $this->db->query("CALL get_user_basic_by_id('$id')");
        	mysqli_next_result($this->db->conn_id);
        	return $query->result_array();		
		} catch (Exception $e) {
			return array();
		}
	}

	public function get_user($id){
		try {
			$query = $this->db->get_where('usr_user',array('ref_emp_id'=>$id));
			return $query->row_array();
		} catch (Exception $e) {
			return false;
		}
	}

	public function activate($data, $id){
		try {
			$this->db->where('usr_user.ref_emp_id', $id);
			return $this->db->update('usr_user', $data);
			
		} catch (Exception $e) {
			return false;
		}
	}


	public function create_user($user)
	{
		try 
		{
			$options = ['cost' => 12];
			$enc_password = password_hash($user['password'], PASSWORD_BCRYPT, $options);
			$data = array(
				'ref_emp_id' => $user['ref_emp_id'],				
				'user_email' => $user['email'],
				'user_password' => $enc_password,
				'user_type' => 2,
				'user_access_token' => $user['user_access_token']				
			);
			$this->db->insert('usr_user', $data);

			$data = array(
				'ref_emp_id' => $user['ref_emp_id'],
				'user_fullname' => $user['fullname'],				
				'user_email' => $user['email'],
				'cv_name' => $user['cv']						
			);

			$this->db->insert('usr_basic', $data);
			return true;			
		} 
		catch (Exception $e) 
		{
			return false;
		}		
	}

	public function complete_user($user)
	{
		try {
			$this->db->where('ref_emp_id',  $user['ref_emp_id']);	        
	        $query = $this->db->get('usr_basic');
	        $existuser = $query->row_array();

	        if ($existuser !== null) 
	        {

		        $data = array(
	            'user_fname' => $user['user_fname'], 
	            'user_lname' => $user['user_lname'], 
	            'user_contact_no1' =>  $user['user_contact_no1'], 	
	            'user_contact_no2' => $user['user_contact_no2'],	
	            'user_address' => $user['user_address'],
	            'user_gender' => $user['user_gender'],	
	            'user_dob' => $user['user_dob'],	
	            'user_experience_years' => $user['user_experience_years'],
	            'user_highest_qualification' => $user['user_highest_qualification'],
	            'job_category' => $user['job_category'],
	            'user_preference1' => $user['user_preference1'],	
	            'user_preference2' => $user['user_preference2'],
	            'user_preference3' => $user['user_preference3'],
	            'user_cur_occupation' => $user['user_cur_occupation'],	
	            'user_cur_org' => $user['user_cur_org'],	
	            'user_prefer_loc' => $user['user_prefer_loc'],	
	            'user_description' => $user['user_description'],	
	            'image_name' => $user['image_name'],
	            'is_finished' => 1
		        );
				$this->db->where('ref_emp_id', $user['ref_emp_id']);
        		return $this->db->update('usr_basic', $data);	        	
	        }
	        else
	        {
	        	return false;
	        }
			
		} catch (Exception $e) {
			return false;
		}
	}

	public function email_available($email)
	{
		try
		{

		   $this->db->where('user_email', $email);  
           $query = $this->db->get("usr_user");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
			
		} catch (Exception $e) {
			return false;
		}
	}

	public function get_hqualifications()
	{
		$this->db->order_by('q_id', 'ASC');
		$query = $this->db->get('job_qualification');
		return $query->result_array();
	}

	public function get_job_category()
	{
		$this->db->order_by('job_cat_id','ASC');
		$query = $this->db->get('job_category');
		return $query->result_array();
	}

	public function get_job_designations()
	{
		$this->db->order_by('desig_id','ASC');
		$query = $this->db->get('job_designation');
		return $query->result_array();
	}
		
	public function get_districts()
	{
		$this->db->order_by('district_id','ASC');
		$query = $this->db->get('job_district');
		return $query->result_array();
	}

	public function get_cities()
	{
		$this->db->order_by('city_id','ASC');
		$query = $this->db->get('job_city');
		return $query->result_array();
	}
}

 ?>
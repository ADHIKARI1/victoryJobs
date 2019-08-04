<?php 

/**
* 
*/
class Employer_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//load databse connection
		$this->load->database(); 
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

	public function create_employer($user)
	{
		try {
			$options = ['cost' => 12];
			$enc_password = password_hash($user['password'], PASSWORD_BCRYPT, $options);
			$data = array(
				'ref_emp_id' => $user['ref_emp_id'],				
				'user_email' => $user['email'],
				'user_password' => $enc_password,
				'user_type' => 3,
				'user_access_token' => $user['user_access_token']				
			);
			$this->db->insert('usr_user', $data);

			$data = array(
				'ref_org_id' => $user['ref_emp_id'],
				'org_username' => $user['username'],
				'org_name' => $user['org_name'],				
				'org_email' => $user['email'],
				'org_telephone' => $user['org_telephone'],
				'org_logo' => $user['org_logo']						
			);

			$this->db->insert('org_basic', $data);
			return true;
			
		} catch (Exception $e) {
			return false;
		}
		
	}

	public function complete_user($user)
	{
		try {
			$this->db->where('ref_org_id',  $user['ref_org_id']);	        
	        $query = $this->db->get('org_basic');
	        $existuser = $query->row_array();

	        if ($existuser !== null) 
	        {
		        $data = array(
	            	'ref_org_id' => $user['ref_org_id'],
	            	'org_ind_id' => $user['org_ind_id'],
	            	'org_district_id' => $user['org_district_id'],	
	            	'org_city_id' => $user['org_city_id'],	
	            	'org_address' => $user['org_address'],
	            	'org_mobile' => $user['org_mobile'],
	            	'contact_email' => $user['contact_email'],	
	            	'org_contact_person' => $user['org_contact_person'],
	            	'no_of_vacancies' => $user['no_of_vacancies'],
	            	'org_logo' => $user['org_logo'], 
	            	'is_finished' => 1
		        );
				$this->db->where('ref_org_id', $user['ref_org_id']);
        		return $this->db->update('org_basic', $data);	        	
	        }
	        else
	        {
	        	return false;
	        }
			
		} catch (Exception $e) {
			return false;
		}
	}

}



 ?>
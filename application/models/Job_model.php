<?php 

/**
* 
*/
class Job_model extends CI_Model
{
	protected $table = 'job_post';

	function __construct()
	{
		parent::__construct();
		//load databse connection
		$this->load->database();
	}

	public function get_search()
	{
		$match = $this->input->post('keyword');
		$stored_proc = "CALL search_jobs(?, ?)";
        $data = array('post_title' => $match, 'post_overview' => $match);
        $result = $this->db->query($stored_proc, $data);
        mysqli_next_result( $this->db->conn_id );
        
        return $result->result_array();

	}

	public function get_count() 
	{
        return $this->db->count_all($this->table);
		/*$query = $this->db->query("CALL get_jobs_for_home()");
        mysqli_next_result($this->db->conn_id);
        return $query->num_rows();*/
    }

    public function get_jobs($from, $size)
    {
        /*$this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        $rows =  $query->result();

        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;*/
        
		$stored_proc = "CALL get_posts_limit(?, ?)";
        $data = array('page_from' => $from, 'page_size' => $size);
        $result = $this->db->query($stored_proc, $data);
        mysqli_next_result( $this->db->conn_id );

        return $result->result_array();

    }

    public function job_count_category()
    {
    	/*$this->db->select('job_category.job_cat_id as job_cat_id, job_category.job_cat_name as job_cat_name, COUNT(job_post.post_category) as categories_count');
		$this->db->from('job_category');
		$this->db->join('job_post', 'job_category.job_cat_id = job_post.post_category');
		$this->db->where(array('job_post.post_category !=' => null, 'job_category.job_cat_id != ' => NULL));
		$this->db->group_by('job_post.post_category');
		$query = $this->db->get();

		return $query->result_array();*/

		$query = $this->db->query("CALL get_category_with_count()");
        mysqli_next_result($this->db->conn_id);
        return $query->result_array();
    }

	public function get_job_industries()
	{
		$this->db->order_by('ind_id','ASC');
		$query = $this->db->get('job_industry');
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

	public function get_job_category()
	{
		$this->db->order_by('job_cat_id','ASC');
		$query = $this->db->get('job_category');
		return $query->result_array();
	}

	public function get_hqualifications()
	{
		$this->db->order_by('q_id', 'ASC');
		$query = $this->db->get('job_qualification');
		return $query->result_array();
	}

	public function get_job_types()
	{
		$this->db->order_by('type_id', 'ASC');
		$query = $this->db->get('job_type');
		return $query->result_array();
	}

	public function get_job_designations()
	{
		$this->db->order_by('desig_id','ASC');
		$query = $this->db->get('job_designation');
		return $query->result_array();
	}

	public function get_posts_home()
	{		
        $stored_proc = "CALL get_posts_limit(?, ?)";
        $data = array('page_from' => 0, 'page_size' => 10);
        $result = $this->db->query($stored_proc, $data);
        mysqli_next_result( $this->db->conn_id );

        return $result->result_array();       
	}

	public function get_post_by_id($post_id)        
	{
		$query = $this->db->query("CALL get_job_by_postid('$post_id')");
        mysqli_next_result($this->db->conn_id);
        return $query->result_array();		
	}

	public function create_post($job)
	{
		try {			
			$data = array(
				'ref_emp_id' => $job['ref_emp_id'],
	            'post_title' => $job['post_title'],
	            'post_type' => $job['post_type'],
	            'post_district_id' => $job['post_district_id'],
				'post_city_id' => $job['post_city_id'],
				'post_industry' => $job['post_industry'],
				'post_category' => $job['post_category'],
				'post_overview' => $job['post_overview'],
				'post_description' => $job['post_description'],
				'no_of_vacancies' => $job['no_of_vacancies'],
				'is_image' => $job['is_image'],
				'post_expire_date' => $job['post_expire_date'],
				'post_image' => $job['post_image'],
				'payment_image' => $job['payment_image'],
				'post_salary' => $job['post_salary'],
				'is_intern' => $job['is_intern']
			);
			$this->db->insert('job_post', $data);
			
			return true;
			
		} catch (Exception $e) {
			return false;
		}
		
	}

	public function update_post($job)
	{
		try {			
			$data = array(
				'ref_emp_id' => $job['ref_emp_id'],
	            'post_title' => $job['post_title'],
	            'post_type' => $job['post_type'],
	            'post_district_id' => $job['post_district_id'],
				'post_city_id' => $job['post_city_id'],
				'post_industry' => $job['post_industry'],
				'post_category' => $job['post_category'],
				'post_overview' => $job['post_overview'],
				'post_description' => $job['post_description'],
				'no_of_vacancies' => $job['no_of_vacancies'],
				'is_image' => $job['is_image'],
				'post_expire_date' => $job['post_expire_date'],
				'post_image' => $job['post_image'],
				'payment_image' => $job['payment_image'],
				'post_salary' => $job['post_salary'],
				'is_intern' => $job['is_intern']
			);		

			$this->db->where('post_id', $job['post_id']);
        	return $this->db->update('job_post', $data);	
			
			
		} catch (Exception $e) {
			return false;
		}
		
	}

	public function apply($job)
	{
		try {			
			$data = array(
				'ref_post_id' => $job['ref_post_id'],
	            'ref_emp_id' => $job['ref_emp_id'],
	            'org_email' => $job['org_email'],
	            'apply_name' => $job['apply_name'],
	            'applied_user' => $job['applied_user'],
				'applied_cv' => $job['applied_cv'],
				'applied_email' => $job['applied_email'],
				'cover_letter' => $job['cover_letter']				
			);
			$this->db->insert('jobs_applied_details', $data);
			
			return true;
			
		} catch (Exception $e) {
			return false;
		}
		
	}

	public function get_cvs_by_org_id($org_id)
	{
		$query = $this->db->query("CALL get_cvs_by_org_id('$org_id')");
        mysqli_next_result($this->db->conn_id);
        return $query->result_array();		
	}

	public function get_all_cvs()
	{
		try 
		{
			$this->db->select('*');
	      	$this->db->from('jobs_applied_details');
	      	$this->db->join('org_basic', 'org_basic.ref_org_id = jobs_applied_details.ref_emp_id', 'left');	
	      	$this->db->join('usr_basic', 'usr_basic.ref_emp_id = jobs_applied_details.applied_user', 'left'); 
	      	$this->db->join('job_post', 'job_post.post_id = jobs_applied_details.ref_post_id', 'left');     		
	      	$query = $this->db->get();

	      	if($query->num_rows() != 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }

		    /*print_r($query->row_array());
		    die;*/		    

		} 
		catch (Exception $e) 
		{
			return false;
		}
	}

	public function get_all_posts()
	{
		$query = $this->db->query("CALL get_jobs_for_home()");
        mysqli_next_result($this->db->conn_id);
        return $query->result_array();		
	}

}

 ?>
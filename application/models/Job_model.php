<?php 

/**
* 
*/
class Job_model extends CI_Model
{
	protected $table = 'get_jobs_for_home';

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

	public function get_count() {
       // return $this->db->count_all($this->table);
		$query = $this->db->query("CALL get_jobs_for_home()");
        mysqli_next_result($this->db->conn_id);
        return $query->num_rows();
    }

    public function get_jobs($limit, $start){
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

        $this->db->limit($limit, $start);
        $query = $this->db->query("CALL get_jobs_for_home()");
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
		$query = $this->db->query("CALL get_jobs_for_home()", 5);		
        mysqli_next_result($this->db->conn_id);
        return $query->result_array();

        /*$query = "(SELECT job_post.post_id, job_post.post_title, job_post.post_overview,job_post.post_description, job_type.type_name, ";
		$query = $query."org_basic.org_logo, org_basic.org_name ";
		$query = $query."FROM job_post LEFT JOIN job_type ON job_post.post_type = job_type.type_id ";
		$query = $query. "LEFT JOIN job_city ON job_post.post_city_id = job_city.city_id ";
		$query = $query. "LEFT JOIN org_basic ON job_post.ref_emp_id = org_basic.ref_org_id ORDER BY job_post.post_id DESC LIMIT 10)";
		$rows  = $this->db->query($query);
		$rows->result_array();*/
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

}

 ?>
<?php 

class Common_model extends CI_Model
{
    
	public function __construct()
	{
		parent::__construct();		
		
	}
	
    public function validate($val)
    {
        $val = trim($val);        
        $val = strip_tags($val);        
        $val = addslashes($val);        
        //to upper case
        //$val = strtoupper($val);        
        /* $val = $this->db->escape_str($val);         */
        return $val;
    }
    
    public function get_book_status()
    {
        
        $sql = "SELECT * FROM cl_book_status";
        
        $chk = $this->db->query($sql);
        
        return $chk->result_array();
    }
    
    /*
     Get the list of librares
    */
    
    public function get_libs()
    {
    	$data = array();
    
    	$data = $this->db->query('SELECT library_id,
				library_name FROM
				cl_library')->result_array();
    	return $data;
    }
    
    public function get_depts()
    {
    	$data = array();
    
    	$data = $this->db->query('SELECT dept_id,
				dept_name FROM
				cl_depts')->result_array();
    	return $data;
    }
    
    public function get_levels()
    {
    	$data = array();
    
    	$data = $this->db->query('SELECT level_id,
				level_name FROM
				cl_level')->result_array();
    	return $data;
    }
    
    public function get_cate()
    {
    	$data = array();
    
    	$data = $this->db->query('SELECT cate_id,
				category_name FROM
				cl_category')->result_array();
    	return $data;
    }
    
    
    
    
     public function get_fine_amts()
     {
        $data = array();
        
        $sql = "SELECT std_fine_amt,
                        staff_fine_amt
                            FROM lib_config";
                            
        $result = $this->db->query($sql)->row_array();
        
        if(count($result))
        {
            $data = $result;
            $data['status'] = TRUE;            
        }else{
            $data['status'] = FALSE;
        }
        return $data;  
     }
     
     public function get_return_date()
     {
        $sql = NULL;
        
        $sql = "SELECT return_date FROM lib_library 
                    WHERE library_id='".$this->common->library_id."'
                    AND mtime >='".strtotime(date('Y-m-d'))."'";
                    
        $result = $this->db->query($sql)->row_array();
        
        return $result;
     }
	
}
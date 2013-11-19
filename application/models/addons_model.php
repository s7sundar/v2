<?php 

class Addons_model extends CI_Model
{
	private $_SQL;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->_SQL = $this->common_model->get_instance();
	}
    
    public function get_book_status($params)
    {
        $result = array();

        $result['aaData'] = array();
        
        $result['sEcho'] = $params['sEcho'];
                
        $sql = "SELECT `status_id`, 
                       `status_name`, 
                       `ctime`, 
                       `user_id` 
                FROM `cl_book_status`";
                
        //search string
		if(isset($params['sSearch']) && !empty($params['sSearch']))
		{
		  
        }
        
        
        //check the sort column is set or not
		if(isset($params['iSortCol_0']))
		{
			switch($params['iSortCol_0'])
			{
			 
            }
        }
        
        //get the total count
		$result['iTotalRecords']= $total_count->num_rows();
		
		//total display records
		$result['iTotalDisplayRecords'] = $total_count->num_rows();
        
        
        //limitation
		if(isset($params['iDisplayStart']) && (isset($params['iDisplayLength'])))
		{
			//limit
			$where .= " LIMIT ".$params['iDisplayStart'].",".$params['iDisplayLength'];
	
		}else{
				
			//limit
			$where .= " LIMIT 0,10";
		}
    
    }
	
}
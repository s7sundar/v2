<?php

class Config_model extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function save_configs()
    {
        $time = time();
        
        $lib_id = $this->common_model->validate($this->input->post('library_id'));    
        $std_fine_amt = $this->common_model->validate($this->input->post('std_fine_amt'));
        $staff_fine_amt = $this->common_model->validate($this->input->post('staff_fine_amt'));
        
        if(is_numeric($std_fine_amt)==FALSE || is_numeric($staff_fine_amt)==FALSE || empty($lib_id))
        {
            $data['status'] = FALSE;
            $data['msg'] = "Invalid Entry.";
            return $data;
        }
        
        
        $existence = $this->db->get_where('cl_config', array('library_id'=>$lib_id));        
        
        if(0==$existence->num_rows())
        {
        	if($this->db->insert('cl_config',array('library_id'=>$lib_id,
        											'std_fine_amt'=>$std_fine_amt,
        											'staff_fine_amt'=>$staff_fine_amt,
        											'ctime'=>time())))
        	{
        		$data['status'] = TRUE;
        		$data['msg'] = "Record Inserted Successfully.";
        		
        	}else{
        		$data['status'] = FALSE;
        		$data['msg'] = "Record Inserted Failed.";
        	}
        	
        }else{
        	
        	$data['status'] = FALSE;
        	$data['msg'] = "Existing Details.";        	
        }
        
        return $data;
    }
    
    public function update_configs()
    {
        $time = time();
        
        $id = $this->common_model->validate($this->input->post('config_id'));
        $lib_id = $this->common_model->validate($this->input->post('library_id'));    
        $std_fine_amt = $this->common_model->validate($this->input->post('std_fine_amt'));
        $staff_fine_amt = $this->common_model->validate($this->input->post('staff_fine_amt'));
        
        if(is_numeric($std_fine_amt)==FALSE || is_numeric($staff_fine_amt)==FALSE || empty($lib_id) || empty($id))
        {
            $data['status'] = FALSE;
            $data['msg'] = "Invalid Entry.";
            return $data;
        }
        
        $this->db->where('library_id =', $lib_id);
        $this->db->where('id !=', $id);
        $existence = $this->db->get('cl_config');        
        
        if(0==$existence->num_rows())
        {
        	if($this->db->update('cl_config',array('library_id'=>$lib_id,
        											'std_fine_amt'=>$std_fine_amt,
        											'staff_fine_amt'=>$staff_fine_amt,
        											'mtime'=>time()), array('id'=>$id)))
        	{
        		$data['status'] = TRUE;
        		$data['msg'] = "Record Updated Successfully.";
        		
        	}else{
        		$data['status'] = FALSE;
        		$data['msg'] = "Record Update Failed.";
        	}
        	
        }else{
        	
        	$data['status'] = FALSE;
        	$data['msg'] = "Existing Details.";        	
        }
        
        return $data;
    }
    
    public function get_details($id)
    {
    	if(!empty($id))
    	{
    		$this->db->where('id',$id);
    		$chk = $this->db->get('cl_config');
    		 
    		if($chk->num_rows())
    		{
    			$data['status'] = TRUE;
    			$data['result'] = $chk->row_array();
    	
    		}else{
    			$data['status'] = FALSE;
    			$data['msg'] = 'Invalid Config ID';
    		}
    	
    	}else{
    		$data['status'] = FALSE;
    		$data['msg'] = 'Required Parameters Are Missing';
    	}
    	
    	return $data;
    }
    
    
    public function get_configs($params)
    {
    	$result = array();
    	
    	$data = array();
    	
    	$data['aaData'] = array();
    	
    	$data['sEcho'] = $params['sEcho'];
    	
    	$sql = "SELECT config.id,
    				   config.library_id,
    				   lib.library_name,
    				   config.std_fine_amt,
    				   config.staff_fine_amt,
    				   config.ctime
                FROM `cl_config` AS config,
    			cl_library AS lib
                WHERE config.library_id = lib.library_id";
    	
    	//search string
    	if(isset($params['sSearch']) && !empty($params['sSearch']))
    	{
    		$sql .= " AND lib.library_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
    	}
    	
    	
    	//check the sort column is set or not
    	if(isset($params['iSortCol_0']))
    	{
    		switch($params['iSortCol_0'])
    		{
    			case 0:
    				$sql .= " ORDER BY lib.library_name ".strtoupper($params['sSortDir_0']);
    				break;
    			case 1:
    				$sql .= " ORDER BY config.std_fine_amt ".strtoupper($params['sSortDir_0']);
    				break;
    			case 2:
    				$sql .= " ORDER BY config.staff_fine_amt ".strtoupper($params['sSortDir_0']);
    				break;
    			default:
    				$sql .= " ORDER BY ctime DESC";
    				break;
    		}
    	}
    	
    	$total = $this->db->query($sql);
    	
    	//get the total count
    	$data['iTotalRecords']= $total->num_rows();
    	
    	//total display records
    	$data['iTotalDisplayRecords'] = $total->num_rows();
    	
    	//free the cached result
    	$total->free_result();
    	
    	//limitation
    	if(isset($params['iDisplayStart']) && (isset($params['iDisplayLength'])))
    	{
    		//limit
    		$sql .= " LIMIT ".$params['iDisplayStart'].",".$params['iDisplayLength'];
    	
    	}else{
    	
    		//limit
    		$sql .= " LIMIT 0,10";
    	}
    	
    	//grab the result
    	$result = $this->db->query($sql);
    	
    	//result process
    	foreach($result->result_array() as $row)
    	{
    		$edit = $row['id'];
    	
    		$data['aaData'][] =array($row['library_name'],
    				$row['std_fine_amt'],
    				$row['staff_fine_amt'],
    				$this->common->get_action_links($edit, '',''));
    	
    	}
    	
    	
    	return $data;
    	
        
    }
   
     /*public function drop_config($cfg_id)
     {
        $sql = "DELETE FROM lib_config WHERE config_id=".$cfg_id;
        
        $result = $this->db->query($sql);
        
        if($result)
        {
            $msg = "Record Deleted Successfully";
            
        }else{
            
            $msg = "Invalid Entry";
        }
        
        return $msg;
     }*/
     
     
}
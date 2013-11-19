<?php

class Manage_model extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function save()
    {
        $time = time();
        
        $data['library_id'] = $this->common_model->validate($this->input->post('library_id'));    
        $data['user_name'] = $this->common_model->validate($this->input->post('user_name'));
        $data['user_pass'] = $this->common_model->validate($this->input->post('user_pass'));
        $data['user_level'] = $this->common_model->validate($this->input->post('user_level'));
                
        if(empty($data['user_level']) || empty($data['user_name']) || empty($data['user_pass']) || empty($data['library_id']))
        {
            $data['status'] = FALSE;
            $data['msg'] = "Invalid Entry.";
            return $data;
        }        
        
        $existence = $this->db->get_where('cl_user', array('user_name'=>$data['user_name']));        
        
        if(0==$existence->num_rows())
        {
            $data['ctime']=time();
            
        	if($this->db->insert('cl_user',$data))
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
    
    public function update()
    {
        $time = time();
        
        $data['library_id'] = $this->common_model->validate($this->input->post('library_id'));    
        $data['user_name'] = $this->common_model->validate($this->input->post('user_name'));
        
        $user_pass = $this->common_model->validate($this->input->post('user_pass'));
        
        if(!empty($user_pass))
        {
            $data['user_pass'] = $this->common_model->validate($this->input->post('user_pass'));
        }
        
        $data['user_level'] = $this->common_model->validate($this->input->post('user_level'));
        $user_id = $this->common_model->validate($this->input->post('user_id'));
                
        if(empty($data['user_level']) || empty($data['user_name']) || 
            empty($data['library_id']) || empty($user_id))
        {
            $data['status'] = FALSE;
            $data['msg'] = "Invalid Entry.";
            return $data;
        }   
        
        $this->db->where('user_name =', $data['user_name']);
        $this->db->where('user_id !=', $user_id);
        $existence = $this->db->get('cl_user');        
        
        if(0==$existence->num_rows())
        {
        	if($this->db->update('cl_user',$data, array('user_id'=>$user_id)))
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
    		$this->db->where('user_id',$id);
    		$chk = $this->db->get('cl_user');
    		 
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
    
    
    public function get_users($params)
    {
    	$result = array();
    	
    	$data = array();
    	
    	$data['aaData'] = array();
    	
    	$data['sEcho'] = $params['sEcho'];
    	
    	$sql = "SELECT usr.user_id,
    				   usr.library_id,
    				   lib.library_name,
    				   usr.user_name,
    				   lev.level_name,
    				   usr.ctime
                FROM `cl_user` AS usr,
    			cl_library AS lib,
                cl_level AS lev
                WHERE usr.library_id = lib.library_id
                AND usr.user_level = lev.level_id";
    	
    	//search string
    	if(isset($params['sSearch']) && !empty($params['sSearch']))
    	{
    		$sql .= " AND (lib.library_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
            $sql .= " OR usr.user_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
            $sql .= " OR lev.level_name LIKE '%".$this->db->escape_str($params['sSearch'])."%')";
            
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
    				$sql .= " ORDER BY usr.user_name ".strtoupper($params['sSortDir_0']);
    				break;
    			case 2:
    				$sql .= " ORDER BY lev.level_name ".strtoupper($params['sSortDir_0']);
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
    		$edit = $row['user_id'];
    	
    		$data['aaData'][] =array($row['library_name'],
    				$row['user_name'],
    				$row['level_name'],
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
<?php

class Book_status_model extends CI_Model
{
    private $user_id = 0;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function addBookStatus($params)
    {
        $data = array();
        
        $status_name = $this->common_model->validate($params['status_name']);
        
        $status_id = $this->common_model->validate($params['status_id']);
        
        if(!empty($status_name))
        {
            
            $sql = "SELECT status_id FROM
                        cl_book_status 
                            WHERE status_name = '".$this->db->escape_str($status_name)."'";
                            
            if(!empty($status_id))
            {
                $sql .= " AND status_id !=".$status_id;
            }
                        
            $chk = $this->db->query($sql);
                        
            if($chk->num_rows()==0)
            {
                if(!empty($status_id) && is_numeric($status_id))
                {
                    $cql = "UPDATE cl_book_status SET status_name = '".$this->db->escape_str($status_name)."',
                                                        user_id = '".$this->user_id."',
                                                        mtime = '".time()."'
                                                    WHERE status_id =".$status_id;
                      
                      if($this->db->query($cql))
                      {
                        
                        $data['status'] = TRUE;        
                        $data['msg']= "Record Updated Successfully";
                        
                      }else{
                        
                        $data['status'] = FALSE;        
                        $data['msg']= "Record Updated Fails";
                      }                              
                             
                }else{
                    
                    $cql = "INSERT INTO cl_book_status(status_name,user_id,ctime)
                                    VALUES('".$this->db->escape_str($status_name)."','".$this->user_id."','".time()."')";
                                    
                     if($this->db->query($cql))
                     {
                        
                        $data['status'] = TRUE;        
                        $data['msg']= "Record Saved Successfully";
                        
                     }else{
                        
                        $data['status'] = FALSE;        
                        $data['msg']= "Record Insert Fails";
                     }
                }     
                
            }else{
                
                $data['status'] = FALSE;        
                $data['msg']= "Existing Entry";
            }
            
            $chk->free_result();
                
        }else{
            
            $data['status'] = FALSE;        
            $data['msg'] = "Incomplete Details";
        }
        
        return $data;
    }
    
    public function get_book_status($params)
    {
        $result = array();
        
        $data = array();

        $data['aaData'] = array();
        
        $data['sEcho'] = $params['sEcho'];
                
        $sql = "SELECT `status_id`, 
                       `status_name`, 
                       `ctime`, 
                       `user_id` 
                FROM `cl_book_status`
                WHERE 1";
                
        //search string
		if(isset($params['sSearch']) && !empty($params['sSearch']))
		{
		   $sql .= " AND status_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
        }
        
        
        //check the sort column is set or not
		if(isset($params['iSortCol_0']))
		{
			switch($params['iSortCol_0'])
			{
			   case 0:
                  $sql .= " ORDER BY status_id ".strtoupper($params['sSortDir_0']);
               break;
               case 1:
                  $sql .= " ORDER BY status_name ".strtoupper($params['sSortDir_0']);
               break;
               case 2:
                  $sql .= " ORDER BY ctime ".strtoupper($params['sSortDir_0']);
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
            $edit = $row['status_id'];
            
            $data['aaData'][] =array($row['status_id'],
                                     $row['status_name'],
                                     date('d-m-Y H:i:s',$row['ctime']),                                     
                                     $this->common->get_action_links($edit, '','')); 
        
        }
        
        
        return $data;
    
    }
    
    
    public function get_details($id)
    {
        $data = array();
        
        if(!empty($id))
        {                      
            $sql = "SELECT status_id,
                            status_name 
                                FROM cl_book_status
                                    WHERE status_id = ".$id;
            
            $chk = $this->db->query($sql);
           
            if($chk->num_rows())
            {
                $data['status'] = TRUE;
                $data['result'] = $chk->row_array();
                        
            }else{
                $data['status'] = FALSE;
                $data['msg'] = 'Invalid Status ID';
            }
            
        }else{
             $data['status'] = FALSE;
             $data['msg'] = 'Required Parameters Are Missing';
        }
        
        
        return $data;
    }
    
    
}
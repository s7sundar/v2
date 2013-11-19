<?php

class Bcate_model extends CI_Model
{
    private $user_id = 0;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function addBookCate($params)
    {
        $data = array();
        
        $cate_name = $this->common_model->validate($params['category_name']);
        
        $cate_id = $this->common_model->validate($params['cate_id']);
        
        if(!empty($cate_name))
        {
            
            $sql = "SELECT cate_id FROM
                        cl_category 
                            WHERE category_name = '".$this->db->escape_str($cate_name)."'";
                            
            if(!empty($cate_id))
            {
                $sql .= " AND cate_id !=".$cate_id;
            }                
                        
            $chk = $this->db->query($sql);
                        
            if($chk->num_rows()==0)
            {
                if(!empty($cate_id) && is_numeric($cate_id))
                {
                    $cql = "UPDATE cl_category SET category_name = '".$this->db->escape_str($cate_name)."',
                                                        user_id = '".$this->user_id."',
                                                        mtime = '".time()."'
                                                    WHERE cate_id =".$cate_id;
                      
                      if($this->db->query($cql))
                      {
                        
                        $data['status'] = TRUE;        
                        $data['msg']= "Record Updated Successfully";
                        
                      }else{
                        
                        $data['status'] = FALSE;        
                        $data['msg']= "Record Update Fails";
                      }                              
                             
                }else{
                    
                    $cql = "INSERT INTO cl_category(category_name,user_id,ctime)
                                    VALUES('".$this->db->escape_str($cate_name)."','".$this->user_id."','".time()."')";
                                    
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
    
    public function get_book_category($params)
    {
        $result = array();
        
        $data = array();

        $data['aaData'] = array();
        
        $data['sEcho'] = $params['sEcho'];
                
        $sql = "SELECT `cate_id`, 
                       `category_name`, 
                       `ctime`, 
                       `user_id` 
                FROM `cl_category`
                WHERE 1";
                
        //search string
		if(isset($params['sSearch']) && !empty($params['sSearch']))
		{
		   $sql .= " AND category_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
        }
        
        
        //check the sort column is set or not
		if(isset($params['iSortCol_0']))
		{
			switch($params['iSortCol_0'])
			{
			   case 0:
                  $sql .= " ORDER BY cate_id ".strtoupper($params['sSortDir_0']);
               break;
               case 1:
                  $sql .= " ORDER BY category_name ".strtoupper($params['sSortDir_0']);
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
            $edit = $row['cate_id'];
            
            $data['aaData'][] =array($row['cate_id'],
                                     $row['category_name'],
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
            $sql = "SELECT cate_id,
                            category_name 
                                FROM cl_category
                                    WHERE cate_id = ".$id;
            
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
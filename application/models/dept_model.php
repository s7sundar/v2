<?php

class Dept_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	############################################ Library Management ###############################

	
	public function get_depts($params)
	{
		$data = array();

		$data['aaData'] = array();

		$data['sEcho'] = $params['sEcho'];

		$sql = "SELECT dept.`dept_id`, 
                    dept.`dept_name`,
				    dept.`contact_no`,
				    dept.`contact_person`,
				    lb.`library_name`
				FROM `cl_depts` AS dept 
                JOIN `cl_library` AS lb ON dept.library_id = lb.library_id 
				WHERE 1";

		//search string
		if(isset($params['sSearch']) && !empty($params['sSearch']))
		{
			$sql .= " AND (lb.library_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
			 
			$sql .= " OR dept.dept_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
            
            $sql .= " OR dept.contact_person LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
            
            $sql .= " OR dept.contact_no LIKE '%".$this->db->escape_str($params['sSearch'])."%')";
		}


		//check the sort column is set or not
		if(isset($params['iSortCol_0']))
		{
			switch($params['iSortCol_0'])
			{
				case 0:
					$sql .= " ORDER BY dept.dept_name ".strtoupper($params['sSortDir_0']);
				break;
                case 1:
					$sql .= " ORDER BY dept.library_name ".strtoupper($params['sSortDir_0']);
				break;
				case 2:
					$sql .= " ORDER BY dept.contact_person ".strtoupper($params['sSortDir_0']);
				break;
                case 3:
					$sql .= " ORDER BY dept.contact_no ".strtoupper($params['sSortDir_0']);
				break;
                        
				default:
					$sql .= " ORDER BY dept.ctime DESC";
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
			$id = $row['dept_id'];

			$data['aaData'][] =array($row['dept_name'],
                    $row['library_name'],
                    $row['contact_person'],
					$row['contact_no'],
					$this->common->get_action_links($id, '',''));

		}


		return $data;

	}


	public function add()
	{
		$result = array();
		 
		$data = array();
		 
		$data['library_id'] = $this->common_model->validate($this->input->post('library_id'));
        $data['dept_name'] = $this->common_model->validate($this->input->post('dept_name'));
        $data['dept_location'] = $this->common_model->validate($this->input->post('dept_location'));
		$data['stud_books_cnt'] = $this->common_model->validate($this->input->post('stud_books_cnt'));
		$data['stud_renewal_days'] = $this->common_model->validate($this->input->post('stud_renewal_days'));
		$data['staff_books_cnt'] = $this->common_model->validate($this->input->post('staff_books_cnt'));
        $data['staff_renewal_days'] = $this->common_model->validate($this->input->post('staff_renewal_days'));        
		$data['contact_person'] = $this->common_model->validate($this->input->post('contact_person'));
		$data['contact_email'] = $this->common_model->validate($this->input->post('contact_email'));
		$data['contact_no'] = $this->common_model->validate($this->input->post('contact_no'));
		 		 
		if(!empty($data['library_id']) && !empty($data['dept_name']))
		{
            $this->db->where('library_id',$data['library_id']);
            $this->db->where('dept_name',$data['dept_name']);
			$check_existance = $this->db->get('cl_depts');
			 
			if(0==$check_existance->num_rows())
			{
				$data['ctime'] = time();

				if($this->db->insert('cl_depts', $data))
				{
					$result['status'] = TRUE;
					$result['msg'] = "Record Saved Successfully.";
					 
				}else{
					 
					$result['status'] = FALSE;
					$result['msg'] = "Record Insert Failed.";
				}

			}else{

				$result['status'] = FALSE;
				$result['msg'] = "Existing Details.";
			}

		}else{

			$result['status'] = FALSE;
			$result['msg'] = "Incomplete Details.";
		}
		 
		return $result;
	}

	public function get_dept_value($id)
	{
		$data =array();

		$this->db->where(array('dept_id'=>$id));
		$obj = $this->db->get('cl_depts');

		if(1==$obj->num_rows())
		{
			$data['status'] = TRUE;
			$data['result'] = $obj->row_array();
		}else{
			$data['status'] = FALSE;
			$data['msg'] = 'Invalid Parameters.';
		}

		return $data;
	}


	public function update()
	{
		$result = array();
		 
		$data = array();
		 
		$data['library_id'] = $this->common_model->validate($this->input->post('library_id'));
        $data['dept_name'] = $this->common_model->validate($this->input->post('dept_name'));
        $dept_id = $this->common_model->validate($this->input->post('dept_id'));
        $data['dept_location'] = $this->common_model->validate($this->input->post('dept_location'));
		$data['stud_books_cnt'] = $this->common_model->validate($this->input->post('stud_books_cnt'));
		$data['stud_renewal_days'] = $this->common_model->validate($this->input->post('stud_renewal_days'));
		$data['staff_books_cnt'] = $this->common_model->validate($this->input->post('staff_books_cnt'));
        $data['staff_renewal_days'] = $this->common_model->validate($this->input->post('staff_renewal_days'));        
		$data['contact_person'] = $this->common_model->validate($this->input->post('contact_person'));
		$data['contact_email'] = $this->common_model->validate($this->input->post('contact_email'));
		$data['contact_no'] = $this->common_model->validate($this->input->post('contact_no'));
		 		 
		if(!empty($data['library_id']) && !empty($data['dept_name']) && !empty($dept_id))
		{
            $this->db->where('library_id',$data['library_id']);
            $this->db->where('dept_id !=',$dept_id);
            $this->db->where('dept_name',$data['dept_name']);
			$check_existance = $this->db->get('cl_depts');
			 
			if(0==$check_existance->num_rows())
			{
				$data['mtime'] = time();

				if($this->db->update('cl_depts', $data,array('dept_id'=>$dept_id)))
				{
					$result['status'] = TRUE;
					$result['msg'] = "Record Updated Successfully.";
					 
				}else{
					 
					$result['status'] = FALSE;
					$result['msg'] = "Record Update Fails.";
				}

			}else{

				$result['status'] = FALSE;
				$result['msg'] = "Existing Details.";
			}

		}else{

			$result['status'] = FALSE;
			$result['msg'] = "Incomplete Details.";
		}
		 
		return $result;
	}


	/* public function drop_libs($id, $name)
	{
		$data = array();

		$sql = "DELETE FROM lib_library
				WHERE library_name = '".$name."' AND
						library_id = ".$id;
		//echo $sql;

		$result = $this->db->query($sql);

		if($result)
		{
			$data['msg'] = 6;
		}else{
			$data['msg'] = 8;
		}

		return $data;

	} */


}
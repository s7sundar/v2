<?php

class Library_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	############################################ Library Management ###############################

	
	public function get_libraries($params)
	{
		$data = array();

		$data['aaData'] = array();

		$data['sEcho'] = $params['sEcho'];

		$sql = "SELECT `library_name`,
				`contact_no`,
				`open_time`,
				`close_time`,
				`library_id`
				FROM `cl_library`
				WHERE 1";

		//search string
		if(isset($params['sSearch']) && !empty($params['sSearch']))
		{
			$sql .= " AND (library_name LIKE '%".$this->db->escape_str($params['sSearch'])."%'";
			 
			$sql .= " OR contact_no LIKE '%".$this->db->escape_str($params['sSearch'])."%')";
		}


		//check the sort column is set or not
		if(isset($params['iSortCol_0']))
		{
			switch($params['iSortCol_0'])
			{
				case 0:
					$sql .= " ORDER BY library_name ".strtoupper($params['sSortDir_0']);
					break;
				case 1:
					$sql .= " ORDER BY contact_no ".strtoupper($params['sSortDir_0']);
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
			$id = $row['library_id'];

			$data['aaData'][] =array($row['library_name'],
					$row['contact_no'],
					$row['open_time'],
					$row['close_time'],
					$this->common->get_action_links($id, '',$id));

		}


		return $data;

	}


	public function add_library()
	{
		$result = array();
		 
		$data = array();
		 
		$data['library_name'] = $this->common_model->validate($this->input->post('library_name'));
		$data['library_location'] = $this->common_model->validate($this->input->post('library_location'));
		$data['open_time'] = $this->common_model->validate($this->input->post('open_time'));
		$data['close_time'] = $this->common_model->validate($this->input->post('close_time'));
		$data['contact_person'] = $this->common_model->validate($this->input->post('contact_person'));
		$data['contact_email'] = $this->common_model->validate($this->input->post('contact_email'));
		$data['contact_no'] = $this->common_model->validate($this->input->post('contact_no'));
		 
		 
		if(!empty($data['library_name']) && !empty($data['open_time']) && !empty($data['close_time']))
		{
			$check_existance = $this->db->get_where('cl_library',$data);
			 
			if(0==$check_existance->num_rows())
			{
				$data['ctime'] = time();

				if($this->db->insert('cl_library', $data))
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

	public function get_library_value($id)
	{
		$data =array();

		$this->db->where(array('library_id'=>$id));
		$obj = $this->db->get('cl_library');

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


	public function update_libs()
	{
		$data =array();
		$result = array();
		 
		$data['library_name'] = $this->common_model->validate($this->input->post('library_name'));
		$data['library_location'] = $this->common_model->validate($this->input->post('library_location'));
		$data['open_time'] = $this->common_model->validate($this->input->post('open_time'));
		$data['close_time'] = $this->common_model->validate($this->input->post('close_time'));
		$data['contact_person'] = $this->common_model->validate($this->input->post('contact_person'));
		$data['contact_email'] = $this->common_model->validate($this->input->post('contact_email'));
		$data['contact_no'] = $this->common_model->validate($this->input->post('contact_no'));
		 
		$library_id = $this->common_model->validate($this->input->post('library_id'));
		 
		if(!empty($data['library_name']) 
			&& !empty($data['open_time']) 
			&& !empty($data['close_time']) 
			&& !empty($library_id))
		{
			$data['mtime'] = time();

			if($this->db->update('cl_library', $data, array('library_id'=>$library_id)))
			{
				$result['status'] = TRUE;
				$result['msg'] = "Record Updated Successfully.";

			}else{

				$result['status'] = FALSE;
				$result['msg'] = "Record Update Failed.";
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
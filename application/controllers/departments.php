<?php

class Departments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('dept_model');
    }
    
    public function index()
    {
        $data = array();
        
        //get the library details
    	$data['lib'] = $this->common_model->get_libs();
        
        //load the view file
        $this->load->view('addons/dept/index',$data);
    }

    //add new library name
	public function records()
	{
	   $data = array();
	   
	   $params = $this->input->get(NULL, TRUE);
	   
	   $data = $this->dept_model->get_depts($params);
       
       echo json_encode($data);
	}
    
    public function save()
    {
        $data = array();
        
        $data = $this->dept_model->add();
        
        echo json_encode($data); 
    }
    
    public function edit()
    {
        $data =array();
        $id = $this->uri->segment(3);           
        if(!empty($id))
        {   
           $result = $this->dept_model->get_dept_value($id);
           
           if($result['status'])
           {     
           		$data['status'] = TRUE;
                $result['lib'] = $this->common_model->get_libs();
            	$data['html'] = $this->load->view('addons/dept/edit', $result, TRUE);
           }else{
           		$data = $result;
           }
            
        }else{
            
            $data['status'] = FALSE;
            $data['status'] = 'Incomplete Details.';
        }
		
        echo json_encode($data);
        
    }
    
    public function update()
    { 
    	$data = array();
        
        $data = $this->dept_model->update();
        
        echo json_encode($data); 
    }
    
    
   /*  public function drop()
    {
        $data =array();
        $id = $this->uri->segment(3);
        $lib_name = $this->uri->segment(4);        
        if(!empty($id) && !empty($lib_name))
        {
            $lib_name = rawurldecode($lib_name);
            $data = $this->add->drop_libs($id, $lib_name);
            $this->library($data['msg']);
        }else{
            
            $this->library();
        }
    } */
}
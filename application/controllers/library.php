<?php

class Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('library_model');
    }
    
    public function index()
    {
        //load the view file
        $this->load->view('addons/library/index.php');
    }

    //add new library name
	public function records()
	{
	   $data = array();
	   
	   $params = $this->input->get(NULL, TRUE);
	   
	   $data = $this->library_model->get_libraries($params);
       
       echo json_encode($data);
	}
    
    public function save()
    {
        $data = array();
        
        $data = $this->library_model->add_library();
        
        echo json_encode($data); 
    }
    
    public function edit()
    {
        $data =array();
        $id = $this->uri->segment(3);           
        if(!empty($id))
        {   
           $result = $this->library_model->get_library_value($id);
           
           if($result['status'])
           {     
           		$data['status'] = TRUE;
            	$data['html'] = $this->load->view('addons/library/edit', $result['result'], TRUE);
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
        
        $data = $this->library_model->update_libs();
        
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
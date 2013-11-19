<?php

class Management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('manage_model');
    }
    
    public function index()
    {
    	$data = array();
    	
    	//get the library details
    	$data['lib'] = $this->common_model->get_libs();
    	
        $data['levels'] = $this->common_model->get_levels();
        
        //load the view file
        $this->load->view('user/index', $data);
    }
    
    public function records($msg=NULL)
    { 
        $data = array();
        
        $params = array();
        
        $params = $this->input->get(NULL, TRUE);
        
        $data = $this->manage_model->get_users($params);        
				
		echo json_encode($data);
    }
    
    
    public function save()
    {
        $data = array();
        $data = $this->manage_model->save();
        echo json_encode($data);
    }
    
    public function update()
    {
        $data = array();
        $data = $this->manage_model->update();
        echo json_encode($data);
    }
    
    public function edit()
    {
    	$data = array();
    
    	$id = $this->uri->segment(3);
    
    	$data = $this->manage_model->get_details($id);
    	
    	$data['lib'] = $this->common_model->get_libs();
        
        $data['levels'] = $this->common_model->get_levels();
    
    	$data['html'] = $this->load->view('user/edit', $data, TRUE);
    
    	echo json_encode($data);
    }
    
    
    /*public function drop_config()
    {
        $msg = NULL;
        
        $config_id = $this->uri->segment(3);
        
        if(is_numeric($config_id))
        {
            $msg = $this->add->drop_config($config_id);
                
        }else{
            
            $msg= "Invalid entry";
        }
        
        $this->configurations($msg);
    }*/
    
    
    
}
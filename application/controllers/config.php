<?php

class Config extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('config_model');
    }
    
    public function index()
    {
    	$data = array();
    	
    	//get the library details
    	$data['lib'] = $this->common_model->get_libs();
    	
        //load the view file
        $this->load->view('addons/config/index', $data);
    }
    
    public function records($msg=NULL)
    { 
        $data = array();
        
        $params = array();
        
        $params = $this->input->get(NULL, TRUE);
        
        $data = $this->config_model->get_configs($params);        
				
		echo json_encode($data);
    }
    
    
    public function save()
    {
        $data = array();
        $data = $this->config_model->save_configs();
        echo json_encode($data);
    }
    
    public function update()
    {
        $data = array();
        $data = $this->config_model->update_configs();
        echo json_encode($data);
    }
    
    public function edit()
    {
    	$data = array();
    
    	$id = $this->uri->segment(3);
    
    	$data = $this->config_model->get_details($id);
    	
    	$data['lib'] = $this->common_model->get_libs();
    
    	$data['html'] = $this->load->view('addons/config/edit', $data, TRUE);
    
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
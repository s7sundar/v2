<?php

class Book_status extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        
        //load the required model
        $this->load->model('book_status_model');
                
	}
	
	public function index()
	{
	   $this->load->view('addons/book_status/book_status');       
	}
	
	public function records()
	{
		$data = array();
        
        $params = array();
        
        $params = $this->input->get(NULL, TRUE);
        
        $data = $this->book_status_model->get_book_status($params);        
				
		echo json_encode($data);
	}
    
    public function save()
    {
        $data = array();
        
        $params['status_name'] = $this->uri->segment(3);
        
        $params['status_id'] = $this->uri->segment(4);
        
        $data = $this->book_status_model->addBookStatus($params);
        
        echo json_encode($data);
    }
    
    public function edit()
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $data = $this->book_status_model->get_details($id);
        
        $data['html'] = $this->load->view('addons/book_status/edit', $data, TRUE);
        
        echo json_encode($data);
    }
    
}
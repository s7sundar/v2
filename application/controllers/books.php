<?php

class Books extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
    
    public function index()
    {
        $data = array();
    	
        //load the view file
        $this->load->view('books/index', $data);
    }
    
    public function add()
    {
        $data = array();
        
        //get the library details
    	$data['lib'] = $this->common_model->get_libs();
        
        $data['depts'] = $this->common_model->get_depts();
        
        $data['status'] = $this->common_model->get_book_status();
        
        $data['cate'] = $this->common_model->get_libs();
        
    }
    
    
    public function records()
    {
        
    }
    
    public function save()
    {
        
    }
    
    public function update()
    {
        
    }

}
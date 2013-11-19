<?php

class Book_category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        
        //load the required model
        $this->load->model('bcate_model');
                
	}
	
	public function index()
	{
	   $this->load->view('addons/book_cate/index');       
	}
	
	public function records()
	{
		$data = array();
        
        $params = array();
        
        $params = $this->input->get(NULL, TRUE);
        
        $data = $this->bcate_model->get_book_category($params);        
				
		echo json_encode($data);
	}
    
    public function save()
    {
        $data = array();
        
        $params['category_name'] = $this->uri->segment(3);
        
        $params['cate_id'] = $this->uri->segment(4);
        
        $data = $this->bcate_model->addBookCate($params);
        
        echo json_encode($data);
    }
    
    public function edit()
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $data = $this->bcate_model->get_details($id);
        
        $data['html'] = $this->load->view('addons/book_cate/edit', $data, TRUE);
        
        echo json_encode($data);
    }
    
}
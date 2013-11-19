<?php

class Students extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('std_model');
	}
	
	public function index()
	{
		$data = array();
		
		$this->laod->view('memebers/std/index');	
		
		//load the index file
		
	}
	
	
	public function records()
	{
		
	}
	
	public function save()
	{
		
	}
	
	public function edit()
	{
		
	}
	
	public function update()
	{
		
	}
	
}
<?php 

class Temp extends CI_Controller
{
   public function __construct()
   {
	   parent::__construct();
   }
   
   public function index()
   {
	   $this->validate();
   }
   
   public function layout()
   {
	   //load the view file
	   $this->load->view('theme/layout');
   }
   
   public function datatable()
   {
	   //load the view file
	   $this->load->view('theme/datatable');
   }
   
   public function validate()
   {
	    //load the view file
	   $this->load->view('theme/validation');
   }
   
}
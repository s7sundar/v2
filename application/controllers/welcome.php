<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		
		
		if ( !isset($_SERVER['HTACCESS']) ) {
			echo "Welcome to knowledge source !";
		}elseif(isset($_SERVER['HTACCESS'])){
			echo "Welcome to knowledge source !!!!!!!!!";
		}
	}
	
	public function login()
	{
		$this->load->view('templates/login');
	}
	
	public function used_items()
	{
		
	}
	
	public function admin()
	{
		$this->load->view('templates/admin');
	}
	
	public function admin1()
	{
		
	}
	
	public function admin2()
	{
		
	}
	
	public function admin3()
	{
		
	}
	
	public function user()
	{
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php

class Addons extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
	   $this->book_status();       
	}
	
	public function book_status()
	{
		$this->load->view('addons/book_status');
	}
	
	public function status_list()
	{
		$data = array();
		
		//$link = $this->common->edit('');
		$link = '<span id="icons" class="ui-widget"><span class="ui-state-default ui-corner-all ui-icon ui-icon-carat-1-n"></span></span>';
        
        $link = '<ul id="icons" class="ui-widget ui-helper-clearfix">
	<li class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-pencil"></span></li>
	<li class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-trash"></span></li></ul>';
		
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['aaData'][]= array('1','available','2013-08-03','2353',$link);
		$data['iTotalDisplayRecords']=60;
		$data['iTotalRecords']=10;
		
		echo json_encode($data);
	}
    
    public function save_status()
    {
        echo json_encode(array('status'=>true));
    }
	
	public function test()
	{
		echo "<p>Hello World</p>";
	}
}
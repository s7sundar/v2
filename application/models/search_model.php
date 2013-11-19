<?php 

class Search_model extends CI_Model
{
	private $_SQL;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->_SQL = $this->common_model->get_instance();
	}
	
}
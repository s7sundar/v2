<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' media='screen' href='<?php echo base_url('assets/css/demo_table.css'); ?>' /> 
<link href="<?php echo base_url(); ?>assets/css/main.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/start/jquery-ui-1.10.3.custom.css" media="screen" rel="stylesheet" type="text/css" />
<title>Library Management</title>
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
</script>
</head>
<body>
<!-- container start ----------->
<div class="container container_12"> 
  <!--- logo panel ------>
  <div class="grid_12 logo_panel"> </div>
  <div class='clear'>&nbsp;</div>
  <!--- logo panel end -------> 
  
  <!--- Menu ------>
  <div class="grid_12">
    <div id="menu">
      <ul>
        <li class="active"><a href="#">Dashboard</a></li>        
        <li id="has-sub"><a href="#">Addons</a>
          <ul>
            <li><a href="#">Book&nbsp;Status</a></li>
            <li><a href="#">Configurations</a></li>
            <li><a href="#">Book&nbsp;Category</a></li>
            <li><a href="#">Library</a></li>
            <li><a href="#">Departments</a></li>
            <li><a href="#">Holidays</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">News&nbsp;Updates</a></li>
            <li><a href="#">Exam&nbsp;Results</a></li>
          </ul>
        </li>
        <li><a href="#about">Books</a></li>
        <li><a href="#contact">Members</a></li>
        <li><a href="#about">Search</a></li>
        <li><a href="#about">Budget</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#about">Error Analysis</a></li>
        <li><a href="#about">User Management</a></li>
        <li><a href="#about">FAQ</a></li>
      </ul>
    </div>
  </div>
  <div class='clear'>&nbsp;</div>
  <!--- menu -------> 
  
  <!--- breadcrumb -->
  <div class="grid_12 breadcrumb">
  </div>
  <div class='clear'>&nbsp;</div>
  <!-- breadcrumb end -->
  
  <!-- content area -->
  <div class="grid_12 content">
  
  <div class="grid_12">
  	<h1>Add Book Status</h1>
  </div>
  
  
  
  	<div class="grid_4 top_20 omega">
    	<button class="buttons">Add Book Status</button>
    </div>
    <div class="grid_8 top_20 alpha">&nbsp;</div>
    <div class="clear"></div>
    <div class="grid_12 hide form_area tb_20" align="center">
    	<form name="add_book_status" id="add_book_status" action="" method="post">
        	<div class="grid_5 alpha" align="right">
        		<label for='status'>Book Status <input type="text" name="status" id="status" /></label>
                <div><label for="status" class="error" generated="true"></label></div>                
            </div>
            <div class="grid_7 alpha" align="left">
            	<input type="submit" name="add_status" class="button" id="add_status" value="Add" />
            </div>
        </form>
    </div>
    <div class="clear"></div>
    <hr/>
  </div>
  <!-- content area end -->
  
  <!-- datatable -------->
  <div class="grid_12 top_20">
  <table class="display" cellpadding="0" cellspacing="0" width="100%" id="book_status">
  <thead>
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Name1</th>
    <th scope="col">Name2</th>
    <th scope="col">Name3</th>
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody></tbody>
</table>
</div>
<div class="clear"></div>
  <!-- datatable end --->
  
  <!--- footer ----------->
  <div class="grid_12"> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/config.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/addons.js"></script> 
  </div>
  <div class='clear'>&nbsp;</div>
  <!-- footer end ---> 
  
</div>
<!--------- container end ------>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' media='screen' href='<?php echo base_url('assets/css/demo_table.css'); ?>' /> 
<link href="<?php echo base_url(); ?>assets/css/main.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/start/jquery-ui-1.10.3.custom.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/jquery.toastmessage.css" media="screen" rel="stylesheet" type="text/css" />
<title>Library Management</title>
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
</script>
</head>
<body>
<!-- container start ----------->
<div class="container container_12"> 
  <!--- logo panel ------>
  <div class="grid_12 logo_panel" style="background-color:#008282; vertical-align:middle; text-transform:uppercase; color:#FFF; font-size:24px">
  	<h1 class="top_20">College Library Management System</h1>
  </div>
  <div class='clear'>&nbsp;</div>
  <!--- logo panel end -------> 
  
  <!--- Menu ------>
  <div class="grid_12">
  	<?php $this->load->view('theme/menu'); ?>
  </div>
  <div class='clear'>&nbsp;</div>
  <!--- menu -------> 
  
  <!--- breadcrumb -->
  <div class="grid_12 breadcrumb">
  </div>
  <div class='clear'>&nbsp;</div>
  <!-- breadcrumb end -->
  
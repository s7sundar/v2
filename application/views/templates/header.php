<!DOCTYPE html>
<html>
<head>
<title>::College Library</title>
 <meta charset="utf-8">
 <meta name="description" content="">
 <meta name="author" content="">

 <link rel='stylesheet' media='screen' href='<?php echo base_url('assets/css/demo_table.css'); ?>' /> 
 <link rel='stylesheet' media='screen' href='<?php echo base_url('assets/css/jquery.toastmessage.css'); ?>' /> 
 <link rel='stylesheet' media='screen' href='<?php echo base_url('assets/css/bootstrap.css'); ?>' />
 <link rel='stylesheet' media='screen' href='<?php echo base_url('assets/css/style.css'); ?>' />
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets/js/html5shiv.js');?>"></script>
    <![endif]-->
    <script type="text/javascript">
		var number_of_records_per_page = 10;
		var base_url = '<?php echo base_url(); ?>';
	</script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php $this->load->view('templates/menu'); ?>
        </div>
      </div>
    </div>
 <div class="container" style="background-color:#fff;">
 
 <div class="row">
    <br>
 
 	<div class="span12">
    <div class="span6">
    	Breadcrump comes with backlink. and .
     </div>
     <div class="span5"> 
	     logged in user details
     </div>
    </div>
 </div>
<hr />



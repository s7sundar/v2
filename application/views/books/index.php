<?php $this->load->view('theme/header'); ?>
<!-- content area -->
  <div class="grid_12 content">
  
  
  	<div class="grid_4 top_20 omega">
    	<a href="<?php echo base_url(); ?>index.php/books/add"><button class="buttons1">Add Book</button></a>
    </div>
    <div class="grid_8 top_20 alpha">&nbsp;</div>
    <div class="clear"></div>
    <div class="grid_12 hide form_area tb_20" align="center">
    	<form name="add_book_status" id="add_book_status" action="" method="post">
        	<div class="grid_5 alpha" align="right">
        		<label for='status_name'>Book Status <input type="text" name="status_name" id="status_name" /></label>
                <div><label for="status_name" class="error" generated="true"></label></div>                
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
  <table class="display" cellpadding="0" cellspacing="0" width="100%" id="config">
  <thead>
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Status Name</th>
    <th scope="col">Created Date</th>    
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody></tbody>
</table>
</div>
<?php $this->load->view('theme/footer'); ?>
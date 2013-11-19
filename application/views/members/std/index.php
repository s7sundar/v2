<?php $this->load->view('templates/header'); ?>

 <!-- content area -->
  <div class="grid_12 content">
    
  	<div class="grid_4 top_20 omega">
    	<button class="buttons">Add Book Category</button>
    </div>
    <div class="grid_8 top_20 alpha">&nbsp;</div>
    <div class="clear"></div>
    <div class="grid_12 hide form_area tb_20" align="center">
    	<form name="add_book_cate" id="add_book_cate" action="" method="post">
        	<div class="grid_5 alpha" align="right">
        		<label for='category_name'>Book Category <input type="text" name="category_name" id="category_name" /></label>
                <div><label for="category_name" class="error" generated="true"></label></div>                
            </div>
            <div class="grid_7 alpha" align="left">
	            <input type="image" name="submit"  src="<?php echo base_url(); ?>assets/img/save.gif" id='add_cate'/>
            </div>
        </form>
    </div>
    <div class="clear"></div>
    <hr/>
  </div>
  <!-- content area end -->
  
  <!-- datatable -------->
  <div class="grid_12 top_20">
  <table class="display" cellpadding="0" cellspacing="0" width="100%" id="book_cate">
  <thead>
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Category Name</th>
    <th scope="col">Created Date</th>    
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody></tbody>
</table>
</div>

<?php $this->load->view('templates/footer'); ?>
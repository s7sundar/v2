<?php $this->load->view('theme/header'); ?>
 <!-- content area -->
  <div class="grid_12 content">
  
<!--  <div class="grid_12">
  	<h1>Add Library</h1>
  </div>-->
  
  	<div class="grid_4 top_20 omega">
    	<button class="buttons">Add Library</button>
    </div>
    <div class="grid_8 top_20 alpha">&nbsp;</div>
    <div class="clear"></div>
    <div class="grid_12 hide form_area tb_20" align="center">
    	<form name="add_library" id="add_library" action="" method="post">        
        <table class="pad5" width="100%">
          <tr>
            <td width="5%">&nbsp;</td>
            <td align="right" width="30%">Library Name</td>
            <td align="left" width="30%"><input type="text" name="library_name" id="library_name" /></td>
            <td width="45%"><label for="library_name" class="error" generated="true"></label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Opening Time</td>
            <td align="left"><input type="text" name="open_time" id="open_time" /></td>
            <td><label for="open_time" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Closing Time</td>
            <td align="left"><input type="text" name="close_time" id="close_time" /></td>
            <td><label for="close_time" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Library Location</td>
            <td align="left"><input type="text" name="library_location" id="library_location" /></td>
            <td><label for="library_location" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Person</td>
            <td align="left"><input type="text" name="contact_person" id="contact_person" /></td>
            <td><label for="contact_person" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Email</td>
            <td align="left"><input type="text" name="contact_email" id="contact_email" /></td>
            <td><label for="contact_email" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Number</td>
            <td align="left"><input type="text" name="contact_no" id="contact_no" /></td>
            <td><label for="contact_no" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left">&nbsp;&nbsp;<input type="image" name="submit"  src="<?php echo base_url(); ?>assets/img/save.gif" id='add_new_library'/></td>
            <td>&nbsp;</td>

          </tr>
        </table>
        </form>
    </div>
    <div class="clear"></div>
    <hr/>
  </div>
  <!-- content area end -->
  
  <!-- datatable -------->
  <div class="grid_12 top_20">
  <table class="display" cellpadding="0" cellspacing="0" width="100%" id="library">
  <thead>
  <tr>
    <th scope="col">Library Name</th>
    <th scope="col">Contact Number</th>    
    <th scope="col">Opening Time</th>
    <th scope="col">Closing Time</th>
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody></tbody>
</table>
</div>
<?php $this->load->view('theme/footer'); ?>

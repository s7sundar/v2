<?php $this->load->view('theme/header'); ?>
 <!-- content area -->
  <div class="grid_12 content">
     
  	<div class="grid_4 top_20 omega">
    	<button class="buttons">Add Configurations</button>
    </div>
    
    <div class="grid_8 top_20 alpha">&nbsp;</div>    
    <div class="clear"></div>
    <div class="grid_12 hide form_area tb_20" align="center">
    	<form name="add_configs" id="add_configs" action="" method="post">
          <table class="pad5">
          <tr>
            <td>&nbsp;</td>
            <td align="right">Library Name</td>
            <td align="left"><select name="library_id" id="library_id">
            	<option value=''>--Select--</option>
                <?php 
					$count = count($lib);					
					$selected = ($count==1)?'selected="selected"':'';					
					foreach($lib as $row)
					{
                      echo "<option value='".$row['library_id']."' ".$selected." >".$row['library_name']."</option>";
					}					
				?>
            	</select></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Student Fine Amount</td>
            <td align="left"><input type="text" name="std_fine_amt" id="std_fine_amt" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Staff Fine Amount</td>
            <td align="left"><input type="text" name="staff_fine_amt" id="staff_fine_amt" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left">&nbsp;&nbsp;<input type="image" name="submit"  src="<?php echo base_url(); ?>assets/img/save.gif" id='add_config'/></td>
            <td>&nbsp;</td>
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
  <table class="display" cellpadding="0" cellspacing="0" width="100%" id="config">
  <thead>
  <tr>
    <th scope="col">Library Name</th>
    <th scope="col">Student Fine Amount</th>
    <th scope="col">Staff Fine Amount</th>    
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody></tbody>
</table>
</div>
<?php $this->load->view('theme/footer'); ?>

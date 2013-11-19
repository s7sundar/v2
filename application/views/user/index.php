<?php $this->load->view('theme/header'); ?>
 <!-- content area -->
  <div class="grid_12 content">
     
  	<div class="grid_4 top_20 omega">
    	<button class="buttons">Add User</button>
    </div>
    
    <div class="grid_8 top_20 alpha">&nbsp;</div>    
    <div class="clear"></div>
    <div class="grid_12 hide form_area tb_20" align="center">
    	<form name="add_users" id="add_users" action="" method="post">
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
            <td align="right">User Level</td>
            <td align="left"><select name="user_level" id="user_level">
            	<option value=''>--Select--</option>
                <?php				
                	foreach($levels as $row)
					{
                      echo "<option value='".$row['level_id']."' ".$selected." >".$row['level_name']."</option>";
					}
				?>	             
            	</select></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td align="right">User Name</td>
            <td align="left"><input type="text" name="user_name" id="user_name" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">User Password</td>
            <td align="left"><input type="password" name="user_pass" id="user_pass" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left">&nbsp;&nbsp;<input type="image" name="submit"  src="<?php echo base_url(); ?>assets/img/save.gif" id='add_user'/></td>
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
  <table class="display" cellpadding="0" cellspacing="0" width="100%" id="manage">
  <thead>
  <tr>
    <th scope="col">Library Name</th>
    <th scope="col">User Name</th>
    <th scope="col">Level</th>    
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody></tbody>
</table>
</div>
<?php $this->load->view('theme/footer'); ?>

<?php $this->load->view('theme/header'); ?>
 <!-- content area -->
  <div class="grid_12 content">
  
<!--  <div class="grid_12">
  	<h1>Add Library</h1>
  </div>-->
  
  	<div class="grid_4 top_20 omega">
    	<button class="buttons">Add Department</button>
    </div>
    <div class="grid_8 top_20 alpha">&nbsp;</div>
    <div class="clear"></div>
    <div class="grid_12 hide form_area tb_20" align="center">
    	<form name="add_dept" id="add_dept" action="" method="post">        
        <table class="pad5" width="100%">
          <tr>
            <td width="5%">&nbsp;</td>
            <td align="right" width="30%">Department Name</td>
            <td align="left" width="30%"><input type="text" name="dept_name" id="dept_name" /></td>
            <td width="45%"><label for="dept_name" class="error" generated="true"></label></td>
          </tr>
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
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Location</td>
            <td align="left"><input type="text" name="dept_location" id="dept_location" /></td>
            <td><label for="dept_location" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Student Allocated Books</td>
            <td align="left"><input type="text" name="stud_books_cnt" id="stud_books_cnt" /></td>
            <td><label for="stud_books_cnt" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Student Return Days</td>
            <td align="left"><input type="text" name="stud_renewal_days" id="stud_renewal_days" /></td>
            <td><label for="stud_renewal_days" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Staff Allocated Books</td>
            <td align="left"><input type="text" name="staff_books_cnt" id="staff_books_cnt" /></td>
            <td><label for="staff_books_cnt" class="error" generated="true"></label></td>

          </tr>
          
          
          <tr>
            <td>&nbsp;</td>
            <td align="right">Staff Return Days</td>
            <td align="left"><input type="text" name="staff_renewal_days" id="staff_renewal_days" /></td>
            <td><label for="staff_renewal_days" class="error" generated="true"></label></td>

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
            <td align="left">&nbsp;&nbsp;<input type="image" name="submit"  src="<?php echo base_url(); ?>assets/img/save.gif" id='add_new_dept'/></td>
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
  <table class="display" cellpadding="0" cellspacing="0" width="100%" id="dept">
  <thead>
  <tr>
    <th scope="col">Department Name</th>
    <th scope="col">Library Name</th>
    <th scope="col">Contact Person</th>    
    <th scope="col">Contact Number</th>
    <th scope="col">Actions</th>
  </tr>
  </thead>
  <tbody></tbody>
</table>
</div>
<?php $this->load->view('theme/footer'); ?>

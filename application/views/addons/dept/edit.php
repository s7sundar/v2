<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Configurations</title>
</head>

<body>
<form name="edit_dept" id="edit_dept" action="" method="post">
          <table class="pad5" cellpadding="5" width="100%">
          <tr>
            <td width="5%">&nbsp;</td>
            <td align="right" width="30%">Department Name</td>
            <td align="left" width="30%"><input type="text" name="dept_name" id="dept_name" value="<?php echo $result['dept_name']; ?>" /></td>
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
						if($count!=1)
						{
							$selected = ($row['library_id']==$result['library_id'])?'selected="selected"':'';					
						}
                      echo "<option value='".$row['library_id']."' ".$selected." >".$row['library_name']."</option>";
					}					
				?>
            	</select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Location</td>
            <td align="left"><input type="text" name="dept_location" id="dept_location" value="<?php echo $result['dept_location']; ?>" /></td>
            <td><label for="dept_location" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Student Allocated Books</td>
            <td align="left"><input type="text" name="stud_books_cnt" id="stud_books_cnt"  value="<?php echo $result['stud_books_cnt']; ?>"/></td>
            <td><label for="stud_books_cnt" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Student Return Days</td>
            <td align="left"><input type="text" name="stud_renewal_days" id="stud_renewal_days" value="<?php echo $result['stud_renewal_days']; ?>" /></td>
            <td><label for="stud_renewal_days" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Staff Allocated Books</td>
            <td align="left"><input type="text" name="staff_books_cnt" id="staff_books_cnt" value="<?php echo $result['staff_books_cnt']; ?>" /></td>
            <td><label for="staff_books_cnt" class="error" generated="true"></label></td>

          </tr>
          
          
          <tr>
            <td>&nbsp;</td>
            <td align="right">Staff Return Days</td>
            <td align="left"><input type="text" name="staff_renewal_days" id="staff_renewal_days" value="<?php echo $result['staff_renewal_days']; ?>" /></td>
            <td><label for="staff_renewal_days" class="error" generated="true"></label></td>

          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Person</td>
            <td align="left"><input type="text" name="contact_person" id="contact_person" value="<?php echo $result['contact_person']; ?>" /></td>
            <td><label for="contact_person" class="error" generated="true"></label></td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Email</td>
            <td align="left"><input type="text" name="contact_email" id="contact_email" value="<?php echo $result['contact_email']; ?>" /></td>
            <td><label for="contact_email" class="error" generated="true"></label></td>
          </tr>
          <tr>
            <td><input type="hidden" name="dept_id" id="dept_id" value="<?php echo $result['dept_id']; ?>" /></td>
            <td align="right">Contact Number</td>
            <td align="left"><input type="text" name="contact_no" id="contact_no" value="<?php echo $result['contact_no']; ?>" /></td>
            <td><label for="contact_no" class="error" generated="true"></label></td>

          </tr>
        </table>
        </form>
</body>
</html>
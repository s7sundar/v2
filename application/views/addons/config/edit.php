<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Configurations</title>
</head>

<body>
<form name="edit_configs" id="edit_configs" action="" method="post">
          <table class="pad5" cellpadding="5" width="100%">
          <tr>
            <td>&nbsp;</td>
            <td align="right">Library Name</td>
            <td align="left"><select name="library_id" id="library_id">
            	<option value=''>--Select--</option>
                <?php 
					$count = count($lib);					
					
					foreach($lib as $row)
					{
         				$selected = ($row['library_id']==$result['library_id'])?'selected="selected"':'';					
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
            <td align="left"><input type="text" name="std_fine_amt" id="std_fine_amt" value="<?php echo $result['std_fine_amt']; ?>" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Staff Fine Amount</td>
            <td align="left"><input type="text" name="staff_fine_amt" id="staff_fine_amt" value="<?php echo $result['staff_fine_amt']; ?>" /></td>
            <td><input type="hidden" name="config_id" id="config_id" value="<?php echo $result['id']; ?>" /></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        </form>
</body>
</html>
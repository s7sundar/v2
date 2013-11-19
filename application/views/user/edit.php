<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User</title>
</head>

<body>
<form name="edit_users" id="edit_users" action="" method="post">
		<table class="pad5" cellpadding="5" width="100%">
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
            <td align="right">User Level</td>
            <td align="left"><select name="user_level" id="user_level">
            	<option value=''>--Select--</option>
                <?php				
                	foreach($levels as $row)
					{
					  $selected = ($row['level_id']==$result['user_level'])?'selected="selected"':'';
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
            <td align="left"><input type="text" name="user_name" id="user_name" value="<?php echo $result['user_name']; ?>"/></td>
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
            <td align="left">&nbsp;</td>
            <td><input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id']; ?>" /></td>
            <td>&nbsp;</td>
          </tr>
        </table>        
        </form>
</body>
</html>
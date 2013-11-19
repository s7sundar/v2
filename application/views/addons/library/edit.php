<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Library</title>
</head>
<form name="edit_library" id="edit_library" action="" method="post">        
        <table class="pad5" width="100%" cellpadding="5">
          <tr>
            <td width="5%">&nbsp;</td>
            <td align="right" width="30%">Library Name</td>
            <td align="left" width="30%"><input type="text" name="library_name" id="library_name" value="<?php echo $library_name; ?>" /></td>
            <td width="45%"><label for="library_name" class="error" generated="true"></label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Opening Time</td>
            <td align="left"><input type="text" name="open_time" id="open_time" value="<?php echo $open_time; ?>" /></td>
            <td><label for="open_time" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Closing Time</td>
            <td align="left"><input type="text" name="close_time" id="close_time" value="<?php echo $close_time; ?>" /></td>
            <td><label for="close_time" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Library Location</td>
            <td align="left"><input type="text" name="library_location" id="library_location" value="<?php echo $library_location; ?>" /></td>
            <td><label for="library_location" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Person</td>
            <td align="left"><input type="text" name="contact_person" id="contact_person" value="<?php echo $contact_person; ?>" /></td>
            <td><label for="contact_person" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Email</td>
            <td align="left"><input type="text" name="contact_email" id="contact_email" value="<?php echo $contact_email; ?>" /></td>
            <td><label for="contact_email" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Contact Number</td>
            <td align="left"><input type="text" name="contact_no" id="contact_no" value="<?php echo $contact_no; ?>" /></td>
            <td><label for="contact_no" class="error" generated="true"></label></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left"><input type="hidden" name="library_id" value="<?php echo $library_id; ?>" id="library_id" /></td>
            <td>&nbsp;</td>

          </tr>
        </table>
        </form>
<body>
</body>
</html>
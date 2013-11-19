<form name="edit_book_status" id="edit_book_status" action="" method="post">
  <div class="grid_12 tb_20" align="center">
    <div> <span class="grid_4">
      <label for='status_name'>Book Status</label>
      </span><span class="grid_8">
      <input type="text" name="status_name" id="edit_status_name" value="<?php echo $result['status_name']; ?>" />
            <input type="hidden" name="status_id" id="edit_status_id" value="<?php echo $result['status_id']; ?>" />
      </span> </div>
    <p>
      <label for="status_name" class="error" generated="true"></label>
    </p>
  </div>
</form>

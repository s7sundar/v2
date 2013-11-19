<form name="edit_book_cate" id="edit_book_cate" action="" method="post">
  <div class="grid_12 tb_20" align="center">
    <div> <span class="grid_4">
      <label for='category_name'>Book Catgeory</label>
      </span><span class="grid_8">
      <input type="text" name="edit_category_name" id="edit_category_name" value="<?php echo $result['category_name']; ?>" />
            <input type="hidden" name="edit_cate_id" id="edit_cate_id" value="<?php echo $result['cate_id']; ?>" />
      </span> </div>
    <p>
      <label for="edit_category_name" class="error" generated="true"></label>
    </p>
  </div>
</form>

<div class="modal fade" id="profilePicModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Profile Picture</h4>
      </div>
      <div class="modal-body">
        <div class='alert alert-danger' id="errorDiv" role='alert'>
        </div>
        <form enctype="multipart/form-data" action="" method="post" id="profile_pic_form">
          <div class="form-group">
            <label for="change_picture">New Profile Image</label>
            <input type="file" accept="image/*" id="change_picture" name="change_picture">
            <p class="help-block">Please Select a New Profile Image</p>
          </div>
          <input type="hidden" name="token" value="<?php echo Token::generate();?>">
          <button type="submit" class="btn btn-primary entireWidth">Change Picture</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
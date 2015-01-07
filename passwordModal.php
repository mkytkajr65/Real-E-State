<?php $token = Token::generate();
?>
<div class="modal fade" id="passwordModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
        <div class='alert alert-danger' id="errorDiv" role='alert'>
        </div>
        <form action="" method="post" id="confirm_password">
          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter your password">
          </div>
          <input type="hidden" name="token" value="<?php echo $token; ?>" >
          <button type="submit" class="btn btn-primary entireWidth coolButton">Confirm</button>
        </form>
        <form action="" method="post" id="change_password" class="hideObj">
          <div class="form-group">
            <label for="password">Enter New Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your new password">
          </div>
          <div class="form-group">
            <label for="password_again">Enter Password Again</label>
            <input type="password" class="form-control" name="password_again" id="password_again" placeholder="Enter password again">
          </div>
          <input type="hidden" name="token" value="<?php echo $token; ?>" >
          <button type="submit" class="btn btn-primary entireWidth coolButton">Change Password</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
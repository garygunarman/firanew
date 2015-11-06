<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - ACCOUNT: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>


<form method="post" autocomplete="off">
  <div class="subnav">
    <div class="container clearfix">
      <h1><span class="glyphicon glyphicon-user"></span> &nbsp; Account</h1>
      <div class="btn-placeholder">
        <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit" onclick="validationAdminAccount()">
        <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-account" id="btn-submit">
      </div>
    </div>
  </div>
  
  <?php
  show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
  ?>

  <div class="container main">
    <div class="box row">
      <div class="desc col-xs-3">
        <h3>Account Details</h3>
        <p>Basic details of your account.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row hidden" id="id-row-role">
            <label class="control-label col-xs-3" for="role">Role <span>*</span></label>
            <div class="col-xs-9">
              <select class="form-control" id="id-role" name="role" disabled="disabled">
                <option value="super admin">Super Admin</option>
              </select>
            </div>
          </li>
          <li class="form-group row" id="id-row-username">
            <label class="control-label col-xs-3" for="username">Username <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-username" name="username" value="<?php echo $accounts->username?>">
            </div>
          </li>
          <li class="form-group row" id="id-row-email">
            <label class="control-label col-xs-3" for="username">Email <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-email" name="email" value="<?php echo $accounts->email?>">
            </div>
          </li>
          <li class="form-group row" id="id-row-old">
            <label class="control-label col-xs-3" for="old-password">Old Password </label>
            <div class="col-xs-9">
              <input type="password" class="form-control" id="id-old" name="old">
            </div>
          </li>
          <li class="form-group row" id="id-row-new">
            <label class="control-label col-xs-3" for="new-password">New Password </label>
            <div class="col-xs-9">
              <input type="password" class="form-control" id="id-new" name="new">
            </div>
          </li>
          <li class="form-group row" id="id-row-confirm">
            <label class="control-label col-xs-3" for="r_new-password">Retype New Password </label>
            <div class="col-xs-9">
              <input type="password" class="form-control" id="id-confirm" name="confirm">
            </div>
          </li>
        </ul>
      </div>
    </div><!--.box-->

  </div><!--.container.main-->
            
</form>

<script src="<?php echo BASE_URL;?>script/settings-accounts.js"></script>
<script>

$(document).ready(function(e) {
   activeNAvbar('settings');
});
</script>
            
<?php
/*
# ----------------------------------------------------------------------
# RECOVER PASSWORD: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>

<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
?>


          <form method="post">
            <div class="container main <?php echo $class_hidden;?>">
              <div class="box row login">
                <div class="navbar-login clearfix">
                  <div class="navbar-brand"><img src="<?php echo BASE_URL.'static/thimthumb.php?src='.$_global_general->logo.'&w=40&h=40&q=80';?>" alt="logo"></div>
                    <h1><?php echo $_global_general->website_title;?> Admin</h1>
                  </div>
                  <div class="content">
                    <ul class="form-set clearfix">
                      <p class="m_b_15">Reset password for <strong><?php echo $data->admin_username;?></strong></p>
                      <li class="form-group row" id="id-row-password">
                        <label class="col-xs-4 control-label">New Password</label>
                        <div class="col-xs-8">
                          <input type="password" class="form-control" style="width: 100%" id="id-password" name="password">
                        </div>
                      </li>
                      <li class="form-group row" id="id-row-repassword">
                        <label class="col-xs-4 control-label">Retype Password</label>
                        <div class="col-xs-8">
                          <input type="password" class="form-control" autocomplete="off" style="width: 100%" id="id-repassword" name="repassword">
                        </div>
                      </li>
                      <li class="btn-placeholder m_b_15">
                        <a href="<?php echo BASE_URL;?>"><input type="button" class="btn btn-default btn-sm" value="Back"></a>
                        <input type="button" class="btn btn-success btn-sm" value="Reset Password" id="btn-alias-submit">
                        <input type="submit" class="btn btn-success btn-sm hidden" value="Reset Password" id="btn-submit" name="btn-admin-recover">
                      </li>
                    </ul>
                  </div><!--.content-->
                </div><!--.box.row-->
              </div><!--.container.main-->           
            </form>


<script type="text/javascript" src="<?php echo BASE_URL;?>script/recover-password.js"></script>        
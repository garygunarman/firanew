<?php
/*
# ----------------------------------------------------------------------
# FORGOT PASSWORD: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>


<?php
show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
?>

          <form method="post" enctype="multipart/form-data">  
            <div class="container main">
              <div class="box row login">
                <div class="navbar-login clearfix">
                  <div class="navbar-brand"><img src="<?php echo BASE_URL.'static/thimthumb.php?src='.$_global_general->logo.'&w=40&h=40&q=80';?>" alt="logo"></div>
                  <h1><?php echo $_global_general->website_title;?> Admin</h1>
                </div>
                
                <div class="content">
                  <ul class="form-set clearfix">
                    <p class="m_b_15">Forgot your password? Write down your username below and we'll send the instructions to reset your password.</p>
                      <li class="form-group row" id="id-row-username">
                        <label class="col-xs-3 control-label">Username</label>
                        <div class="col-xs-9">
                          <input type="text" class="form-control" autocomplete="off" style="width: 100%" name="username" id="id-username">
                        </div>
                      </li>
                      <li class="btn-placeholder m_b_15">
                        <a href="<?php echo BASE_URL;?>"><input type="button" class="btn btn-default btn-sm" value="Back"></a>
                        <input type="button" class="btn btn-success btn-sm" value="Submit" id="btn-alias-submit">
                        <input type="submit" class="btn btn-success btn-sm hidden" value="Submit" name="btn-admin-forgot" id="btn-submit">
                      </li>
                    </ul>
                  </div><!--.content-->
                </div><!--.box.row-->
              </div><!--.container.main-->           
            </form>

<script type="text/javascript" src="<?php echo BASE_URL;?>script/forgot-password.js"></script>

        
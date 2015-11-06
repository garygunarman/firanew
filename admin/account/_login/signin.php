<?php
/*
# ----------------------------------------------------------------------
# LOGIN: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');

show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
?>

          <form method="post" enctype="multipart/form-data"> 
            <div class="container main">
              <div class="box row login">
                <div class="navbar-login clearfix">
                  <div class="navbar-brand">
                    <img src="<?php echo BASE_URL;?>files/common/logo.png" alt="logo" class="hidden">
                    <img src="<?php echo BASE_URL.'static/thimthumb.php?src='.$_global_general->logo.'&w=40&h=40&q=80';?>" class="">
                  </div>
                  <h1><?php echo $_global_general->website_title;?> Admin</h1>
                </div>
                
                <div class="content">
                  <ul class="form-set clearfix">
                    <li class="form-group row" id="id-row-username">
                      <label class="col-xs-3 control-label">Username</label>
                      <div class="col-xs-9">
                        <input type="text" class="form-control" autocomplete="off" name="username" id="id-username">
                      </div>
                    </li>
                    
                    <li class="form-group row" id="id-row-password">
                      <label class="col-xs-3 control-label">Password</label>
                      <div class="col-xs-9">
                        <input type="password" class="form-control" autocomplete="off" name="password" id="id-password">
                      </div>
                    </li>
                    
                    <li class="btn-placeholder m_b_15">
                    
					  <?php
					  echo '<a class="m_r_15" href="'.BASE_URL.'forgot-password">Forgotten your password?</a>';
					  ?>
                      
                      <input type="button" class="btn btn-success btn-sm" value="Sign In" id="btn-alias-login">
                      <input type="submit" class="btn btn-success btn-sm hidden" value="Sign In" name="btn-admin-login" id="btn-login">
                    </li>
                  </ul>
                </div><!--.content-->
              </div><!--.box.row-->
            </div><!--.container.main-->  
          </form>
          
		  <script type="text/javascript" src="<?php echo BASE_URL?>/script/login.js"></script>

        
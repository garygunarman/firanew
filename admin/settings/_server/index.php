<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - NOTIFICATIONS: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>

<form method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="subnav">
    <div class="container clearfix">
      <h1><span class="glyphicon glyphicon-comment"></span> &nbsp; Server Information</h1>
      <div class="btn-placeholder hidden">
        <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
        <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-notification" id="btn-submit">
      </div>
    </div>
  </div>
  
  <?php
  show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
  ?>
  
  <div class="container main">
    <div class="box row">
      <div class="desc col-xs-3">
        <h3>Server Details</h3>
        <p>General server information.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row" id="id-row-order">
            <label class="control-label col-xs-3" for="">PHP Version <span>*</span></label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo phpversion();?></p>
            </div>
          </li>
          <li class="form-group row" id="id-row-warehouse">
            <label class="control-label col-xs-3" for="">MySQL Version</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo $mysqli->server_info;?></p>
            </div>
          </li>
          <li class="form-group row" id="id-row-warehouse">
            <label class="control-label col-xs-3" for="">Apache Version</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo $_SERVER['SERVER_SOFTWARE'];?></p>
            </div>
          </li>
        </ul>
      </div>
    </div><!--.box-->
    
    
    <div class="box row">
      <div class="desc col-xs-3">
        <h3>File</h3>
        <p>File handling information.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Upload Max Filesize</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo $ini_max_upload;?></p>
              <p class="help-block">Size of one $_POST</p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Post Max Size</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo $ini_max_post;?></p>
              <p class="help-block">Total size of $_POST.</p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Memory Limit</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo $ini_max_memory_limit;?></p>
              <p class="help-block">Memory allocated for handling script.</p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Maximum element</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo price(1, $ini_max_input_vars);?></p>
              <p class="help-block">Maximum total $_POST</p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Maximum File Uploads</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo $ini_max_file_uploads;?></p>
              <p class="help-block">Maximum total $_FILES</p>
            </div>
          </li>
        </ul>
      </div>
    </div><!--.box-->
    
    
    <div class="box row">
      <div class="desc col-xs-3">
        <h3>Directory</h3>
        <p>File images directory permission.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Timthumb Directory</label>
            <div class="col-xs-5">
              <p class="control-label"><?php echo substr(sprintf('%o', fileperms('static/')), -3);?></p>
              <p class="help-block"><?php echo BASE_URL.'static/';?></p>
            </div>
            
			<?php
            /* --- CONTROL --- */
			$set_timthumb = substr(sprintf('%o', fileperms('static/')), -3);
			
			$owner  = substr(substr($set_timthumb, -3), 0, 1);
			$group  = substr(substr($set_timthumb, -2), 0, 1);
			$global = substr($set_timthumb, -1);
			
			//if(chmod('static/', octdec(755))){
			?>
            <!--
            <div class="col-xs-4">
              <div class="row">
                <div class="col-xs-3">
                  <select class="form-control">
                    <option value="5" <?php if($owner == 5){ echo 'selected="selected"';}?>>5</option>
                    <option value="6" <?php if($owner == 6){ echo 'selected="selected"';}?>>6</option>
                    <option value="7" <?php if($owner == 7){ echo 'selected="selected"';}?>>7</option>
                  </select>
                </div>
                <div class="col-xs-3">
                  <select class="form-control">
                    <option value="5" <?php if($group == 5){ echo 'selected="selected"';}?>>5</option>
                    <option value="6" <?php if($group == 6){ echo 'selected="selected"';}?>>6</option>
                    <option value="7" <?php if($group == 7){ echo 'selected="selected"';}?>>7</option>
                  </select>
                </div>
                <div class="col-xs-3">
                  <select class="form-control">
                    <option value="5" <?php if($global == 5){ echo 'selected="selected"';}?>>5</option>
                    <option value="6" <?php if($global == 6){ echo 'selected="selected"';}?>>6</option>
                    <option value="7" <?php if($global == 7){ echo 'selected="selected"';}?>>7</option>
                  </select>
                </div>
                <div class="col-xs-3">
                  <input type="button" class="btn btn-success btn-sm" value="GO" />
                </div>
              </div>
            </div>
            -->
			<?php
			//}
			?>
            
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Banner Directory</label>
            <div class="col-xs-5">
              <p class="control-label"><?php echo substr(sprintf('%o', fileperms('../files/uploads/slideshow')), -3);?></p>
              <p class="help-block"><?php echo $_global_general->url.'/files/uploads/slideshow/';?></p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Product Directory</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo substr(sprintf('%o', fileperms('../files/uploads/product_image')), -3);?></p>
              <p class="help-block"><?php echo $_global_general->url.'/files/uploads/product_image/';?></p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Color Directory</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo substr(sprintf('%o', fileperms('../files/uploads/color_image')), -3);?></p>
              <p class="help-block"><?php echo $_global_general->url.'/files/uploads/color_image/';?></p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">News Directory</label>
            <div class="col-xs-9">
              <p class="control-label"><?php echo substr(sprintf('%o', fileperms('../files/uploads/news-image')), -3);?></p>
              <p class="help-block"><?php echo $_global_general->url.'/files/uploads/news-image/';?></p>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Error Reporting</label>
            <div class="col-xs-9">
              <label class="radio-inline control-label">
                <input type="radio" value="Active" name="active_status" id="id-active">
                Yes
              </label>
              <label class="radio-inline control-label">
                <input type="radio" value="Active" name="active_status" id="id-active-inactive" checked="checked">
                No
              </label>
            </div>
          </li>
          <li class="form-group row">
            <label class="control-label col-xs-3" for="">Error Log</label>
            <div class="col-xs-9">
              <pre style="height:250px; overflow:auto;">
                <?php
                $error_log = file_get_contents(BASE_URL.'/static/_log/error-log.txt');
				echo $error_log;
				?>
              </pre>
              <div class="btn-placeholder">
                <a href="<?php echo BASE_URL;?>/settings/_server/_download.php">
                  <button type="button" ="Download" class="btn btn-success btn-sm">Download</button>
                </a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div><!--.box-->
  </div><!--.container.main-->
</form>

<script src="<?php echo BASE_URL;?>script/settings-notifications.js"></script>
            
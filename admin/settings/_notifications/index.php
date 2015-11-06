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
      <h1><span class="glyphicon glyphicon-comment"></span> &nbsp; Notifications</h1>
      <div class="btn-placeholder">
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
        <h3>Notification Details</h3>
        <p>Details on your admin panel notifications.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row" id="id-row-order">
            <label class="control-label col-xs-3" for="">Order Email <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-order" name="order" value="<?php echo $notification->email_order;?>">
              <p class="help-block">Email to receive order notifications from customers.</p>
            </div>
          </li>
          <li class="form-group row" id="id-row-warehouse">
            <label class="control-label col-xs-3" for="">Warehouse Email <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-warehouse" name="warehouse" value="<?php echo $notification->email_warehouse;?>">
              <p class="help-block">Email to receive delivery order from admin.</p>
            </div>
          </li>
          <li class="form-group row" id="id-row-security">
            <label class="control-label col-xs-3" for="">Security Email <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-security" name="security" value="<?php echo $notification->email_security;?>">
              <p class="help-block">Email to receive security issue (e.g: forgot password).</p>
            </div>
          </li>
          <li class="form-group row image-placeholder input-file" style="position:relative; z-index:1;">
            <label class="control-label col-xs-3">Email logo</label>
              <div class="col-xs-9">
                <div class="row">
                  <div class="col-xs-3">
                    <div class="img img-email-logo" id="newer-1">
                      <div id="remove-news-1">
                        <div class="image-delete hidden" id="btn-slider-1">
                          <span class="glyphicon glyphicon-remove"></span>
                        </div>
                      <div class="image-overlay"></div>
                    </div>
                    <img class="" id="upload-cover-1" src="<?php echo BASE_URL.'static/thimthumb.php?src='.$_global_notification->email_logo.'&h=50&w=50&q=100';?>" />
                    <div id="img_replacer">
                      <input type="file" name="email_logo" id="cover-1" onchange="readURLCover(this,'1')" class="hidden" disabled="disabled"/>
                    </div><!--img_replacer-->
                    <input type="checkbox" name="cover-delete" id="id-cover-delete" value="1" class="hidden">
                  </div>
                </div>
              </div>
              <p class="help-block">Recommended dimensions of 50 x 50 px.</p>
            </div>
          </li>
        </ul>
      </div>
    </div><!--.box-->
  </div><!--.container.main-->
            
</form>

<script src="<?php echo BASE_URL;?>script/settings-notifications.js"></script>
            
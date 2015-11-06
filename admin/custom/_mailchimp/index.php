<?php
/*
# ----------------------------------------------------------------------
# MAILCHIMP: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>

<form method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="subnav">
    <div class="container clearfix">
      <h1><span class="glyphicon glyphicon-comment"></span> &nbsp; Mailchimp</h1>
      <div class="btn-placeholder">
        <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
        <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-mailchimp" id="btn-submit">
      </div>
    </div>
  </div>
  
  <?php
  show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
  ?>
  
  <div class="container main">
    <div class="box row">
      <div class="desc col-xs-3">
        <h3>Mailchimp Details</h3>
        <p>Details on your admin panel mailchimp.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row" id="id-row-key">
            <label class="control-label col-xs-3" for="">Access Key <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-key" name="key" value="<?php echo $data->mailchimp_key;?>">
              <p class="help-block">API Key from http://admin.mailchimp.com/account/api/</p>
            </div>
          </li>
          <li class="form-group row" id="id-row-list">
            <label class="control-label col-xs-3" for="">List ID <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-list" name="list" value="<?php echo $data->mailchimp_list;?>">
              <p class="help-block">List's Unique Id by going to http://admin.mailchimp.com/lists/</p>
            </div>
          </li>
        </ul>
      </div>
    </div><!--.box-->
      
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Mailchimp Status</h3>
          <p>Your mailchimp service status.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set" id="id-row-active">
            <li class="form-group row" id="id-row-active">
              <label class="control-label col-xs-3">Change Status</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="1" name="status" id="id-active" <?php if($data->status == '1'){ echo 'checked="checked"';};?>>
                  Active
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="0" name="status" id="id-inactive" <?php if($data->status == '0'){ echo 'checked="checked"';};?>>
                  Inactive
                </label>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
  </div><!--.container.main-->
</form>

<script src="<?php echo BASE_URL;?>custom/script/mailchimp.js"></script>
            
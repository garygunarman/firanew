<?php
/*
# ----------------------------------------------------------------------
# AJAX: PAYMENT
# ----------------------------------------------------------------------
*/


if($_POST){
   
   require_once('../../../../../../static/_header.php');
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
	  
	  function count_payment($api_id){
	     $sql    = "SELECT COUNT(*) AS rows FROM tbl_paypal WHERE `api_id` = '$api_id'";
	     $query  = $this->conn->query($sql);
	     $result = $query->fetch_object();
	  
	     return $result;
	  }
	  
	  
	  function get_payment($api_id){
	     $sql    = "SELECT * FROM tbl_paypal WHERE `api_id` = '$api_id'";
	     $query  = $this->conn->query($sql);
	     $result = $query->fetch_object();
	  
	     return $result;
	  }
	  
   }
   
   $_ajax = new AJAX();
   
   $ajx_id = filter_var($_POST['bank'], FILTER_SANITIZE_STRING);
   
   $count = $_ajax->count_payment(1);
   
   if($count->rows > 0){
      $bank  = $_ajax->get_payment(1);
	  
      $api_mode       = $bank->api_mode;
	  $api_username   = $bank->api_username;
	  $api_password   = $bank->api_password;
	  $api_signature  = $bank->api_signature;
	  $api_return_url = $bank->api_return_url;
	  $api_cancel_url = $bank->api_cancel_url;
	  $api_status     = $bank->api_status;
   }else{
      $api_mode       = '';
	  $api_username   = '';
	  $api_password   = '';
	  $api_signature  = '';
	  $api_return_url = '';
	  $api_cancel_url = '';
	  $api_status     = 0;
   }
}


?>


<li class="form-group row" id="id-row-mode">
  <label class="control-label col-xs-3" for="">Mode</label>
  <div class="col-xs-9">
    <select class="form-control" name="mode" id="id-mode">
      <option value="sandbox" <?php if($api_mode == 'sandbox'){echo 'selected="selected"';};?>>Sandbox</option>
      <option value="live" <?php if($api_mode == 'live'){echo 'selected="selected"';};?>>Live</option>
    </select>
  </div>
</li>

<li class="form-group row" id="id-row-name">
  <label class="control-label col-xs-3" for="">API Username</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-name" name="name" value="<?php echo $api_username;?>">
  </div>
</li>

<li class="form-group row" id="id-row-number">
  <label class="control-label col-xs-3" for="">API Password</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-number" name="number" value="<?php echo $api_password;?>">
  </div>
</li>

<li class="form-group row" id="id-row-account">
  <label class="control-label col-xs-3" for="">API Signature</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-account" name="account" value="<?php echo $api_signature;?>">
  </div>
</li>

<li class="form-group row" id="id-row-return">
  <label class="control-label col-xs-3" for="">Return URL</label>
  <div class="col-xs-9">
    <label class="control-label" for="" style="color:#000; font-weight:bold;"><?php echo $_global_general->url.'/control-paypal/[order number]';?></label>
    <div class="col-xs-9 hidden">
      <input type="text" class="form-control" id="id-return" name="return" value="<?php echo $api_return_url;?>">
    </div>
    <p class="help-block">* Need manually configure</p>
  </div>
</li>

<li class="form-group row" id="id-row-cancel">
  <label class="control-label col-xs-3" for="">Cancel URL</label>
  <div class="col-xs-9">
    <label class="control-label" for="" style="color:#000; font-weight:bold;"><?php echo $_global_general->url.'/bag-paypal-[order number]/token-[generated token]';?></label>
    <div class="col-xs-9 hidden">
      <input type="text" class="form-control" id="id-cancel" name="cancel" value="<?php echo $api_return_url;?>">
    </div>
    <p class="help-block">* Need manually configure</p>
  </div>
</li>

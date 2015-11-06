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
	  
	  function count_payment($id){
	     $sql    = "SELECT COUNT(*) AS rows FROM tbl_veritrans WHERE `id` = '$id'";
	     $query  = $this->conn->query($sql);
	     $result = $query->fetch_object();
	  
	     return $result;
	  }
	  
	  
	  function get_payment($id){
	     $sql    = "SELECT * FROM tbl_veritrans WHERE `id` = '$id'";
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
   }else{
      $bank->live_code    = '';
	  $bank->sandbox_code = '';
	  $bank->environment  = 0;
	  $bank->_3dsecure    = 0;
   }
}


?>


<li class="form-group row" id="id-row-status">
  <label class="control-label col-xs-3">Change Status</label>
  <div class="col-xs-9">
    <label class="radio-inline control-label">
      <input type="radio" value="1" name="status" id="id-active" <?php if($bank->status == 1){ echo 'checked="checked"';}?> />Active
    </label>
    <label class="radio-inline control-label">
      <input type="radio" value="0" name="status" id="id-inactive" <?php if($bank->status == 0){ echo 'checked="checked"';}?>>Inactive
    </label>
  </div>
</li>
<li class="form-group row" id="id-row-live">
  <label class="control-label col-xs-3" for="">Server Key</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-live" name="live" value="<?php echo $bank->live_code;?>">
    <p class="help-block">Server key for production server</p>
  </div>
</li>
<li class="form-group row" id="id-row-sandbox">
  <label class="control-label col-xs-3" for="">Server Key (Sandbox)</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-sandbox" name="sandbox" value="<?php echo $bank->sandbox_code;?>">
    <p class="help-block">Server key for development server</p>
  </div>
</li>
<li class="form-group row" id="id-row-environment">
  <label class="control-label col-xs-3" for="">Environment</label>
  <div class="col-xs-9">
    <select class="form-control"  id="id-environment" name="environment">
      <option value="0" <?php if($bank->environment == 0){ echo 'selected="selected"';}?>>Development</option>
      <option value="1" <?php if($bank->environment == 1){ echo 'selected="selected"';}?>>Production</option>
    </select>
  </div>
</li>
<li class="form-group row" id="id-row-secure">
  <label class="control-label col-xs-3" for="">3D Secure</label>
  <div class="col-xs-9">
    <select class="form-control" id="id-secure" name="secure">
      <option value="0" <?php if($bank->_3dsecure == 0){ echo 'selected="selected"';}?>>No</option>
      <option value="1" <?php if($bank->_3dsecure == 1){ echo 'selected="selected"';}?>>Yes</option>
    </select>
  </div>
</li>

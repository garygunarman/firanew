<?php
/*
# ----------------------------------------------------------------------
# AJAX: PAYMENT
# ----------------------------------------------------------------------
*/


if($_POST){
   
   require_once('../../../static/_header.php');
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
	  
	  function get_payment($post_payment_id){
	     $sql    = "SELECT * FROM tbl_account WHERE id = '$post_payment_id'";
	     $query  = $this->conn->query($sql);
	    $result = $query->fetch_object();
	  
	     return $result;
	  }
	  
   }
   
   $_ajax = new AJAX();
   
   $ajx_id = filter_var($_POST['bank'], FILTER_SANITIZE_STRING);
   
   $bank = $_ajax->get_payment($ajx_id);
}


if(is_numeric($ajx_id)){
?>

<li class="form-group row" id="id-row-name">
  <label class="control-label col-xs-3" for="">Bank Name</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-name" name="name" value="<?php echo $bank->account_bank;?>">
    <p class="help-block">The name of the bank, e.g. BCA, Mandiri</p>
  </div>
</li>

<li class="form-group row" id="id-row-number">
  <label class="control-label col-xs-3" for="">Bank Account No.</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-number" name="number" value="<?php echo $bank->account_number;?>">
      <p class="help-block">The account no. of the account, e.g. 60406xxxxx</p>
  </div>
</li>

<li class="form-group row" id="id-row-account">
  <label class="control-label col-xs-3" for="">Bank Account Name</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-account" name="account" value="<?php echo $bank->account_name;?>">
    <p class="help-block">The name on the bank account, e.g. John Doe</p>
  </div>
</li>

<input type="hidden" name="account_id" value="<?php echo $bank->id?>">

<?php
}else{
   
   /* --- BANK TRANSFER --- */
   if($ajx_id == 'bank'){
   
?>

<li class="form-group row" id="id-row-name">
  <label class="control-label col-xs-3" for="">Bank Name</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-name" name="name">
    <p class="help-block">The name of the bank, e.g. BCA, Mandiri</p>
  </div>
</li>

<li class="form-group row" id="id-row-number">
  <label class="control-label col-xs-3" for="">Bank Account No.</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-number" name="number">
    <p class="help-block">The account no. of the account, e.g. 60406xxxxx</p>
  </div>
</li>

<li class="form-group row" id="id-row-account">
  <label class="control-label col-xs-3" for="">Bank Account Name</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-account" name="account">
    <p class="help-block">The name on the bank account, e.g. John Doe</p>
  </div>
</li>

<input type="hidden" name="account_id" value="new">

<?php
   
   /* --- PAYPAL --- */
   }else if($ajx_id == 'paypal'){
?>

<li class="form-group row" id="id-row-mode">
  <label class="control-label col-xs-3" for="">Mode</label>
  <div class="col-xs-9">
    <select class="form-control" name="mode" id="id-mode">
      <option value="sandbox">Development</option>
      <option value="production">Live</option>
    </select>
  </div>
</li>

<li class="form-group row" id="id-row-name">
  <label class="control-label col-xs-3" for="">API Username</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-name" name="name">
  </div>
</li>

<li class="form-group row" id="id-row-number">
  <label class="control-label col-xs-3" for="">API Password</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-number" name="number">
  </div>
</li>

<li class="form-group row" id="id-row-account">
  <label class="control-label col-xs-3" for="">API Signature</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-account" name="account">
  </div>
</li>

<li class="form-group row" id="id-row-return">
  <label class="control-label col-xs-3" for="">Return URL</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-return" name="return">
    <p class="help-block">*Please provide url that pointing into process.php</p>
  </div>
</li>

<li class="form-group row" id="id-row-cancel">
  <label class="control-label col-xs-3" for="">Cancel URL</label>
  <div class="col-xs-9">
    <input type="text" class="form-control" id="id-cancel" name="cancel">
  </div>
</li>

<input type="hidden" name="account_id" value="new">

<?php   
   
   /* --- CREDIT CARD: VERITRANS --- */
   }else if($ajx_id == 'cc'){
      //safe_redirect('payment-veritrans');
   }
   
}
?>

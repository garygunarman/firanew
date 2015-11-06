<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - PAYMENT: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>

<form method="post" autocomplete="off">
  <div class="subnav">
    <div class="container clearfix">
      <h1><span class="glyphicon glyphicon-usd"></span> &nbsp; Payment</h1>
      <div class="btn-placeholder">
        <input type="submit" class="btn btn-danger btn-sm hidden" value="Delete" name="btn-payment" id="btn-delete">
        <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
        <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-payment" id="btn-submit">
      </div>
    </div>
  </div>
  
  <?php
  show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
  ?>

  <div class="container main">

    <div class="box row">
      <div class="desc col-xs-3">
        <h3>Transfer Payment Details</h3>
        <p>Details for your transfer payment method for customers.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row" id="id-row-method">
            <label class="control-label col-xs-3">Payment Method Name</label>
            <div class="col-xs-9">
              <select class="form-control" id="id-method" name="method" onchange="ajaxGet()">
                <option value="bank">Bank Transfer</option>
                
				<?php
                foreach($payment_bank as $payment){
				   echo '<option value="'.$payment->id.'"> -- '.$payment->account_bank.' ('.$payment->account_name.' - Account Number: '.$payment->account_number.')</option>';
				}
				?>
                
                
                <option value="paypal">Pay Pal (Express Checkout)</option>
                <!--<option value="cc">Credit Card (via: Veritrans)</option>-->
              </select>
            </div>
          </li>
          
          <div id="ajax-loader"></div>
          
        </ul>
      </div>
    </div><!--.box-->
  </div><!--.container.main-->
</form>


<script src="<?php echo BASE_URL;?>script/settings-payment.js"></script>
<script>
$(document).ready(function(e) {
   activeNAvbar('settings');
   ajaxGet();
   
   $('#btn-alias-submit').on('click', function(){
      validation();
   });
   
   $('#id-method').change(function(){
      ajaxGet();
   });
});
</script>
            
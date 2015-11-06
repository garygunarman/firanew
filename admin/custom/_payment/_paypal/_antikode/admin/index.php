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
      <h1><span class="glyphicon glyphicon-usd"></span> &nbsp; Paypal</h1>
      <div class="btn-placeholder">
        <?php
        if($payments->rows > 0){
		   echo '<input type="submit" class="btn btn-danger btn-sm" value="Delete" name="btn-payment" id="btn-delete">';
		}
		?>
        
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
        <h3>Paypal Setting</h3>
        <p>Details for your paypal payment.</p>
      </div>
      <div class="content col-xs-9">
        <ul class="form-set">
          <li class="form-group row" id="id-row-method">
            <label class="control-label col-xs-3">Payment Method Name</label>
            <div class="col-xs-9">
              <select class="form-control hidden" id="id-method" name="method" onchange="ajaxGet()">
                <option value="paypal">Paypal</option>
              </select>
              <p class="control-label">Paypal</p>
            </div>
          </li>
          
          <div id="ajax-loader"></div>
          
        </ul>
      </div>
    </div><!--.box-->
      
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Paypal Status</h3>
          <p>Your paypal status.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set" id="id-row-active">
            <li class="form-group row" id="id-row-active">
              <label class="control-label col-xs-3">Change Status</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="1" name="status" id="id-active" <?php if($payment_status == 1){ echo 'checked="checked"';}?>>
                  Active
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="0" name="status" id="id-inactive" <?php if($payment_status == 0){ echo 'checked="checked"';}?>>
                  Inactive
                </label>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
  </div><!--.container.main-->
</form>


<script src="<?php echo BASE_URL;?>custom/script/paypal.js"></script>
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
            
<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - PAYMENT: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new PAYMENT_GET();
$_update = new PAYMENT_UPDATE();


$payments = $_get->get_payments();

$payment_bank = $_get->get_payment('bank');


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-payment']) && $_POST['btn-payment'] == 'Save Changes'){
	
   $payment_id     = filter_var($_POST['account_id'], FILTER_SANITIZE_STRING);
   $type           = filter_var($_POST['method'], FILTER_SANITIZE_STRING);
   $payment_bank   = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $payment_number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
   $payment_name   = filter_var($_POST['account'], FILTER_SANITIZE_STRING);
   
   
   if($payment_id == 'new'){
      $_update->insert_account($type, $payment_bank, $payment_number, $payment_name);
   
      $type = 'success';
      $msg  = 'New payment method successfully saved';
   }else{
      
      $_update->update_account($payment_bank, $payment_number, $payment_name, $payment_id);
   
      $type = 'success';
      $msg  = 'Changes successfully saved.';
   }
   
   $page = 'payment';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}


if(isset($_POST['btn-payment']) && $_POST['btn-payment'] == 'Delete'){
	
   $payment_id     = filter_var($_POST['account_id'], FILTER_SANITIZE_STRING);
   
   $_update->delete_account($payment_id);
   
   
   $type = 'success';
   $msg  = 'Successfully delete payment method.';
   
   
   $page = 'payment';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
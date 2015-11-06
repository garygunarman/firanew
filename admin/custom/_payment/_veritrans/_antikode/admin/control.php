<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - PAYMENT: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new PAYMENT_GET();
$_update = new PAYMENT_UPDATE();


$payments = $_get->count_payment(1);

if($payments->rows > 0){
   $payment_bank = $_get->get_payment(1);
}else{
   $payment_bank->id           = '';
   /*
   $payment_bank->live_code    = '';
   $payment_bank->sandbox_code = '';
   $payment_bank->environment  = '';
   $payment_bank->_3dsecure    = '';
   $payment_bank->status       = '';
   */
}


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-payment']) && $_POST['btn-payment'] == 'Save Changes'){
   
   $live_code    = filter_var($_POST['live'], FILTER_SANITIZE_STRING);
   $sandbox_code = filter_var($_POST['sandbox'], FILTER_SANITIZE_STRING);
   $environment  = filter_var($_POST['environment'], FILTER_SANITIZE_STRING);
   $_3dsecure    = filter_var($_POST['secure'], FILTER_SANITIZE_NUMBER_INT);
   $status       = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
   
   if($payments->rows > 0){
      $id = $payment_bank->id;
      $_update->update($live_code, $sandbox_code, $environment, $_3dsecure, $status, $id);
   }else{
      $_update->insert($live_code, $sandbox_code, $environment, $_3dsecure, $status);
   }
   
   
   $page = 'payment-veritrans';
   $type = 'success';
   $msg  = 'Changes successfully saved';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}


if(isset($_POST['btn-payment']) && $_POST['btn-payment'] == 'Delete'){
	
   $_update->delete_account();
   
   $page = 'payment-veritrans';
   $type = 'success';
   $msg  = 'Successfully deleted item';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
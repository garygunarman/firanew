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
   
   $payment_status = $payment_bank->api_status;
}else{
   //$payment_bank->id           = '';
   /*
   $payment_bank->live_code    = '';
   $payment_bank->sandbox_code = '';
   $payment_bank->environment  = '';
   $payment_bank->_3dsecure    = '';
   $payment_bank->status       = '';
   */
   
   $payment_status = '1';
   
}


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-payment']) && $_POST['btn-payment'] == 'Save Changes'){
   
   //api_mode, $api_username, $api_password, $api_signature, $api_return_url, $api_cancel_url, $api_status
   
   $api_mode       = filter_var($_POST['mode'], FILTER_SANITIZE_STRING);
   $api_username   = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $api_password   = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
   $api_signature  = filter_var($_POST['account'], FILTER_SANITIZE_STRING);
   $api_return_url = filter_var($_POST['return'], FILTER_SANITIZE_URL);
   $api_cancel_url = filter_var($_POST['cancel'], FILTER_SANITIZE_URL);
   $api_status     = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
   
   if($payments->rows > 0){
      $api_id = $payment_bank->api_id;
      $_update->update($api_mode, $api_username, $api_password, $api_signature, $api_return_url, $api_cancel_url, $api_status, $api_id);
   }else{
      $_update->insert($api_mode, $api_username, $api_password, $api_signature, $api_return_url, $api_cancel_url, $api_status);
   }
   
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Changes successfully saved';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}


if(isset($_POST['btn-payment']) && $_POST['btn-payment'] == 'Delete'){
	
   $_update->delete_account();
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Successfully deleted item';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
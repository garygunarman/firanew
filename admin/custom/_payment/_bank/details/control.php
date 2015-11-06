<?php
/*
# ----------------------------------------------------------------------
# PAYMENT ACCOUNT - DETAILS: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new BANK_GET();
$_update = new BANK_UPDATE();


/* --- DEFINED VARIABLE --- */
$id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

$count_account = $_get->count_account($id);
$data_account  = $_get->get_account($id);
$count_bank    = $_get->count_bank(1);
$data_bank     = $_get->get_bank('bank_name');

if(isset($_POST['btn-details-account'])){
   
   if($_POST['btn-details-account'] == "Save Changes" || $_POST['btn-details-account'] == "Save Changes & Exit"){
	  
	  $account_number = filter_var($_POST['bank-number'], FILTER_SANITIZE_STRING);
	  $account_name   = filter_var($_POST['bank-name'], FILTER_SANITIZE_STRING);
	  $visibility     = filter_var($_POST['visibility'], FILTER_SANITIZE_STRING);
	  $bank_id        = filter_var($_POST['bank'], FILTER_SANITIZE_NUMBER_INT);
	  $description    = filter_var($_POST['bank-description'], FILTER_SANITIZE_STRING);
	  $currency       = filter_var($_POST['currency'], FILTER_SANITIZE_NUMBER_INT);
	  $id             = $data_account->id;
	  
	  
	  $_update->update_account($account_number, $currency, $account_name, $description, $visibility, $bank_id, $id);
	  
	  $type = 'success';
	  $msg  = 'Changes successfully saved';
	  $page = 'self';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
	   
   }
   
}
?>
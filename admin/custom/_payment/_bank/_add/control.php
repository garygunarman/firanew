<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT - ADD: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new BANK_GET();

$count_bank = $_get->count_bank(1);
$data_bank  = $_get->get_bank(1, 'bank_name');


if(isset($_POST['btn-insert-account']) && $_POST['btn-insert-account'] === 'Save Changes'){
   $_update = new UPDATE_UPDATE();
   
   $bank_id             = filter_var($_POST['bank'], FILTER_SANITIZE_NUMBER_INT);
   $account_number      = filter_var($_POST['bank-number'], FILTER_SANITIZE_STRING);
   $currency            = filter_var($_POST['currency'], FILTER_SANITIZE_NUMBER_INT);
   $account_description = filter_var($_POST['bank-description'], FILTER_SANITIZE_STRING);
   $account_name        = filter_var($_POST['bank-name'], FILTER_SANITIZE_STRING);
   $visibility          = filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);
   $active              = filter_var($_POST['active'], FILTER_SANITIZE_NUMBER_INT);
   $status         		= filter_var(1, FILTER_SANITIZE_NUMBER_INT);
   $hash_id        		= $_get->get_max_account_id();
   $hash_id        		= ($hash_id->max_id + 1).'-'.cleanurl($account_name);
   
   $_update->insert_bank($account_number, $currency, $account_name, $account_description, $bank_id, $visibility, $status, $active, $hash_id);
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Item has been successfully saved';
	  
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
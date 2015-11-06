<?php
/*
# ----------------------------------------------------------------------
# MAILCHIMP: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new MAILCHIMP_GET();
$_update = new MAILCHIMP_UPDATE();


$data = $_get->get('1');


if(isset($_POST['btn-mailchimp']) && $_POST['btn-mailchimp'] == 'Save Changes'){
   
   $key     = filter_var($_POST['key'], FILTER_SANITIZE_STRING);
   $list    = filter_var($_POST['list'], FILTER_SANITIZE_STRING);
   $status  = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
   
   $check = $_get->count_mailchimp();
   
   if($check->rows > 0){
      $mailchimp_id = $data->mailchimp_id;
	  $_update->update($key, $list, $status, $mailchimp_id);
	  
	  $type = 'success';
	  $msg  = 'Changes successfully saved';
	  
   }else{
      $_update->insert($key, $list, $status);
	  
	  $type = 'success';
	  $msg  = 'Item has been sucessfully saved.';
   }
   
   $page = 'self';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
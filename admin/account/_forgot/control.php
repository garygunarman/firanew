<?php
/*
# ----------------------------------------------------------------------
# FORGOT PASSWORD: CONTROL
# ----------------------------------------------------------------------
*/


if(isset($_POST['btn-admin-forgot']) && $_POST['btn-admin-forgot'] == 'Submit'){
	
   /* --- CONSTRUCT CLASS --- */
   $_get    = new FORGOT_GET();
   $_update = new FORGOT_UPDATE(); 
   
   $username		= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $count_forgot	= $_get->forgot_count_username($username);
   $date			= date('Y-m-d H:i:s');
   
   if($count_forgot->rows > 0){
      $get_forgot	= $_get->forgot_get_username($username);
	  $code			= bin2hex(openssl_random_pseudo_bytes(12));
      
	  $count    = $_get->count_log($get_forgot->id);
	  
	  if($count->rows > 0){
	     $data_log = $_get->get_log($get_forgot->id);
		 $_update->forgot_update_log($data_log->admin_id, $data_log->admin_username, $code, '1', $date, $data_log->log_id);
		 
	  }else{
	     $_update->forgot_insert_log($get_forgot->id, $get_forgot->username, $code, '1', $date);
		 
	  }
	  
	  $link_forgot = BASE_URL.'recover-password/'.$code;
	  
	  
	  /* --- EMAIL --- */
	  require dirname(__FILE__).'/../../emails/_forgot/_admin/index.php';
	  
	  $type = 'success';
	  $msg  = '<strong>Success.</strong> Your reset password email has been sent to your registered email address.';
	  
   }else{
      $type = 'danger';
	  $msg  = 'Please check your username';
	  
   }
   
   $page = 'forgot-password';
   
   set_alert($type, $msg);
   safe_redirect($page);
}
?>
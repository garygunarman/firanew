<?php
/*
# ----------------------------------------------------------------------
# RECOVER PASSWORD: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new RECOVER_GET();
$_update = new RECOVER_UPDATE();

   
/* --- DEFINED VARIABLE --- */
$recover_code	= filter_var($_REQUEST['code'], FILTER_SANITIZE_STRING);
$count 			= $_get->count_recover($recover_code, 1);

if($count->rows == 0){
   $page = 'login';
   $type = 'danger';
   $msg  = 'Invalid request';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}


$data	= $_get->get_recover($recover_code, 1);
$check	= $_cron->check_on_hold($data->log_time);


if($check->second > 14400){
   $_update->update_recover(0, $recover_code, $data->log_id);
   
   $page = 'forgot-password';
   $type = 'danger';
   $msg  = 'Your session has been expired, please make new request';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}


if(isset($_POST['btn-admin-recover']) && $_POST['btn-admin-recover'] == 'Reset Password'){
   /* --- CALL FUNCTION --- */
   $password	= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
   $password	= $_global->generateHash($password);
   
   $_global->update_login_admin($password, $data->admin_id);
   $_update->update_recover(0, $recover_code, $data->log_id);
   session_regenerate_id(true);
   
   $page = 'login';
   $type = 'success';
   $msg  = 'Changes successfully saved, please login with your new password';
		 
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
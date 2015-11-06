<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - ACCOUNT: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new GENERAL_GET();


$parameter	= $verifyToken->parameter;
$accounts   = $_get->get_admin($parameter);


if(isset($_POST['btn-account']) && $_POST['btn-account']){
   $acc_id		= $accounts->id;
   $acc_role	= $accounts->role;
   $acc_name	= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $acc_email	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $level		= $accounts->level;
   $_update		= new GENERAL_UPDATE();
   
   $count_email  = $_get->count_email($acc_email, $acc_id);
   
   
   if(isset($_POST['old']) && $_POST['old'] != ''){
	  if($count_email->rows > 0){
	     $type = 'danger';
		 $msg  = $acc_email.' has already existed';
		 
	  }else{
         $acc_old_pass		= filter_var($_POST['old'], FILTER_SANITIZE_STRING);
         $acc_new_pass		= filter_var($_POST['confirm'], FILTER_SANITIZE_STRING);
         $acc_confirm_pass	= filter_var($_POST['confirm'], FILTER_SANITIZE_STRING);
		 
		 if($acc_new_pass === $acc_confirm_pass){
		    $_update->update_admin($acc_role, $acc_name, $acc_email, $acc_new_pass, $level, $acc_id);
		 
	        $type = 'success';
		    $msg  = 'Changes successfully saved';
			
		 }else{
	        $type = 'danger';
		    $msg  = "Password don't match";
			
		 }
		 
	  }
	  
   }else{
	  if($count_email->rows > 0){
	     $type = 'danger';
		 $msg  = $acc_email.' has already existed';
		 
	  }else{
         $_update->update_admin_half($acc_role, $acc_name, $acc_email, $level, $acc_id);
		 
	     $type = 'success';
		 $msg  = 'Changes successfully saved';
		 
	  }
   }
   
   $page = 'self';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
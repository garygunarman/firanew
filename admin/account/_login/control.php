<?php
/*
# ----------------------------------------------------------------------
# LOGIN: CONTROL
# ----------------------------------------------------------------------
*/


if(isset($_SESSION['admin']['login_id']) && count($_SESSION['admin']['login_id']) > 0 && $_SESSION['admin']['login_id'][0] != ''){
   safe_redirect(DEFAULT_PAGE);
}

if(isset($_SESSION['admin']['control_login'])){
   unset($_SESSION['admin']['control_login']);
}


if(isset($_POST['btn-admin-login']) && $_POST['btn-admin-login'] == 'Sign In'){
   
   /* --- CONSTRUCT CLASS --- */
   $_get	= new LOGIN_GET();
   $_update	= new LOGIN_UPDATE(); 
   
   
   /* --- DEFINED VARIABLE --- */
   $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
   
   
   /* --- CALL FUNCTION --- */
   $count = $_get->count_login($user, $pass);
   
   
   /* --- CONTROL --- */
   if($count === 1){
      
	  $countUser = $_get->countToken(1);
	  
	  if($countUser->rows > 5){
	     $type = 'danger';
	     $msg  = 'Currently has been reached maximum user(s) (5 users allowed)';
	     $page = 'self';
	  
	     set_alert($type, $msg);
		 $page	= 'self';
		 
	  }else{
	  
	     $login_data	= $_get->get_login($user, $pass);
	     $currentTime	= date('Y-m-d H:i:s');
		 $token			= $_get->generateHash($login_data->email.cleanurl($currentTime.$login_data->admString));
	  
	     /* --- SET SESSION --- */
		 $_SESSION['admin'][DOMAIN_ADDRESS]['login']	= 1;
		 $_SESSION['admin'][DOMAIN_ADDRESS]['time']		= $currentTime;
	     $_SESSION['admin'][DOMAIN_ADDRESS]['token']	= $token;
		 $_update->insertToken(1, $token, $login_data->email, $login_data->admString, $currentTime);
	  
	     session_regenerate_id(true); 
	  
	  
	     /* --- SET ALERT & REDIRECTION --- */
	     $type = 'success';
	     $msg  = 'Welcome, '.$login_data->username;
	     $page = DEFAULT_PAGE;
	  
	     set_alert($type, $msg);
	  }
	  
   }else{
      
	  $type = 'danger';
	  $msg  = 'Invalid login information';
	  $page = 'login';
	  
	  set_alert($type, $msg);
	  
   }
   
   safe_redirect($page);
   
}
?>
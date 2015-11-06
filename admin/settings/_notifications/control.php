<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - NOTIFICATIONS: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NOTIFICATION_GET();
$_update = new NOTIFICATION_UPDATE();


$notification = $_get->get_notification();


if(isset($_POST['btn-notification']) && $_POST['btn-notification'] == 'Save Changes'){
   
   $notification_id = $notification->notification_id;
   $email_order     = filter_var($_POST['order'], FILTER_SANITIZE_EMAIL);
   $email_warehouse = filter_var($_POST['warehouse'], FILTER_SANITIZE_EMAIL);
   $email_security  = filter_var($_POST['security'], FILTER_SANITIZE_EMAIL);
   
   /* --- EMAIL LOGO --- */
   if(!empty($_FILES['email_logo']['name'])){
      $image_name    = substr($_FILES['email_logo']['name'],0,- 4);
      $image_type    = substr($_FILES['email_logo']['name'],-4);
   
      $uploads_dir   = 'files/uploads/assets/';
      $userfile_name = cleanurl(str_replace(array('(',')',' '),'_',$image_name)).$image_type;
      $userfile_tmp  = $_FILES['email_logo']['tmp_name'];
      $prefix        = 'email-logo-'.cleanurl($_global_general->website_title).'-';
      $prod_img      = $uploads_dir.$prefix.$userfile_name;
	  $error         = $_FILES['email_logo']["error"];
     
	  if($error == 0){
	     move_uploaded_file($userfile_tmp, $prod_img);
	  }else{
	     set_alert('danger', 'Error: '.$error);
		 safe_redirect('general');
	  }
	  
	  if($_global_notification->email_logo != ''){
	     //unlink($_global_notification->email_logo);
	  }
	  
      $logo       = $prod_img;
	  
   }else{
      $logo       = $_global_notification->email_logo;
   }
   
   $check = $_get->count_notification();
   
   if($check->rows > 0){
	  $_update->update_notification($logo, $email_order, $email_warehouse, $email_security, $notification_id);
	  
	  $type = 'success';
	  $msg  = 'Changes successfully saved';
	  
   }else{
      $_update->insert_notification($notification_id, $logo, $email_order, $email_warehouse, $email_security);
	  
	  $type = 'success';
	  $msg  = 'Item has been sucessfully saved.';
   }
   
   $page = 'notifications';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
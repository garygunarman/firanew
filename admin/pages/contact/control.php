<?php
/*
# ----------------------------------------------------------------------
# PAGES - HOME: CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");


$_get    = new CONTACT_GET();
$_update = new CONTACT_UPDATE();


$get_info      = $_get->get_infos();
$check_info    = $_get->check_info();


if(isset($_POST['btn-infos']) && $_POST['btn-infos'] == 'Save Changes'){

   $email         = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $email_display = filter_var($_POST['email_display'], FILTER_SANITIZE_STRING);
   $phone         = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
   $fax           = filter_var($_POST['fax'], FILTER_SANITIZE_STRING);
   $handphone     = filter_var($_POST['handphone'], FILTER_SANITIZE_STRING);
   $description   = filter_var($_POST['contact_description'], FILTER_SANITIZE_STRING);
   $keywords      = filter_var($_POST['contact_keywords'], FILTER_SANITIZE_STRING);
   
   if(isset($_POST['cover-delete'])){
      $cover_delete  = filter_var($_POST['cover-delete'], FILTER_SANITIZE_NUMBER_INT);
   }
   
   
   /* --- COVER --- */
   if(isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != ''){
      $file_name = substr($_FILES['cover']['name'], 0, -4);
      $file_type = substr($_FILES['cover']['name'], -4);
   
      $uploads_dir   = '../files/uploads/cover/';
      $userfile_name = cleanurl($file_name).$file_type;
      $userfile_tmp  = $_FILES['cover']['tmp_name'];
      $prefix        = 'cover-contact-';
      $prod_img      = $uploads_dir.$prefix.$userfile_name;
	  $error         = $_FILES['cover']["error"];
     
	  if($error == 0){
	     move_uploaded_file($userfile_tmp, $prod_img);
	  }else{
	     set_alert('danger', 'Error: '.$error);
		 safe_redirect('contact');
	  }
	 
      $image         = $prefix.$userfile_name;
      $cover         = "files/uploads/cover/".$image;
	  
	  if($_global_info->cover != ''){
	     unlink('../'.$_global_info->cover);
	  }
	  
   }else if(isset($cover_delete) && $cover_delete == '1'){
      $cover         = '';
	  unlink('../'.$_global_info->cover);
   }else{
      $cover         = $get_info->cover;
   }
   
   if($check_info->rows != 0){
      $_update->update_contact($email, $email_display, $phone, $fax, $handphone, $description, $keywords, $cover, $_global_info->info_id);
   }else{
      $_update->insert_contact($email, $email_display, $phone, $fax, $handphone, $description, $keywords, $cover);
   }
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Changes successfully saved';
	
   set_alert($type, $msg);
   safe_redirect($page);
}


if($_global_info->cover != ''){
   $_global_info->cover = BASE_URL.'static/thimthumb.php?src=../'.$_global_info->cover;
}else{
   $_global_info->cover = '';
}
?>
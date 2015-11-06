<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK - ADD: CONTROL
# ----------------------------------------------------------------------
*/

if(isset($_POST['btn-insert-bank']) && $_POST['btn-insert-bank'] === 'Save Changes'){
   $_get    = new BANK_GET();
   $_update = new UPDATE_UPDATE();
   
   $bank_name   = filter_var($_POST['bank-name'], FILTER_SANITIZE_STRING);
   $active      = filter_var($_POST['active'], FILTER_SANITIZE_STRING);
   $visibility  = filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);
   $status      = filter_var(1, FILTER_SANITIZE_NUMBER_INT);
   $hash_id     = $_get->get_max_bank_id();
   $hash_id     = ($hash_id->max_bank_id + 1).'-'.cleanurl($bank_name);
   
   /* --- IMAGE --- */
   $file_name = substr($_FILES['upload_news_1']['name'], 0, -4);
   $file_type = $_FILES['upload_news_1']['type'];
			
   if($file_type == 'image/jpeg'){
      $file_type = '.jpg';
   }else if($file_type == 'image/png'){
      $file_type = '.png';
   }else if($file_type == 'image/gif'){
      $file_type = '.gif';
   }
   
   //$file_type = substr($_FILES['upload_news_1']['name'], -4);
   
   $uploads_dir   = '../files/uploads/assets/';
   $userfile_name = cleanurl(str_replace(array('(',')',' '),'_',$alias)).$file_type;
   $userfile_tmp  = $_FILES['upload_news_1']['tmp_name'];
   $file_error    = $_FILES['upload_news_1']['error'];
   $file_type     = $_FILES['upload_news_1']['type'];
   $file_size     = $_FILES['upload_news_1']['size'];
   
   $prefix        = 'bank-'.cleanurl($bank_name).'-'.date('y-m-d-h-i-s').'-';
   $prod_img      = $uploads_dir.$prefix.$userfile_name;
   $allowed_type  = array('image/jpeg', 'image/png', 'image/gif');
   
   
   /* --- TOTAL SIZE SLIDESHOW --- */
   if($slideshow_size > $ini_max_upload){
      $type = 'danger';
	  $msg  = 'Maximum file size: '.$ini_max_upload;
			
      set_alert($type, $msg);
      safe_redirect('self');
	  
   }else if(!in_array($file_type, $allowed_type)){
	   
      $type = 'danger';
	  $msg  = 'Error: Image format not allowed (allowed image format: .jpg, .png, .gif).';
	  
	  set_alert($type, $msg);
	  safe_redirect('self');
	  
   }else{
      
	  if(move_uploaded_file($userfile_tmp, $prod_img) && $file_error == 0){
	  
	  }else if(!move_uploaded_file($userfile_tmp, $prod_img)){
	     $type = 'danger';
	     $msg  = 'Error: Permission denied, check folder: '.$uploads_dir.' permission';
		 
	     set_alert($type, $msg);
	     safe_redirect('self');
	  }else{
	     $error_msg = upload_code_message($file_error);
		 
	     $type = 'danger';
		 $msg  = 'Error: '.$error_msg;
		 
	     set_alert($type, $msg);
	     safe_redirect('self');
	  }
	  
   }
   
   $image  = substr($prod_img, 2);
   
   $_update->insert_bank($bank_name, $image, $visibility, $active, $status, $hash_id);
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Item has been successfully saved';
	  
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
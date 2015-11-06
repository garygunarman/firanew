<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK - DETAILS: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new BANK_GET();


/* --- REQUEST VARIABLE --- */
$hash_id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);

$count_detail = $_get->count_bank($hash_id);
$detail = $_get->get_bank($hash_id);

if(isset($_POST['btn-details-bank']) && $_POST['btn-details-bank'] == 'Save Changes'){
   $_update = new BANK_UPDATE();
   
   $hash_id      = $detail->hash_id;
   $bank_name    = filter_var($_POST['bank-name'], FILTER_SANITIZE_STRING);
   $visibility   = filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);
   $alias        = cleanurl($_POST['name']);
   
   /* --- IMAGE --- */
   if($_FILES['upload_news_1']['name'] !== ''){
   $file_name = substr($_FILES['upload_news_1']['name'], 0, -4);
   $file_type = substr($_FILES['upload_news_1']['name'], -4);
   
   $uploads_dir   = '../files/uploads/assets/';
   $userfile_name = cleanurl(str_replace(array('(',')',' '),'_',$alias)).$file_type;
   $userfile_tmp  = $_FILES['upload_news_1']['tmp_name'];
   $file_error    = $_FILES['upload_news_1']['error'];
   $file_type     = $_FILES['upload_news_1']['type'];
   $prefix        = 'bank-'.cleanurl($bank_name).'-'.date('y-m-d-h-i-s').'-';
   $prod_img      = $uploads_dir.$prefix.$userfile_name;
   $allowed_type  = array('image/jpeg', 'image/png', 'image/gif');
   
   
   /* --- TOTAL SIZE SLIDESHOW --- */
   $image_total = $_FILES['upload_news_1']['size'];
   if($image_total > ($ini_max_upload * 1024000)){
		    
      $type = 'danger';
	  $msg  = 'Error: Total files upload more than server configuration allowed (Total your file(s) size: '.($image_total/1024).'kB).';
			
      set_alert($type, $msg);
      safe_redirect('self');
	  
   }else if(!in_array($file_type, $allowed_type)){
	   
      $type = 'danger';
	  $msg  = 'Error: Image format not allowed (allowed image format: .jpg, .png, .gif).';
	  
	  set_alert($type, $msg);
	  safe_redirect('self');
	  
   }else{
      
	  if(move_uploaded_file($userfile_tmp, $prod_img) && $file_error == 0){
	  
	  }else{
	     
		 if(!move_uploaded_file($userfile_tmp, $prod_img)){
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
	  
   }
   
   $image  = substr($prod_img, 2);
   }else{
      $image = $detail->logo;
   }
   
   $_update->update_bank($bank_name, $visibility, $image, $hash_id);
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Changes successfully saved';
	  
   set_alert($type, $msg);
   safe_redirect($page);
}
?>
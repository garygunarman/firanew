<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - GENERAL: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new GENERAL_GET();
$_update = new GENERAL_UPDATE();

$countries = $_get->get_country();


/* --- MAILGUN --- */
if(is_object($_global_mailgun)){
   $data_mailgun_api    = $_global_mailgun->api_key;
   $data_mailgun_domain = $_global_mailgun->domain;
   $data_mailgun_status = $_global_mailgun->status;
}else{
   $data_mailgun_api    = '';
   $data_mailgun_domain = '';
   $data_mailgun_status = '0';
}

if($data_mailgun_status == '1'){
   $data_mailgun_status_active   = 'checked';
   $data_mailgun_status_unactive = '';
}else{
   $data_mailgun_status_active   = '';
   $data_mailgun_status_unactive = 'checked';
}


if(isset($_POST['btn-settings-general']) && $_POST['btn-settings-general'] == 'Save Changes'){
   $url         = filter_var($_POST['url'], FILTER_SANITIZE_URL);
   $title       = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
   $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $keywords    = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);;
   $analytics   = filter_var($_POST['analytics'], FILTER_SANITIZE_STRING);
   $phone       = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
   $address     = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
   $country     = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
   $province    = filter_var($_POST['province'], FILTER_SANITIZE_STRING);
   $city        = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
   $postal      = filter_var($_POST['postal'], FILTER_SANITIZE_STRING);
   $facebook    = filter_var($_POST['facebook'], FILTER_SANITIZE_URL);
   $twitter     = filter_var($_POST['twitter'], FILTER_SANITIZE_URL);
   $instagram   = filter_var($_POST['instagram'], FILTER_SANITIZE_URL);
   $currency    = filter_var($_POST['currency'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
   
   if(isset($_POST['cover-delete'])){
      $cover_delete  = filter_var($_POST['cover-delete'], FILTER_SANITIZE_NUMBER_INT);
   }else{
      $cover_delete = 0;
   }
   
   
   /* --- LOGO --- */
   if(!empty($_FILES['color_image']['name'])){
      $image_name    = substr($_FILES['color_image']['name'],0,- 4);
      $image_type    = substr($_FILES['color_image']['name'],-4);
   
      $uploads_dir   = 'files/uploads/assets/';
      $userfile_name = cleanurl(str_replace(array('(',')',' '),'_',$image_name)).$image_type;
      $userfile_tmp  = $_FILES['color_image']['tmp_name'];
      $prefix        = 'logo-';
      $prod_img      = $uploads_dir.$prefix.$userfile_name;
	  $error         = $_FILES['color_image']["error"];
     
	  if($error == 0){
	     move_uploaded_file($userfile_tmp, $prod_img);
	  }else{
	     set_alert('danger', 'Error: '.$error);
		 safe_redirect('general');
	  }
	  
	  if($_global_general->logo != ''){
	     unlink($_global_general->logo);
	  }
	  
      $logo          = $prod_img;
	  
   }else{
      $logo       = $_global_general->logo;
   }
   
   
   /* --- ACCOUNT COVER --- */
   if(isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != ''){
      $file_name = substr($_FILES['cover']['name'], 0, -4);
      $file_type = substr($_FILES['cover']['name'], -4);
   
      $uploads_dir   = '../files/uploads/cover/';
      $userfile_name = cleanurl($file_name).$file_type;
      $userfile_tmp  = $_FILES['cover']['tmp_name'];
      $prefix        = 'cover-account-';
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
	     unlink('../'.$_global_general->cover);
	  }
	  
   }else if(isset($cover_delete) && $cover_delete == '1'){
      $cover         = '';
	  unlink('../'.$_global_general->cover);
   }else{
      $cover         = $_global_general->cover;
   }
   
   
   /* --- FAVICON --- */
   if(isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != ''){
      $file_name = substr($_FILES['icon']['name'], 0, -4);
      $file_type = substr($_FILES['icon']['name'], -4);
   
      $uploads_dir   = 'files/uploads/assets/';
      $userfile_name = cleanurl($file_name).$file_type;
      $userfile_tmp  = $_FILES['icon']['tmp_name'];
      $prefix        = 'favicon-'.cleanurl($_global_general->website_title).'-';
      $prod_img      = $uploads_dir.$prefix.$userfile_name;
	  $error         = $_FILES['icon']["error"];
     
	  if($error == 0){
	     move_uploaded_file($userfile_tmp, $prod_img);
	  }else{
	     set_alert('danger', 'Error: '.$error);
		 safe_redirect('contact');
	  }
	 
      $image         = $prefix.$userfile_name;
      $icon         = "/files/uploads/assets/".$image;
	  
	  if($_global_info->cover != ''){
	     unlink('../'.$_global_general->icon);
	  }
	  
   }else if(isset($cover_delete) && $cover_delete == '1'){
      $icon         = '';
	  unlink('../'.$_global_general->icon);
   }else{
      $icon         = $_global_general->icon;
   }
   

   $validation = $_get->get_general_validation();
   
   if($validation->rows > 0){
      $_update->update_general($url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo, $cover, $icon);
   }else{
      $_update->insert_general($url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo, $cover, $icon);
   }
   
   
   /* --- MAILGUN --- */
   $_mailgun_key    = filter_var($_POST['mailgun_key'], FILTER_SANITIZE_SPECIAL_CHARS);
   $_mailgun_domain = filter_var($_POST['mailgun_domain'], FILTER_SANITIZE_URL);
   $_mailgun_status = filter_var($_POST['mailgun_status'], FILTER_SANITIZE_URL);
   
   
   if(CHECK_GLOBAL_MAILGUN > 0){
      $_update->update_mailgun($_mailgun_key, $_mailgun_domain, $_mailgun_status, '1');
   }else{
      $_update->insert_mailgun($_mailgun_key, $_mailgun_domain, $_mailgun_status);
   }
   
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Changes has been successfully saved';
   
   set_alert($type, $msg);
   safe_redirect($page);

}




if($_global_general->cover != ''){
   $_global_general->cover = BASE_URL.'static/thimthumb.php?src=../'.$_global_general->cover;
}else{
   $_global_general->cover = '';
}
?>
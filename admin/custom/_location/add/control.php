<?php
/*
# ----------------------------------------------------------------------
# LOCATION - ADD: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NEWS_GET();
$_update = new NEWS_UPDATE();


/* --- CALL FUNCTION --- */
$category       = $_get->add_news_category();


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-add-news']) && $_POST['btn-add-news'] == "Save Changes"){
   
   $day         = date('d');
   $month       = date('m');
   $year        = date('Y');
   $hour        = date('H');
   $minute      = date('i');
   $second      = date('s');
   $category    = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
   $title       = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
   $date        = filter_var($_POST['date'], FILTER_SANITIZE_STRING).' '.$hour.':'.$minute.':'.$second;
   $content     = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
   $excerpt     = filter_var($_POST['excerpt'], FILTER_SANITIZE_STRING);
   $alias       = cleanurl($_POST['title']);
   $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $keywords    = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);
   $visibility  = filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);
   
   $created_date = $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.$second;
   $order       = $_get->max_order();
   

   $check_title    = $_get->check_news_title($alias);
	   
   if($check_title->rows > 0){
      $alias = $alias.'-'.$check_title->rows;
   }else{
      $alias = $alias;
   }
	 
	   
   /* --- IMAGE --- */
   if($_FILES['upload_news_1']['name'] != ''){
      $file_name = substr($_FILES['upload_news_1']['name'], 0, -4);
      $file_type = substr($_FILES['upload_news_1']['name'], -4);
   
      $uploads_dir   = '../files/uploads/news-image/';
      //$userfile_name = str_replace(array('(',')',' '),'_',$_FILES['upload_news_1']['name']);
      $userfile_name = cleanurl(str_replace(array('(',')',' '),'_',$alias)).$file_type;
      $userfile_tmp  = $_FILES['upload_news_1']['tmp_name'];
      $file_error    = $_FILES['upload_news_1']['error'];
      $file_type     = $_FILES['upload_news_1']['type'];
      $prefix        = 'news-'.date('y-m-d-h-i-s').'-';
      $prod_img      = $uploads_dir.$prefix.$userfile_name;
      $allowed_type  = array('image/jpeg', 'image/png', 'image/gif');
   
   
      /* --- TOTAL SIZE SLIDESHOW --- */
      $image_total = $_FILES['upload_news_1']['size'];
      if($image_total > ($ini_max_upload * 1024000)){
		    
         $type = 'danger';
	     $msg  = 'Error: Total files upload more than server configuration allowed (Total your file(s) size: '.($image_total/1024).'kB).';
			
         set_alert($type, $msg);
         safe_redirect('add-news');
	  
	  }else if(!in_array($file_type, $allowed_type)){
	   
         $type = 'danger';
	     $msg  = 'Error: Image format not allowed (allowed image format: .jpg, .png, .gif).';
	  
	     set_alert($type, $msg);
	     safe_redirect('add-news');
	  
	  }else{
      
	     if(move_uploaded_file($userfile_tmp, $prod_img) && $file_error == 0){  
	     
	     }else{
	     
		    if(!move_uploaded_file($userfile_tmp, $prod_img)){
	           $type = 'danger';
		       $msg  = 'Error: Permission denied, check folder: '.$uploads_dir.' permission';
		 
		       set_alert($type, $msg);
	           safe_redirect('add-news');
		    }else{
	           $error_msg = upload_code_message($file_error);
		 
	           $type = 'danger';
		       $msg  = 'Error: '.$error_msg;
		 
		       set_alert($type, $msg);
	           safe_redirect('add-news');
			}
		 
		 }
	  
	  }
   
      $image  = substr($prod_img, 2);
   
   }else{
      $image = '';
   }
   
   $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	   
   if($_update->insertNews($category, $title, $alias, $date, $address, $excerpt, $content, $created_date, $description, $keywords, $visibility, ($order->order + 1))){
      
   }else{
      $type = 'danger';
      $msg  = 'Error: Cannot insert new item';
   }
   
   $page = 'self';
   $type = 'success';
   $msg  = 'News successfully saved';
   
   set_alert($type, $msg);
   safe_redirect($page);
         
}
?>
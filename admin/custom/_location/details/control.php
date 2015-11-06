<?php
/*
# ----------------------------------------------------------------------
# LOCATION - DETAILS: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new LOCATION_GET();
$_update = new LOCATION_UPDATE();


/* --- DEFINED VARIABLE --- */
$news_id       = filter_var($_REQUEST['nid'], FILTER_SANITIZE_NUMBER_INT);
$news_alias    = filter_var($_REQUEST['nn'], FILTER_SANITIZE_STRING);

$news_detail   = $_get->get_news_detail($news_id);
$category      = $_get->getAllCategory();

if(isset($_POST['btn-edit-news'])){
   
   if($_POST['btn-edit-news'] == "Save Changes" || $_POST['btn-edit-news'] == "Save Changes & Exit"){
      $news_id     = $news_detail->news_id;
      $category    = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
	  $title       = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	  $date        = filter_var($_POST['date'], FILTER_SANITIZE_NUMBER_FLOAT);
	  $excerpt     = filter_var($_POST['excerpt'], FILTER_SANITIZE_STRING);
	  $content     = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
      $alias       = cleanurl($_POST['title']);
      $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
      $keywords    = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);
      $visibility  = filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);
	  
	  
	  $check_title = $_get->check_news_title($title, $news_id);
      
	  
	  if($check_title->rows > 0){
	     
		 if($news_detail->category_alias == $alias){
		    $alias = $alias;
		 }else{
		    $alias = $post_title."-".$check_title->rows;
		 }
		 
	  }else{
	      $alias = $alias;
	  }
	  
	  /* --- IMAGE --- */
	  if($_FILES['upload_news_1']['name'] != ''){
         $file_name = substr($_FILES['upload_news_1']['name'], 0, -4);
         $file_type = substr($_FILES['upload_news_1']['name'], -4);
   
         $uploads_dir   = '../files/uploads/news-image/';
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
			   
			   if(is_file('../'.$news_detail->news_image)){
			      unlink('../'.$news_detail->news_image);
			   }
			   
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
	     $image_delete = filter_var($_POST['delete_news'], FILTER_SANITIZE_NUMBER_INT);
		 
		 if($image_delete == 1){
		    $image = '';
		    
			if(is_file('../'.$news_detail->news_image)){
			   unlink('../'.$news_detail->news_image);
			}
			
		 }else{
	        $image = $news_detail->news_image;
		 }
	  }
	  
	  $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	   
      $_update->updateNews($category, $title, $alias, $date, $address, $excerpt, $content, $description, $keywords, $visibility, $news_id);
	  
	  $page = 'location-detail/'.$news_detail->news_id.'/'.cleanurl($_POST['title']);
	  $type = 'success';
	  $msg  = 'Changes successfully saved';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
	   
   }
   
}
?>
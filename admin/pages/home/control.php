<?php
/*
# ----------------------------------------------------------------------
# PAGES - HOME: CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");


$_get    = new HOME_GET();
$_update = new HOME_UPDATE();


$get_slideshows      = $_get->get_slideshows();
$count_slideshow     = $_get->count_slideshow();
$get_order_slideshow = $_get->get_order_slideshow();
$new_id              = $_get->get_new_id();
$slideshow_get       = $_get->slideshow_get();


if(isset($_POST['btn-link-banner'])){
   
   $link    = filter_var($_POST['name_link'], FILTER_SANITIZE_URL);
   $link_id = filter_var($_POST['link_id'], FILTER_SANITIZE_NUMBER_INT);
   
   
   if($_POST['btn-link-banner'] == "Save Changes"){
      $_update->insertLinkBanner($link, $link_id);
	  
   }else if($_POST['btn-link-banner'] == "Delete"){
      $_update->insertLinkBanner('', $link_id);  
   }
   
   $page = 'home';
   $type = 'success';
   $msg  = 'Changes have been successfully saved.';
   
   
   set_alert($type, $msg);
   safe_redirect($page);
}


if(isset($_POST['btn-pages-home'])){
   
   if(isset($_POST['slideshow_id'])){
      $sort	= $_POST['order_image'];
      $id	= $_POST['slideshow_id'];
   
      if($_POST['btn-pages-home'] == "Save Changes"){
	   
	     foreach($id as $keys=>$id){
	        $id 				= filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		    $get_slideshow   	= $_get->get_slideshow($id);
		    $validate        	= $_get->validate_slideshow($id);
		    $keys            	= (int) $keys + 1;
		    $slideshow_total	= 0;
			
			if($_FILES['upload_slider_'.$id]['name'] != ''){
			   $filename		= upload_file($_global_general->url, 'images', $_FILES['upload_slider_'.$id], 'slideshow', 'files/uploads/slideshow/', $ini_max_upload);
			   
			   if($validate->rows > 0){
			      //unlink("../".$get_slideshow->filename);
		          $_update->update_slideshow($filename, $id);
			   }else{
		          $_update->insert_slideshow($id, $filename, $id);
			   }
			}
		 
		 }
		 
		 foreach($sort as $key=>$order){
	        $order 				= filter_var($order, FILTER_SANITIZE_NUMBER_INT);
			$slide_id 			= (int) $key + 1;
			$_update->update_order($slide_id, $order);
		 }
		 
	  }
   }
   
   $type = 'success';
   $msg  = 'Changes successfully saved';
   $page = 'self';
		 
   set_alert($type, $msg);
   safe_redirect($page);
}
?>
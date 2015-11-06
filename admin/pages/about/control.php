<?php
/*
# ----------------------------------------------------------------------
# PAGES - ABOUT: CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");


$_get	= new ABOUT_GET();


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-about'])){
   if($lang === 'ID'){
      $type_array	= array('about', 'facilities', 'quality', 'description');
      $_update		= new ABOUT_UPDATE();
	  
      foreach($type_array as $type_array){
         $check_about = $_get->check_about($type_array);
	  
	     $fill        = $_POST[$type_array];
	     $description = filter_var($_POST[$type_array.'_description'], FILTER_SANITIZE_STRING);
	     $keywords    = filter_var($_POST[$type_array.'_keywords'], FILTER_SANITIZE_STRING);
	  
         if($check_about->rows > 0){
	        $_update->update_about($fill, $description, $keywords, $type_array);
	     }else{
	        $_update->insert_about($fill, $description, $keywords, $type_array);
	     }
	  
      }
   
      $page = 'self';
      $type = 'success';
      $msg  = 'Changes successfully saved' ;
   
      set_alert($type, $msg);
      safe_redirect($page);
   
   }
   
}
?>
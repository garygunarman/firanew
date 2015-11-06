<?php
/*
# ----------------------------------------------------------------------
# PAGES - ABOUT LANGUAGE : CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");

$_custom_get		= new AboutCustomGet();
$_custom_update		= new AboutCustomUpdate();
$type_array_custom	= array('about', 'facilities', 'quality', 'description');
$_alt_type_array	= array();


/* --- INSERT DATA WHEN NOT EXISTED --- */
foreach($type_array_custom as $type_array){
   $count = $_custom_get->check_about($type_array, $lang);
   
   if($count->rows > 0){
	   
   }else{
      $data	= $_custom_get->get_param($type_array);
      $_custom_update->insert_about_lang($data->fill, $data->description, $data->keywords, $data->id, $type_array, $lang); 
	    
   }
   
   array_push($_alt_type_array, $type_array);
   
}


if(isset($_POST['btn-about']) && $lang === 'EN'){
   $type_array = array('about', 'facilities', 'quality', 'description');
	  
   foreach($type_array as $type_array){
	  $fill        = $_POST[$type_array];
	  $description = filter_var($_POST[$type_array.'_description'], FILTER_SANITIZE_STRING);
	  $keywords    = filter_var($_POST[$type_array.'_keywords'], FILTER_SANITIZE_STRING);
	  
	  $_custom_update->update_about_lang($fill, $description, $keywords, $type_array, $lang);
	  
   }
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Changes successfully saved' ;
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
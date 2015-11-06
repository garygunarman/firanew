<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY ADD: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NEWS_GET();
$_update = new NEWS_UPDATE();



/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-insert-new-category']) && $_POST['btn-insert-new-category'] == 'Save Changes'){
   
   $name             = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $description      = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $active           = filter_var($_POST['active'], FILTER_SANITIZE_STRING);
   $visibility       = filter_var($_POST['visibility']);
   $meta_description = filter_var($_POST['meta_description'], FILTER_SANITIZE_STRING);
   $meta_keyword     = filter_var($_POST['meta_keyword'], FILTER_SANITIZE_STRING); 
   $alias            = cleanurl($name);
   $temp_order       = $_get->get_max_category_order();
   $order            = $temp_order->max_order + 1;
   
   $count_alias = $_get->count_category($_POST['name']);
   if($count_alias->rows > 0){
      $page = 'add-news-category';
	  $type = 'danger';
	  $msg  = $name.' has already existed';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
   }else{
      $alias = $alias;
   }
 
   
   $_update->insert($name, $alias, $description, $active, $visibility, $meta_description, $meta_keyword, $order);
   $_update->insertLang($name, $alias, $description, $active, $visibility, $meta_description, $meta_keyword, $order);
   
   $page = 'add-news-category';
   $type = 'success';
   $msg  = 'Item has been successfully saved';
	  
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY DETAILS: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NEWS_GET();
$_update = new NEWS_UPDATE();



// REQUEST VARIABLE
$category_id     = filter_var($_REQUEST['cid'], FILTER_SANITIZE_NUMBER_INT);


$detail_category = $_get->get_category($category_id);
$category        = $_get->get_category($category_id);



if(isset($_POST['btn-details-news-category']) && $_POST['btn-details-news-category'] == 'Save Changes'){
 
   $category_id      = $detail_category->category_id;
   $category_name    = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $active           = filter_var($_POST['active'], FILTER_SANITIZE_STRING);
   $visibility       = filter_var($_POST['visibility'], FILTER_SANITIZE_STRING);
   $meta_description = filter_var($_POST['meta_description'], FILTER_SANITIZE_STRING);
   $meta_keyword     = filter_var($_POST['meta_keyword'], FILTER_SANITIZE_STRING);
   $alias            = cleanurl($_POST['name']);
   
   $temp             = $_get->count_category_alias($category_id, $alias);
   
   if($temp->rows > 0){
      $page = 'location-city-detail/'.$category_id.'/'.cleanurl($detail_category->category_name);
	  $type = 'danger';
	  $msg  = $category_name.' has already existed';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
   }else{
      $category_alias = $alias;
   }
 
   $_update->update($category_name, $category_alias, $active, $visibility, $meta_description, $meta_keyword, $category_id);
   
   
   $page = 'location-city-detail/'.$category_id.'/'.$category_alias;
   $type = 'success';
   $msg  = 'Changes successfully saved';
	  
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
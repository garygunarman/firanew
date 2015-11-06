<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NEWS_GET();
$_update = new NEWS_UPDATE();


/*
# ----------------------------------------------------------------------
# SORTING
# ----------------------------------------------------------------------
*/

$equal_search     = array('category_visibility');
$default_sort_by  = "category_order";

$pgdata = page_init($equal_search,$default_sort_by); // static/general.php

$page             = $pgdata['page'];
$query_per_page   = $pgdata['query_per_page'];
$sort_by          = $pgdata['sort_by'];
$first_record     = $pgdata['first_record'];
$search_parameter = $pgdata['search_parameter'];
$search_value     = $pgdata['search_value'];
$search_query     = $pgdata['search_query'];
$search           = $pgdata['search'];


if(isset($_REQUEST['src'])){
   $_REQUEST['src'] = $_REQUEST['src'];
}else{
   $_REQUEST['src'] = '';
} 


$full_order  = $_get->count_listing_news_category($search_query, $sort_by, $query_per_page);
$total_query = $full_order['total_query'];
$total_page  = $full_order['total_page'];
$all_news    = $_get->get_listing_news_category($search_query, $sort_by, $first_record, $query_per_page);



/* --- HANDLING ARROW SORTING --- */
$arr_category_name       = '';
$arr_category_active     = '';
$arr_category_visibility = '';
$arr_order_number        = '';
   
if(isset($_REQUEST['srt'])){
   
   if($_REQUEST['srt'] == "category_name DESC"){
      $arr_category_name = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "category_name"){
      $arr_category_name = "<span class=\"sort-arrow-down\"></span>";

   }else if($_REQUEST['srt'] == "category_active DESC"){
      $arr_category_active = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "category_active"){
      $arr_category_active = "<span class=\"sort-arrow-down\"></span>";
   
   }else if($_REQUEST['srt'] == "category_visibility DESC"){
      $arr_category_visibility = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "category_visibility"){
      $arr_category_visibility = "<span class=\"sort-arrow-down\"></span>";
   
   }else{
      $arr_order_number = "<span class=\"sort-arrow-down\"></span>";
   }
   
}


/* --- STORED VALUE --- */
echo "<input type=\"hidden\" name=\"url\" id=\"url\" class=\"hidden\" value=\"http://".$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF'])."/news-category-view\">\n";
echo "<input type=\"hidden\" name=\"page\" id=\"page\" class=\"hidden\" value=\"".$page."\" /> \n";
echo "<input type=\"hidden\" name=\"query_per_page\" id=\"query_per_page\" class=\"hidden\" value=\"".$query_per_page."\" /> \n";
echo "<input type=\"hidden\" name=\"total_page\" id=\"total_page\" class=\"hidden\" value=\"".$total_page."\" /> \n";
echo "<input type=\"hidden\" name=\"sort_by\" id=\"sort_by\" class=\"hidden\" value=\"".$sort_by."\" /> \n";
echo "<input type=\"hidden\" name=\"search\" id=\"search\" class=\"hidden\" value=\"".$search_parameter."-".$search_value."\" /> \n";


/* -- BUTTON RESET -- */
if(empty($search_parameter)){
   $reset = "hidden";
}else{
   $reset = "";
}


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-index-news-category'])){
   
   if(isset($_POST['cat_id'])){
      $category_id  = $_POST['cat_id'];
   }else if(isset($_POST['category_order'])){
      $order        = $_POST['category_order'];
   }
   
   $action       = filter_var($_POST['option-action'], FILTER_SANITIZE_STRING);
   $option       = filter_var($_POST['option-option'], FILTER_SANITIZE_STRING);
   
   if($_POST['btn-index-news-category'] == "GO"){
      
	  if($action == "delete"){
	     
		 foreach($category_id as $category_id){
		    $category_id = filter_var($category_id, FILTER_SANITIZE_NUMBER_INT);
			
			$child = $_get->get_news_child($category_id);
			
			if($child->rows > 0){
			   $type = 'danger';
			   $msg  = 'Cannot delete category because it contains one or more news';
			   
			}else{
			   
			   $_update->delete_category($category_id);
			   
			   $type = 'success';
			   $msg  = 'Item(s) has been successfully removed';
			   
			}
			
		 }
			
	  }else if($action == 'visibility'){
	     
		 foreach($category_id as $category_id){
		    $category_id = filter_var($category_id, FILTER_SANITIZE_NUMBER_INT);
		 
			if($option == 'yes'){
			   $_update->update_visibility('Yes', $category_id);
			}else if($option == 'no'){
			   $_update->update_visibility('No', $category_id);
			}
			
			
			$type = 'success';
			$msg  = 'Changes has been saved';
			
		 }
			
	  }else if($action == 'order'){
	     
		 foreach($order as $key=>$order){
		    $order = filter_var($order, FILTER_SANITIZE_NUMBER_INT);
			
			$_update->update_order($key, $order);
			
			$type = 'success';
			$msg  = 'Changes has been saved';
			
		 }
		 
	  }
	  
	  $page = 'self';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
	 
   }
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# LOCATION: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new LOCATION_GET();
$_update = new LOCATION_UPDATE();


/*
# ----------------------------------------------------------------------
# SORTING
# ----------------------------------------------------------------------
*/

$equal_search     = array('news_visibility', 'news_created_date');
$default_sort_by  = "order_ DESC";

$pgdata           = page_init($equal_search,$default_sort_by); // static/general.php

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


/* --- CATEGORY --- */
if(isset($_REQUEST['cat'])){
   $req_category = filter_var($_REQUEST['cat'], FILTER_SANITIZE_STRING);
	
   if ($req_category == "" || $req_category == 'top'){
      $cat = '1';
   }else{
      $cat = "`category_id` = '$req_category'";
   }
   
}else{
   $cat          = '1';
   $req_category = '';
}


$full_order     = $_get->count_news($search_query, $sort_by, $query_per_page, $cat);
$total_query    = $full_order['total_query'];
$total_page     = $full_order['total_page'];
$all_news       = $_get->get_listing_news($search_query, $sort_by, $first_record, $query_per_page, $cat);
$count_category = $_get->count_news_category();
$get_category   = $_get->get_news_category();



/* --- HANDLING ARROW SORTING --- */
$arr_product_name     = '';
$arr_type_name        = '';
$arr_type_price       = '';
$arr_promo_value      = '';
   
if(isset($_REQUEST['srt'])){
   if($_REQUEST['srt'] == "category_name DESC"){
      $arr_order_number = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "category_name"){
      $arr_order_number = "<span class=\"sort-arrow-down\"></span>";
   }else{
      $arr_order_number = "<span class=\"sort-arrow-down\"></span>";
   }
}


/* --- STORED VALUE --- */
echo "<input type=\"hidden\" name=\"url\" id=\"url\" class=\"hidden\" value=\"http://".$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF'])."/location-view\">\n";
echo "<input type=\"hidden\" name=\"page\" id=\"page\" class=\"hidden\" value=\"".$page."\" /> \n";
echo "<input type=\"hidden\" name=\"current_category\" id=\"current_category\" class=\"hidden\" value=\"";
	if($cat == '1'){
	   echo 'top';
	}else{
	   echo $req_category;
	}
echo "\" /> \n";
echo "<input type=\"hidden\" name=\"query_per_page\" id=\"query_per_page\" class=\"hidden\" value=\"".$query_per_page."\" /> \n";
echo "<input type=\"hidden\" name=\"total_page\" id=\"total_page\" class=\"hidden\" value=\"".$total_page."\" /> \n";
echo "<input type=\"hidden\" name=\"sort_by\" id=\"sort_by\" class=\"hidden\" value=\"".$sort_by."\" /> \n";
echo "<input type=\"hidden\" name=\"search\" id=\"search\" class=\"hidden\" value=\"".$search_parameter."-".$search_value."\" /> \n";
echo "<input type=\"hidden\" name=\"alternate-url\" id=\"alternate-url\" class=\"hidden\" value=\"http://".$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF'])."/news\" /> \n";


/* -- BUTTON RESET -- */
if(empty($search_parameter)){
   $reset = "hidden";
}else{
   $reset = "";
}


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-index-news']) && $_POST['btn-index-news'] == 'GO'){
   
   if(isset($_POST['news_id'])){
      $news_id = $_POST['news_id'];
   }
   
   $action  = filter_var($_POST['option-action'], FILTER_SANITIZE_STRING);
   $option  = filter_var($_POST['option-option'], FILTER_SANITIZE_STRING);
   
   if($action == 'delete'){
	  
      foreach($news_id as $news_id){
	     $news_id = filter_var($news_id, FILTER_SANITIZE_STRING);
			
			
	     /* --- REMOVE IMAGE --- */
	     $count_news = $_get->count_news_single($news_id);
		 $data_news  = $_get->get_news($news_id);
			
	     if($count_news->rows > 0){
		    if(is_file('../'.$data_news->news_image)){
			   unlink('../'.$data_news->news_image);
			}
		 }
			
	     $_update->delete($news_id);
	  }
	  
	  $type = 'success';
	  $msg  = 'Item(s) has been successfully deleted';
	  
   }else if($action == 'visibility'){
	     
      foreach($news_id as $news_id){
	     $news_id = filter_var($news_id, FILTER_SANITIZE_STRING);
		 $_update->update($option, $news_id);
	  }
		 
      $type = 'success';
      $msg  = 'Changes has been successfully';
   
   }else if($action == 'order'){
      $_order_id = $_POST['hidden_id'];
	  $_order    = $_POST['hidden_order'];
	  rsort($_order);
	  
	  foreach($_order_id as $key=>$id){
	     $_update->update_order($_order[$key], $id);
	  }
	  $type = 'success';
	  $msg  = 'Changes successfully saved'; 
   
   }
	  
   $page = 'self';
	  
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new BANK_GET();
$_update = new BANK_UPDATE();


/*
# ----------------------------------------------------------------------
# SORTING
# ----------------------------------------------------------------------
*/

$equal_search     = array('visibility', 'active');
$default_sort_by  = "account_name";

$pgdata           = page_init($equal_search,$default_sort_by);

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
      $cat = "`bank_`.`bank_id` = '$req_category'";
   }
   
}else{
   $cat          = '1';
   $req_category = '';
}


$full_order   = $_get->count_account($search_query, $cat, $sort_by, $query_per_page);
$total_query  = $full_order['total_query'];
$total_page   = $full_order['total_page'];
$all_news     = $_get->get_account($search_query, $sort_by, $first_record, $query_per_page, $cat);
$count_bank   = $_get->count_bank(1, 'bank_name');

if($count_bank->rows > 0){
   $bank   = $_get->get_bank(1, 'bank_name');
}



/* --- HANDLING ARROW SORTING --- */
$arr_account_name   = '';
$arr_bank_name      = '';
$arr_currency       = '';
$arr_account_number = '';
$arr_visibility     = '';
   
if(isset($_REQUEST['srt'])){
   
   if($_REQUEST['srt'] == "account_name DESC"){
      $arr_account_name = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "account_name"){
      $arr_account_name = "<span class=\"sort-arrow-down\"></span>";
	  
   }else if($_REQUEST['srt'] == "bank_name DESC"){
      $arr_bank_name = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "bank_name"){
      $arr_bank_name = "<span class=\"sort-arrow-down\"></span>";
	  
   }else if($_REQUEST['srt'] == "currency DESC"){
      $arr_currency = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "currency"){
      $arr_currency = "<span class=\"sort-arrow-down\"></span>";
	  
   }else if($_REQUEST['srt'] == "account_number DESC"){
      $arr_account_number = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "account_number"){
      $arr_account_number = "<span class=\"sort-arrow-down\"></span>";
	  
   }else if($_REQUEST['srt'] == "visibility DESC"){
      $arr_visibility = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "visibility"){
      $arr_visibility = "<span class=\"sort-arrow-down\"></span>";  
   }
   
}


/* --- STORED VALUE --- */
echo "<input type=\"hidden\" name=\"url\" id=\"url\" class=\"hidden\" value=\"http://".$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF'])."/payment-bank-account-view\">\n";
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
if(isset($_POST['btn-index-bank']) && $_POST['btn-index-bank'] == 'GO'){
   
   if(!empty($_POST['news_id'])){
   
      $news_id = $_POST['news_id'];
      $action  = filter_var($_POST['option-action'], FILTER_SANITIZE_STRING);
      $option  = filter_var($_POST['option-option'], FILTER_SANITIZE_STRING);
   
   
      if($action == 'delete'){
	  
	     foreach($news_id as $news_id){
		    $news_id = filter_var($news_id, FILTER_SANITIZE_STRING);
			
			$count_order = $_get->count_total_order($news_id);
			
			if($count_order->rows > 0){
			   $type = 'danger';
			   $msg  = "Can't delete item, because it has been used for one or more order(s)";
			}else{
			   $type = 'success';
			   $msg  = 'Item(s) has been successfully deleted';
			   
			   $_update->delete($news_id);
			}
	     }
	  
	  }else if($action == 'visibility'){
	     
		 foreach($news_id as $news_id){
		    $news_id = filter_var($news_id, FILTER_SANITIZE_STRING);
		    $_update->update($option, $news_id);
		 }
		 
		 $type = 'success';
		 $msg  = 'Changes has been successfully saved';
   
      }
	  
      $page = 'self';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
   
   }else{
	  
      $page = 'self';
	  $type = 'danger';
	  $msg  = 'Please choose one or more item(s)';
	  
	  set_alert($type, $msg);
	  safe_redirect($page); 
	  
   }
   
}
?>
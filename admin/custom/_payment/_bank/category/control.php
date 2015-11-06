<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new BANK_GET();
$_update = new BANK_UPDATE();


/*
# ----------------------------------------------------------------------
# SORTING
# ----------------------------------------------------------------------
*/

$equal_search     = array('visibility', 'active', 'status');
$default_sort_by  = "bank_name";

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


$full_order  = $_get->count_bank($search_query, $sort_by, $query_per_page);
$total_query = $full_order['total_query'];
$total_page  = $full_order['total_page'];
$all_bank    = $_get->get_bank($search_query, $sort_by, $first_record, $query_per_page);



/* --- HANDLING ARROW SORTING --- */
$arr_category_name       = '';
$arr_category_active     = '';
$arr_category_visibility = '';
$arr_order_number        = '';
   
if(isset($_REQUEST['srt'])){
   
   if($_REQUEST['srt'] == "bank_name DESC"){
      $arr_category_name = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "bank_name"){
      $arr_category_name = "<span class=\"sort-arrow-down\"></span>";
   
   }else if($_REQUEST['srt'] == "bank_visibility DESC"){
      $arr_category_visibility = "<span class=\"sort-arrow-up\"></span>";
   }else if($_REQUEST['srt'] == "bank_visibility"){
      $arr_category_visibility = "<span class=\"sort-arrow-down\"></span>";
   
   }else{
      $arr_order_number = "<span class=\"sort-arrow-down\"></span>";
   }
   
}


/* --- STORED VALUE --- */
echo "<input type=\"hidden\" name=\"url\" id=\"url\" class=\"hidden\" value=\"http://".$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF'])."/payment-bank-view\">\n";
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
if(isset($_POST['btn-index-bank'])){
   
   $action       = filter_var($_POST['option-action'], FILTER_SANITIZE_STRING);
   $option       = filter_var($_POST['option-option'], FILTER_SANITIZE_STRING);
   $bank_id      = $_POST['bank_id'];
   
   if($_POST['btn-index-bank'] === "GO"){
      
	  if($action === "delete"){
	     
		 foreach($bank_id as $bank_id){
		    $bank_id = filter_var($bank_id, FILTER_SANITIZE_NUMBER_INT);
			
			$account = $_get->count_bank_account($bank_id);
			
			if($account->rows === 0){
			   $_update->delete_bank($bank_id);
			   
			   $type = 'success';
			   $msg  = 'Changes has been saved';
			}else{
			   
			   $type = 'danger';
			   $msg  = 'Cannot delete bank, because it contain(s) one or more account';
			   
			}
			
		 }
			
	  }else if($action === 'visibility'){
	     
		 foreach($bank_id as $bank_id){
		    $bank_id = filter_var($bank_id, FILTER_SANITIZE_NUMBER_INT);
			
			$_update->update_bank($option, '1', $bank_id);
		 }
		 
		 $type = 'success';
		 $msg  = 'Changes has been saved';
			
	  }
	  
	  $page = 'self';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
	 
   }
   
}
?>
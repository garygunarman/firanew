<?php
/*
# ----------------------------------------------------------------------
# CAREER JOBS - ADD: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new JOBS_GET();
$_update = new JOBS_UPDATE();
/* -- DEFINED VARIABLE -- */

// REQUEST
$category_id   = $_REQUEST['cat_id'];


// CALL FUNCTION
$category = $_get->get_city($category_id);
$check    = $_get->count_job($category_id);
$city     = $_get->get_cities();

//$category_name = 


if(isset($_POST['btn_detail_job'])){
   
   // DEFINED VARIABLE
   $active     = '1';
   $visibility = $_POST['visibility_status'];
   $city_name  = stripslashes($_POST['category_name']);
   $cat_id     = $_POST['cat_id'];
   $category   = $_POST['category_department'];
   $desc       = stripslashes($_POST['career_description']);
   $reports  = stripslashes($_POST['career_reports']);
   $education  = stripslashes($_POST['career_education']);
   
   if($_POST['btn_detail_job'] == 'Delete'){
   
      $_update->delete($cat_id);
	  
	  $_SESSION['alert'] = 'success';
	  $_SESSION['msg']   = 'Item has been successfully deleted.';
   
   }else{
	   
      $_update->update($city_name, $category, $visibility, $desc, $reports, $education,$cat_id);
	  

	
	   $page = 'career-detail/'.$cat_id.'/'.cleanurl(preg_replace("/[^A-Za-z0-9]/",' ',$city_name));
	  $type = 'success';
	  $msg  = 'Changes successfully saved';

	  set_alert($type, $msg);
	  safe_redirect($page);
   }
   
}
?>
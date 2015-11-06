<?php
/*
# ----------------------------------------------------------------------
# CAREER JOBS - ADD: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new JOBS_GET();
$_update = new JOBS_UPDATE();
$department = $_get->get_category();

if(isset($_POST['btn_add_job'])){
   
   // DEFINED VARIABLE
   $active       = '1';
   $visibility   = $_POST['visibility_status'];
   $department   = $_POST['category_department'];
   $career_name  = stripslashes($_POST['category_name']);
   $description  = stripslashes($_POST['career_description']);
   $reports  = stripslashes($_POST['career_reports']);
   $education  = stripslashes($_POST['career_education']);
   
   $_update->insert($career_name, $department, $active, $visibility, $description,$reports,$education);
   
   	 $page = 'self';
	  $type = 'success';
	  $msg  = 'Item has been successfully saved';

	  set_alert($type, $msg);
	  safe_redirect($page);
   
}
?>
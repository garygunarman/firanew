<?php
/*
# ----------------------------------------------------------------------
# CATEGORY LANGUAGE : CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");


$req_cat_id		= filter_var($_REQUEST['cid'], FILTER_SANITIZE_NUMBER_INT);
$lang_code		= $lang;

$_custom_get	= new CategoryCustomGet();
$_custom_update	= new CategoryCustomUpdate();

$count			= $_custom_get->count_category_lang($req_cat_id, 'EN');
$data			= $_custom_get->get_default_lang($req_cat_id);

if($lang === 'EN'){
   $detail_category	= $_custom_get->get_category_lang($req_cat_id, 'EN');
}


/* --- INITIALIZE DATA --- */
if($count->rows > 0){
   
}else{
   $_custom_update->insert_category_lang($data->category_id, $data->category_name, cleanurl($data->category_alias), $data->category_description, $data->category_level, $data->category_order, $data->category_active_status, $data->category_visibility_status, $data->meta_description, $data->meta_keywords, 'EN');
   
}


/* --- SYNC IMPORTANT DATA --- */
$_custom_update->updateData($data->category_level, $data->category_order, $data->category_active_status, $data->category_visibility_status, $req_cat_id, 'EN');


if(isset($_POST['btn-detail-category']) && $lang === 'EN'){
   $category_name				= filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $category_alias				= cleanurl($category_name);
   $category_description		= filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   //$meta_description			= filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   //$meta_keywords				= filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $meta_description			= '';
   $meta_keywords				= '';
   $id_param					= filter_var($req_cat_id, FILTER_SANITIZE_NUMBER_INT);
   $language_code				= filter_var('EN', FILTER_SANITIZE_STRING);
   
   $_custom_update->update_category_lang($category_name, $category_alias, $category_description, $meta_description, $meta_keywords, $id_param, $language_code);
   
   $page	= 'self';
   $type	= 'success';
   $msg		= 'Changes successfully saved';
   
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
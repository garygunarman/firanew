<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY DETAILS: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NEWS_GET();
$_update = new NEWS_UPDATE();



$category_id	= filter_var($_REQUEST['cid'], FILTER_SANITIZE_NUMBER_INT);
$_req_lang		= '';
if(isset($_REQUEST['lang'])){
   $_req_lang		= filter_var($_REQUEST['lang'], FILTER_SANITIZE_STRING);
   if($_req_lang === 'ID'){
      $_selected_lang_id	= 'selected="selected"';
      $_selected_lang_en	= '';
	  $_class_hidden_en		= '';
	  
   }else if($_req_lang === 'EN'){
      $_selected_lang_id	= '';
      $_selected_lang_en	= 'selected="selected"';
	  $_class_hidden_en		= 'hidden';
	  
   }
   
}else{
   $_req_lang			= filter_var('ID', FILTER_SANITIZE_STRING);
   $_selected_lang_id	= 'selected="selected"';
   $_selected_lang_en	= '';
   
}


$detail_category = $_get->get_category($_req_lang, $category_id);
$category        = $_get->get_category($_req_lang, $category_id);


if($_req_lang === 'ID'){
   $detail_category_category_id		= $detail_category->category_id;
   $detail_category_category_name	= cleanurl($detail_category->category_name);
	  
}else if($_req_lang === 'EN'){
   $detail_category_category_id		= $detail_category->id_param;
   $detail_category_category_name	= cleanurl($detail_category->category_name);
	  
}
   
echo '<input type="text" class="hidden" id="id-hidden-category-id" value="'.$detail_category_category_id.'">';
echo '<input type="text" class="hidden" id="id-hidden-category-name" value="'.$detail_category_category_name.'">';


if(isset($_POST['btn-details-news-category']) && $_POST['btn-details-news-category'] == 'Save Changes'){
   
   if($_req_lang === 'ID'){
      $category_id      = $detail_category->category_id;
   }else if($_req_lang === 'EN'){
      $category_id      = $detail_category->id_param;
   }
   
   $category_name    = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $active           = filter_var($_POST['active'], FILTER_SANITIZE_STRING);
   $visibility       = filter_var($_POST['visibility'], FILTER_SANITIZE_STRING);
   $meta_description = filter_var($_POST['meta_description'], FILTER_SANITIZE_STRING);
   $meta_keyword     = filter_var($_POST['meta_keyword'], FILTER_SANITIZE_STRING);
   $alias            = cleanurl($_POST['name']);
   
   $temp             = $_get->count_category_alias($category_id, $alias);
   
   if($temp->rows > 0){
      $page = 'self';
	  $type = 'danger';
	  $msg  = $category_name.' has already existed';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
	  
   }else{
      $category_alias = $alias;
	  
   }
   
   
   if($_req_lang === 'ID'){
      $_update->update($category_name, $category_alias, $active, $visibility, $meta_description, $meta_keyword, $category_id);
   }else if($_req_lang === 'EN'){
	  $_update->updateLang($category_name, $category_alias, $active, $visibility, $meta_description, $meta_keyword, $category_id);
   }
   
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Changes successfully saved';
	  
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
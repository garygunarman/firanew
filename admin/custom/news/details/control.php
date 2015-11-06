<?php
/*
# ----------------------------------------------------------------------
# NEWS - EDIT: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NEWS_GET();
$_update = new NEWS_UPDATE();

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


/* --- DEFINED VARIABLE --- */
$news_id       = filter_var($_REQUEST['nid'], FILTER_SANITIZE_NUMBER_INT);
$news_alias    = filter_var($_REQUEST['nn'], FILTER_SANITIZE_STRING);


$news_detail   = $_get->get_news_detail($_req_lang, $news_id);
$category      = $_get->getAllCategory($_req_lang);


if($_req_lang === 'ID'){
   $detail_category_category_id		= $news_detail->news_id;
   $detail_category_category_name	= cleanurl(preg_replace("/[^A-Za-z0-9]/",' ',$news_detail->news_title));
   
}else if($_req_lang === 'EN'){
   $detail_category_category_id		= $news_detail->id_param_news;
   $detail_category_category_name	= cleanurl(preg_replace("/[^A-Za-z0-9]/",' ',$news_detail->news_title));
   
}
   
echo '<input type="text" class="hidden" id="id-hidden-category-id" value="'.$detail_category_category_id.'">';
echo '<input type="text" class="hidden" id="id-hidden-category-name" value="'.$detail_category_category_name.'">';


if(isset($_POST['btn-edit-news'])){
   
   if($_POST['btn-edit-news'] == "Save Changes" || $_POST['btn-edit-news'] == "Save Changes & Exit"){
      $news_id     = $news_detail->news_id;
      $category    = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
	  $title       = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	  $date        = filter_var($_POST['date'], FILTER_SANITIZE_NUMBER_FLOAT);
	  $excerpt     = filter_var($_POST['excerpt'], FILTER_SANITIZE_STRING);
	  $content     = $_POST['content'];
      $alias       = cleanurl(preg_replace("/[^A-Za-z0-9]/",' ',$title));
      $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
      $keywords    = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);
      $visibility  = filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);
	  $check_title = $_get->check_news_title($title, $news_id);
      
	  
	  if($check_title->rows > 0){
		 if($news_detail->category_alias == $alias){
		    $alias = $alias;
			
		 }else{
		    $alias = $post_title."-".$check_title->rows;
			
		 }
		 
	  }else{
	      $alias = $alias;
		  
	  }
	  
	  /* --- IMAGE --- */
	  if($_FILES['upload_news_1']['name'] != ''){
	     $image	= upload_file($_global_general->url, 'images', $_FILES['upload_news_1'], 'news', 'files/uploads/news-image/', $ini_max_upload);
		 
	  }else{
	     $image_delete = filter_var($_POST['delete_news'], FILTER_SANITIZE_NUMBER_INT);
		 
		 if($image_delete == 1){
		    $image = '';
		    
			if(is_file('../'.$news_detail->news_image)){
			   unlink('../'.$news_detail->news_image);
			}
			
		 }else{
	        $image = $news_detail->news_image;
		 }
		 
	  }
	   
      if($_req_lang === 'ID'){
	     $_update->updateNewsLangField($news_detail->news_category, $image, $date, $visibility, $news_id);
         $_update->updateNews($category, $title, $alias, $date, $image, $excerpt, $content, $description, $keywords, $visibility, $news_id);
		 
	  }else if($_req_lang === 'EN'){
	     $_update->updateNewsLang($title, $alias, $excerpt, $content, $description, $keywords, $news_id);
		 
	  }
	  
	  $page = 'news-detail/'.$_req_lang.'/'.$news_detail->news_id.'/'.cleanurl(preg_replace("/[^A-Za-z0-9]/",' ',$title));
	  $type = 'success';
	  $msg  = 'Changes successfully saved';
	  
	  set_alert($type, $msg);
	  safe_redirect($page);
	   
   }
   
}
?>
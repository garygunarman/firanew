<?php
/*
# ----------------------------------------------------------------------
# NEWS - ADD: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new NEWS_GET();
$_update = new NEWS_UPDATE();


/* --- CALL FUNCTION --- */
$category       = $_get->add_news_category();


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-add-news']) && $_POST['btn-add-news'] == "Save Changes"){
   
   $day         = date('d');
   $month       = date('m');
   $year        = date('Y');
   $hour        = date('H');
   $minute      = date('i');
   $second      = date('s');
   $category    = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
   $title       = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
   $date        = filter_var($_POST['date'], FILTER_SANITIZE_STRING).' '.$hour.':'.$minute.':'.$second;
   $content     = $_POST['content'];
   $excerpt     = filter_var($_POST['excerpt'], FILTER_SANITIZE_STRING);
   $alias       = cleanurl($_POST['title']);
   $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $keywords    = filter_var($_POST['keywords'], FILTER_SANITIZE_STRING);
   $visibility  = filter_var($_POST['visibility'], FILTER_SANITIZE_NUMBER_INT);
   
   $created_date = $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.$second;
   

   $check_title    = $_get->check_news_title($alias);
	   
   if($check_title->rows > 0){
      $alias = $alias.'-'.$check_title->rows;
   }else{
      $alias = $alias;
   }
	 
	   
   /* --- IMAGE --- */
   $image	= upload_file($_global_general->url, 'images', $_FILES['upload_news_1'], 'news', 'files/uploads/news-image/', $ini_max_upload);
   
   $_update->insertNews($category, $title, $alias, $date, $image, $excerpt, $content, $created_date, $description, $keywords, $visibility);
   $_update->insertNewsLang($category, $title, $alias, $date, $image, $excerpt, $content, $created_date, $description, $keywords, $visibility);
   
   $type	= 'success';
   $msg		= 'Item has been successfully saved';
   $page	= 'self';
   
   set_alert($type, $msg);
   safe_redirect($page);
}
?>
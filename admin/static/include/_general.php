<?php
/*
# ----------------------------------------------------------------------
# HEADER: GENERAL
# ----------------------------------------------------------------------
*/



/*
# ----------------------------------------------------------------------
# GENERAL FUNCTION
# ----------------------------------------------------------------------
*/

function get_dirname($path){
   $current_dir = dirname($path);
   
   if($current_dir == "/" || $current_dir == "\\"){
      $current_dir = '';
   }
   
   return $current_dir;
}


/* --- GET DOMAIN (SYMFONY METHOD) --- */
function get_host(){
   $possibleHostSources		= array('HTTP_X_FORWARDED_HOST', 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR');
   $sourceTransformations	= array(
   							  "HTTP_X_FORWARDED_HOST" => function($value){
								  										 $elements = explode(',', $value);
																		 return trim(end($elements));
							  											 }
    						  );
    $host	= '';
    foreach($possibleHostSources as $source){
	   if(!empty($host)) break;
	   if(empty($_SERVER[$source])) continue;
	   $host = $_SERVER[$source];
	   if(array_key_exists($source, $sourceTransformations)){
	      $host = $sourceTransformations[$source]($host);
	   }
	}
	
	// Remove port number from host
    $host = preg_replace('/:\d+$/', '', $host);

    return trim($host);
}


/* --- RANDOM CHARACTER --- */
function randomchr($length){
   $s       = '';
   $letters = '123456789asbcdefghijklmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
   $lettersLength = strlen($letters)-1;

   for($i = 0 ; $i < $length ; $i++){
      $s .= $letters[rand(0,$lettersLength)];
   }
   
   return $s;
}


/* --- CLEAN URL --- */
function cleanurl($str) {
   $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
   $clean = str_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
   $clean = strtolower(trim($clean, '-'));
   $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

   return $clean;
}


/* --- CLEAN SPACE --- */
function cleanspace($str) {
   $temp = preg_replace('/\s+/', '_', $str);
   
   return $temp;
}


/* --- REMOVE HTML ATTRIBUTE --- */
function removeHtmlAttributes($tagSource){
   $stripAttrib = "' (class&#166;javascript:&#166;onclick&#166;ondblclick&#166;onmousedown&#166;onmouseup&#166;onmouseover&#166;onmousemove&#166;onmouseout&#166;onkeypress&#166;onkeydown&#166;onkeyup&#166;oncontextmenu)=\"(.*?)\"'i";
   $tagSource = stripslashes($tagSource);
   $tagSource = preg_replace($stripAttrib, '', $tagSource);
   
   return $tagSource;
}


/* --- REMOVE HTML TAGS --- */
function removeHtmlTags($source) {
   $allowedTags = '<h1><h2><h3><h4><h5><h6><br><b><p><u><i><a><ol><ul><li><pre><hr><blockquote><table><tr><td><th><span><div><strong><tbody><sup><font>';
   $source = strip_tags($source, $allowedTags);
   return preg_replace('/<(.*?)>/ie', "'<'.removeHtmlAttributes('\\1').'>'", $source);
}


function token($post){
   
   if(!empty($post)){
   
      if(is_array($post) === TRUE){
	     $array = array();
	  
	     foreach($post as $post){
	     
		    if($post == ''){
		       $post = '0';
		    }else{
		       $post = $post;
			}
			
			array_push($array, $post);
		 }
		 
		 if(in_array('0', $array)){
	        $return = '0';
		 }else{
	        $return = '1';
		 }
	  
	  }else{
         $array = $post;
	  
	     if(in_array('0', $array)){
	        $return = '0';
		 }else{
	        $return = '1';
		 }
	  }
   
   }else{
      $return = '1';
   }
   
   return $return;
   
}


/*
# ----------------------------------------------------------------------
# ALERT
# ----------------------------------------------------------------------
*/

/* --- SET ALERT --- */
function set_alert($type, $msg){
   
   if(session_id() == ''){
      session_start();
   }
   
   $_SESSION['alert']['type'] = $type;
   $_SESSION['alert']['msg']  = $msg;
   
}


/* --- SHOW ALERT --- */
function show_alert($type, $msg){
   
   if(session_id() == ''){
      session_start();
   }
   
   if($type != '' && $msg != ''){
      echo '<div class="alert alert-'.$type.' animated slideInDown">';
      echo '<div class="container">';
	  echo '<button type="button" class="close" id="id-btn-dissmiss-alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      echo $msg;
      echo '</div>';
      echo '</div>';
   }
   
}


/*
# ----------------------------------------------------------------------
# NUMBERS
# ----------------------------------------------------------------------
*/


/* --- DISPLAY PRICE --- */
function price($currency, $number){
   
   if($currency == 1){
      $format = number_format($number,0,',','.');
   }else if($currency == 2){
      $format = number_format($number,2,'.',',');
   }
   
   return $format;
}


/* --- CLEAN PRICE --- */
function clean_price($currency, $number) {
   
   if($currency == 1){
      $clean = str_replace(".", "", $number);
   }else if($currency == 2){
      $clean = str_replace(".", "", $number);
   }

   return $clean;
}


/* --- CLEAN NUMBER --- */
function clean_number($number){
   $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $number);
   $clean = preg_replace("/[^0-9]/", '', $number);
   $clean = trim($clean, '*');
   $clean = preg_replace("/[^0-9]/", '', $clean);

   return $clean;
}


/* --- CLEAN ALPHANUMERIC WITH SPACE --- */
function clean_alphanumeric($alphanum){
   $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $alphanum);
   $clean = preg_replace("/[^a-zA-Z0-9]\s/", '', $alphanum);
   $clean = trim($clean, '*');
   $clean = preg_replace("/[^a-zA-Z0-9]\s/", '', $clean);

   return $clean;
}


/*
# ----------------------------------------------------------------------
# DATE & TIME FORMAT
# ----------------------------------------------------------------------
*/

function format_date($time){
   $date   = date('D, j M Y',strtotime($time));  
   
   return $date;
}


// FORMAT DATE FOR DATEPICKER
function format_date_min($time){
   $date   = date('Y/m/j',strtotime($time));  
   
   return $date;
}


// FORMAT DATE FOR SQL
function format_date_sql($time){
   $date   = date('Y-m-j',strtotime($time));  
   
   return $date;
}


/*
# ----------------------------------------------------------------------
# FUNCTION: HEADER ADMIN
# ----------------------------------------------------------------------
*/


/* --- PAGE INIT --- */
function page_init($equal_search, $default_sort_by){
   $pgdata = array();
   
   /* --- PAGE --- */
   if(!isset($_REQUEST["pg"]) || $_REQUEST["pg"] == ''){
      $pgdata['page'] = 1;
   }else{
      $pgdata['page'] = $_REQUEST["pg"];
   }
   
   
   /* --- QUERY PER PAGE --- */
   if (!isset($_REQUEST["qpp"]) || $_REQUEST["qpp"] == ''){
      $pgdata['query_per_page'] = 25;
   }else{
      $pgdata['query_per_page'] = $_REQUEST['qpp'];
   }
   
   
   /* --- FIRST VALUE IN LIMIT --- */
   $pgdata['first_record'] = ($pgdata['page'] - 1) * $pgdata['query_per_page'];
   
   
   /* --- SORT BY --- */
   if(!isset($_REQUEST['srt'])){
      $pgdata['sort_by']    = '';
   }else{
      $pgdata['sort_by']    = $_REQUEST["srt"];
   }
   
   if($pgdata['sort_by'] == "" ){
      $pgdata['sort_by'] = $default_sort_by;
   }
   
   
   /* --- SEARCH FIELD --- */
   if(isset($_REQUEST['src'])){
      $pgdata['search_parameter'] = stripslashes($_REQUEST['src']);
   }else{
      $pgdata['search_parameter'] = '';
   }
   
   
   /* --- SEARCH FIELD --- */
   if(isset($_REQUEST['src'])){
      $pgdata['search_value'] = stripslashes($_REQUEST['srcval']);
   }else{
      $pgdata['search_value'] = '';
   }
   
   $search_parameter = stripslashes($pgdata['search_parameter']);
   $search_value     = stripslashes($pgdata['search_value']);
   
   
   if($search_parameter == ''){
      $pgdata['search_query'] = '1';
	  $pgdata['search']       = '';
   }else{
      $pgdata['search'][$search_parameter] = $search_value;
	  
	  if(in_array($search_parameter, $equal_search)){
	     $pgdata['search_query'] = $search_parameter." = '".$search_value."'";
	  }else{
	     $pgdata['search_query'] = $search_parameter." LIKE '%".$search_value."%'";
	  }
	   
   }
	
   return $pgdata;
}


/* --- ORDER DISABLING --- */
function order_disabling_search($variabel, $post_src){
   
   if($variabel == "$post_src"){ 
      echo "value=\"".str_replace('\\', '/', $_REQUEST['srcval'])."\"";
   }else if(!empty($variabel)){ 
      echo 'disabled="disabled"';
   }

}


/* --- VIEW PAGE --- */
function view_page($total_page, $page){
	
   if($total_page == 0){
      $total_page = $page;
   }
   
   for($i=1;$i<=$total_page;$i++){
      echo "<option value=\"".$i."\"";
	  if($i == $page){
	     echo 'selected="selected"';
	  }
	  echo ">".$i."</option> \n";
   }

}



/* --- VIEW PER PAGE --- */
function view_per_page($qpp, $total_item){
   
   echo '<option value="25"';
   if($qpp =="25"){ 
      echo "selected=\"selected\"";
   }
   echo '>25</option>';
   
   echo '<option value="50"';
   if($qpp =="50"){ 
      echo "selected=\"selected\"";
   }
   echo '>50</option>';
   
   
   echo '<option value="100"';
   if($qpp =="100"){ 
      echo "selected=\"selected\"";
   }
   echo '>100</option>';
   
   if($total_item > 100){
   echo '<option value="'.$total_item.'"';
   if($qpp == $total_item){ 
      echo "selected=\"selected\"";
   }
   echo '>All</option>';
   }
}


/* --- FILES HANDLING --- */
function codeToMessage($code){ 
   switch ($code) { 
      case UPLOAD_ERR_INI_SIZE: 
	  $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
	  break; 
	  
	  
	  case UPLOAD_ERR_FORM_SIZE: 
	  $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"; 
	  break; 
	  
	  case UPLOAD_ERR_PARTIAL: 
	  $message = "The uploaded file was only partially uploaded"; 
	  break; 
	  
	  case UPLOAD_ERR_NO_FILE: 
	  $message = "No file was uploaded";
	  break; 
		  
      case UPLOAD_ERR_NO_TMP_DIR: 
      $message = "Missing a temporary folder"; 
      break; 
		  
      case UPLOAD_ERR_CANT_WRITE: 
      $message = "Failed to write file to disk"; 
      break; 
		  
      case UPLOAD_ERR_EXTENSION: 
      $message = "File upload stopped by extension"; 
      break; 
		  
      default: 
      $message = "Unknown upload error"; 
      break; 
   }
	   
   return $message; 
}


function upload_code_message($code){ 
   switch ($code) { 
      case 1: 
	  $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
	  break; 
	  
	  case 2: 
	  $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"; 
	  break; 
	  
	  case 3: 
	  $message = "The uploaded file was only partially uploaded"; 
	  break; 
	  
	  case 4: 
	  $message = "No file was uploaded";
	  break; 
		  
      case 5: 
      $message = "Missing a temporary folder"; 
      break; 
		  
      case 6: 
      $message = "Failed to write file to disk"; 
      break; 
		  
      case 7: 
      $message = "File upload stopped by extension"; 
      break; 
		  
      default: 
      $message = "Unknown upload error"; 
      break; 
   }
	   
   echo $message; 
}


function upload_image($files, $upload_dir, $prefix, $page){
   
   /* --- FILE: NAME & TYPE --- */
   $files_name = substr($files['name'], 0, -4);
   $file_type  = substr($files['name'],-4);
   
   $uploads_dir   = $upload_dir;
   $name 		  = cleanurl(str_replace(array('(',')',' '),'_',$files_name)).$file_type;
   $tmp		      = $files['tmp_name'];
   $prefix        = $prefix;
   $prod_img      = $uploads_dir.$prefix.$name;
   $error         = $files['error'];
   
   if($error == 0){
      if(move_uploaded_file($tmp, $prod_img)){
		 $filename     = $prod_img;
	  }else{
	     $type = 'danger';
		 $msg  = "Image upload failed";
		 
		 set_alert($type, $msg);
		 safe_redirect($page);
	  }
	  
   }else{
      $type = 'danger';
	  $msg  = 'Error: '.upload_code_message($error);
		 
      set_alert($type, $msg);
      safe_redirect($page);
   }
   
   return $filename;
}



function upload_file($global_url, $type, $file, $prefix, $upload_dir, $ini_max_upload){
   
   /* ----------------------------------------------------------------------
   * TYPE:
   * string: images / files
   * ----------------------------------------------------------------------
   */
   
   $files_name	= substr($file['name'],0, -4);
   $file_type	= $file['type'];
			
			
   if($type === 'images'){
      if($file_type === 'image/jpeg'){
         $file_type = '.jpg';
	  }else if($file_type === 'image/png'){
         $file_type = '.png';
	  }else if($file_type === 'image/gif'){
         $file_type = '.gif';
	  }
   
   }else if($type === 'files'){
      if($file_type === 'application/zip'){
         $file_type = '.zip';
	  }else if($file_type === 'application/x-rar-compressed'){
         $file_type = '.rar';
	  }else if($file_type === 'application/pdf'){
         $file_type = '.pdf';
	  }
	  
   }
   
   
   $uploads_dir		= __DIR__.'/../../../'.$upload_dir;
   $userfile_name	= cleanurl(str_replace(array('(',')',' '),'_',substr($files_name, 0, 20))).$file_type;
   $userfile_tmp	= $file['tmp_name'];
   $file_error		= $file['error'];
   $file_type		= $file['type'];
   $slideshow_size	= $file['size'];
   $prefix			= $prefix.'-'.date('d-m-y-H-i-s').'-';
   $prod_img		= $uploads_dir.$prefix.$userfile_name;
   $filename		= $upload_dir.$prefix.$userfile_name;
   
   if($type === 'images'){
      $allowed_type	= array('image/jpeg', 'image/png', 'image/gif');
   }else if($type === 'files'){
      $allowed_type	= array('application/zip', 'application/x-rar-compressed', 'application/pdf');
   }
   
   
   /* --- TOTAL SIZE SLIDESHOW --- */
   if($slideshow_size > $ini_max_upload){
      $type = 'danger';
	  $msg  = 'Maximum file size: '.price(1, $ini_max_upload).'Byte(s)';
			
      set_alert($type, $msg);
      safe_redirect('self');
		 
   /* --- FILE TYPE (IMAGE: JPG, PNG, GIF & FILES: PDF, ZIP) --- */
   }else if(!in_array($file_type, $allowed_type)){
      $type = 'danger';
	  $msg  = 'Only allowed images format: .jpg, .png, .gif & files format: .pdf, .zip, .rar';
			
      set_alert($type, $msg);
      safe_redirect('self');
		    
   }else if(!move_uploaded_file($userfile_tmp, $prod_img)){
      $type = 'danger';
	  $msg  = 'Error: Permission denied, check folder: '.$uploads_dir.' permission';
		 
      set_alert($type, $msg);
      safe_redirect('self');
	  
   }else if(move_uploaded_file($userfile_tmp, $prod_img) && $file_error == 0){
      
   }
   
   return $filename;
}


/*
# ----------------------------------------------------------------------
# DEFINED VARIABLE
# ----------------------------------------------------------------------
*/

$temp_url  = 'http://'.$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF']).'/';
$temp_curr = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$temp_img  = 'http://'.$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF']).'/admin/static/thimthumb.php?src=../';


/* --- ALERT SESSION --- */
if(!isset($_SESSION['alert']['type']) && !isset($_SESSION['alert']['msg'])){
   $_SESSION['alert']['type'] = '';
   $_SESSION['alert']['msg']  = '';
}


if($_SESSION['alert']['type'] != '' && $_SESSION['alert']['msg'] != ''){
   $_SESSION['alert']['type'] = $_SESSION['alert']['type'];
   $_SESSION['alert']['msg']  = $_SESSION['alert']['msg'];
}else{
   $_SESSION['alert']['type'] = $_SESSION['alert']['type'];
   $_SESSION['alert']['msg']  = $_SESSION['alert']['msg'];
}


/*
# ----------------------------------------------------------------------
# GET COUNTRY
# ----------------------------------------------------------------------
*/

function visitor_country(){
   
   $ip = $_SERVER["REMOTE_ADDR"];
   
   if(filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				
   if(filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
      $ip = $_SERVER['HTTP_CLIENT_IP'];
	  $result = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->geoplugin_countryName;
	  
   return $result <> NULL ? $result : "Unknown";
}


/* --- URL's --- */
if(!defined('BASE_URL') || !defined('CURR_URL') || !defined('IMG_URL')){
   define('BASE_URL', $temp_url);
   define('CURR_URL', $temp_curr);
   define('IMG_URL', $temp_img);
   
}


/* --- SAFE REDIRECT --- */
function safe_redirect($url, $exit=true){
   
   if(substr($url, 0, 5) == 'https'){
      $url = $url;
   }else if($url == 'self'){
      $url = CURR_URL;
   }else{
      $url = BASE_URL.$url;
   }
   
   if(!headers_sent()){
      header('HTTP/1.1 301 Moved Permanently');
	  header('Location: '.$url);
	  header("Connection: close");
   }
   
   print '<html>';
   print '<head>';
   print '<meta http-equiv="Refresh" content="0;url='.$url.'" />';
   print '</head>';
   print '<body onload="location.replace(\''.$url.'\')">';
   print '</body>';
   print '</html>';
   
   if ($exit) exit;
}


/* --- GET NAMESPACE --- */
$namespaces	= array();
foreach(get_declared_classes() as $name) {
   if(preg_match_all("@[^\\\]+(?=\\\)@iU", $name, $matches)) {
      $matches	= $matches[0];
	  $parent	=&$namespaces;
	  while(count($matches)){
	     $match = array_shift($matches);
		 if(!isset($parent[$match]) && count($matches))
	     $parent[$match]	= array();
		 $parent			=&$parent[$match];

	  }
   }
}
?>
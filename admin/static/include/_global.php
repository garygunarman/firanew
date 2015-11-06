<?php
/*
# ----------------------------------------------------------------------
# HEADER: GLOBAL
# ----------------------------------------------------------------------
*/

class HeaderGlobal extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   /* --- GENERAL --- */
   function get_general($id){
      $sql    		= "SELECT * FROM `tbl_general` WHERE general_id = '$id'";
      $data			= $this->CountData($sql);
	  
	  if($data > 0){
		 $result	= $this->fetchData('single', $sql);
	  }else{
	     $result	= 0;
	  }
	  
	  return $result;
   }
   
   
   /* --- INFO --- */
   function get_info($id) {
      $sql    		= "SELECT * FROM `tbl_infos` WHERE info_id = '$id'";
      $data			= $this->CountData($sql);
	  
	  if($data > 0){
		 $result	= $this->fetchData('single', $sql);
	  }else{
	     $result	= 0;
	  }
	  
	  
	  return $result;
   }
   
   
   /* --- NOTIFICATION --- */
   function get_notification($notification_id) {
      $sql    		= "SELECT * FROM `tbl_notification` WHERE notification_id = '$notification_id'";
      $data			= $this->CountData($sql);
	  
	  if($data > 0){
		 $result	= $this->fetchData('single', $sql);
	  }else{
	     $result	= 0;
	  }
	  
	  return $result;
   }
   
   
   /* --- CUSTOMER --- */
   function get_user($id) {
      $sql    		= "SELECT * FROM `tbl_user` WHERE user_id = '$id'";
      $data			= $this->CountData($sql);
	  
	  if($data > 0){
		 $result	= $this->fetchData('single', $sql);
	  }else{
	     $result	= 0;
	  }
	  
	  return $result;
   }
   
   
   /* --- MAILGUN --- */
   function get_mailgun(){
      $sql    	= "SELECT * FROM `tbl_mailgun_info`";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function count_email($date){
      $sql    	= "SELECT COUNT(`id`) AS rows FROM `tbl_mailgun` WHERE `date` = '$date'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function get_email($date){
      $sql    	= "SELECT * FROM `tbl_mailgun` WHERE `date` = '$date'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function get_doku_channel(){
      $sql    	= "SELECT channel_id, `channel_name` FROM `doku_channel` ORDER BY channel_id";
	  $result	= $this->fetchData('multiple', $sql);
	  
	  return $result;
   }
   
   
   function get_doku_channel_id($channel_id){
      $sql    	= "SELECT channel_id, `channel_name` FROM `doku_channel` WHERE channel_id = '$channel_id'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   /* --- LOGIN SECURITY (bcrypt) --- */
   function generateHash($password){
	  if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
	     $salt = '$2y$12$'.substr(md5(uniqid(rand(), true)), 0, 22);
		 return crypt($password, $salt);
	  }
	  
   }
   
   
   function verify($password, $hashedPassword){
      return crypt($password, $hashedPassword) === $hashedPassword;
   }
   
   
   function update_login_admin($password, $id){
      $sql	= "UPDATE `tbl_admin` SET `password` = ? WHERE id = ?";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $password, $id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_login_user($user_password, $user_id){
      $sql	= "UPDATE `tbl_user` SET `user_password` = ? WHERE user_id = ?";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $user_password, $user_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   /* --- END: LOGIN SECURITY (bcrypt) --- */
   
   
   function insert_counter($date, $counter, $status){
      $sql   = "INSERT INTO `tbl_mailgun` (`date`, `counter`, `status`) 
                               		VALUES(?, ?, ?)
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $date, $counter, $status);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_counter($date, $counter, $status, $id){
      $sql   = "UPDATE `tbl_mailgun` SET `date` = ?, `counter` = ?, `status` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $date, $counter, $status, $id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function counter_mailgun(){
      $_date = date('Y-m-d');
	  
	  $_mailgun_count = $this->count_email($_date);
	  
	  if($_mailgun_count->rows > 0){
   
	     $_mailgun_data = $this->get_email($_date);
	     $this->update_counter($_mailgun_data->date, ($_mailgun_data->counter + 1), $_mailgun_data->status, $_mailgun_data->id);
   
	  }else{
	     $this->insert_counter($_date, 1, 1);
	  }
	  
   }
   
   
   function update_log($order_id, $description, $note, $created_date){
      $sql    = "INSERT INTO `tbl_order_log` (order_id, `description`, `note`, `created_date`) VALUES(?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("isss", $order_id, $description, $note, $created_date);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
}


/* --- CONSTRUCT CLASS --- */
$_global = new HeaderGlobal();


/*
# ----------------------------------------------------------------------
# DEFINED VARIABLE
# ----------------------------------------------------------------------
*/


/* --- ACTION PAGE --- */
if(isset($_REQUEST['act']) && $_REQUEST['act'] != '' && $_REQUEST['act'] != 'empty'){
   $_temp_act = $_REQUEST['act'];
}else{
   $_temp_act = 'empty';
}


/* --- USER LOGIN --- */
if(isset($_SESSION['account'])){
   $_global_user_temp = $_SESSION['account']['login_id'];
}else{
   $_global_user_temp = '0';
}


/* --- GENERAL --- */
$_global_general    = $_global->get_general('1');
if(is_object($_global_general)){
   $param = 1;
}else{
   $param = 0;
}

if(!defined('CHECK_GLOBAL_GENERAL')){
   define('CHECK_GLOBAL_GENERAL', $param);
}


/* --- INFO --- */
$_global_info       = $_global->get_info('1');
if(is_object($_global_info)){
   $param = 1;
}else{
   $param = 0;
}

if(!defined('CHECK_GLOBAL_INFO')){
   define('CHECK_GLOBAL_INFO', $param);
}


/* --- NOTIFICATION --- */
$_global_notification       = $_global->get_notification('1');
if(is_object($_global_notification)){
   $param = 1;
}else{
   $param = 0;
}

if(!defined('CHECK_GLOBAL_NOTIFICATION')){
   define('CHECK_GLOBAL_NOTIFICATION', $param);
}


/* --- USER --- */
$_global_user       = $_global->get_user($_global_user_temp);
if(is_object($_global_user)){
   $param = 1;
}else{
   $param = 0;
}

if(!defined('CHECK_GLOBAL_USER')){
   define('CHECK_GLOBAL_USER', $param);
}


/* --- MAILGUN --- */
$_global_mailgun       = $_global->get_mailgun();
if(is_object($_global_mailgun)){
   $param = 1;
}else{
   $param = 0;
}

if(!defined('CHECK_GLOBAL_MAILGUN')){
   define('CHECK_GLOBAL_MAILGUN', $param);
}



/*
# ----------------------------------------------------------------------
# PHP INI VALUE
# ----------------------------------------------------------------------
*/

$temp_ini_max_upload   = ini_get('upload_max_filesize'); // Size of one post
$temp_ini_max_post     = ini_get('post_max_size');       // Total size of post
$temp_ini_memory_limit = ini_get('memory_limit');        // Memory allocated for handling script
$ini_max_input_vars    = ini_get('max_input_vars');
$temp_max_file_uploads = ini_get('max_file_uploads');
$temp_ini_upload_mb    = min($temp_ini_max_upload, $temp_ini_max_post, $temp_ini_memory_limit);

function return_bytes($val) {
   $val  = trim($val);
   $last = strtolower($val[strlen($val)-1]);
   switch($last){
      case 'g':
	     $val *= 1024;
	  case 'm':
	     $val *= 1024;
	  case 'k':
	     $val *= 1024;
   }

   return $val;
}


$ini_max_upload       = return_bytes($temp_ini_max_upload);
$ini_max_post         = return_bytes($temp_ini_max_post);
$ini_max_memory_limit = return_bytes($temp_ini_memory_limit);
$ini_max_file_uploads = return_bytes($temp_max_file_uploads);

/*
echo 'Size (Bytes): '.price(1, $ini_max_upload).' Byte(s)';
echo '<br> Max Upload: '.$ini_max_upload;
echo '<br> Max Post: '.$ini_max_post;
echo '<br> Max Memory Limit: '.$ini_max_memory_limit;
echo '<br> Max Upload (MB): '.$ini_max_upload_mb;
echo '<br> Max Input Vars: '.$ini_max_input_vars;
echo '<br> Max File Upload: '.$ini_max_file_uploads;
*/


/* --- CKEDITOR --- */
$_SESSION['kcfinder'] = '1';


/*
# ----------------------------------------------------------------------
# DEFINED
# ----------------------------------------------------------------------
*/


/* --- DYNAMIC PAGE --- */
if(!defined('ACT')){
   define('ACT', $_temp_act);
   
}


/* --- START: ERROR REPORTING --- */
if(!defined('ENVIRONMENT')){
   define('ENVIRONMENT', $environment);
   
}


if(ENVIRONMENT == '1'){
   error_reporting(E_ALL);
   
}else if(ENVIRONMENT == '2'){
   error_reporting(0);
   
}


/* --- DOMAIN NAME --- */
$_global_domain = get_host();

if($_global_domain === 'localhost'){
   $_global_domain = $_global_domain.'-'.cleanurl($_global_general->website_title);
   
}else{
   $_global_domain = cleanurl($_global_general->website_title);
   
}

if(!defined('DOMAIN_ADDRESS')){
   define('DOMAIN_ADDRESS', $_global_domain);
   
}


/* --- ENVIRONMENT URL --- */
$_base_url_environment = substr(strchr(BASE_URL, '/'), 2, 9);
if(!defined('URL_ENVIRONMENT')){
   define('URL_ENVIRONMENT', $_base_url_environment);
   
}


/* --- ADMIN DEFAULT PAGE --- */
if(!defined('DEFAULT_PAGE')){
   define('DEFAULT_PAGE', $temp_page);
   
}


/* --- URL --- */
if(!defined('URL')){
   define('URL', $_global_general->url);
   
}


/* --- MAILGUN --- */
if(!defined('MAILGUN_KEY') || !defined('MAILGUN_DOMAIN')){
   define('MAILGUN_KEY', $_global_mailgun->api_key);
   define('MAILGUN_DOMAIN', $_global_mailgun->domain);
   
}
?>
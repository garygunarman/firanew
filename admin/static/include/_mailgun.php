<?php
/*
# ----------------------------------------------------------------------
# MAIL BY MAILGUN
# ----------------------------------------------------------------------
*/

class H_Mailgun{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
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
   
   
   function count_email($date){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_mailgun` WHERE `date` = '$date'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_email($date){
      $sql    = "SELECT * FROM `tbl_mailgun` WHERE `date` = '$date'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
}

$_mailgun = new H_Mailgun();


require '_mailgun/vendor/autoload.php';
use Mailgun\Mailgun;

if(!defined('MAIL_KEY') && !defined('MAIL_DOMAIN')){
   define('MAIL_KEY', 'key-729630a3319cd3e70135c7bd5153a17e');
   define('MAIL_DOMAIN', 'key-729630a3319cd3e70135c7bd5153a17e');
}


function email_mailgun($api_key, $api_domain, $params){

   $_mailgun_api_key = $api_key;
   $_mailgun_domain  = $api_domain;

   $_mailgun_from    = $params['from'];
   $_mailgun_to      = $params['to'];
   $_mailgun_subject = $params['subject'];
   $_mailgun_text    = $params['msg'];

   $mg     = new Mailgun($_mailgun_api_key);
   $domain = $_mailgun_domain;

   # Now, compose and send your message.
   $mg->sendMessage($domain, array('from'    => $_mailgun_from, 
                                   'to'      => $_mailgun_to, 
                                   'subject' => $_mailgun_subject, 
                                   'html'    => $_mailgun_text));
					
								   
   /* --- COUNTER --- */
   /*
   $_date = date('Y-m-d');
   $_mailgun_count = $_mailgun->count_email($_date);
   
   if($_mailgun_count->rows > 0){
      $_mailgun_data = $_mailgun->get_email($_date);
	  $_mailgun->update_counter($_mailgun_data->date, ($_mailgun_data->counter + 1), $_mailgun_data->status, $_mailgun_data->id);
   }else{
      $_update->insert_counter($_date, 1, 1);
   }
   */
   
}
?>
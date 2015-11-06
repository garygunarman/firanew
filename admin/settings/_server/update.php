<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - NOTIFICATIONS: UPDATE
# ----------------------------------------------------------------------
*/


class NOTIFICATION_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_notification($post_id, $email_logo, $post_order, $post_warehouse){
      $sql    = "INSERT INTO tbl_notification (`notification_id`, `email_logo`, `email_order`, `email_warehouse`) VALUES(?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $post_id, $email_logo, $post_order, $post_warehouse);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_notification($email_logo, $post_order, $post_warehouse, $post_id){
      $sql    = "UPDATE tbl_notification SET `email_logo` = ?, `email_order` = ?, `email_warehouse` = ? WHERE `notification_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $email_logo, $post_order, $post_warehouse, $post_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
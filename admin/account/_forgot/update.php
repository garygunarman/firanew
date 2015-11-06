<?php
/*
# ----------------------------------------------------------------------
# FORGOT PASSWORD: UPDATE
# ----------------------------------------------------------------------
*/


class FORGOT_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function forgot_insert_log($admin_id, $admin_username, $code, $status, $date){
      $sql    = "INSERT INTO tbl_forgot_log(`admin_id`, `admin_username`, `code`, `status`, `log_time`) VALUES(?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $admin_id, $admin_username, $code, $status, $date);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function forgot_update_log($post_admin_id, $post_username, $post_code, $post_status, $date, $log_id){
      $sql    = "UPDATE tbl_forgot_log SET `admin_id` = ?, `admin_username` = ?, `code` = ?, `status` = ?, `log_time` = ? WHERE `log_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $post_admin_id, $post_username, $post_code, $post_status, $date, $log_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
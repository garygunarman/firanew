<?php
/*
# ----------------------------------------------------------------------
# RECOVER PASSWORD: UPDATE
# ----------------------------------------------------------------------
*/


class RECOVER_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function update_recover($status, $code, $log_id){
      $sql    = "UPDATE tbl_forgot_log SET `status` = ? WHERE `code` = ? AND `log_id` = '$log_id' = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $status, $code, $log_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_password($password, $id){
      $sql    = "UPDATE tbl_admin SET `password` = MD5(?) WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $password, $id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
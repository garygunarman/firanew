<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - PAYMENT: UPDATE
# ----------------------------------------------------------------------
*/


class PAYMENT_UPDATE{
 
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   function insert($live_code, $sandbox_code, $environment, $_3dsecure, $status){
      $sql   = "INSERT INTO `tbl_veritrans` (`live_code`, `sandbox_code`, `environment`, `_3dsecure`, `status`) VALUES (?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $live_code, $sandbox_code, $environment, $_3dsecure, $status);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update($live_code, $sandbox_code, $environment, $_3dsecure, $status, $id){
      $sql   = "UPDATE `tbl_veritrans` SET `live_code` = ?, 
                                       	   `sandbox_code` = ?, 
										   `environment` = ?,
										   `_3dsecure` = ?,
										   `status` = ?
                WHERE `id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $live_code, $sandbox_code, $environment, $_3dsecure, $status, $id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function delete_account(){
      $sql    = "TRUNCATE TABLE `tbl_veritrans`";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     //$stmt->bind_param("s", $account_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
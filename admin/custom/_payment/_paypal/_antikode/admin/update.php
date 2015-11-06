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

   function insert($api_mode, $api_username, $api_password, $api_signature, $api_return_url, $api_cancel_url, $api_status){
      $sql   = "INSERT INTO `tbl_paypal` (`api_mode`, `api_username`, `api_password`, `api_signature`, `api_return_url`, `api_cancel_url`, `api_status`) VALUES (?, ?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssss", $api_mode, $api_username, $api_password, $api_signature, $api_return_url, $api_cancel_url, $api_status);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update($api_mode, $api_username, $api_password, $api_signature, $api_return_url, $api_cancel_url, $api_status, $api_id){
      $sql   = "UPDATE `tbl_paypal` SET `api_mode` = ?, 
                                       	`api_username` = ?, 
										`api_password` = ?,
										`api_signature` = ?,
										`api_return_url` = ?,
										`api_cancel_url` = ?,
										`api_status` = ?
                WHERE `api_id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssssss", $api_mode, $api_username, $api_password, $api_signature, $api_return_url, $api_cancel_url, $api_status, $api_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function delete_account(){
      $sql    = "TRUNCATE TABLE `tbl_paypal`";
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
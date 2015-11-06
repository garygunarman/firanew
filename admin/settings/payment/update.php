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

   function insert_account($type, $post_account_bank, $post_account_number, $post_account_name){
      $sql   = "INSERT INTO tbl_account (`payment_type`, `account_bank`, `account_number`, `account_name`) VALUES (?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $type, $post_account_bank, $post_account_number, $post_account_name);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_account($post_account_bank, $post_account_number, $post_account_name, $post_account_id){
      $sql   = "UPDATE tbl_account SET `account_bank` = ?, 
                                       `account_number` = ?, 
								       `account_name` = ?
                WHERE `id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $post_account_bank, $post_account_number, $post_account_name, $post_account_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function delete_account($account_id){
      $sql   = "DELETE FROM tbl_account WHERE `id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $account_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
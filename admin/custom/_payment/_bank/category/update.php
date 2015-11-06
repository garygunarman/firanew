<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK: UPDATE
# ----------------------------------------------------------------------
*/


class BANK_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function update_bank($visibility, $status, $bank_id){
      $sql    = "UPDATE `tbl_bank` SET `bank_visibility` = ?, 
									   `status` = ?
				 WHERE `bank_id` = ?
			    ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $visibility, $status, $bank_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function delete_bank($bank_id){
      $sql    = "DELETE FROM `tbl_bank` WHERE `bank_id` = ?
			    ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("i", $bank_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
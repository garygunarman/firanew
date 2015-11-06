<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK - DETAILS:  UPDATE
# ----------------------------------------------------------------------
*/


class BANK_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function update_bank($bank_name, $bank_visibility, $logo, $hash_id){
      $sql    = "UPDATE `tbl_bank` SET `bank_name` = ?, `bank_visibility` = ?, `logo` = ? WHERE `hash_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("siss", $bank_name, $bank_visibility, $logo, $hash_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
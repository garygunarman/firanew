<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK - ADD: UPDATE
# ----------------------------------------------------------------------
*/


class UPDATE_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_bank($bank_name, $logo, $bank_visibility, $active, $status, $hash_id){
      $sql    = "INSERT INTO `tbl_bank` (`bank_name`, `logo`, `bank_visibility`, `active`, `status`, `hash_id`)
                                         VALUES(?, ?, ?, ?, ?, ?)
			    ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssiiis", $bank_name, $logo, $bank_visibility, $active, $status, $hash_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
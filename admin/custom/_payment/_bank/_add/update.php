<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT - ADD: UPDATE
# ----------------------------------------------------------------------
*/


class UPDATE_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_bank($account_number, $currency, $account_name, $account_description, $bank_id, $visibility, $active, $hash_id){
      $sql    = "INSERT INTO `tbl_bank_account` (`account_number`, `currency`, `account_name`, `account_description`, `bank_id`, `visibility`, `active`, `hash_id`)
                                         VALUES(?, ?, ?, ?, ?, ?, ?, ?)
			    ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sissiiis", $account_number, $currency, $account_name, $account_description, $bank_id, $visibility, $active, $hash_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
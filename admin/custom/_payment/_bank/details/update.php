<?php 
/*
# ----------------------------------------------------------------------
# PAYMENT ACCOUNT - DETAILS: UPDATE
# ----------------------------------------------------------------------
*/


class BANK_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function update_account($account_number, $currency, $account_name, $account_description, $visibility, $bank_id, $id){
      $sql   = "UPDATE `tbl_bank_account` SET `account_number` = ?,
	  										  `currency` = ?,
                                              `account_name` = ?,
											  `account_description` = ?,
                                              `visibility` = ?,
									          `bank_id` = ?
								 
                WHERE `id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sissiii", $account_number, $currency, $account_name, $account_description, $visibility, $bank_id, $id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
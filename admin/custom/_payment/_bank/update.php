<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT: UPDATE
# ----------------------------------------------------------------------
*/


class BANK_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   
   function delete($post_news_id){
      $sql   = "DELETE FROM `tbl_bank_account` WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $post_news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update($visibility, $id){
      $sql   = "UPDATE `tbl_bank_account` SET `visibility` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $visibility, $id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
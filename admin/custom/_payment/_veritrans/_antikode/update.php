<?php
/*
# ----------------------------------------------------------------------
# VERITRANS - SUBMIT: UPDATE
# ----------------------------------------------------------------------
*/


class PAYMENT_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_about($fill, $description, $keywords, $type){
      $sql    = "INSERT INTO `tbl_about` (`fill`, `description`, `keywords`, `type`) VALUES (?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $fill, $description, $keywords, $type);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION BACK ORDER: UPDATE
* ----------------------------------------------------------------------
*/



class EMAIL_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function update_order($status, $back_id){
      $sql   = "UPDATE tbl_back_order SET `status` = ? WHERE `back_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $status, $back_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}


?>
<?php
/*
# ----------------------------------------------------------------------
# MAILCHIMP: UPDATE
# ----------------------------------------------------------------------
*/


class MAILCHIMP_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert($mailchimp_key, $mailchimp_list, $status){
      $sql    = "INSERT INTO tbl_mailchimp (`mailchimp_key`, `mailchimp_list`, `status`) VALUES(?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $mailchimp_key, $mailchimp_list, $status);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update($mailchimp_key, $mailchimp_list, $status, $mailchimp_id){
      $sql    = "UPDATE tbl_mailchimp SET `mailchimp_key` = ?, `mailchimp_list` = ?, `status` = ? WHERE `mailchimp_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $mailchimp_key, $mailchimp_list, $status, $mailchimp_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
<?php
/*
# ----------------------------------------------------------------------
# LOGIN: UPDATE
# ----------------------------------------------------------------------
*/


class LOGIN_UPDATE extends HeaderGlobal{
   
   protected $conn;
   
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insertToken($type, $token, $description, $parameter, $created_date){
      $sql    = "INSERT INTO `tbl_token` (type, `token`, description, `parameter`, `created_date`) VALUES(?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $type, $token, $description, $parameter, $created_date);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function updateLoginToken($token, $login_date, $email){
      $sql    = "UPDATE `tbl_admin` SET `token` = ?, `login_date` = ? WHERE `email` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $token, $login_date, $email);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function updateLoginTime($login_date, $email){
      $sql    = "UPDATE `tbl_admin` SET `login_date` = ? WHERE `email` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $login_date, $email);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
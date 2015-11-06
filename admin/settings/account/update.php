<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - ACCOUNT: UPDATE
# ----------------------------------------------------------------------
*/


class GENERAL_UPDATE extends HeaderGlobal{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_admin($role, $username, $email, $password, $level){
      $sql   = "INSERT INTO tbl_admin (`role`, `username`, `email`, `password`, `level`) VALUES (?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $role, $username, $email, $password, $level);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function validation_old_password($password){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_admin WHERE `password` = MD5(?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $password);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_admin($role, $username, $email, $password, $level, $admin_id){
	  $password	= $this->generateHash($password);
	  
      $sql   = "UPDATE tbl_admin SET `role` = ?, 
                                     `username` = ?, 
								     `email` = ?, 
								     `password` = ?, 
								     `level` = ?
                WHERE `id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $role, $username, $email, $password, $level, $admin_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_admin_half($role, $username, $email, $level, $admin_id){
      $sql   = "UPDATE tbl_admin SET `role` = ?, 
                                     `username` = ?, 
								     `email` = ?,  
								     `level` = ?
                WHERE `id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $role, $username, $email, $level, $admin_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
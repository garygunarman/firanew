<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - CONFIGURATION: UPDATE
# ----------------------------------------------------------------------
*/


class GENERAL_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_config($config_environment, $config_timezone){
      $sql   = "INSERT INTO `tbl_config` (`config_environment`, `config_timezone`) VALUES (?,?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $config_environment, $config_timezone);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_config($config_environment, $config_timezone, $config_id){
      $sql   = "UPDATE `tbl_config` SET `config_environment` = ?, `config_timezone` = ?, `config_id` = ? WHERE `config_id` = '$config_id'";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $config_environment, $config_timezone, $config_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - CONFIGURATION: GET
# ----------------------------------------------------------------------
*/


class GENERAL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_config($config_id){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_config` WHERE `config_id` = '$config_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_config(){
      $sql    = "SELECT * FROM `tbl_config` WHERE `config_id` = '$config_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
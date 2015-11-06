<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - GENERAL: GET
# ----------------------------------------------------------------------
*/


class GENERAL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_general_validation(){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_general WHERE general_id = '1'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_country(){
      $sql    = "SELECT * FROM countries ORDER BY `country_name`";
      $query  = $this->conn->query($sql);
      $row    = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
}
?>
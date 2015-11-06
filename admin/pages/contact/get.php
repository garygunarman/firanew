<?php
/*
# ----------------------------------------------------------------------
# PAGES - CONTACT: GET
# ----------------------------------------------------------------------
*/


class CONTACT_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   
   function get_infos(){
      $sql    = "SELECT * FROM `tbl_infos`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function check_info(){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_infos` where `info_id` = '1'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
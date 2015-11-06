<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - NOTIFICATIONS: GET
# ----------------------------------------------------------------------
*/


class NOTIFICATION_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_notification(){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_notification";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_notification(){
      $sql    = "SELECT * FROM tbl_notification WHERE `notification_id` = '1'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

}
?>
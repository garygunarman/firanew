<?php
/*
# ----------------------------------------------------------------------
# FORGOT PASSWORD: GET
# ----------------------------------------------------------------------
*/


class FORGOT_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function forgot_count_username($username){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_admin WHERE `username` = '$username'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function forgot_get_username($username){
      $sql    = "SELECT * FROM tbl_admin WHERE `username` = '$username'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function count_log($admin_id){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_forgot_log WHERE `admin_id` = '$admin_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_log($admin_id){
      $sql    = "SELECT * FROM tbl_forgot_log WHERE `admin_id` = '$admin_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function count_email($date){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_mailgun` WHERE `date` = '$date'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_email($date){
      $sql    = "SELECT * FROM `tbl_mailgun` WHERE `date` = '$date'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
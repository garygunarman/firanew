<?php
/*
# ----------------------------------------------------------------------
# MAILCHIMP: GET
# ----------------------------------------------------------------------
*/


class MAILCHIMP_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_mailchimp(){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_mailchimp";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get($mailchimp_id){
      $sql    = "SELECT * FROM tbl_mailchimp WHERE `mailchimp_id` = '$mailchimp_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

}
?>
<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - PAYMENT: GET
# ----------------------------------------------------------------------
*/


class PAYMENT_GET{
 
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_payment($api_id){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_paypal WHERE `api_id` = '$api_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_payment($api_id){
      $sql    = "SELECT * FROM tbl_paypal WHERE `api_id` = '$api_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
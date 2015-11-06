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
   
   
   function count_payment($id){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_veritrans WHERE `id` = '$id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_payment($id){
      $sql    = "SELECT * FROM tbl_veritrans WHERE `id` = '$id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
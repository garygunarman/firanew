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
   
   
   function count_payments(){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_account";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function count_payment($id){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_account WHERE `id` = '$id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_payment($payment_type){
      $sql    = "SELECT * FROM tbl_account WHERE `payment_type` = '$payment_type'";
      $query  = $this->conn->query($sql);
      $row    = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function get_payments(){
      $sql    = "SELECT * FROM tbl_account ORDER BY `account_bank`";
      $query  = $this->conn->query($sql);
      $row    = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }

}
?>
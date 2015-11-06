<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK - DETAILS: GET
# ----------------------------------------------------------------------
*/


class BANK_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }


   function count_bank($hash_id){
      $sql    = "SELECT COUNT(`bank_id`) AS `rows` FROM `tbl_bank` WHERE `hash_id` = '$hash_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function get_bank($hash_id){
      $sql    = "SELECT * FROM `tbl_bank` WHERE `hash_id` = '$hash_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
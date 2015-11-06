<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT - ADD: GET
# ----------------------------------------------------------------------
*/


class BANK_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }


   function get_max_account_id(){
      $sql    = "SELECT MAX(`id`) AS `max_id` FROM `tbl_bank_account`";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function count_bank($bank_visibility){
      $sql    = "SELECT COUNT(`bank_id`) AS `rows` FROM `tbl_bank` WHERE `bank_visibility` = '$bank_visibility'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function get_bank($bank_visibility, $sort_by){
      $sql    = "SELECT * FROM `tbl_bank` WHERE `bank_visibility` = '$bank_visibility' ORDER BY '$sort_by'";
      $query  = $this->conn->query($sql);
	  $row    = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }

}
?>
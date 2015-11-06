<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK: GET
# ----------------------------------------------------------------------
*/


class BANK_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_bank($search, $sort_by, $query_per_page){
      $sql    = "SELECT * FROM `tbl_bank` AS `bank` WHERE $search ORDER BY $sort_by";
      $query  = $this->conn->query($sql);
	  
	  $full_order['total_query'] = $query->num_rows;
	  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);
	  
	  return $full_order;
   }


   function get_bank($search, $post_sort_by, $first_record, $query_per_page){
      $sql    = "SELECT * FROM `tbl_bank` WHERE $search ORDER BY $post_sort_by LIMIT $first_record, $query_per_page";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function count_bank_account($bank_id){
      $sql    = "SELECT COUNT(`bank_id`) AS `rows` FROM `tbl_bank_account` WHERE `bank_id` = '$bank_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function get_bank_account($bank_id){
      $sql    = "SELECT * FROM `tbl_bank_account` WHERE `bank_id` = '$bank_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
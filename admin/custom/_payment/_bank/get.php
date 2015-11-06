<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT: GET
# ----------------------------------------------------------------------
*/


class BANK_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }


   function count_bank($bank_visibility, $order_by){
      $sql    = "SELECT COUNT(`bank_id`) AS `rows` FROM `tbl_bank` WHERE `bank_visibility` = '$bank_visibility' ORDER BY $order_by";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_bank($bank_visibility, $order_by){
      $sql    = "SELECT * FROM `tbl_bank` WHERE `bank_visibility` = '$bank_visibility' ORDER BY $order_by";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function count_account($search, $cat, $sort_by, $query_per_page){
      $sql    = "SELECT * FROM `tbl_bank_account` AS `acc_` INNER JOIN `tbl_bank` AS `bank_` ON `acc_`.`bank_id` = `bank_`.`bank_id` 
                 WHERE $search AND $cat
                 ORDER BY $sort_by
			    ";
      $query  = $this->conn->query($sql);
	  
	  $full_order['total_query'] = $query->num_rows;
	  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);
	  
	  return $full_order;
   }


   function get_account($search, $sort_by, $first_record, $query_per_page, $cat){
      $sql    = "SELECT * FROM `tbl_bank_account` AS `acc_` INNER JOIN `tbl_bank` AS `bank_` ON `acc_`.`bank_id` = `bank_`.`bank_id` 
                 WHERE $search AND $cat
                 ORDER BY $sort_by
			     LIMIT $first_record, $query_per_page
			    ";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function count_total_order($order_payment_method){
      $sql    = "SELECT COUNT(order_id) AS `rows` FROM `tbl_order` WHERE `order_payment_method` = '$order_payment_method'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

}
?>
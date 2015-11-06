<?php
/*
* ----------------------------------------------------------------------
* EMAIL - WAITING FOR PAYMENT CUSTOMER: GET
* ----------------------------------------------------------------------
*/


class V_EMAIL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_order($order_number){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_order WHERE `order_number` = '$order_number'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_order($order_number){
      $sql    = "SELECT * FROM tbl_order WHERE `order_number` = '$order_number'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_order_item($order_id){
      $sql    = "SELECT * FROM tbl_order_item AS item_ LEFT JOIN tbl_product_type AS type_ ON item_.type_id = type_.type_id
	                                                   LEFT JOIN tbl_product AS prod_ ON type_.product_id = prod_.id
	             WHERE `order_id` = '$order_id'
				";
	  $query = $this->conn->query($sql);
	  $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function get_bank($account_bank){
      $sql    = "SELECT * FROM tbl_account WHERE `account_bank` = '$account_bank' ORDER BY account_bank ASC";
	  $query = $this->conn->query($sql);
	  $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }

}

?>
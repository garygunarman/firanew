<?php
/*
# ----------------------------------------------------------------------
# VERITRANS - SUBMIT: GET
# ----------------------------------------------------------------------
*/


class PAYMENT_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_order($order_number){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_order AS order_ LEFT JOIN tbl_order_item AS item_ ON order_.order_id = item_.order_id 
	   											                  LEFT JOIN tbl_user_purchase AS pur_ ON order_.order_id = pur_.order_id
																  LEFT JOIN tbl_product_type type_ ON item_.type_id = type_.type_id
																  LEFT JOIN tbl_product AS prod_ ON type_.product_id = prod_.id
																  LEFT JOIN tbl_category AS cat_ ON prod_.product_category = cat_.category_id
	             WHERE `order_number` = '$order_number'
				";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_order($order_number, $limit){
      $sql    = "SELECT * FROM tbl_order AS order_ LEFT JOIN tbl_order_item AS item_ ON order_.order_id = item_.order_id 
	   											   LEFT JOIN tbl_user_purchase AS pur_ ON order_.order_id = pur_.order_id
												   LEFT JOIN tbl_product_type type_ ON item_.type_id = type_.type_id
												   LEFT JOIN tbl_product AS prod_ ON type_.product_id = prod_.id
												   LEFT JOIN tbl_category AS cat_ ON prod_.product_category = cat_.category_id
	             WHERE `order_number` = '$order_number'
				 LIMIT $limit
				";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
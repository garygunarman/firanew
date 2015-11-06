<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION VERIFIED WAREHOUSE: GET
* ----------------------------------------------------------------------
*/


class V_EMAIL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_person($post_order_number){
      $sql    = "SELECT * FROM tbl_order AS order_ INNER JOIN tbl_user_purchase AS pur ON order_.order_id = pur.order_id
                                                   INNER JOIN tbl_user AS user ON pur.user_id = user.user_id
                 WHERE `order_number` = '$post_order_number'
			    ";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_cart($post_order_number){
      $sql    = "SELECT * FROM tbl_order AS order_ INNER JOIN tbl_order_item AS item ON order_.order_id = item.order_id
                 WHERE `order_number` = '$post_order_number'
			    ";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_items($post_order_number){
      $sql    = "SELECT * FROM tbl_order AS order_ INNER JOIN tbl_order_item AS item ON order_.order_id = item.order_id
                                                   INNER JOIN tbl_product_type AS type_ ON item.type_id = type_.type_id
												   INNER JOIN tbl_product AS prod ON type_.product_id = prod.id
                 WHERE `order_number` = '$post_order_number'
			    ";
	  $query = $this->conn->query($sql);
	  $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }

}

?>
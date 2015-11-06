<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION VERIFIED CUSTOMER: GET
* ----------------------------------------------------------------------
*/


class V_EMAIL_USER_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }


   function detail_order($order_number){
      $sql    = "SELECT * FROM tbl_order AS ord LEFT JOIN tbl_order_item AS item ON ord.order_id = item.order_id
                                                LEFT JOIN tbl_user_purchase AS pur ON ord.order_id = pur.order_id
											    LEFT JOIN tbl_user AS user ON pur.user_id = user.user_id
                 WHERE `order_number` = '$order_number'
			    ";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

}

?>
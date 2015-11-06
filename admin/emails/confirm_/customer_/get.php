<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION CONFIRM PAYMENT CUSTOMER: GET
* ----------------------------------------------------------------------
*/


class EMAIL_USER_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_user_confirm($order_number){
      $sql    = "SELECT * FROM `tbl_order` AS ord INNER JOIN tbl_user_purchase AS purchase ON ord.order_id = purchase.order_id 
                                                  INNER JOIN tbl_user as user ON purchase.user_id = user.user_id
			     WHERE  `order_number` =  '$order_number'
				";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
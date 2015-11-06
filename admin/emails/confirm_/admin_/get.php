<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION CONFIRM PAYMENT ADMIN: GET
* ----------------------------------------------------------------------
*/


class EMAIL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_user_confirm($get_order_number){
      $sql    = "SELECT * FROM `tbl_order` AS ord INNER JOIN tbl_user_purchase AS purchase ON ord.order_id = purchase.order_id 
                                                  INNER JOIN tbl_user as user ON purchase.user_id = user.user_id
			     WHERE  `order_number` =  '$get_order_number'
				";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }
   
   
   function get_bank_confirm($id){
      $sql    = "SELECT `bank_name`, `account_number`, `account_name` FROM `tbl_bank_account` AS `child_` INNER JOIN `tbl_bank` AS `main_` ON `child_`.bank_id = `main_`.bank_id
			     WHERE  `child_`.id = '$id'
				";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
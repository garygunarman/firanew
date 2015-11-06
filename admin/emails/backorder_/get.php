<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION BACK ORDER: GET
* ----------------------------------------------------------------------
*/


class EMAIL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_backorder($back_id){
      $sql    = "SELECT COUNT(*) FROM tbl_product AS prod_ LEFT JOIN tbl_product_type  AS type_  ON prod_.id = type_.product_id
												           LEFT JOIN tbl_product_image AS img_   ON type_.type_id = img_.type_id
												           LEFT JOIN tbl_product_stock AS stock_ ON type_.type_id = stock_.type_id
														   INNER JOIN tbl_back_order   AS back_  ON type_.type_id = back_.type_id
														   LEFT JOIN tbl_user          AS user_  ON user_.user_id = back_.user_id
														   LEFT JOIN tbl_promo_item    AS item_  ON item_.product_type_id = type_.type_id
			     WHERE `back_`.`back_id` = '$back_id'
				 GROUP BY `type_`.`type_id`
			    ";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }
   
   
   function get_backorder($back_id){
      $sql    = "SELECT * FROM tbl_product AS prod_ LEFT JOIN tbl_product_type  AS type_  ON prod_.id = type_.product_id
												    LEFT JOIN tbl_product_image AS img_   ON type_.type_id = img_.type_id
												    LEFT JOIN tbl_product_stock AS stock_ ON type_.type_id = stock_.type_id
				 								    INNER JOIN tbl_back_order   AS back_  ON type_.type_id = back_.type_id
													LEFT JOIN tbl_user AS user_ ON user_.user_id = back_.user_id
													LEFT JOIN tbl_promo_item    AS item_  ON item_.product_type_id = type_.type_id
													LEFT JOIN tbl_category AS cat_ ON prod_.product_category = cat_.category_id
			     WHERE `back_`.`back_id` = '$back_id'
				 GROUP BY `type_`.`type_id`
			    ";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }
   
   
   function count_stock($type_id, $stock_name){
      $sql    = "SELECT * FROM tbl_product_stock WHERE `type_id` = '$type_id' AND `stock_name` = '$stock_name'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
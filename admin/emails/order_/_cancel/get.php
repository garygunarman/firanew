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
   
   
   function detail_order($post_order_number){
      $sql    = "SELECT * FROM tbl_order AS ord LEFT JOIN tbl_order_item AS item ON ord.order_id = item.order_id
                                                LEFT JOIN tbl_user_purchase AS pur ON ord.order_id = pur.order_id
											    LEFT JOIN tbl_user AS user ON pur.user_id = user.user_id
                 WHERE `order_number` = '$post_order_number'
			    ";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function detail_order_item($post_order_id){
      $sql    = "SELECT * FROM tbl_order AS ord LEFT JOIN tbl_order_item AS item ON ord.order_id = item.order_id
                                                LEFT JOIN tbl_user_purchase AS pur ON ord.order_id = pur.order_id
											    LEFT JOIN tbl_user AS user ON pur.user_id = user.user_id
                 WHERE item.order_id = '$post_order_id'
				 GROUP BY item.item_id
			    ";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function order_item($order_id){	
      $sql    = "SELECT 
                 product.product_name, type.type_name, item.stock_name, item.fulfillment_date, item.shipping_number,
			     item.item_price, item.item_discount_price, item.item_quantity, item.item_id, item.fulfillment_date,
			     image.img_src, 
			     order_.order_shipping_amount, order_.order_id, order_.shipping_method, order_.fulfillment_status 
			  
			     FROM tbl_order AS order_ LEFT JOIN tbl_order_item AS item ON order_.order_id = item.order_id 
					   				      LEFT JOIN tbl_product_type AS type ON item.type_id = type.type_id 
									      LEFT JOIN tbl_product AS product ON type.product_id = product.id 
									      LEFT JOIN tbl_product_image AS image ON type.type_id = image.type_id
									   
			     WHERE item.order_id = '$order_id' AND image_order='1'";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function detail_order_item_product($type_id, $stock_name, $order_id){
      $sql    = "SELECT * FROM tbl_product AS prod_ LEFT JOIN tbl_product_type AS type_ ON prod_.id = type_.product_id
                                                    LEFT JOIN tbl_product_image AS img_ ON type_.type_id = img_.type_id
												    LEFT JOIN tbl_product_stock AS stock_ ON type_.type_id = stock_.type_id
												    LEFT JOIN tbl_order_item AS orditem_ ON type_.type_id = orditem_.type_id
												    LEFT JOIN tbl_order AS ord_ ON orditem_.order_id = ord_.order_id
												    LEFT JOIN tbl_promo_item AS disc ON type_.type_id = disc.product_type_id
												    LEFT JOIN tbl_promo AS promo ON disc.promo_id = promo.promo_id
                 WHERE type_.type_id = '$type_id' AND `stock_`.`stock_name` = '$stock_name' AND orditem_.order_id = '$order_id'
			     GROUP BY type_.type_id
			    ";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
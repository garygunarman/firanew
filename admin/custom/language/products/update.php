<?php
/*
# ----------------------------------------------------------------------
# PRODUCT LANGUAGE : GET
# ----------------------------------------------------------------------
*/


class ProductCustomUpdate{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_how($product_id, $how, $technical, $language_code){
      $sql    = "INSERT INTO tbl_product_custom_lang (`product_id`, `how`, `technical`, `language_code`) 
                                            VALUES(?, ?, ?, ?)
			    ";
	  $stmt   = $this->conn->prepare($sql);
			
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $product_id, $how, $technical, $language_code);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
   
   /* -- UPDATE LANGUAGE -- */
   function insert_product_lang($id_param, $product_name, $product_sold_out, $product_category, $product_new_arrival, $product_order, $product_date_added, $product_size_type_id, $product_visibility, $product_delete, $product_alias, $page_title, $page_description, $page_keywords, $language_code){
      $sql   = "INSERT INTO tbl_product_lang (`id_param`, `product_name`, `product_sold_out`, `product_category`, `product_new_arrival`, `product_order`, `product_date_added`, `product_size_type_id`, `product_visibility`, `product_delete`, `product_alias`, `page_title`, `page_description`, `page_keywords`, `language_code`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
			
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssssssssssss", $id_param, $product_name, $product_sold_out, $product_category, $product_new_arrival, $product_order, $product_date_added, $product_size_type_id, $product_visibility, $product_delete, $product_alias, $page_title, $page_description, $page_keywords, $language_code);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
   
   function update_product_lang($product_name, $page_title, $page_description, $page_keywords, $id_param, $language_code){
      $sql   = "UPDATE tbl_product_lang SET `product_name` = ?, `page_title` = ?, `page_description` = ? , `page_keywords` = ?
                WHERE `id_param` = ? AND `language_code` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
			
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $product_name, $page_title, $page_description, $page_keywords, $id_param, $language_code);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
   
   function update_product_lang_hidden($product_category, $product_new_arrival, $product_order, $product_size_type_id, $product_visibility, $product_delete, $id_param, $language_code){
      $sql   = "UPDATE tbl_product_lang 
	  			SET `product_category` = ?, `product_new_arrival` = ?, `product_order` = ? , `product_size_type_id` = ?, `product_visibility` = ?, `product_delete` = ?
                WHERE `id_param` = ? AND `language_code` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
			
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssssss", $product_category, $product_new_arrival, $product_order, $product_size_type_id, $product_visibility, $product_delete, $id_param, $language_code);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
   
   function insert_product_type_lang($id_param, $product_id, $type_code, $type_name, $type_price, $color_id, $type_description, $type_sizefit, $type_information, $type_weight, $type_new_arrival, $type_image, $type_order, $type_sold_out, $type_visibility, $type_active, $type_delete, $type_alias, $page_title, $page_description, $language_code){
      $sql   = "INSERT INTO tbl_product_type_lang (`id_param`, `product_id`, `type_code`, `type_name`, `type_price`, `color_id`, `type_description`, `type_sizefit`, `type_information`, `type_weight`, `type_new_arrival`, `type_image`, `type_order`, `type_sold_out`, `type_visibility`, `type_active`, `type_delete`, `type_alias`, `page_title`, `page_description`, `language_code`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
			
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssssssssssssssssss", $id_param, $product_id, $type_code, $type_name, $type_price, $color_id, $type_description, $type_sizefit, $type_information, $type_weight, $type_new_arrival, $type_image, $type_order, $type_sold_out, $type_visibility, $type_active, $type_delete, $type_alias, $page_title, $page_description, $language_code);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }


   function update_product_type_lang($type_name, $type_description, $type_sizefit, $type_information, $id_param, $language_code){
      $sql   = "UPDATE tbl_product_type_lang SET `type_name` = ?,
                                                 `type_description` = ?,
                                                 `type_sizefit` = ?,
                                                 `type_information` = ?
                WHERE `id_param` = ? AND `language_code` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
			
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $type_name, $type_description, $type_sizefit, $type_information, $id_param, $language_code);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# CATEGORY LANGUAGE : UPDATE
# ----------------------------------------------------------------------
*/


class CategoryCustomUpdate{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_category_lang($id_param, $category_name, $category_alias, $category_description, $category_level, $category_order, $category_active_status, $category_visibility_status, $meta_description, $meta_keywords, $language_code){
      $sql   = "INSERT INTO tbl_category_lang (`id_param`, `category_name`, `category_alias`, `category_description`, `category_level`, `category_order`, `category_active_status`, `category_visibility_status`, `meta_description`, `meta_keywords`, `language_code`)
                                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
			";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssssssss", $id_param, $category_name, $category_alias, $category_description, $category_level, $category_order, $category_active_status, $category_visibility_status, $meta_description, $meta_keywords, $language_code);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_category_lang($category_name, $category_alias, $category_description, $meta_description, $meta_keywords, $id_param, $language_code){
      $sql   = "UPDATE `tbl_category_lang` SET `category_name` = ?, `category_alias` = ?, `category_description` = ?, `meta_description` = ?, `meta_keywords` = ?
	  			WHERE `id_param` = ? AND `language_code` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param('sssssss', $category_name, $category_alias, $category_description, $meta_description, $meta_keywords, $id_param, $language_code);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function updateData($category_level, $category_order, $category_active_status, $category_visibility_status, $id_param, $language_code){
      $sql   = "UPDATE `tbl_category_lang` SET `category_level` = ?, `category_order` = ?, `category_active_status` = ?, `category_visibility_status` = ?
	  			WHERE `id_param` = ? AND `language_code` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $category_level, $category_order, $category_active_status, $category_visibility_status, $id_param, $language_code);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
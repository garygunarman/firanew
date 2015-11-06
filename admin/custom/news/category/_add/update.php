<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY ADD: UPDATE
# ----------------------------------------------------------------------
*/


class NEWS_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert($category_name, $category_alias, $category_description, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_order){
      $sql    = "INSERT INTO tbl_news_category (`category_name`, `category_alias`, `category_description`, `category_active`, `category_visibility`, `meta_descriptions`, `meta_keyword`, `category_order`)
                                         VALUES(?, ?, ?, ?, ?, ?, ?, ?)
			    ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssssss", $category_name, $category_alias, $category_description, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_order);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function insertLang($category_name, $category_alias, $category_description, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_order){
      $sql    		= "SELECT MAX(`category_id`) AS `id_param` FROM `tbl_news_category`";
      $query  		= $this->conn->query($sql);
	  $result 		= $query->fetch_object();
	  
	  $id_param		= $result->id_param;
	  $lang_code	= 'EN';
	  
      $sql    	= "INSERT INTO `tbl_news_category_lang` (`id_param`, `category_name`, `category_alias`, `category_description`, `category_active`, `category_visibility`, `meta_descriptions`, `meta_keyword`, `category_order`, `language_code`)
                                         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
			    ";
	  $stmt   	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssssssss", $id_param, $category_name, $category_alias, $category_description, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_order, $lang_code);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
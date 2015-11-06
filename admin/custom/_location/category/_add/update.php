<?php
/*
# ----------------------------------------------------------------------
# LOCATION - CITY ADD: UPDATE
# ----------------------------------------------------------------------
*/


class LOCATION_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert($category_name, $category_alias, $category_description, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_order){
      $sql    = "INSERT INTO `tbl_location_city` (`category_name`, `category_alias`, `category_description`, `category_active`, `category_visibility`, `meta_description`, `meta_keyword`, `category_order`)
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

}
?>
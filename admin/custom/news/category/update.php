<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY: UPDATE
# ----------------------------------------------------------------------
*/


class NEWS_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   
   function insert_category($category_name, $description, $category_active, $category_visibility){
      $sql    = "INSERT INTO tbl_news_category (`category_name`, `category_description`, `category_active`, `category_visibility`) 
	             VALUES (?, ?, ?, ?)
			    ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $category_name, $description, $category_active, $category_visibility);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_category($category_name, $description, $category_active, $category_visibility, $category_id){
      $sql    = "UPDATE tbl_news_category SET `category_name` = ?, 
	  										  `category_description` = ?,
	                                          `category_active` = ?, 
											  `category_visibility` = ? 
				 WHERE `category_id` = ?
			    ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $category_name, $description, $category_active, $category_visibility, $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function delete_category($category_id){
      $sql    = "DELETE FROM tbl_news_category WHERE `category_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_visibility($category_visibility, $category_id){
      $sql   = "UPDATE tbl_news_category SET `category_visibility` = ? WHERE `category_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $category_visibility, $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_order($category_order, $category_id){
      $sql   = "UPDATE tbl_news_category SET `category_order` = ? WHERE `category_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $category_order, $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
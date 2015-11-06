<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY DETAILS: UPDATE
# ----------------------------------------------------------------------
*/


class NEWS_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function update($category_name, $category_alias, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_id){
      $sql    = "UPDATE tbl_news_category SET `category_name` = ?,
	  										  `category_alias` = ?,
                                              `category_active` = ?,
									          `category_visibility` = ?,
											  `meta_descriptions` = ?,
											  `meta_keyword` = ?
			     WHERE `category_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssss", $category_name, $category_alias, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function updateLang($category_name, $category_alias, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_id){
      $sql    = "UPDATE `tbl_news_category_lang` SET `category_name` = ?,
	  										         `category_alias` = ?,
													 `category_active` = ?,
													 `category_visibility` = ?,
													 `meta_descriptions` = ?,
													 `meta_keyword` = ?
			     WHERE `id_param` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssss", $category_name, $category_alias, $category_active, $category_visibility, $meta_description, $meta_keyword, $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
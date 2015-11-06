<?php
/*
# ----------------------------------------------------------------------
# RECIPE: UPDATE
# ----------------------------------------------------------------------
*/


class RECIPE_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function AddCategory($category_name, $category_active, $category_visibility){
      $sql	= "INSERT INTO tbl_recipes_category (`category_name`, `category_active`, `category_visibility`) VALUES ('$category_name', '$category_active', '$category_visibility')";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $category_name, $category_active, $category_visibility);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function UpdateCategory($category_name, $category_active, $category_visibility, $category_id){
      $sql	= "UPDATE tbl_recipes_category SET `category_name` = '$category_name', 
                                               `category_active`= '$category_active', 
											   `category_visibility` = '$category_visibility'
			   WHERE category_id = '$category_id'
			  ";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $category_name, $category_active, $category_visibility, $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function deleteCategory($category_id){
      $sql	= "DELETE FROM tbl_recipes_category WHERE `category_id` = '$category_id'";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $category_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>


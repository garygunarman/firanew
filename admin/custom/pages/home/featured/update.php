<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - FEATURED PRODUCTS: INDEX
# ----------------------------------------------------------------------
*/


class FEATURED_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insertFeatured($post_type_id, $post_alias_id){
      $sql    = "INSERT INTO tbl_featured (`featured_type_id`, `featured_alias_id`) VALUES (?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $post_type_id, $post_alias_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

   
   function update_featured($featured_alias_id, $featured_type_id){
      $sql    = "UPDATE tbl_featured SET `featured_alias_id` = ? WHERE `featured_type_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $featured_alias_id, $featured_type_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

   
   function delete_featured($featured_type_id){
      $sql    = "DELETE FROM tbl_featured WHERE `featured_type_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $featured_type_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

   
   function empty_featured(){
      $sql    = "TRUNCATE TABLE `tbl_featured`";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     //$stmt->bind_param("s", $featured_type_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# LOCATION: UPDATE
# ----------------------------------------------------------------------
*/


class LOCATION_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   
   function delete($post_news_id){
      $sql   = "DELETE FROM `tbl_location` WHERE `news_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $post_news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update($news_visibility, $news_id){
      $sql   = "UPDATE `tbl_location` SET `news_visibility` = ? WHERE `news_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $news_visibility, $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_order($order_, $news_id){
      $sql   = "UPDATE `tbl_location` SET `order_` = ? WHERE `news_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $order_, $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
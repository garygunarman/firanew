<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING: UPDATE
# ----------------------------------------------------------------------
*/


class SHIPPING_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function deleteCourier($post_courier_id){
      $sql   = "DELETE FROM tbl_courier WHERE `courier_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $post_courier_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function deleteCourierRste($post_courier_name){
      $sql   = "DELETE FROM tbl_courier_rate WHERE `courier_name` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $post_courier_name);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function updateCourier($active_status, $courier_id){
      $sql   = "UPDATE `tbl_courier` SET `active_status` = ? WHERE `courier_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $active_status, $courier_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
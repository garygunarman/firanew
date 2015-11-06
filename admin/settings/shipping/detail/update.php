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
   
   
   function update_local_courier($post_courier_name, $post_courier_description, $post_service, $post_active_status, $post_weight_counter, $post_courier_id){
      $sql   = "UPDATE tbl_courier SET `courier_name` = ?, 
	                                   `courier_description` = ?, 
									   `services` = ?, 
									   `active_status` = ?, 
									   `weight_counter` = ? 
			    WHERE `courier_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $post_courier_name, $post_courier_description, $post_service, $post_active_status, $post_weight_counter, $post_courier_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_local_rate($courier_rate, $courier_weight, $courier_city){
      $sql   = "UPDATE tbl_courier_rate SET `courier_rate` = ?, `courier_weight` = ? WHERE `courier_city` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $courier_rate, $courier_weight, $courier_city);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_international_rate($courier_rate, $courier_rate_extend, $courier_weight, $courier_city){
      $sql   = "UPDATE tbl_courier_rate SET `courier_rate` = ?, `courier_rate_extend` = ?, `courier_weight` = ? WHERE `courier_city` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $courier_rate, $courier_rate_extend, $courier_weight, $courier_city);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
}
?>
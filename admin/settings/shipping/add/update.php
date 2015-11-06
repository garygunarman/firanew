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


   function insertCourier($courier_name, $courier_description, $courier_track, $active_status, $services, $weight_counter){
      $sql    = "INSERT INTO tbl_courier (`courier_name`, `courier_description`, `courier_track`, `active_status`, `services`, `weight_counter`) 
	                               VALUES(?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $courier_name, $courier_description, $courier_track, $active_status, $services, $weight_counter);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function insertCourierRate($post_courier_name, $post_courier_province, $post_courier_city, $post_courier_rate, $courier_rate_extend, $post_courier_weight){
      $sql    = "INSERT INTO tbl_courier_rate (`courier_name`, `courier_province`, `courier_city`, `courier_rate`, `courier_rate_extend`, `courier_weight`) 
	                                    VALUES(?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $post_courier_name, $post_courier_province, $post_courier_city, $post_courier_rate, $courier_rate_extend, $post_courier_weight);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

   
   function update_rate($courier_rate, $courier_rate_extend, $courier_rate_id){
      $sql    = "UPDATE tbl_courier_rate SET `courier_rate` = ?, `courier_rate_extend` = ? WHERE `courier_rate_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $courier_rate, $courier_rate_extend, $courier_rate_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
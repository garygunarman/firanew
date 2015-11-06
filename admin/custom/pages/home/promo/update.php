<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - PROMO BANNER: INDEX
# ----------------------------------------------------------------------
*/


class PROMO_BANNER_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_promo($promo_id, $filename, $link, $order, $flag){
      $sql    = "INSERT INTO `tbl_promo_banner` (`id`, `filename`, `link`, `order`, `flag`) VALUES(?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $promo_id, $filename, $link, $order, $flag);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_promo($filename, $link, $order, $flag, $promo_id){
      $sql    = "UPDATE `tbl_promo_banner` SET `filename` = ?, `link` = ?, `order` = ?, `flag` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $filename, $link, $order, $flag, $promo_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_promo_link($link, $post_name, $promo_id){
      $sql    = "UPDATE `tbl_promo_banner` SET `link` = ?, `name` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $link, $post_name, $promo_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function update_order_promo($order, $promo_id){
      $sql    = "UPDATE `tbl_promo_banner` SET `order` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $order, $promo_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

   
   function delete_order_promo($promo_id){
      $sql    = "DELETE FROM `tbl_promo_banner` WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $promo_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# PAGES - HOME: UPDATE
# ----------------------------------------------------------------------
*/


class HOME_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   
   function insert_slideshow($post_banner_id, $filename, $order){
      $sql    = "INSERT INTO `tbl_slideshow` (`id`, `filename`, `order_`) VALUES (?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $post_banner_id, $filename, $order);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_slideshow($filename, $slideshow_id){
      $sql    = "UPDATE `tbl_slideshow` SET `filename` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $filename, $slideshow_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function insertLinkBanner($post_banner_link, $post_banner_id){
      $sql   = "UPDATE `tbl_slideshow` SET `link` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $post_banner_link, $post_banner_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

   
   function update_order($order, $slideshow_id){
      $sql    = "UPDATE `tbl_slideshow` SET `order_` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $order, $slideshow_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
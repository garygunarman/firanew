<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - PROMO BANNER: INDEX
# ----------------------------------------------------------------------
*/

require_once(dirname(__FILE__).'/../../../../static/_header.php');


class PROMO_BANNER_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_promos($limit){
      $sql    = "SELECT * FROM `tbl_promo_banner` ORDER BY `order` LIMIT $limit";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function count_promos(){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_promo_banner`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

   
   function check_promos($post_promo_id){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_promo_banner` WHERE `id` = '$post_promo_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

   
   function get_promo($promo_id){
      $sql    = "SELECT * FROM `tbl_promo_banner` WHERE `id` = '$promo_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   

   function count_promo(){
      $sql    = "SELECT COUNT(*) FROM `tbl_promo_banner`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   

   function get_order_promo(){
      $sql    = "SELECT * FROM `tbl_promo_banner` ORDER BY `order` DESC LIMIT 1";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

   
   function promo_get_maxid(){
      $sql    = "SELECT MAX(id) AS max_id FROM `tbl_promo_banner`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

   
   function promo_get_max_order($order){
      $sql    = "SELECT * FROM tbl_promo_banner WHERE `order` = '$order'";
	  $query  = $this->conn->query($sql);
	  $row    = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
	  
	  return $row;
   }
   
}
?>
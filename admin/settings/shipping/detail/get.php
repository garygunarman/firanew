<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING: GET
# ----------------------------------------------------------------------
*/


class SHIPPING_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

  
   function get_detail($post_courier_name){
      $sql    = "SELECT * FROM tbl_courier WHERE courier_id = '$post_courier_name'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   

   function get_shipping($post_courier_name){
      $sql    = "SELECT * FROM cities GROUP BY `province` ORDER BY `province`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function get_city($post_courier_province, $post_courier_name){
      $sql   = "SELECT * FROM tbl_courier_rate WHERE `courier_province` = '$post_courier_province' AND `courier_name` = '$post_courier_name'";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function international($post_courier_name){
      $sql   = "SELECT * FROM tbl_courier_rate WHERE `courier_province` = 'international' AND `courier_name` = '$post_courier_name' ORDER BY `courier_city` ASC";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   

   function get_country(){
      $sql    = "SELECT * FROM countries ORDER BY `country_name`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
}
?>
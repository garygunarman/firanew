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


   function get_province(){
      $sql   = "SELECT * FROM province ORDER BY `province_name`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function get_city($post_province){
      $sql   = "SELECT * FROM cities AS city INNER JOIN tbl_courier_rate as rate ON city.city_name = rate.courier_city
                WHERE `province` = '$post_province' AND `courier_name` = '1'
				ORDER BY `courier_city`
			   ";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }

   
   function get_max_courier(){
      $sql    = "SELECT MAX(courier_id) AS latest_id FROM tbl_courier";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   

   function get_min_courier($post_courier_name){
      $sql    = "SELECT MIN(courier_rate_id) AS latest_id FROM tbl_courier_rate where `courier_name` = '$post_courier_name'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
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
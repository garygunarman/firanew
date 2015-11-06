<?php
/*
# ----------------------------------------------------------------------
# LOCATION - ADD: GET
# ----------------------------------------------------------------------
*/


class NEWS_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   
   function add_news_category(){
      $sql    = "SELECT * FROM `tbl_location_city` ORDER BY `category_name`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function get_news_id(){
      $sql    = "SELECT * FROM `tbl_location` ORDER BY `news_id` DESC LIMIT 1";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   

   function check_news_title($news_alias){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_location` WHERE `news_alias` = '$news_alias'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   

   function max_order(){
      $sql    = "SELECT MAX(`order_`) as `order` FROM `tbl_location`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

}
?>
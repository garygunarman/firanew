<?php
/*
# ----------------------------------------------------------------------
# LOCATION - DETAILS: GET
# ----------------------------------------------------------------------
*/


class LOCATION_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   

   function get_news_detail($news_id){
      $sql    = "SELECT * FROM `tbl_location` AS news INNER JOIN `tbl_location_city` AS cat ON news.news_category = cat.category_id WHERE news.news_id = '$news_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function getAllCategory(){
      $sql   = "SELECT * FROM `tbl_location_city` ORDER BY category_name";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   

   function check_news_title($news_title, $news_id){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_location` WHERE `news_title` = '$news_title' AND `news_id` != '$news_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
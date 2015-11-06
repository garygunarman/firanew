<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY DETAILS: GET
# ----------------------------------------------------------------------
*/


class NEWS_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   function get_category($category_id){
      $sql    = "SELECT * FROM `tbl_location_city` WHERE `category_id` = '$category_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function count_category($category_id){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_location_city` WHERE `category_id` = '$category_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function count_category_alias($category_id, $category_alias){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_location_city` WHERE `category_id` != '$category_id' AND `category_alias` = '$category_alias'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
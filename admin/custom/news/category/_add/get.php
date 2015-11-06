<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY ADD: GET
# ----------------------------------------------------------------------
*/


class NEWS_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   

   function count_category($category_alias){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_news_category` WHERE `category_alias` = '$category_alias'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }
   
   
   function get_max_category_order(){
      $sql    = "SELECT MAX(`category_order`) AS max_order FROM `tbl_news_category`";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
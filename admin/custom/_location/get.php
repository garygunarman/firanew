<?php
/*
# ----------------------------------------------------------------------
# LOCATION: GET
# ----------------------------------------------------------------------
*/


class LOCATION_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function count_news_category(){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_location_city` ORDER BY category_name";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_news_category(){
      $sql    = "SELECT * FROM `tbl_location_city` ORDER BY `category_order`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function count_news_single($news_id){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_location` WHERE `news_id` = '$news_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function get_news($news_id){
      $sql    = "SELECT * FROM `tbl_location` WHERE `news_id` = '$news_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function count_news($post_search, $post_sort_by, $query_per_page, $cat){
      $sql    = "SELECT * FROM `tbl_location` AS news INNER JOIN `tbl_location_city` AS cat ON news.news_category = cat.category_id 
                 WHERE $post_search AND $cat
                 ORDER BY $post_sort_by
			    ";
      $query  = $this->conn->query($sql);
	  
	  $full_order['total_query'] = $query->num_rows;
	  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);
	  
	  return $full_order;
   }


   function get_listing_news($post_search, $post_sort_by, $post_first_record, $post_qpp, $cat){
      $sql    = "SELECT * FROM `tbl_location` AS news INNER JOIN `tbl_location_city` AS cat ON news.news_category = cat.category_id 
                 WHERE $post_search AND $cat
                 ORDER BY $post_sort_by
			     LIMIT $post_first_record, $post_qpp
			    ";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }

}
?>
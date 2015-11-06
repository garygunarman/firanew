<?php
/*
# ----------------------------------------------------------------------
# LOCATION - CITY: GET
# ----------------------------------------------------------------------
*/


class LOCATION_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }


   function get_all_news_category(){
      $sql   = "SELECT * FROM `tbl_location_city`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function count_listing_news_category($search, $sort_by, $query_per_page){
      $sql   = "SELECT 
                cat.category_id, cat.category_name, cat.category_active, cat.category_visibility, cat.category_order,
			    COUNT(news.news_id) AS total_news
			    FROM `tbl_location_city` AS cat LEFT JOIN `tbl_location` AS news ON cat.category_id = news.news_category 
			    WHERE $search 
			    GROUP BY cat.category_id
			    ORDER BY $sort_by
			   ";
      $query  = $this->conn->query($sql);
	  
	  $full_order['total_query'] = $query->num_rows;
	  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);
	  
	  return $full_order;
   }


   function get_listing_news_category($search, $sort_by, $first_record, $query_per_page){
      $sql   = "SELECT 
                cat.category_id, cat.category_name, cat.category_active, cat.category_visibility, cat.category_order,
			    COUNT(news.news_id) AS total_news
			    FROM `tbl_location_city` AS cat LEFT JOIN `tbl_location` AS news ON cat.category_id = news.news_category 
			    WHERE $search 
			    GROUP BY cat.category_id
			    ORDER BY $sort_by
			    LIMIT $first_record , $query_per_page
			   ";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function get_news_child($post_news_category){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_location` WHERE `news_category` = '$post_news_category'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

}
?>
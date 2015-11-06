<?php
/*
# ----------------------------------------------------------------------
# CAREER JOBS - ADD: GET
# ----------------------------------------------------------------------
*/


class JOBS_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

function count_city($src_param, $post_order_by, $query_per_page){
   
   $sql    = "SELECT * FROM tbl_career_category 
              WHERE $src_param 
			  ORDER BY $post_order_by
			 ";
   		$query  = $this->conn->query($sql);

		  $full_order['total_query'] = $query->num_rows;
		  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);

		  return $full_order;
}


function get_city($src_param, $post_order_by, $start_record, $query_per_page){

   
   $sql    = "SELECT * FROM tbl_career_category
              WHERE $src_param 
			  ORDER BY $post_order_by
			  LIMIT $start_record, $query_per_page
			 ";
   		$query = $this->conn->query($sql);
	      $row   = array();

		  while($result = $query->fetch_object()){
		     array_push($row, $result);
		  }

	      return $row;
}


function count_job($post_category_id){

   
   $sql    = "SELECT COUNT(*) AS rows FROM tbl_career WHERE `category` = '$post_category_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
}

function count_category(){
   
   $sql    = "SELECT COUNT(*) AS rows FROM tbl_career_category ORDER BY `category_name`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
}

function get_category(){
   
   $sql    = "SELECT * FROM tbl_career_category ORDER BY `category_name`";
   		$query = $this->conn->query($sql);
	      $row   = array();

		  while($result = $query->fetch_object()){
		     array_push($row, $result);
		  }

	      return $row;
}
}
?>
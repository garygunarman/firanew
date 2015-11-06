<?php
/*
# ----------------------------------------------------------------------
# CAREER JOBS: GET
# ----------------------------------------------------------------------
*/


class JOBS_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

function count_job($src_param, $post_order_by, $query_per_page, $cat){

   
   $sql    = "SELECT * FROM tbl_career AS job LEFT JOIN tbl_career_category AS dept ON job.category = dept.category_id
              WHERE $src_param $cat
			  ORDER BY $post_order_by
			 ";
   		$query  = $this->conn->query($sql);

		  $full_order['total_query'] = $query->num_rows;
		  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);

		  return $full_order;

   
}


function get_job($src_param, $post_order_by, $start_record, $query_per_page, $cat){

   
   $sql    = "SELECT * FROM tbl_career AS job LEFT JOIN tbl_career_category AS dept ON job.category = dept.category_id
              WHERE $src_param $cat
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


function get_detail($post_career_id){
   
   $sql    = "SELECT * FROM tbl_career WHERE `career_id` = '$post_career_id'";
	$query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
}
}
?>
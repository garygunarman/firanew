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
function get_city($post_category_id){
   
   
   $sql    = "SELECT * FROM tbl_career WHERE `career_id` = '$post_category_id'";
  	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
}


function count_job($post_category_id){
   
   
   $sql    = "SELECT COUNT(*) AS rows FROM tbl_career WHERE `category` = '$post_category_id'";
   	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
}


function get_cities(){
   
   
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
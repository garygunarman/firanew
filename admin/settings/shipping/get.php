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
   
   
   function get_courier($search, $sort_by, $first_record, $query_per_page){
      $sql   = "SELECT * FROM tbl_courier
                WHERE $search
			    ORDER BY $sort_by
			    LIMIT $first_record, $query_per_page
			   ";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function get_full_courier($search, $sort_by, $first_record, $query_per_page){
      $sql   = "SELECT * FROM tbl_courier
             WHERE $search
			 ORDER BY $sort_by
			 LIMIT $first_record, $query_per_page
			";
      $query = $this->conn->query($sql);
	  
	  $full_order['total_query'] = $query->num_rows;
	  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);
	  
	  return $full_order;
   }
   
}
?>
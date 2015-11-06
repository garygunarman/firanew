<?php
/*
# ----------------------------------------------------------------------
# PAGES - HOME: GET
# ----------------------------------------------------------------------
*/


class HOME_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   function get_slideshows(){
      $sql    = "SELECT * FROM `tbl_slideshow` ORDER BY `order_`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function get_slideshow($slideshow_id){
      $sql    = "SELECT * FROM `tbl_slideshow` WHERE `id` = '$slideshow_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   

   function count_slideshow(){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_slideshow`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_order_slideshow(){
      $sql    = "SELECT * FROM `tbl_slideshow` ORDER BY `order_` DESC LIMIT 1";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function validate_slideshow($slideshow_id){
      $sql    = "SELECT COUNT(`id`) AS rows FROM `tbl_slideshow` WHERE `id` = '$slideshow_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   function get_new_id(){
      $sql    = "SELECT MAX(id) AS new_id FROM `tbl_slideshow`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

   
   function slideshow_get(){
      $sql    = "SELECT id, `link`, `filename` FROM `tbl_slideshow` ORDER BY `order_` ASC";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
}
?>
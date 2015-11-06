<?php
/*
# ----------------------------------------------------------------------
# PAGES - ABOUT: GET
# ----------------------------------------------------------------------
*/


class ABOUT_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   
   function get_about($type){
      $sql    = "SELECT * FROM `tbl_about` WHERE `type` = '$type'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

   
   function get_about_lang($lang, $type){
      if($lang === 'ID'){
         $sql    = "SELECT * FROM `tbl_about` WHERE `type` = '$type'";
	  }else if($lang === 'EN'){
	     $sql    = "SELECT * FROM `tbl_about_lang` WHERE `type` = '$type'";
	  }
	  
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }

   
   function check_about($type){
      $sql    = "SELECT COUNT(*) AS rows FROM `tbl_about` WHERE `type` = '$type'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
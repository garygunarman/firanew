<?php
/*
# ----------------------------------------------------------------------
# PAGES - ABOUT LANGUAGE : GET
# ----------------------------------------------------------------------
*/


class AboutCustomGet extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_about($type, $language_code){
      $sql		= "SELECT * FROM `tbl_about_lang` WHERE `type` = '$type' AND `language_code` = '$language_code'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function check_about($type, $language_code){
      $sql    	= "SELECT COUNT(*) AS rows FROM `tbl_about_lang` WHERE `type` = '$type' AND `language_code` = '$language_code'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function get_param($type){
      $sql    = "SELECT * FROM `tbl_about` WHERE `type` = '$type'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
}
?>
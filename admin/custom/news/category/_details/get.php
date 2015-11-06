<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY DETAILS: GET
# ----------------------------------------------------------------------
*/


class NEWS_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   function get_category($lang, $category_id){
      if($lang === 'ID'){
	     $sql    = "SELECT * FROM `tbl_news_category` WHERE `category_id` = '$category_id'";
		 
	  }else if($lang === 'EN'){
	     $sql    = "SELECT * FROM `tbl_news_category_lang` WHERE `id_param` = '$category_id'";
		 
	  }
      
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function count_category($lang, $category_id){
      if($lang === 'ID'){
	     $sql    = "SELECT COUNT(*) AS rows FROM `tbl_news_category` WHERE `category_id` = '$category_id'";
		 
	  }else if($lang === 'EN'){
	     $sql    = "SELECT COUNT(*) AS rows FROM `tbl_news_category_lang` WHERE `id_param` = '$category_id'";
		 
	  }
	  
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }


   function count_category_alias($category_id, $category_alias){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_news_category WHERE `category_id` != '$category_id' AND `category_alias` = '$category_alias'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }

}
?>
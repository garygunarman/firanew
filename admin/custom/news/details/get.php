<?php
/*
# ----------------------------------------------------------------------
# NEWS - EDIT: GET
# ----------------------------------------------------------------------
*/


class NEWS_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   

   function get_news_detail($lang, $news_id){
      if($lang === 'ID'){
         $sql    = "SELECT * FROM `tbl_news` AS `news_` INNER JOIN `tbl_news_category` AS `cat_` ON `news_`.news_category = `cat_`.category_id WHERE `news_`.news_id = '$news_id'";
		 
	  }else if($lang === 'EN'){
	     $sql    = "SELECT * FROM `tbl_news_lang` AS `news_` INNER JOIN `tbl_news_category_lang` AS `cat_` ON `news_`.news_category = `cat_`.id_param WHERE `news_`.id_param_news = '$news_id'";
		 
	  }
	  
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function getAllCategory($lang){
      if($lang === 'ID'){
	     $sql   = "SELECT * FROM `tbl_news_category` ORDER BY `category_name`";
		 
	  }else if($lang === 'EN'){
	     $sql    = "SELECT * FROM `tbl_news_category_lang` ORDER BY `category_name`";
		 
	  }
      
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   

   function check_news_title($news_title, $news_id){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_news WHERE `news_title` = '$news_title' AND `news_id` != '$news_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
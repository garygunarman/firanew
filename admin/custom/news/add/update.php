<?php
/*
# ----------------------------------------------------------------------
# NEWS - ADD: UPDATE
# ----------------------------------------------------------------------
*/


class NEWS_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insertNews($category, $title, $alias, $date, $image, $excerpt, $content, $created_date, $description, $keywords, $visibility){
      $sql   = "INSERT INTO tbl_news (`news_category`, `news_title`,`news_alias`, `news_date`, `news_image`, `news_excerpt`, `news_content`, `news_created_date`, `meta_description`, `meta_keywords`, `news_visibility`) 
			                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssssssss", $category, $title, $alias, $date, $image, $excerpt, $content, $created_date, $description, $keywords, $visibility);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function insertNewsLang($category, $title, $alias, $date, $image, $excerpt, $content, $created_date, $description, $keywords, $visibility){
      $sql    		= "SELECT MAX(`news_id`) AS `id_param` FROM `tbl_news`";
      $query  		= $this->conn->query($sql);
	  $result 		= $query->fetch_object();
	  
	  $id_param		= $result->id_param;
	  $lang_code	= 'EN';
	  
      $sql   = "INSERT INTO tbl_news_lang (id_param_news, `news_category`, `news_title`,`news_alias`, `news_date`, `news_image`, `news_excerpt`, `news_content`, `news_created_date`, `meta_description`, `meta_keywords`, `news_visibility`, `language_code`) 
			                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssssssssss", $id_param, $category, $title, $alias, $date, $image, $excerpt, $content, $created_date, $description, $keywords, $visibility, $lang_code);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function edit_news_category($news_category, $news_title, $news_date, $news_image, $news_content, $news_created_date, $news_id){
      $sql    = "UPDATE tbl_news SET 
                 `news_category` = ?, 
			     `news_title` = ?, 
			     `news_date` = ?, 
			     `news_image` = ?, 
			     `news_content` = ?, 
			     `news_created_date` = ?
			     WHERE `news_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssss", $news_category, $news_title, $news_date, $news_image, $news_content, $news_created_date, $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
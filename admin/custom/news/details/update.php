<?php 
/*
# ----------------------------------------------------------------------
# NEWS - EDIT: UPDATE
# ----------------------------------------------------------------------
*/


class NEWS_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function updateNews($news_category, $news_title, $news_alias, $news_date, $news_image, $news_excerpt, $news_content, $meta_description, $meta_keywords, $news_visibility, $news_id){
      $sql   = "UPDATE tbl_news SET `news_category` = ?,
                                    `news_title` = ?,
                                    `news_alias` = ?,
								    `news_date` = ?,
								    `news_image` = ?,
								    `news_excerpt` = ?,
								    `news_content` = ?,
									`meta_description` = ?,
									`meta_keywords` = ?,
									`news_visibility` = ?
								 
                WHERE `news_id` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssssssss", $news_category, $news_title, $news_alias, $news_date, $news_image, $news_excerpt, $news_content, $meta_description, $meta_keywords, $news_visibility, $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }


   function delete_image($news_image, $news_id){
      $sql   = "UPDATE tbl_news SET `news_image` = ? WHERE `news_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $news_image, $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function deleteNews($news_id){
      $sql   = "DELETE FROM tbl_news WHERE `news_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function updateNewsLang($news_title, $news_alias, $news_excerpt, $news_content, $meta_description, $meta_keywords, $news_id){
      $sql   = "UPDATE `tbl_news_lang` SET `news_title` = ?,
										   `news_alias` = ?,
										   `news_excerpt` = ?,
										   `news_content` = ?,
										   `meta_description` = ?,
										   `meta_keywords` = ?
                WHERE `id_param_news` = ?
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssss", $news_title, $news_alias, $news_excerpt, $news_content, $meta_description, $meta_keywords, $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
    
   
   function updateNewsLangField($news_category, $news_image, $news_date, $news_visibility, $news_id){
      $sql		= "UPDATE `tbl_news_lang` SET `news_category` = ?, `news_image` = ?, `news_date` = ?, `news_visibility` = ? WHERE `id_param_news` = ?";
	  $stmt   	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $news_category, $news_image, $news_date, $news_visibility, $news_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
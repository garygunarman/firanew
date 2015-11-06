<?php
/*
# ----------------------------------------------------------------------
# PAGES - ABOUT LANGUAGE : UPDATE
# ----------------------------------------------------------------------
*/


class AboutCustomUpdate{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   function insert_about_lang($fill, $description, $keywords, $id_param, $type, $language_code){
      $sql    = "INSERT INTO `tbl_about_lang` (`fill`, `description`, `keywords`, `id_param`, `type`, `language_code`) VALUES (?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $fill, $description, $keywords, $id_param, $type, $language_code);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_about_lang($fill, $description, $keywords, $type, $language_code){
      $sql    = "UPDATE `tbl_about_lang` SET `fill` = ?, `description` = ?,  `keywords` = ? WHERE `type` = ? AND `language_code` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssss", $fill, $description, $keywords, $type, $language_code);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
}
?>
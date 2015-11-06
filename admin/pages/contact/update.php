<?php
/*
# ----------------------------------------------------------------------
# PAGES - CONTACT: UPDATE
# ----------------------------------------------------------------------
*/


class CONTACT_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_contact($email, $email_display, $phone, $fax, $handphone, $description, $keywords, $cover){
      $sql    = "INSERT INTO `tbl_infos` (`email`, `email_display`, `telephone`, `fax`, `handphone`, `description`, `keywords`, `cover`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssssss", $email, $email_display, $phone, $fax, $handphone, $description, $keywords, $cover);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

   
   function update_contact($email, $email_display, $phone, $fax, $handphone, $description, $keywords, $cover, $info_id){
      $sql    = "UPDATE `tbl_infos` SET `email` = ?, `email_display` = ?, `telephone` = ?, `fax` = ?, `handphone` = ?, `description` = ?, `keywords` = ?, `cover` = ? WHERE `info_id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssssss", $email, $email_display, $phone, $fax, $handphone, $description, $keywords, $cover, $info_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}
?>
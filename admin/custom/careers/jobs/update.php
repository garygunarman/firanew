<?php
/*
# ----------------------------------------------------------------------
# CAREERS JOBS: UPDATE
# ----------------------------------------------------------------------
*/


class JOBS_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

function delete($post_career_id){
   
   echo $sql   = "DELETE FROM tbl_career WHERE `career_id` = ?";
   	$stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $post_career_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
}

function update_visibility($post_visibility, $post_category_id){
   $sql   = "UPDATE tbl_career SET `visibility` = ? WHERE `career_id` = ?";
   	$stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $post_visibility, $post_category_id);
	     $stmt->execute(); 
	  }
	
	  $stmt->close();
}
}
?>
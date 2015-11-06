<?php
/*
# ----------------------------------------------------------------------
# CAREER JOBS - ADD: UPDATE
# ----------------------------------------------------------------------
*/


class JOBS_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

function update($post_career_name, $post_category, $post_category_visibility, $post_description,$post_reports,$post_education, $post_career_id){

   
   $sql   = "UPDATE tbl_career SET `career_name` = ?,
								   `category`    = ?,
								   `visibility`  = ?,	
								   `description` = ?,	
									`reports`  = ?,
									`education`  = ?
			 WHERE `career_id` = ?
            ";
   
		$stmt   = $this->conn->prepare($sql);

		  if($stmt === false) {
		     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
		  }else{
		     $stmt->bind_param("sssssss", $post_career_name, $post_category, $post_category_visibility, $post_description, $post_reports, $post_education, $post_career_id);
		     $stmt->execute(); 
		  }

		  $stmt->close();
}


function delete($post_career_id){

   
   $sql   = "DELETE FROM tbl_career WHERE `career_id` = ?";
   	$stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $post_career_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
}
}
?>
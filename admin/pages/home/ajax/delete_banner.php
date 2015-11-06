<?php
/*
* ----------------------------------------------------------------------
* AJAX: REMOVE SLIDESHOW
* ----------------------------------------------------------------------
*/

if($_POST){
   require_once("../../../static/_header.php");
   
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
	  
	  
	  function delete_banner($id){
	     $sql   = "DELETE FROM tbl_slideshow WHERE `id` = ?";
	     $stmt   = $this->conn->prepare($sql);
	  
	     if($stmt === false) {
	        trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
		 }else{
	        $stmt->bind_param("s", $id);
	        $stmt->execute(); 
		 }
	  
	     $stmt->close();
	  }

   }
   
   $_ajax  = new AJAX();
   
   $ajx_id = filter_var($_POST['bid'], FILTER_SANITIZE_NUMBER_INT);
   //$banner_file = get_banner($ajx_id);
   
   //unlink("../../../../".$banner_file['filename']);
   $_ajax->delete_banner($ajx_id);


}
?>
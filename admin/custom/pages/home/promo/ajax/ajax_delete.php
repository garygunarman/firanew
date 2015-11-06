<?php
/*
# ----------------------------------------------------------------------
# AJAX: DELETE
# ----------------------------------------------------------------------
*/


if($_POST){
   
   require_once('../../../../../static/_header.php');
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
	  
	  function promo_get_banner($post_banner_id){
	     $sql    = "SELECT * FROM tbl_promo_banner WHERE `id` = '$post_banner_id'";
	     $query  = $this->conn->query($sql);
	     $result = $query->fetch_object();
	  
	     return $result;
	  }
	  
	  function delete_banner($id){
	     $sql   = "DELETE FROM tbl_promo_banner WHERE `id` = ?";
		 //$sql    = "UPDATE tbl_promo_item SET `filename` = ? WHERE `id` = ?";
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
   $ajx_id = filter_var($_POST['pid'], FILTER_SANITIZE_NUMBER_INT);
   
   $file_banner = $_ajax->promo_get_banner($ajx_id);
   $_ajax->delete_banner($ajx_id);
   //unlink(dirname(__FILE__).'/../../../../../../../'.$file_banner->filename);
}
?>
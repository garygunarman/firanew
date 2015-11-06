<?php
/*
# ----------------------------------------------------------------------
# RECOVER PASSWORD: GET
# ----------------------------------------------------------------------
*/


class RECOVER_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function check_recover_time($post_end_time){
      //$sql    = "SELECT DATEDIFF('$post_end_time', '$post_start_time') AS left_days";
	  $sql    = "SELECT TIMESTAMPDIFF(hour, '$post_end_time', NOW()) AS `hour`";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function count_recover($code, $status){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_forgot_log WHERE `code` = '$code' AND `status` = '$status'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_recover($code, $status){
      $sql    = "SELECT * FROM tbl_forgot_log WHERE `code` = '$code' AND `status` = '$status'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
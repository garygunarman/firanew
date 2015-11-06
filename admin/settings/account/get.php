<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - ACCOUNT: GET
# ----------------------------------------------------------------------
*/


class GENERAL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_admin($admString){
      $sql    = "SELECT * FROM `tbl_admin` WHERE `admString` = '$admString'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function count_email($email, $id){
      $sql    = "SELECT COUNT(`id`) AS rows FROM `tbl_admin` WHERE `email` = '$email' AND `id` != '$id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_admin_validation($admin_id, $post_user_name, $post_password){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_admin WHERE `id` = '$admin_id' AND `username` = '$post_user_name' AND `password` = MD5('$post_password')";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_admin_password_validation($password, $admin_id){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_admin WHERE password = '$password' AND id = '$admin_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
}
?>
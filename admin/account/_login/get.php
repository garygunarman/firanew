<?php
/*
# ----------------------------------------------------------------------
# LOGIN: GET
# ----------------------------------------------------------------------
*/

class LOGIN_GET extends HeaderGlobal{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function countToken($type){
      $sql    	= "SELECT COUNT(`id`) AS `rows` FROM `tbl_token` WHERE `type` = '$type'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function count_login($username, $password){
      $sql    	= "SELECT COUNT(*) AS rows FROM tbl_admin WHERE `username` = '$username'";
	  $result	= $this->fetchData('single', $sql);
	  
	  if($result->rows > 0){
	     $sql		= "SELECT * FROM tbl_admin WHERE `username` = '$username'";
		 $result	= $this->fetchData('single', $sql);
		 
	     if(substr($result->password, 0, 1) == "$"){
			 
		 }else if(md5($password) === $result->password){
		    $password	= $this->generateHash($password);
		    $this->update_login_admin($password, $result->id);
		 }
		 
	     $sql		= "SELECT * FROM tbl_admin WHERE `username` = '$username'";
		 $result	= $this->fetchData('single', $sql);
		 
		 $temp_password	= $this->verify($password, $result->password);
		 if($temp_password){
		    $result = 1;
		 }else{
		    $result = 0;
		 }
		 
	  }
	  
	  return $result;
   }
   
   
   function get_login($username, $password){
      $sql		= "SELECT * FROM tbl_admin WHERE `username` = '$username'";
	  $result	= $this->fetchData('single', $sql);
		 
	  
	  $temp_password	= $this->verify($password, $result->password);
	  if($temp_password){
         $sql		= "SELECT * FROM tbl_admin WHERE `username` = '$username'";
		 $result	= $this->fetchData('single', $sql);
	  }
	  
	  return $result;
   }
   
}
?>
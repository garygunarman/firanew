<?php
/*
* ----------------------------------------------------------------------
* EMAIL - ORDER PLACED ADMIN: UPDATE
* ----------------------------------------------------------------------
*/


class V_EMAIL_ADM_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_login($post_first_name, $post_last_name, $post_user_fullname, $post_email, $post_password, $post_user_alias, $post_user_created_date){
      $sql   = "INSERT INTO tbl_log (`user_first_name`, `user_last_name`, `user_fullname`, `user_email`, `user_password`, `user_alias`, `user_created_date`) 
                               VALUES(?, ?, ?, ?, MD5(?), ?, ?)
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sssssss", $post_first_name, $post_last_name, $post_user_fullname, $post_email, $post_password, $post_user_alias, $post_user_created_date);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   /* --- REGISTER --- */
   function register_user($post_first_name, $post_last_name, $post_user_fullname, $post_email, $post_password, $post_user_alias){
      $sql   = "INSERT INTO tbl_user (`user_first_name`, `user_last_name`, `user_fullname`, `user_email`, `user_password`, `user_alias`) 
                               VALUES(?, ?, ?, ?, MD5(?), ?)
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssss", $post_first_name, $post_last_name, $post_user_fullname, $post_email, $post_password, $post_user_alias);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   /* --- WISHLIST --- */
   function insert_wishlist($ajx_user,$date,$ajx_type,$ajx_stock,$ajx_qty){
      $sql    = "INSERT INTO tbl_wishlist(user_id,wishlist_date,type_id,stock_name,item_quantity)
			                      VALUES (?, ?, ?, ?, ?)
                ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("isisi", $ajx_user,$date,$ajx_type,$ajx_stock,$ajx_qty);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }

}


?>
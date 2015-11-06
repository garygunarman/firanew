<?php
/*
# ----------------------------------------------------------------------
# LOGOUT CONTROL
# ----------------------------------------------------------------------
*/


class ADMCleaner{
   
   protected $conn;
   
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function fetchData($type, $sql){
      
	  if($type === 'single'){
	     $query	= $this->conn->query($sql);
		 $row	= $query->fetch_object();
	  }else if($type === 'multiple'){
         $query	= $this->conn->query($sql);
         $row	= array();
			
         while($result = $query->fetch_object()){
	        array_push($row, $result);
		 }
	  }
	  
	  return $row;
	  
   }
   
   
   function getToken($token){
      $sql    	= "SELECT COUNT(*) AS `rows` FROM `tbl_token` WHERE `token` = '$token'";
	  $result	= $this->fetchData('single', $sql);
	  
	  if($result->rows > 0){
	     $sql		= "SELECT * FROM `tbl_token` WHERE `token` = '$token'";
	     $result	= $this->fetchData('single', $sql);
	  }else{
	     $result	= 0;
	  }
	  
	  return $result;
   }
   
   
   function updateToken($token){
      $sql    = "DELETE FROM `tbl_token` WHERE `token` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $token);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }
   
}


$_cleaner	= new ADMCleaner();
$_token		= $_SESSION['admin'][DOMAIN_ADDRESS]['token'];
$_data		= $_cleaner->getToken($_token);
$_SESSION['admin'][DOMAIN_ADDRESS]['auth'] = 2;

if(is_object($_data)){
   $_cleaner->updateToken($_token);
}else{

}

safe_redirect('logout.php');
?>
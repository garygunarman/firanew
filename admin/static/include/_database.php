<?php
/*
# ----------------------------------------------------------------------
# HEADER: DATABASE
# ----------------------------------------------------------------------
*/


if(!defined('DB_NAME') || !defined('DB_USER') || !defined('DB_PASS') || !defined('DB_HOST')){
   define('DB_NAME', $db_name);
   define('DB_USER', $db_user);
   define('DB_PASS', $db_pass);
   define('DB_HOST', $db_host);
   
}


/* --- MYSQLI --- */
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->connect_errno){
   echo 'Database connection error: ('.$mysqli->connect_errno.')'.$mysqli->connect_error;
}


class HeaderDatabase{
   
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
   
   
   function CountData($sqlQuery){
      $sql    	= $sqlQuery;
	  $query  	= $this->conn->query($sql);
	  $row		= $query->num_rows;
	  
	  if($row > 0){
	     $return	= 1;
	  }else{
	     $return	= 0;
	  }
	  
	  return $return;
	  
   }
   
   
   function updateData($query, $array){
      $type			= '';
	  $value		= '';
	  $stmt   		= $this->conn->prepare($query);
	  $total_array	= count($array);
	  
	  
	  /* --- TYPE --- */
	  for($i=0; $i<= ($total_array-1); $i++){
	     $type .= 's';
	  }
	  
	  
	  /* --- VALUE --- */
	  for($i=0; $i<=($total_array - 1); $i++){
	     
		 if($i == ($total_array - 1)){
		    $comma = '';
		 }else if($i != $total_array){
		    $comma = ', ';
		 }
		 
	     $value .= '$'.$array[$i].$comma;
	  }
	   
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $query . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("$type", $value);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
	   
}
?>
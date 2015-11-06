<?php
namespace FetchDB;
use FetchDB\FetchDB;

class FetchDatabase{
   
   private $conn;
   
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
	  
	  return $row;
	  
   }
}
?>
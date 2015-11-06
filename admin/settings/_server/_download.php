<?php
/*
# ----------------------------------------------------------------------
# DOWNLOADS
# ----------------------------------------------------------------------
*/


class DOWNLOAD_FILE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function download($file){
      
	  header('Content-disposition: attachment; filename='.$file);
	
      header('Content-type: text/plain');
      readfile(dirname(__FILE__).'/../../static/'.$file);
   }

}

$_get = new DOWNLOAD_FILE();

$_get->download('error-log.txt');
//header("location:javascript://history.go(-1)");
?>
<?php
/*
* ----------------------------------------------------------------------
* EMAIL - NOTIFICATION VERIFIED WAREHOUSE: UPDATE
* ----------------------------------------------------------------------
*/


class V_EMAIL_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

}


?>
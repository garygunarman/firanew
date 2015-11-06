<?php
/*
* ----------------------------------------------------------------------
* EMAIL - ORDER PLACED ADMIN: GET
* ----------------------------------------------------------------------
*/


class V_EMAIL_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

}

?>
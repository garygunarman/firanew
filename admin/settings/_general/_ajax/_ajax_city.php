<?php
/*
# ----------------------------------------------------------------------
# AJAX: CITY
# ----------------------------------------------------------------------
*/


if($_POST){
   
   require_once('../../../static/_header.php');
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
   
   
      function get_city($province){
         $sql    = "SELECT * FROM tbl_courier_rate WHERE `courier_province` = '$province' GROUP BY `courier_city` ORDER BY `courier_city`";
         $query = $this->conn->query($sql);
         $row   = array();
	  
	     while($result = $query->fetch_object()){
	        array_push($row, $result);
		 }
   
         return $row;
	  }
	  
   }
   
   
   $_ajax          = new AJAX();
   $_ajax_province = filter_var($_POST['province'], FILTER_SANITIZE_STRING);
   
   if(isset($_POST['city']) && $_POST['city'] != ''){
      $_ajax_city     = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
   }else{
      $_ajax_city     = $_global_general->company_city;
   }
   $get_city       = $_ajax->get_city($_ajax_province);
   
   
   echo '<select class="form-control" id="id-city" name="city">';
   
   foreach($get_city as $city){
      echo '<option value="'.$city->courier_city.'" ';
	  
	  if($_ajax_city == $city->courier_city){
	     echo 'selected="selected"';
	  }
	  
	  echo ' >'.$city->courier_city.'</option>';
   }
   
   echo '</select>';
   
}
?>
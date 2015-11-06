<?php
/*
# ----------------------------------------------------------------------
# AJAX: PROVINCE
# ----------------------------------------------------------------------
*/


if($_POST){
   
   require_once('../../../static/_header.php');
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
   
   
      function get_province(){
         $sql    = "SELECT * FROM province ORDER BY `province_name`";
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
   $getProvince    = $_ajax->get_province();
   
   
   echo '<select class="form-control" id="id-province" name="province" onchange="getCity()">';
   
   foreach($getProvince as $province){
      echo '<option value="'.$province->province_name.'" ';
	  
	  if($_global_general->company_province == $province->province_name){
	     echo 'selected="selected"';
	  }
	  
	  echo '>'.$province->province_name.'</option>';
   }
   
   echo '</select>';
   
}
?>
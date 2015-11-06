<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new SHIPPING_GET();
$_update = new SHIPPING_UPDATE();


$ship_id  		= filter_var($_REQUEST['sid'], FILTER_SANITIZE_NUMBER_INT);
$courier  		= $_get->get_detail($ship_id);
$shipping 		= $_get->get_shipping($ship_id);
$country 		= $_get->get_country();
$international 	= $_get->international($ship_id);
$service       	= $courier->services;

if($service == "Local Only"){
   $title = "Local";
   
}else if($service == "International Only"){
   $title = "International";
   
}else{
   $title = "Local";
   
}




if(isset($_POST['btn-edit-shipping']) &&  $_POST['btn-edit-shipping'] == 'Save Changes'){
   
   $courier_ids         = $ship_id;
   $courier_name        = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $courier_description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $courier_service     = filter_var($_POST['service'], FILTER_SANITIZE_STRING);
   $courier_weight      = filter_var($_POST['weight'], FILTER_SANITIZE_STRING);
   
   if($courier_service === 'Local Only'){
      $courier_id          = $_POST['city_name'];
      $courier_rate        = $_POST['courier_rate'];
   
      $_update->update_local_courier($courier_name, $courier_description, $courier_service, 'Active', $courier_weight, $courier_ids);
   
      foreach($courier_id as $index=>$courier_id){
         $courier_id = filter_var($courier_id, FILTER_SANITIZE_STRING);
	     $courier_rate[$index] = filter_var($courier_rate[$index], FILTER_SANITIZE_NUMBER_INT);
		 
         $_update->update_local_rate($courier_rate[$index], $courier_weight, $courier_id);	  
	  
	  }
	  
   }else if($courier_service === 'International Only'){
      $_courier	= $_POST['international_id'];
	  
	  foreach($_courier as $key=>$_courier){
	     $courier_rate			= filter_var($_POST['courier_rate'][$key], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		 $courier_rate_extend	= filter_var($_POST['courier_rate_extend'][$key], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		 $courier_city			= $_courier;
		 
         $_update->update_international_rate($courier_rate, $courier_rate_extend, $courier_weight, $courier_city);
		 
	  }
	  
   }
   
   $page = 'self';
   $type = 'success';
   $msg  = 'Changes have been successfully saved.';
   
   
   set_alert($type, $msg);
   safe_redirect($page);

}
?>
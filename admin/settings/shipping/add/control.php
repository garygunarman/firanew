<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new SHIPPING_GET();
$_update = new SHIPPING_UPDATE();


$provinces = $_get->get_province();
$country   = $_get->get_country();


if(isset($_POST['btn-add-shipping']) && $_POST['btn-add-shipping'] == 'Save Changes'){
	
   $courier_name        = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $courier_description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $courier_track		= $_POST['track'];
   $service             = filter_var($_POST['service'], FILTER_SANITIZE_STRING);
   $weight              = filter_var($_POST['weight'], FILTER_SANITIZE_STRING);
   $active              = 'Active';
   
   $_update->insertCourier($courier_name, $courier_description, $courier_track, $active, $service, $weight);
   
   $courier_id      = $_get->get_max_courier();
   $courier_service = filter_var($_POST['service'], FILTER_SANITIZE_STRING);
   
   if($courier_service == "Local Only"){
      $foreach_province  = $_POST['province_name'];
	  $foreach_city_name = filter_var($_POST['city_name'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	  $foreach_rate      = filter_var($_POST['array_rate'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	  $weight            = filter_var($_POST['weight'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	  
	  foreach($foreach_province as $provinces){
	     $provinces = filter_var($provinces, FILTER_SANITIZE_STRING);
		 
         $city = $_get->get_city($provinces);
		 
		 foreach($city as $key=>$city){
		    $_update->insertCourierRate($courier_id->latest_id, $provinces, $city->city_name, '0', '0', $weight);
	     }
      }
	  
	  $rate            = $_POST['courier_rate'];
	  $courier_rate_id = $_get->get_min_courier($courier_id->latest_id);
	  $initial_id      = $courier_rate_id->latest_id;
	  
	  foreach($rate as $rate){
	     $rate = filter_var($rate, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
         $_update->update_rate($rate, '0', $initial_id);
	  
         $initial_id++;
      }
   
   }else if($courier_service == "International Only"){
	   
	   $courier_name     = $courier_id->latest_id;
	   $courier_province = "international";
	   $courier_city     = $_POST['international_id'];
       $courier_rate     = $_POST['international_rate'];
	   $courier_extend   = $_POST['international_rate_extend'];
	   $courier_weight   = filter_var($_POST['weight'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	   
	   $courier_rate_id  = $_get->get_min_courier($courier_id->latest_id);
	   $initial_id       = $courier_rate_id->latest_id;
	   
	   foreach($courier_city as $key=>$city){
	     $city        = filter_var($city, FILTER_SANITIZE_STRING);
		 $rate        = filter_var($courier_rate[$key], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		 $rate_extend = filter_var($courier_extend[$key], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		 
		 $_update->insertCourierRate($courier_name, $courier_province, $city, $rate, $rate_extend, $courier_weight);
	   }
	   
	   foreach($courier_rate as $key_rate=>$rate){
	      $rate           = filter_var($rate, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		  $courier_extend = filter_var($courier_extend[$key_rate], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		  
          //$_update->update_rate($rate, $courier_extend, $initial_id);
		  
		  $initial_id++;
	   }
	   
   }else if($courier_service == "Local & International"){
	   
	  /* --- LOCAL --- */
      $foreach_province  = $_POST['province_name'];
	  $foreach_city_name = filter_var($_POST['city_name'], FILTER_SANITIZE_STRING);
	  $foreach_rate      = filter_var($_POST['array_rate'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	  $weight            = filter_var($_POST['weight'], FILTER_SANITIZE_STRING);
	  
	  foreach($foreach_province as $provinces){
	     $provinces = filter_var($provinces, FILTER_SANITIZE_STRING);
         $city      = $_get->get_city($provinces);
		 
		 foreach($city as $key=>$city){
		    $_update->insertCourierRate($courier_id->latest_id, $provinces, $city->city_name, '0', $weight);
	     }
      }
	  
	  $rate            = $_POST['courier_Rate'];
	  $courier_rate_id = $_get->get_min_courier($courier_id->latest_id);
	  $initial_id      = $courier_rate_id->latest_id;
	  
	  foreach($rate as $rate){
	     $rate            = filter_var($rate, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
         $_update->update_rate($initial_id, $courier_id->latest_id, $rate);
	  
         $initial_id++;
      }
	  
	  /* --- INTERNATIONAL --- */
	  $courier_name     = $courier_id['latest_id'];
	  $courier_province = "international";
	  $courier_city     = $_POST['international_id'];
      $courier_rate     = clean_price($_POST['international_rate']);
	  $courier_weight   = $_POST['weight'];
	  $courier_rate_id  = $_get->get_min_courier($courier_id->latest_id);
	  $initial_id       = $courier_rate_id->latest_id;
	   
	  foreach($courier_city as $key=>$city){
	     $_update->insertCourierRate($courier_name, $courier_province, $city, $courier_rate[$key], $courier_weight);
	  }
	  
	  foreach($courier_rate as $rate){
	     $_update->update_rate($initial_id, $courier_id->latest_id, $rate);
		  
	     $initial_id++;
	  }
      
   }
	  
   $type = 'success';
   $msg  = 'Item successfully saved';
   $page = 'self';
		 
   set_alert($type, $msg);
   safe_redirect($page);
   
}
?>
<?php
/*
# ----------------------------------------------------------------------
# HEADER: SHOP
# ----------------------------------------------------------------------
*/


/*
# ----------------------------------------------------------------------
# SHOP: CURRENCY
# ----------------------------------------------------------------------
*/


/* --- MODULE: DUAL CURRENCY --- */
if(!defined('MODULE_DUALCURRENCY')){
   define('MODULE_DUALCURRENCY', $_config_dual_currency);
   
}

if(!isset($_SESSION['module']['dual_currency'])){
   $_SESSION['module']['dual_currency'] = 1;
   
}else{
   $_SESSION['module']['dual_currency'] = $_SESSION['module']['dual_currency'];
   
}


if(!defined('VISITOR_COUNTRY')){
   //$temp_country = visitor_country();
   
   $temp_country = 'Unknown';
   
   if(MODULE_DUALCURRENCY == 1){
	  $_data_dual_currency = $_SESSION['module']['dual_currency'];
      if($temp_country == 'Unknown'){
         $country       = 'Local';
	     $temp_currency = $_data_dual_currency;
		 
      }else{
         $country       = $temp_country;
	     $temp_currency = $_data_dual_currency;
		 
      }
	  
   }else{
      if($temp_country == 'Unknown'){
         $country       = 'Local';
	     $temp_currency = 1;
		 
      }else{
         $country       = $temp_country;
	     $temp_currency = 1;
		 
      }
	  
   }
   define('VISITOR_COUNTRY', $country);
   
}


if(MODULE_DUALCURRENCY == 1){
   $_data_dual_currency = $_SESSION['module']['dual_currency'];
   
   if($_data_dual_currency == 1){
      $currency = $_sym_curr_idr;
      $temp_currency = 1;
	  
   }else{
      $currency = $_sym_curr_usd;
      $temp_currency = 2;
	  
   }
   
   if(VISITOR_COUNTRY == 'Indonesia'){
      $currency      = $currency;
      $temp_currency = $temp_currency;
	  
   }else if(VISITOR_COUNTRY == 'Local'){
      $currency      = $currency;
      $temp_currency = $temp_currency;
	  
   }else{
      $currency      = $currency;
      $temp_currency = $temp_currency;
	  
   }
   
}else{
   
   if(VISITOR_COUNTRY == 'Indonesia'){
      $currency = $_sym_curr_idr;
      $temp_currency = '1';
	  
   }else if(VISITOR_COUNTRY == 'Local'){
      $currency = $_sym_curr_idr;
      $temp_currency = '1';
	  
   }else{
      $currency = $_sym_curr_idr;
      $temp_currency = '1';
	  
   }
   
}


if(!defined('CURRENCY')){
   define('CURRENCY', $temp_currency);
   
}


/*
# ----------------------------------------------------------------------
# SHOP: CLASS
# ----------------------------------------------------------------------
*/

class HeaderShop extends HeaderDatabase{
   
   protected $conn;
   
   function __construct($rate) {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  $this->rate = $rate;
   }
   
   
   /* --- DISCOUNT --- */
   function discount_price($post_disc_id, $post_disc_value, $post_normal_price, $post_start, $post_end, $currency){
   
      if($post_start <= date('Y-m-d') and $post_end >= date('Y-m-d')){
		 /* --- PERCENTAGE --- */
	     if($post_disc_id == "1" || $post_disc_id == 1){
			if($currency == 2){
			   $return['now_price']   = ($post_normal_price - (($post_disc_value / 100) * $post_normal_price)) / $this->rate;
               $return['was_price']   = $post_normal_price / $_global_general->currency_rate;
			   $return['promo_value'] = (($post_disc_value / 100) * $post_normal_price) / $this->rate;
			   
			}else{
			   $return['now_price']   = $post_normal_price - (($post_disc_value / 100) * $post_normal_price);
               $return['was_price']   = $post_normal_price;
			   $return['promo_value'] = ($post_disc_value / 100) * $post_normal_price;
			   
			}
          
		 }else if($post_disc_id == "2" || $post_disc_id == 2){
		    /* --- AMOUNT --- */
			if($currency == 2){
			   $return['now_price']   = ($post_normal_price - $post_disc_value) / $this->rate;
               $return['was_price']   = $post_normal_price / $this->rate;
			   $return['promo_value'] = $post_disc_value / $this->rate;
			   
			}else{
			   $return['now_price']   = $post_normal_price - $post_disc_value;
               $return['was_price']   = $post_normal_price;
			   $return['promo_value'] = $post_disc_value;
			   
			}
			
		 }  
          
	  }else{
		 if($currency == 2){
            $return['now_price']   = $post_normal_price / $this->rate;
            $return['was_price']   = $post_normal_price / $this->rate;
	        $return['promo_value'] = 0;
			
		 }else{
            $return['now_price']   = $post_normal_price;
            $return['was_price']   = $post_normal_price;
	        $return['promo_value'] = 0;
			
		 }
		 
	  }
   
      return $return;
   
   }
   
   
   /* --- LABEL DISCOUNT --- */
   function discount_label($post_disc_id, $post_start, $post_end, $prefix_url){
      if(!empty($post_disc_id) || $post_disc_id != ""){
         if($post_start <= date('Y-m-d') and $post_end >= date('Y-m-d')){
            echo '<div class="thumb-label sale"><img src="'.BASE_URL.'files/common/icon_sale.png"></div>'; 
			
		 }
	  
	  }
   
   }
   
   
   /* --- LABEL NEW ARRIVAL --- */
   function new_in_label($new_id, $new_start, $new_end, $prefix_url){
      if(!empty($new_id) || $new_id != ''){
         if($new_start <= date('Y-m-d') and $new_end >= date('Y-m-d')){
            echo '<div class="thumb-label new-in"><img src="'.BASE_URL.'files/common/ic_label_new-in.png"></div>'; 
			
		 }
	  
	  }
   
   }
   
   
   function count_sale(){
      $sql    	= "SELECT COUNT(`promo_item_id`) AS rows FROM tbl_promo_item WHERE `promo_end_datetime` < NOW()";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
	  
   }
   
   
   function get_sale(){
      $sql		= "SELECT * FROM tbl_promo_item WHERE `promo_end_datetime` < NOW()";
	  $result	= $this->fetchData('multiple', $sql);
   
      return $row;
	  
   }
   
   
   function delete_sale($promo_item_id){
      $sql	= "DELETE FROM tbl_promo_item WHERE `promo_item_id` = ?";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $promo_item_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   /* --- NEW ARRIVAL --- */
   function count_new(){
      $sql		= "SELECT COUNT(`new_id`) AS rows FROM tbl_new_arrival WHERE `new_end` < NOW()";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
	  
   }
   
   
   function get_new(){
      $sql    	= "SELECT * FROM tbl_new_arrival WHERE `new_end` < NOW()";
	  $result	= $this->fetchData('multiple', $sql);
	  
	  return $result;
	  
   }
   
   
   function delete_new($new_id){
      $sql	= "DELETE FROM tbl_new_arrival WHERE `new_id` = ?";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $new_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
	  
   }
   
   
   function update_new($type_new_arrival, $new_id){
      $sql	= "UPDATE tbl_product_type SET `type_new_arrival` = ? WHERE `type_id` = ?";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $type_new_arrival, $new_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
	  
   }
   
   
   /* --- VOUCHER --- */
   function count_voucher(){
      $sql    	= "SELECT COUNT(voucher_id) AS rows FROM tbl_voucher WHERE `voucher_end` < NOW()";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
	  
   }
   
   
   function get_voucher(){
      $sql    	= "SELECT * FROM tbl_voucher WHERE `voucher_end` < NOW()";
	  $result	= $this->fetchData('multiple', $sql);
	  
	  return $result;
	  
   }
   
   
   function update_voucher($voucher_status, $voucher_id){
      $sql	= "UPDATE tbl_voucher SET `voucher_status` = ? WHERE `voucher_id` = ?";
	  $stmt	= $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ss", $voucher_status, $voucher_id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
	  
   }
      
}


/* --- CONSTRUCT CLASS --- */
$_shop = new HeaderShop($_global_general->currency_rate);



/*
# ----------------------------------------------------------------------
# SHOP: SALE
# ----------------------------------------------------------------------
*/

/* --- REMOVE OUTDATED SALE --- */
$_shop_count_sale = $_shop->count_sale();
if($_shop_count_sale->rows > 0){
   $_shop_get_sale = $_shop->get_sale();
   foreach($_shop_get_sale as $_shop_get_sale){
      $_shop->delete_sale($_shop_get_sale->promo_item_id);
	  
   }
   
}else{
   
}


/* --- REMOVE OUTDATED NEW ARRIVAL --- */
$_shop_count_new = $_shop->count_new();
if($_shop_count_new->rows > 0){
   $_shop_get_new = $_shop->get_new();
   foreach($_shop_get_new as $_shop_get_new){
      $_shop->delete_new($_shop_get_new->new_id);
	  $_shop->update_new('0', $_shop_get_new->new_type_id);
	  
   }
   
}else{
   
}


/* --- REMOVE OUTDATED VOUCHER --- */
$_shop_count_voucher = $_shop->count_voucher();
if($_shop_count_voucher->rows > 0){
   $_shop_get_voucher = $_shop->get_voucher();
   foreach($_shop_get_voucher as $_shop_get_voucher){
      $_shop->update_voucher(0, $_shop_get_voucher->voucher_id);
	  
   }
   
}else{
   
}


/*
# ----------------------------------------------------------------------
# WORDING LIBRARY: SHOP
# ----------------------------------------------------------------------
*/


/* --- ORDER STATUS --- */
$_global_order_status		= array('1'=>'Open', '2'=>'Expired', '3'=>'Cancelled');


/* --- PAYMENT STATUS --- */
$_global_payment_status		= array('1'=>'Unpaid', '2'=>'Confirmed', '3'=>'Paid', '4'=>'Refunded');


/* --- FULFILLMENT STATUS --- */
$_global_fulfillment_status	= array('1'=>'Unfulfilled', '2'=>'In Process', '3'=>'Partial', '4'=>'Delivered');


/* --- PAYMENT METHOD --- */
$_global_payment_method		= array('1'=>'Bank Transfer', '2'=>'Veritrans', '3'=>'Doku', '4'=>'Paypal', '5'=>'COD');


/* --- ORDER LOG --- */
$_global_order_log      	= array(
							  '1'	=>'Order placed', 
							  '2'	=>'Order placed email was sent to the customer', 
							  '3'	=>'Order placed email was sent to the admin', 
							  '4'	=>'Order has been confirmed', 
							  '5'	=>'Confirmation email was sent to the customer', 
							  '6'	=>'Confirmation email was sent to the admin', 
							  '7'	=>'Order has been mark as paid', 
							  '8'	=>'Payment verified email was sent to customer', 
							  '9'	=>'Payment verified email was sent to warehouse', 
							  '10'	=>'Item has been delivered: ', 
							  '11'	=>'Delivery email was sent to the customer', 
							  '12'	=>'Order has been cancelled', 
							  '13'	=>'Cancel order email was sent to the customer', 
							  '14'	=>'Order has been expired', 
							  '15'	=>'Expired order email was sent to the customer',
							  '16'	=>'Order has been mark as unpaid');
?>
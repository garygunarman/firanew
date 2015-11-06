<?php
/*
# ----------------------------------------------------------------------
# PRODUCT LANGUAGE : CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");

echo '<input type="text" class="hidden" id="custom_product_alias" value="'.$_REQUEST['product_alias'].'">';


/* --- CONTROL LANGUAGE --- */
   $pre_product_alias  	= filter_var($_REQUEST['product_alias'], FILTER_SANITIZE_STRING);
   $_custom_get			= new ProductCustomGet();
   $_custom_update		= new ProductCustomUpdate();

   $ct_default         	= $_custom_get->get_default_products($pre_product_alias);
   $page_product       	= $_custom_get->page_get_product($pre_product_alias);
   $page_type          	= $_custom_get->page_get_type($pre_product_alias);
   $count_product_lang	= $_custom_get->count_product_lang($ct_default->id, $lang);
   $count_type_lang    	= $_custom_get->count_type_lang($ct_default->id, $lang);
   
   
   /* --- UPDATING HIDDEN VALUE --- */
   $_custom_update->update_product_lang_hidden($page_product->product_category, $page_product->product_new_arrival, $page_product->product_order, $page_product->product_size_type_id, $page_product->product_visibility, $page_product->product_delete, $page_product->id, 'EN');
   
if($lang === 'EN'){
   if($count_product_lang->rows > 0){
      $product_lang			= $_custom_get->get_product_lang($ct_default->id, $lang);
	  $data    				= $_custom_get->get_product_details();
	  
   }else{ 
	  $id_param				= $ct_default->id;
	  $product_name			= $ct_default->product_name;
	  $product_sold_out		= $ct_default->product_sold_out;
	  $product_category		= $ct_default->product_category;
	  $product_new_arrival	= $ct_default->product_new_arrival;
	  $product_order		= $ct_default->product_order;
	  $product_date_added	= $ct_default->product_date_added;
	  $product_size_type_id	= $ct_default->product_size_type_id;
	  $product_visibility	= $ct_default->product_visibility;
	  $product_delete		= $ct_default->product_delete;
	  $product_alias		= $ct_default->product_alias;
	  $page_title			= $ct_default->page_title;
	  $page_description		= $ct_default->page_description;
	  $page_keywords		= $ct_default->page_keywords;
	  $language_code		= 'EN';
	  
	  $_custom_update->insert_product_lang($id_param, $product_name, $product_sold_out, $product_category, $product_new_arrival, $product_order, $product_date_added, $product_size_type_id, $product_visibility, $product_delete, $product_alias, $page_title, $page_description, $page_keywords, $language_code);
	  
	  foreach($page_type as $page_type){
	     $id_param			= $page_type->type_id;
	     $product_id		= $page_type->product_id;
	     $type_code			= $page_type->type_code;
	     $type_name			= $page_type->type_name;
	     $type_price		= $page_type->type_price;
	     $color_id			= $page_type->color_id;
	     $type_description	= $page_type->type_description;
	     $type_sizefit		= $page_type->type_sizefit;
		 $type_information	= $page_type->type_information;
	     $type_weight		= $page_type->type_weight;
	     $type_new_arrival	= $page_type->type_new_arrival;
	     $type_image		= $page_type->type_image;
		 $type_order		= $page_type->type_order;
	     $type_sold_out		= $page_type->type_sold_out;
	     $type_visibility	= $page_type->type_visibility;
	     $type_active		= $page_type->type_active;
		 $type_delete		= $page_type->type_delete;
	     $type_alias		= $page_type->type_alias;
	     $page_title		= $page_type->page_title;
	     $page_description	= $page_type->page_description;
	     $language_code		= 'EN';
	     
	     $_custom_update->insert_product_type_lang($id_param, $product_id, $type_code, $type_name, $type_price, $color_id, $type_description, $type_sizefit, $type_information, $type_weight, $type_new_arrival, $type_image, $type_order, $type_sold_out, $type_visibility, $type_active, $type_delete, $type_alias, $page_title, $page_description, $language_code);
		 
	  }
	  
	  safe_redirect('self');
   }
   
   
   if(isset($_POST['btn-product-detail']) && $lang === 'EN'){
      $product_name		= filter_var($_POST['product_name'], FILTER_SANITIZE_STRING);
      $page_title		= filter_var($_POST['page_title'], FILTER_SANITIZE_STRING);
      $page_description	= filter_var($_POST['page_description'], FILTER_SANITIZE_STRING);
      $page_keywords	= filter_var($_POST['page_keywords'], FILTER_SANITIZE_STRING);
      $id_param			= filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
      $language_code	= 'EN';
   
   
      $_custom_update->update_product_lang($product_name, $page_title, $page_description, $page_keywords, $id_param, $language_code);
      
	  
	  $_type_id			= $_custom_get->get_type_lang($id_param, $language_code);
	  $_counter			= 1;
	  foreach($_type_id as $_type_id){
	     $type_name			= filter_var($_POST['type_name'][$_counter], FILTER_SANITIZE_STRING);
		 $type_description	= $_POST['type_description'][$_counter];
		 $type_sizefit		= $_POST['type_sizefit'][$_counter];
		 $type_information	= $_POST['type_information'][$_counter];
		 $id_param			= $_type_id->id_param;
		 
	     $_custom_update->update_product_type_lang($type_name, $type_description, $type_sizefit, $type_information, $id_param, $language_code);
		 $_counter++;
		 
		 echo '<pre>';
		 print_r($_POST);
		 echo '</pre>';
		 echo '<br>'.$id_param;
	  }
	  
	  $type	= 'success';
	  $msg	= 'Changes successfully saved';
	  
	  set_alert($type, $msg);
	  safe_redirect('self');
	  
   }
   
}
?>
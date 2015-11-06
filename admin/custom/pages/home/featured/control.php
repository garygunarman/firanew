<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - FEATURED PRODUCTS: CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");

$_get    = new FEATURED_GET();
$_update = new FEATURED_UPDATE();


$get_featured   = $_get->get_featured_product();
$get_featureds  = $_get->get_featured_product();
$get_featuredss = $_get->get_featured_product();


if(isset($_POST['btn-pages-home']) && $_POST['btn-pages-home'] == "Save Changes"){
   
   $array_product_name = $_POST['product-name'];
   //$post_alias_id      = filter_var($_POST['check_featured'], FILTER_SANITIZE_NUMBER_INT);
   
   $_update->empty_featured();
	  
   $i = 0;
   foreach($array_product_name as $key=>$product_name){
      $product_name = filter_var($product_name, FILTER_SANITIZE_NUMBER_INT);
	  
	  if($product_name != 0){
	     $check = $_get->count_featured($product_name, $i);
	  
	     if($check->rows > 0){
			 
		    $_update->update_featured($key, $product_name);
		 
		 }else{
			$_update->insertFeatured($product_name, $key);
		 }
	  
         $i++;
	  }
   
   }
     
}
?>
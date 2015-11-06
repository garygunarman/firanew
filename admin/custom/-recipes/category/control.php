<?php
/*
# ----------------------------------------------------------------------
# NEWS: CONTROL
# ----------------------------------------------------------------------
*/

$_get    = new RECIPE_GET();
$_update = new RECIPE_UPDATE();


/*
# ----------------------------------------------------------------------
# SORTING
# ----------------------------------------------------------------------
*/

$equal_search     = array('type_visibility', 'total_recipes', 'category_visibility');
$default_sort_by  = "category_name";

$pgdata           = page_init($equal_search,$default_sort_by); // static/general.php

$page             = $pgdata['page'];
$query_per_page   = $pgdata['query_per_page'];
$sort_by          = $pgdata['sort_by'];
$first_record     = $pgdata['first_record'];
$search_parameter = $pgdata['search_parameter'];
$search_value     = $pgdata['search_value'];
$search_query     = $pgdata['search_query'];
$search           = $pgdata['search'];


if(isset($_REQUEST['src'])){
   $_REQUEST['src'] = $_REQUEST['src'];
}else{
   $_REQUEST['src'] = '';
} 


$full_product 		= $_get->get_full_category($search_query, $sort_by, $first_record, $query_per_page);
$total_query  		= $full_order['total_query'];
$total_page  		= $full_order['total_page'];
$listing_category	= $_get->get_category($search_query, $sort_by, $first_record, $query_per_page);
$count            	= $_get->countCategory();


/* --- HANDLING ARROW SORTING --- */
$arr_product_name     = '';
$arr_type_name        = '';
$arr_type_price       = '';
$arr_promo_value      = '';
   
if(isset($_REQUEST['srt'])){
   if($sort_by == "category_name DESC"){
      $arr_category_name = "<span class=\"sort-arrow-up\"></span>";
   }else if($sort_by == "category_name"){
      $arr_category_name = "<span class=\"sort-arrow-down\"></span>";
			   
   }else if($sort_by == "total_recipes DESC"){
      $arr_total_recipes = "<span class=\"sort-arrow-up\"></span>";
   }else if($sort_by == "total_recipes"){
      $arr_total_recipes = "<span class=\"sort-arrow-down\"></span>";
									  
   }else if($sort_by == "category_active DESC"){
      $arr_category_active = "<span class=\"sort-arrow-up\"></span>";
   }else if($sort_by == "category_active"){
      $arr_category_active = "<span class=\"sort-arrow-down\"></span>";
									  
   }else if($sort_by == "category_visibility DESC"){
      $arr_category_visibility = "<span class=\"sort-arrow-up\"></span>";
   }else if($sort_by == "category_visibility"){
      $arr_category_visibility = "<span class=\"sort-arrow-down\"></span>";	  
   }
   
}


/* --- STORED VALUE --- */
echo "<input type=\"hidden\" name=\"url\" id=\"url\" class=\"hidden\" value=\"http://".$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF'])."/recipe-category-view\">\n";
echo "<input type=\"hidden\" name=\"page\" id=\"page\" class=\"hidden\" value=\"".$page."\" /> \n";
echo "<input type=\"hidden\" name=\"query_per_page\" id=\"query_per_page\" class=\"hidden\" value=\"".$query_per_page."\" /> \n";
echo "<input type=\"hidden\" name=\"total_page\" id=\"total_page\" class=\"hidden\" value=\"".$total_page."\" /> \n";
echo "<input type=\"hidden\" name=\"sort_by\" id=\"sort_by\" class=\"hidden\" value=\"".$sort_by."\" /> \n";
echo "<input type=\"hidden\" name=\"search\" id=\"search\" class=\"hidden\" value=\"".$search_parameter."-".$search_value."\" /> \n";


if($_POST['btn-add-recipe'] == "Save Changes"){
   $category_id         = $_POST['category_id'];
   $array_category_id   = $_POST['array_category_id']; 
   $category_name       = $_POST['category_name'];
   $category_active     = $_POST['category_active'];
   $category_visibility = $_POST['category_visibility'];

   $validate_name    	= $_get->validateCategoryNameCheck($category_name);
   $get_name         	= $_get->validateCategoryName($category_name);
   
   if(empty($category_id)){
	  
	  if($validate_name['rows'] > 0){
	     $category_name_check = $category_name."-1";
	  }else{
	     $category_name_check = $category_name;
	  }
	  
      AddCategory($category_name_check, $category_active, $category_visibility);
   }else{
	  
	  if($validate_name['rows'] > 0){
		 
		 if($get_name['category_name'] == $category_name){
		    $category_name_check = $get_name['category_name'];
		 }else{
	        $category_name_check = $category_name."-1";
		 }
		 
	  }else{
	     $category_name_check = $category_name;
	  }
	  
      UpdateCategory($category_name_check, $category_active, $category_visibility, $category_id);
   }
   
}else if($_POST['btn-add-recipe'] == "Delete"){
   
   $validate = validateCategory($category_id);
   
   if($validate['total_recipes'] > 0){
   ?>
   <script>
   alert("You can't delete this category because this category contains a recipes, please delete all recipes first to perform delete");
   </script>
   <?php   
   }else{
      deleteCategory($category_id);
   }
   
}else if($_POST['btn-add-recipe'] == "GO"){
   
   if(!empty($array_category_id) and $_POST['listing-option'] == "delete"){
      
	  foreach($array_category_id as $array_category_id){
		 deleteCategory($array_category_id);
      }
	  
   }
   
}


$action = $_REQUEST['action'];

if(empty($action)){
   $action = "";
}else{
   $action = $_REQUEST['action'];
   
   if($action == "added"){
      $msg = "Success added new category";
   }else if($action == "deleted"){
      $msg = "Success deleted category";
   }else if($action == "edited"){
      $msg = "Success edited category";
   }
   
}
?>













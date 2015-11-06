<?php
/*
# ----------------------------------------------------------------------
# CATEGORY LANGUAGE : GET
# ----------------------------------------------------------------------
*/


class CategoryCustomGet extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn	= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  $this->alias	= $_REQUEST['cname'];
   }
   
   
   function count_category_lang($id_param, $language_code){
      $sql    	= "SELECT COUNT(*) AS rows FROM tbl_category_lang WHERE `id_param` = '$id_param' AND `language_code` = '$language_code'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   function get_product_details(){
      $product_alias = filter_var($this->alias, FILTER_SANITIZE_STRING);
      $sql   = "SELECT * FROM tbl_product AS product LEFT JOIN tbl_product_type AS p_type ON product.id = p_type.product_id
		        WHERE product_alias = '$product_alias' AND type_delete != '1'
				ORDER BY type_order
			   ";
      $query = $this->conn->query($sql);
	  
	  
	  if($query->num_rows != null){
		for($counter = 1; $counter <= $query->num_rows; $counter++){
			//$get_info_array = mysql_fetch_array($get_info);
			$get_info_array = $query->fetch_object();
			
			if($counter == 1){
				//$data['collection_id']          = $get_info_array->collection_id;
				$data['product_id']             = $get_info_array->product_id;
				$data['product_category']       = $get_info_array->product_category;
				$data['product_name']           = $get_info_array->product_name;
				$data['product_size_type_id']   = $get_info_array->product_size_type_id;
				$data['product_alias']          = $get_info_array->product_alias;
				$data['page_title']             = $get_info_array->page_title;
				$data['page_description']       = $get_info_array->page_description;				
				$data['page_keywords']          = $get_info_array->page_keywords;
			}
			
			$data['type_code'][$counter]        = $get_info_array->type_code;
			$data['type_order'][$counter]       = $get_info_array->type_order;
			$data['type_name'][$counter]        = $get_info_array->type_name;
			$data['type_price'][$counter]       = $get_info_array->type_price;
			$data['color_id'][$counter]         = $get_info_array->color_id;
			$data['type_description'][$counter] = $get_info_array->type_description;
			$data['type_information'][$counter] = $get_info_array->type_information;
			$data['type_sizefit'][$counter]     = $get_info_array->type_sizefit;
			$data['type_weight'][$counter]      = $get_info_array->type_weight;
			$data['type_image'][$counter]       = $get_info_array->type_image;
			$data['type_code'][$counter]        = $get_info_array->type_code;
			$data['type_id'][$counter]          = $get_info_array->type_id;
			$data['product_image'][$counter]    = $this->get_product_image($data['type_id'][$counter]);
			$data['quantity'][$counter]         = $this->get_type_quantity($data['type_id'][$counter],$counter);
		}
		
	}
	
	$data['total_type'] = $counter - 1;
	return $data;
   }
   

   function get_all_category(){
      $sql   = "SELECT category.category_name, category.category_level, category.category_order,
		               relation.category_parent, relation.relation_level, category_id
		        FROM tbl_category AS category  LEFT JOIN tbl_category_relation AS relation ON category.category_id = relation.category_child
				ORDER BY category.category_order
			   ";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }


   function get_default_lang($category_id){
      $sql    	= "SELECT * FROM tbl_category WHERE `category_id` = '$category_id'";
	  $result	= $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function get_category_lang($id_param, $language_code){
      $sql    	= "SELECT * FROM tbl_category_lang WHERE `id_param` = '$id_param' AND `language_code` = '$language_code'";
	  $result	= $this->fetchData('single', $sql);
   
      return $result;
   }
   
}
?>
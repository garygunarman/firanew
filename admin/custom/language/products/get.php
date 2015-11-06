<?php
/*
# ----------------------------------------------------------------------
# PRODUCT LANGUAGE : GET
# ----------------------------------------------------------------------
*/


class ProductCustomGet extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn	= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  $this->alias	= $_REQUEST['product_alias'];
   }
   
   
   function countProduct($product_alias){
      $sql		= "SELECT COUNT(`id_param`) AS `rows` FROM tbl_product_lang WHERE `product_alias` = '$product_alias'";
      $result	= $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function getProduct($product_alias){
      $sql		= "SELECT `prod_`.`product_alias` AS `main_alias`, `lang_`.`product_alias` FROM tbl_product AS `prod_` INNER JOIN `tbl_product_lang` AS `lang_`
	  		  	   ON `prod_`.id = `lang_`.`id_param`
	  			   WHERE `prod_`.`product_alias` = '$product_alias'
				  ";
      $result	= $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function page_get_product($product_alias){
      $sql     = "SELECT * FROM tbl_product AS prod INNER JOIN tbl_category AS cat ON prod.product_category = cat.category_id
                                                    INNER JOIN tbl_size_type AS size ON prod.product_size_type_id = size.size_type_id 
                  WHERE `product_alias` = '$product_alias'
			     ";
      $result	= $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function page_get_type($product_alias){
      $sql	= "SELECT * FROM tbl_product AS prod INNER JOIN tbl_product_type AS type_ ON prod.id = type_.product_id
                                                 LEFT JOIN tbl_product_image AS img ON type_.type_id = img.type_id
               WHERE `product_alias` = '$product_alias'
			   GROUP BY `type_`.`type_id`
			  ";
      $row	= $this->fetchData('multiple', $sql);
	  
	  return $row;
   }
   
   
   function page_get_default_type($type_id){
      $sql	= "SELECT * FROM tbl_product_type WHERE `type_id` = '$type_id'";
	  $row	= $this->fetchData('single', $sql);
	  
	  return $row;
   }
   
   
   function page_get_color($color_id){
      $sql	= "SELECT * FROM tbl_color WHERE color_id = '$color_id'";
	  $row	= $this->fetchData('single', $sql);
	  
	  return $row;
   }


   function page_count_image($type_id){
      $sql	= "SELECT COUNT(*) AS rows FROM tbl_product_image WHERE `type_id` = '$type_id'";
	  $row	= $this->fetchData('single', $sql);
	  
	  return $row;
   }


   function page_get_image($type_id){
      $sql	= "SELECT * FROM tbl_product_image WHERE `type_id` = '$type_id'";
	  $row	= $this->fetchData('multiple', $sql);
	  
	  return $row;
   }
   
   
   function page_get_size($size_type_id){
      $sql    = "SELECT * FROM tbl_size_type AS type LEFT JOIN tbl_size AS size ON type.size_type_id = size.size_type_id
                 WHERE type.size_type_id = '$size_type_id'
				";
      $row	= $this->fetchData('multiple', $sql);
   
      return $row;
   }
   
   
   function page_get_stock($post_type_id){
      $sql	= "SELECT * FROM tbl_product_stock WHERE `type_id` = '$post_type_id'";
      $row	= $this->fetchData('multiple', $sql);
   
      return $row;
   }
   
   
   /* --- DEFAULT --- */   
   function get_default_products($product_alias){
      $sql    = "SELECT * FROM tbl_product AS prod INNER JOIN tbl_product_type AS type_ ON prod.id = type_.product_id
                                                   INNER JOIN tbl_product_image AS img ON type_.type_id = img.type_id
                 WHERE `product_alias` = '$product_alias' GROUP BY `id`
			    ";
      $result = $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   /* --- DUAL --- */
   function count_products_lang($post_id_param, $post_lang_code){
      $sql    	= "SELECT COUNT(*) AS rows FROM tbl_product_lang AS prod LEFT JOIN tbl_product_type_lang AS type_ ON prod.id_param = type_.product_id
                   WHERE prod.id_param = '$post_id_param' AND prod.language_code = '$post_lang_code'
			      ";
      $result	= $this->fetchData('single', $sql);
   
      return $result;
   }   
   
   
   function get_products_lang($post_id_param, $post_lang_code){
      $sql	= "SELECT * FROM tbl_products_lang AS prod LEFT JOIN tbl_product_type_lang AS type_ ON prod.id_param = type_.product_id
               WHERE prod.id_param = '$post_id_param' AND prod.language_code = '$post_lang_code'
			  ";
      $row	= $this->fetchData('multiple', $sql);
   
      return $row;
   }
   
   
   function count_product_lang($id_param, $language_code){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_product_lang WHERE id_param = '$id_param' AND `language_code` = '$language_code'";
	  $result = $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function count_type_lang($post_id_param, $post_lang_code){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_product_type_lang WHERE `product_id` = '$post_id_param' AND language_code = '$post_lang_code'";
	  $result = $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function counting_type_lang($product_id, $id_param, $language_code){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_product_type_lang 
	  			 WHERE `product_id` = '$product_id' AND `id_param` = '$id_param' AND language_code = '$language_code'
				";
	  $result = $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function get_product_lang($post_id_param, $post_lang_code){
      $sql    = "SELECT * FROM tbl_product_lang  WHERE id_param = '$post_id_param' AND language_code = '$post_lang_code'";
	  $result = $this->fetchData('single', $sql);
   
      return $result;
   }
   
   
   function get_type_lang($id_param, $language_code){
      $sql		= "SELECT * FROM tbl_product_type_lang WHERE `product_id` = '$id_param' AND `language_code` = '$language_code'";
	  $result	= $this->fetchData('multiple', $sql);
   
      return $result;
   }
   
   
   function get_product_details(){
      $product_alias	= filter_var($this->alias, FILTER_SANITIZE_STRING);
	  $check			= $this->countProduct($product_alias);
	  
	  if($check->rows > 0){
	     
	  }else{
	     $product_alias	= $this->getProduct($product_alias);
		 $product_alias	= $product_alias->product_alias;
		 
	  }
	  
      $sql   = "SELECT * FROM tbl_product_lang AS prod_ LEFT JOIN tbl_product_type_lang AS type_ ON prod_.id_param = type_.product_id
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
			$data['type_id'][$counter]          = $get_info_array->id_param;
			$data['product_image'][$counter]    = $this->get_product_image($data['type_id'][$counter]);
			$data['quantity'][$counter]         = $this->get_type_quantity($data['type_id'][$counter],$counter);
		}
		
	}
	
	$data['total_type'] = $counter - 1;
	return $data;
   }
   
   
   function get_product_image($type_id_){
      $product_image['image_id_list'] = array();
	  $product_image['img_src_list']  = array();
	  
      $sql   = "SELECT * from tbl_product_image WHERE type_id = '$type_id_' ORDER BY image_order";
      $query = $this->conn->query($sql);
	  
	  if($query->num_rows != null){
	     
		 for($image_count = 1; $image_count <= $query->num_rows; $image_count++){
		    $get_image_array = $query->fetch_object();
			array_push($product_image['image_id_list'],$get_image_array->image_id);
			array_push($product_image['img_src_list'],$get_image_array->img_src);
		 }
		 
	  }
	  
	  return $product_image;
   }


   function get_type_quantity($type_id_){
      $sql   = "SELECT * from tbl_product_stock WHERE type_id = '$type_id_'";
      $query = $this->conn->query($sql);
	  
	  if($query->num_rows != null){
	     for ($stock_count = 1; $stock_count <= $query->num_rows;$stock_count++){
		    $get_stock_array = $query->fetch_object();
			$tmp             = $get_stock_array->stock_name;
			$quantity[$tmp]  = $get_stock_array->stock_quantity;
		 }
	  }
	  
	  return $quantity;
   }
   
}
?>
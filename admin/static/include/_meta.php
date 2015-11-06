<?php
/*
# ----------------------------------------------------------------------
# HEADER: META
# ----------------------------------------------------------------------
*/

class HeaderMeta extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   /*
   # ----------------------------------------------------------------------
   # CONTACT
   # ----------------------------------------------------------------------
   */
   
   function count_contact($info_id){
      $sql    	= "SELECT COUNT(info_id) AS rows FROM tbl_infos WHERE `info_id` = '$info_id' AND `description` != '' AND `keywords` != ''";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   /*
   # ----------------------------------------------------------------------
   # PAGES
   # ----------------------------------------------------------------------
   */
   
   function count_pages($type){
      $sql    	= "SELECT COUNT(id) AS rows FROM tbl_about WHERE `type` = '$type' AND `description` != '' AND `keywords` != ''";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   function get_pages($type){
      $sql    	= "SELECT * FROM tbl_about WHERE `type` = '$type' AND `description` != '' AND `keywords` != ''";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   /*
   # ----------------------------------------------------------------------
   # PRODUCTS: DETAIL
   # ----------------------------------------------------------------------
   */
   
   function count_product($product_alias, $type_alias){
      $sql    	= "SELECT COUNT(category_id) AS rows FROM tbl_category AS cat_ LEFT JOIN tbl_product AS prod_ ON cat_.category_id = prod_.product_category
	   															   			   LEFT JOIN tbl_product_type AS type_ ON prod_.id = type_.product_id
	               WHERE `product_alias` = '$product_alias' AND `type_alias` = '$type_alias'
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function get_product($product_alias, $type_alias){
      $sql    	= "SELECT * FROM tbl_category AS cat_ LEFT JOIN tbl_product AS prod_ ON cat_.category_id = prod_.product_category
	   												  LEFT JOIN tbl_product_type AS type_ ON prod_.id = type_.product_id
	               WHERE `product_alias` = '$product_alias' AND `type_alias` = '$type_alias'
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   /*
   # ----------------------------------------------------------------------
   # NEWS: DETAIL
   # ----------------------------------------------------------------------
   */
   
   function count_news($news_alias){
      $sql    	= "SELECT COUNT(news_id) AS `rows` FROM tbl_news WHERE `news_alias` = '$news_alias'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
  
   
   function get_news($news_alias){
      $sql    	= "SELECT * FROM tbl_news WHERE `news_alias` = '$news_alias'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
    
}

$_meta = new HeaderMeta();
   
/*
# ----------------------------------------------------------------------
# HOMEPAGE / INDEX PAGE
# ----------------------------------------------------------------------
*/

if(ACT == 'pages_/home/index' || ACT == 'empty'){
   
   $_meta_description = $_global_general->website_description;
   $_meta_keyword     = $_global_general->website_keywords;
   
   
/*
# ----------------------------------------------------------------------
# PRODUCTS: DETAIL
# ----------------------------------------------------------------------
*/

}else if(ACT == 'shop_/details_/details'){
   
   $product_alias = filter_var($_REQUEST['prod_name'], FILTER_SANITIZE_STRING);
   $type_alias    = filter_var($_REQUEST['prod_type'], FILTER_SANITIZE_STRING);
   
   $count = $_meta->count_product($product_alias, $type_alias);
   
   if($count->rows > 0){
      $data = $_meta->get_product($product_alias, $type_alias);
	  
      $_meta_description = $data->page_description;
      $_meta_keyword     = $data->page_keywords;
   }else{
      $_meta_description = $_global_general->website_title.' '.$product_alias.' '.$type_alias.' description';
      $_meta_keyword     = $_global_general->website_title. ' keywords, '.$product_alias.', '.$type_alias;
   }
   
}


/*
# ----------------------------------------------------------------------
# NEWS: DETAIL
# ----------------------------------------------------------------------
*/
else if(ACT == 'news_/_details/details'){
   
   $news_alias = filter_var($_REQUEST['news_alias'], FILTER_SANITIZE_STRING);
   
   $count_data = $_meta->count_news($news_alias);
   
   if($count_data->rows > 0){
      $data       = $_meta->get_news($news_alias);
   
      $_meta_description = $data->meta_description;
      $_meta_keyword     = $data->meta_keywords;
   }else{
      $_meta_description = $_global_general->website_description;
      $_meta_keyword     = $_global_general->website_keywords;
   }
   
}


/*
# ----------------------------------------------------------------------
# PAGES: 
#
# - ABOUT 
# - PRIVACY POLICY 
# - TERMS & CONDITION
# - HELP
# ----------------------------------------------------------------------
*/

else if(ACT == 'pages_/_about/index' || ACT == 'pages_/_privacy/index' || ACT == 'pages_/_terms/index' || ACT == 'pages_/_help/index'){
   
   $strrchr = strlen(strrchr(ACT, '/'));
   $type    = substr(ACT, 8, -$strrchr);
   
   if($type == 'about'){
      $type = 'about';
   }else if($type == 'privacy'){
      $type = 'facilities';
   }else if($type == 'terms'){
      $type = 'quality';
   }else if($type == 'help'){
      $type = 'description';
   }
   
   
   $count = $_meta->count_pages($type);
   
   if($count->rows > 0){
      $data = $_meta->get_pages($type);
      
	  $_meta_description = $data->description;
	  $_meta_keyword     = $data->keywords;
   }else{
      $_meta_description = $_global_general->website_title.' '.$type.' description';
      $_meta_keyword     = $_global_general->website_title.' '.$type.' keywords';
   }
	

/*
# ----------------------------------------------------------------------
# PAGES: CONTACT
# ----------------------------------------------------------------------
*/

}else if(ACT == 'pages_/_contact/index'){
   $count = $_meta->count_contact('1');
   
   
   if($count->rows > 0){
	  $_meta_description = $_global_info->description;
	  $_meta_keyword     = $_global_info->keywords;
   }else{
      $_meta_description = $_global_general->website_title.' contact description';
      $_meta_keyword     = $_global_general->website_title.' contact keywords';
   }
   
	
}else{
   $_meta_description = $_global_general->website_title.' description';
   $_meta_keyword     = $_global_general->website_title.' keywords';
}


if(!defined('META_DESCRIPTION') || !defined('META_KEYWORDS')){
   define('META_DESCRIPTION', $_meta_description);
   define('META_KEYWORDS', $_meta_keyword);
}
?>
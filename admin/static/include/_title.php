<?php
/*
# ----------------------------------------------------------------------
# HEADER: PAGE TITLE
# ----------------------------------------------------------------------
*/

class HeaderTitle extends HeaderDatabase{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
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
   
   
   function get_product_category($category_alias){
      $sql    	= "SELECT `category_name` FROM `tbl_category` WHERE `category_alias` = '$category_alias'";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   
   }
   
   
   /*
   # ----------------------------------------------------------------------
   # PAGES: RECIPES
   # ----------------------------------------------------------------------
   */
   
   function get_category_recipes($category_alias){
      $sql    	= "SELECT `cat_`.`category_name` AS `category_name`, `lang_`.`category_name` AS `category_name_lang` FROM `tbl_recipes_category` AS `cat_` 
	  			   INNER JOIN `tbl_recipes_category_lang` AS `lang_` ON `cat_`.category_id = `lang_`.id_param
	               WHERE (`cat_`.`category_alias` = '$category_alias' OR `lang_`.`category_alias` = '$category_alias')
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   
   }
   
   function get_recipes_detail($news_alias){
      $sql    	= "SELECT `main_`.`news_title` AS `title`, `lang_`.`news_title` AS `title_lang`, `main_cat_`.`category_name` AS `category`, `main_cat_lang_`.`category_name` AS `category_lang`
	  			   FROM `tbl_recipes` AS `main_` 
	  			   INNER JOIN `tbl_recipes_lang` AS `lang_` ON `main_`.news_id = `lang_`.id_param_news
				   INNER JOIN `tbl_recipes_category` AS `main_cat_` ON `main_`.news_category = `main_cat_`.category_id
				   INNER JOIN `tbl_recipes_category_lang` AS `main_cat_lang_` ON `main_cat_`.category_id = `main_cat_lang_`.id_param
	               WHERE (`main_`.`news_alias` = '$news_alias' OR `lang_`.`news_alias` = '$news_alias')
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   
   }
   
   
   /*
   # ----------------------------------------------------------------------
   # PAGES: NEWS
   # ----------------------------------------------------------------------
   */
   
   function get_category_news($category_alias){
      $sql    	= "SELECT `cat_`.`category_name` AS `category_name`, `lang_`.`category_name` AS `category_name_lang` FROM `tbl_news_category` AS `cat_` 
	  			   INNER JOIN `tbl_news_category_lang` AS `lang_` ON `cat_`.category_id = `lang_`.id_param
	               WHERE (`cat_`.`category_alias` = '$category_alias' OR `lang_`.`category_alias` = '$category_alias')
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   
   }
   
   function get_news_detail($news_alias){
      $sql    	= "SELECT `main_`.`news_title` AS `title`, `lang_`.`news_title` AS `title_lang`, `main_cat_`.`category_name` AS `category`, `main_cat_lang_`.`category_name` AS `category_lang`
	  			   FROM `tbl_news` AS `main_` 
	  			   INNER JOIN `tbl_news_lang` AS `lang_` ON `main_`.news_id = `lang_`.id_param_news
				   INNER JOIN `tbl_news_category` AS `main_cat_` ON `main_`.news_category = `main_cat_`.category_id
				   INNER JOIN `tbl_news_category_lang` AS `main_cat_lang_` ON `main_cat_`.category_id = `main_cat_lang_`.id_param
	               WHERE (`main_`.`news_alias` = '$news_alias' OR `lang_`.`news_alias` = '$news_alias')
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   
   }
   
   
   /*
   # ----------------------------------------------------------------------
   # PAGES: ARTICLE
   # ----------------------------------------------------------------------
   */
   
   function get_category_article($category_alias){
      $sql    	= "SELECT `cat_`.`category_name` AS `category_name`, `lang_`.`category_name` AS `category_name_lang` FROM `tbl_article_category` AS `cat_` 
	  			   INNER JOIN `tbl_article_category_lang` AS `lang_` ON `cat_`.category_id = `lang_`.id_param
	               WHERE (`cat_`.`category_alias` = '$category_alias' OR `lang_`.`category_alias` = '$category_alias')
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   
   }
   
   function get_article_detail($news_alias){
      $sql    	= "SELECT `main_`.`news_title` AS `title`, `lang_`.`news_title` AS `title_lang`, `main_cat_`.`category_name` AS `category`, `main_cat_lang_`.`category_name` AS `category_lang`
	  			   FROM `tbl_article` AS `main_` 
	  			   INNER JOIN `tbl_article_lang` AS `lang_` ON `main_`.news_id = `lang_`.id_param_news
				   INNER JOIN `tbl_article_category` AS `main_cat_` ON `main_`.news_category = `main_cat_`.category_id
				   INNER JOIN `tbl_article_category_lang` AS `main_cat_lang_` ON `main_cat_`.category_id = `main_cat_lang_`.id_param
	               WHERE (`main_`.`news_alias` = '$news_alias' OR `lang_`.`news_alias` = '$news_alias')
				  ";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   
   }
   
}

$_title = new HeaderTitle();


/*
# ----------------------------------------------------------------------
# SHOP
# ----------------------------------------------------------------------
*/

if(ACT == 'shop_/_shop'){

   if($_REQUEST['shop_cat_id'] === 'all'){
      $_page_title		= $_global_general->website_title.' | Products';
	  
   }else{
      $_req_category	= filter_var($_REQUEST['shop_cat_id'], FILTER_SANITIZE_STRING);
      $category 		= $_title->get_product_category($_req_category);
	  $_page_title 		= $_global_general->website_title.' | Products - '.$category->category_name;
	  
   }
   
   
   
}else if(ACT == 'shop_/details_/details'){
   
   $product_alias = filter_var($_REQUEST['prod_name'], FILTER_SANITIZE_STRING);
   $type_alias    = filter_var($_REQUEST['prod_type'], FILTER_SANITIZE_STRING);
   
   $count = $_title->count_product($product_alias, $type_alias);
   
   if($count->rows > 0){
      $data = $_title->get_product($product_alias, $type_alias);
	  
      $_page_title = $_global_general->website_title.' | Products - '.$data->category_name.' - '.$data->product_name.' - '.$data->type_name;
   }else{
      $_page_title = $_global_general->website_title.' | Products - Detail';
   }


/*
# ----------------------------------------------------------------------
# SHOP: SEARCH
# ----------------------------------------------------------------------
*/
}else if(ACT == 'shop_/_search'){
   
   $key	= filter_var($_REQUEST['key'], FILTER_SANITIZE_STRING);
   $_page_title = $_global_general->website_title.' | Pencarian Produk - '.$key;

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

}else if(ACT === 'pages_/about/index'){
   
   $strrchr = strlen(strrchr(ACT, '/'));
   $type    = substr(ACT, 7, -$strrchr);
   
   if($type == 'about'){
      $type = 'About';
   }else if($type == 'privacy'){
      $type = 'Privacy Policy';
   }else if($type == 'terms'){
      $type = 'Terms &amp; Conditions';
   }else if($type == 'help'){
      $type = 'Help';
   }
   $_page_title = $_global_general->website_title.' | '.$type;


/*
# ----------------------------------------------------------------------
# PAGES: CONTACT
# ----------------------------------------------------------------------
*/

}else if(ACT === 'pages_/contact/index'){
   $_page_title = $_global_general->website_title.' | Kontak';


/*
# ----------------------------------------------------------------------
# PAGES: RECIPES
# ----------------------------------------------------------------------
*/
}else if(ACT === 'pages_/recipes_/index'){
   if(isset($_REQUEST['cat_news'])){
      $req_cat_news		= filter_var($_REQUEST['cat_news'], FILTER_SANITIZE_STRING);
      $category_name	= $_title->get_category_recipes($req_cat_news);
      $_page_title 		= $_global_general->website_title.' | Resep - '.$category_name->category_name;
   }else{
      $_page_title		= $_global_general->website_title.' | Resep';
   }

}else if(ACT === 'recipes_/_details/details'){
   $_req_alias	= filter_var($_REQUEST['news_alias'], FILTER_SANITIZE_STRING);
   $data		= $_title->get_recipes_detail($_req_alias);
   $_page_title = $_global_general->website_title.' | Resep '.$data->category.' - '.$data->title;


/*
# ----------------------------------------------------------------------
# PAGES: NEWS
# ----------------------------------------------------------------------
*/
}else if(ACT === 'news_/index'){
   if(isset($_REQUEST['cat_news'])){
      $req_cat_news		= filter_var($_REQUEST['cat_news'], FILTER_SANITIZE_STRING);
      $category_name	= $_title->get_category_news($req_cat_news);
      $_page_title 		= $_global_general->website_title.' | Berita - '.$category_name->category_name;
   }else{
      $_page_title		= $_global_general->website_title.' | Berita';
   }

}else if(ACT === 'news_/_details/details'){
   $_req_alias	= filter_var($_REQUEST['news_alias'], FILTER_SANITIZE_STRING);
   $data		= $_title->get_news_detail($_req_alias);
   $_page_title = $_global_general->website_title.' | Berita '.$data->category.' - '.$data->title;


/*
# ----------------------------------------------------------------------
# PAGES: ARTICLE
# ----------------------------------------------------------------------
*/
}else if(ACT === 'article_/index'){
   if(isset($_REQUEST['cat_news'])){
      $req_cat_news		= filter_var($_REQUEST['cat_news'], FILTER_SANITIZE_STRING);
      $category_name	= $_title->get_category_article($req_cat_news);
      $_page_title 		= $_global_general->website_title.' | Artikel - '.$category_name->category_name;
   }else{
      $_page_title		= $_global_general->website_title.' | Artikel';
   }

}else if(ACT === 'article_/_details/details'){
   $_req_alias	= filter_var($_REQUEST['news_alias'], FILTER_SANITIZE_STRING);
   $data		= $_title->get_article_detail($_req_alias);
   $_page_title = $_global_general->website_title.' | Artikel '.$data->category.' - '.$data->title;
   
   
/*
# ----------------------------------------------------------------------
# PAGES: HELP
# ----------------------------------------------------------------------
*/
}else if(ACT === 'pages_/help/index'){
   $_page_title = $_global_general->website_title.' | Bantuan';


/*
# ----------------------------------------------------------------------
# SHOPPING BAG
# ----------------------------------------------------------------------
*/
}else if(ACT === 'order_/bag_/bag'){
   $_page_title = $_global_general->website_title.' | Keranjang Belanja';


/*
# ----------------------------------------------------------------------
# KONFIRMASI PEMBAYARAN
# ----------------------------------------------------------------------
*/
}else if(ACT === 'confirm_/index'){
   $_page_title = $_global_general->website_title.' | Konfirmasi Pembayaran';
   
   
/*
# ----------------------------------------------------------------------
# PAGES: HOME
# ----------------------------------------------------------------------
*/
}else if(ACT === 'pages_/home/index'){
   $_page_title = $_global_general->website_title.' | Home';
   
}else{
   $_page_title = $_global_general->website_title;
   
}


if(!defined('PAGE_TITLE')){
   define('PAGE_TITLE', $_page_title);
}
?>
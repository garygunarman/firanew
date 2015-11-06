<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - FEATURED PRODUCTS: INDEX
# ----------------------------------------------------------------------
*/

require_once(dirname(__FILE__).'/../../../../static/_header.php');


class FEATURED_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_featured($featured_type_id){
      $sql    = "SELECT * FROM tbl_featured WHERE `featured_type_id` = '$featured_type_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }


   function count_featured($featured_type_id, $featured_alias_id){
      $sql    = "SELECT COUNT(*) AS rows FROM tbl_featured WHERE `featured_type_id` = '$featured_type_id' AND `featured_alias_id` = '$featured_alias_id'";
	  $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
	  
	  return $result;
   }
   
   
   function get_featured_product(){
      $sql    = "SELECT * FROM tbl_product AS prod_ LEFT JOIN tbl_product_type AS type_ ON prod_.id = type_.product_id WHERE `type_delete` != '1' AND `type_active` = '1'GROUP BY `prod_`.`id`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   
   
   function get_featured_product_sync(){
      $sql    = "SELECT * FROM tbl_product AS prod_ LEFT JOIN tbl_product_type AS type_ ON prod_.id = type_.product_id WHERE `type_delete` != '1' AND `type_active` = '1' GROUP BY `prod_`.`id`";
      $query = $this->conn->query($sql);
      $row   = array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
	  
	  foreach($row as $row){
	     if($row->type_delete === 1 || $row->type_active === 0){
		    $sql    = "DELETE tbl_featured WHERE `featured_type_id` = '?'";
			$stmt   = $this->conn->prepare($sql);
	  
		    if($stmt === false) {
			   trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
			}else{
			   $stmt->bind_param("i", $row->type_id);
			   $stmt->execute(); 
			}
	  
		    $stmt->close();
		 }
	  }
   
      return $row;
   }
   
   
   function get_featured_product_stock($type_id){
      $sql    = "SELECT SUM(`stock_quantity`) AS total_stock FROM tbl_product_stock WHERE `type_id` = '$type_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }
   
   
   function get_featured_product_visibility($product_id){
      $sql    = "SELECT SUM(`type_visibility`) AS visibility FROM tbl_product_type WHERE `product_id` = '$product_id'";
      $query  = $this->conn->query($sql);
	  $result = $query->fetch_object();
   
      return $result;
   }
   
   
   function listCategory($level, $parent, $current_category){
      $sql    = "SELECT * from tbl_category AS cat INNER JOIN tbl_category_relation AS cat_rel ON cat.category_id = cat_rel.category_child
	             WHERE cat.category_level = '$level' AND cat_rel.category_parent = '$parent' ORDER BY category_order";
	  $query  = $this->conn->query($sql);
	  
	  if($query->num_rows != null && $query->num_rows != 0){
      
	     for($counter=1;$counter<=$query->num_rows; $counter++){
		  
	        $get_data_array = $query->fetch_object();
		    $new_level      = $level*1+1;
		    $new_parent     = $get_data_array->category_id;
		 
		 
		    echo '<option class="option_level_'.$level.'" data-level="'.$level.'" id="option_level_'.$level.'"';
		    if($current_category == $new_parent){
			   echo ' selected=selected ';
			}
		 
		    echo 'value="'.$get_data_array->category_id.'">';
		 
		    for($i=0; $i < $level; $i++){
			   echo '-- ';
			}
		 
		    echo $get_data_array->category_name.'</option>';
		    $this->listCategory($new_level, $new_parent, $current_category);
		 }
	  }
   }
   
}
?>
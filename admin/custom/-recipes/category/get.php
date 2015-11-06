<?php
/*
# ----------------------------------------------------------------------
# RECIPE: GET
# ----------------------------------------------------------------------
*/


class RECIPE_GET{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function get_category($search, $sort_by, $first_record, $query_per_page){
      $sql		= "SELECT 
	  			   cat.category_id, cat.category_name, cat.category_active, cat.category_visibility,
				   COUNT(recipes.recipe_id) AS total_recipes
				   FROM tbl_recipes_category AS cat LEFT JOIN tbl_recipes AS recipes ON cat.category_id = recipes.category_recipes 
				   WHERE $search 
				   GROUP BY cat.category_id
				   ORDER BY $sort_by
				   LIMIT $first_record , $query_per_page
				  ";
      $query 	= $this->conn->query($sql);
      $row		= array();
	  
	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }
   
      return $row;
   }
   
   
   function get_full_category($search, $sort_by, $first_record, $query_per_page){
      $sql		= "SELECT 
           		   cat.category_id, cat.category_name, cat.category_active, cat.category_visibility,
				   COUNT(recipes.recipe_id) AS total_recipes
				   FROM tbl_recipes_category AS cat LEFT JOIN tbl_recipes AS recipes ON cat.category_id = recipes.category_recipes 
				   WHERE $search 
				   GROUP BY cat.category_id
				   ORDER BY $sort_by
				  ";
      $query  = $this->conn->query($sql);
	  
	  $full_order['total_query'] = $query->num_rows;
	  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);
	  
	  return $full_order;
   }


   function validateCategory($category_id){
      $sql		= "SELECT 
             	   cat.category_id, cat.category_name, cat.category_active, cat.category_visibility,
				   COUNT(rec.recipe_id) AS total_recipes
				   FROM tbl_recipes_category AS cat LEFT JOIN tbl_recipes AS rec ON cat.category_id = rec.category_recipes
				   WHERE cat.category_id = '$category_id' 
				   ORDER BY category_name";
      $query  	= $this->conn->query($sql);
	  $result 	= $query->fetch_object();
   
      return $result;
   }


   function validateCategoryNameCheck($category_name){
      $sql   	= "SELECT COUNT(* ) AS rows FROM tbl_recipes_category WHERE `category_name` = '$category_name'";
      $query  	= $this->conn->query($sql);
	  $result 	= $query->fetch_object();
   
      return $result;
   }


   function validateCategoryName($category_name){
      $sql		= "SELECT * FROM tbl_recipes_category WHERE `category_name` = '$category_name'";
      $query  	= $this->conn->query($sql);
	  $result 	= $query->fetch_object();
   
      return $result;
   }


   function countCategory(){
      $sql		= "SELECT 
              	   cat.category_id, cat.category_name, cat.category_active, cat.category_visibility,
				   COUNT(rec.recipe_id) AS total_recipes
				   FROM tbl_recipes_category AS cat LEFT JOIN tbl_recipes AS rec ON cat.category_id = rec.category_recipes ORDER BY category_name";
      $query  	= $this->conn->query($sql);
	  $result 	= $query->num_rows;
	  
	  return $result;
   }
   
}
?>
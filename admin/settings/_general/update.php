<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - GENERAL: UPDATE
# ----------------------------------------------------------------------
*/


class GENERAL_UPDATE{
   
   private $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function insert_general($url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo, $cover, $icon){
      $sql   = "INSERT INTO tbl_general  
                (url, 
			    website_title, 
			    website_description, 
			    website_keywords, 
			    analytics_code, 
			    company_phone, 
			    company_address, 
			    company_country, 
			    company_province, 
			    company_city, 
			    company_postal_code, 
			    company_facebook, 
			    company_twitter, 
			    company_instagram, 
			    currency_rate, 
			    logo,
				cover,
				icon) 
			    VALUES
			    (?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
			    ?,
				?)";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssssssssssssssss", $url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo, $cover, $icon);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_general($url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo, $cover, $icon){
      $sql   = "UPDATE `tbl_general` SET `url` = ?,
			           `website_title` = ?,
				       `website_description` = ?,
				       `website_keywords` = ?,
				       `analytics_code` = ?,
				       `company_phone` = ?,
				       `company_address` = ?,
				       `company_country` = ?,
				       `company_province` = ?,
				       `company_city` = ?,
				       `company_postal_code` = ?,
				       `company_facebook` = ?,
				       `company_twitter` = ?,
				       `company_instagram` = ?,
				       `currency_rate` = ?,
					   `logo` = ?,
					   `cover` = ?,
					   `icon` = ?
			   WHERE `tbl_general`.`general_id` = '1'";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssssssssssssssssss", $url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo, $cover, $icon);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function insert_mailgun($api_key, $domain, $status){
      $sql   = "INSERT INTO `tbl_mailgun_info` (`api_key`, `domain`, `status`) 
                               VALUES(?, ?, ?)
			   ";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("sss", $api_key, $domain, $status);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
   
   function update_mailgun($api_key, $domain, $status, $id){
      $sql   = "UPDATE `tbl_mailgun_info` SET `api_key` = ?, `domain` = ?, `status` = ? WHERE `id` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
	  if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("ssss", $api_key, $domain, $status, $id);
	     $stmt->execute(); 
	  }
	  
	  $stmt->close();
   }
   
}
?>
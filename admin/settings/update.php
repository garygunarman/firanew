<?php
// INSERT tbl_general
function insert_general($url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo){
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
			  logo) 
			  VALUES
			  ('$url',
			   '$title',
			   '$description',
			   '$keywords',
			   '$analytics',
			   '$phone',
			   '$address',
			   '$country',
			   '$province',
			   '$city',
			   '$postal',
			   '$facebook',
			   '$twitter',
			   '$instagram',
			   '$currency',
			   '$logo')";
   $query = mysql_query($sql) or die (mysql_error());
}


// UPDATE tbl_general
function update_general($url, $title, $description, $keywords, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $instagram, $currency, $logo){
   $sql   = "UPDATE `tbl_general` SET `url` = '$url',
			        `website_title` = '$title',
				    `website_description` = '$description',
				    `website_keywords` = '$keywords',
				    `analytics_code` = '$analytics',
				    `company_phone` = '$phone',
				    `company_address` = '$address',
				    `company_country` = '$country',
				    `company_province` = '$province',
				    `company_city` = '$city',
				    `company_postal_code` = '$postal',
				    `company_facebook` = '$facebook',
				    `company_twitter` = '$twitter',
				    `company_instagram` = '$instagram',
				    `currency_rate` = '$currency',
					`logo` = '$logo'
			WHERE `tbl_general`.`general_id` = '1'";
   $query = mysql_query($sql) or die(mysql_error());
}



/*
# ----------------------------------------------------------------------
# ACCOUNTS
# ----------------------------------------------------------------------
*/



function insert_admin($role, $username, $email, $password, $level){
   $conn  = connDB();
   
   $sql   = "INSERT INTO tbl_admin (`role`, `username`, `email`, `password`, `level`) VALUES ('$role', '$username', '$email', '$password', '$level')";
   $query = mysql_query($sql, $conn);
}

function validation_old_password($password){
   $conn = connDB();
   
   $sql    = "SELECT COUNT(*) AS rows FROM tbl_admin WHERE `password` = MD5('$password')";
   $query  = mysql_query($sql, $conn);
   $result = mysql_fetch_array($query);
}

function update_admin($role, $username, $email, $password, $level, $admin_id){
   $conn  = connDB();
   
   $sql   = "UPDATE tbl_admin SET `role` = '$role', 
                                  `username` = '$username', 
								  `email` = '$email', 
								  `password` = MD5('$password'), 
								  `level` = '$level'
             WHERE `id` = '$admin_id'
			 ";
   $query = mysql_query($sql, $conn) or die(mysql_error());
}

function update_admin_half($role, $username, $email, $level, $admin_id){
   $conn  = connDB();
   
   $sql   = "UPDATE tbl_admin SET `role` = '$role', 
                                  `username` = '$username', 
								  `email` = '$email',  
								  `level` = '$level'
             WHERE `id` = '$admin_id'
			 ";
   $query = mysql_query($sql, $conn) or die(mysql_error());
}



$role            = $_POST['admin_role'];
$username        = $_POST['username'];
$email           = $_POST['email'];
$old_pass        = $_POST['old_password'];
$new_pass        = $_POST['new_password'];
$new_pass_retype = $_POST['r_new_password'];
$admin_id        = $_POST['admin_id'];



if(isset($_POST['btn-index-account'])){

   if($_POST['btn-index-account'] == "Save Changes"){
      $validation = validation_old_password($old_pass);
	  
	  if($validation['rows'] > 0){
	     update_admin($role, $username, $email, $new_pass_retype, 'NOT DEFINED YET', $admin_id);
		 ?>
         <script>
		 alert("Success update for username : <?php echo $_POST['username'];?>");
		 </script>
         <?php
	  }else if ($validation['rows'] = 0){
		 ?>
         <script>
		 alert("Please enter the correct password");
		 </script>
         <?php
      }else if($new_pass != $new_pass_retype){
         ?>
         <script>
		 alert("Please retype correctly");
		 </script>
         <?php
	  }
	  
	  
	  
	  
	  if($validation['rows'] > 0){
	     update_general($url, $title, $description, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $currency);   
	  }else{
	     insert_general($url, $title, $description, $analytics, $phone, $address, $country, $province, $city, $postal, $facebook, $twitter, $currency);
	  }
	  
   }

}
?>
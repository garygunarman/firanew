<?php
//if($_POST){   
   
   include('../../../../static/_header.php');
   require_once('MCAPI.class.php');
   
   class MAILCHIMP{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
	  
	  
	  function count_mailchimp(){
         $sql    = "SELECT COUNT(*) AS rows FROM tbl_mailchimp";
	     $query  = $this->conn->query($sql);
	     $result = $query->fetch_object();
	  
	     return $result;
	  }
	  
	  
	  function get($mailchimp_id){
         $sql    = "SELECT * FROM tbl_mailchimp WHERE `mailchimp_id` = '$mailchimp_id'";
	     $query  = $this->conn->query($sql);
	     $result = $query->fetch_object();
	  
	     return $result;
	  }
	  
	  
	  function storeAddress($ajax_email){
   
	     $count = $this->count_mailchimp();
   
	     if($count->rows > 0){
		    $data = $this->get('1');
		 }
		  
	     if($ajax_email == ''){ 
	        echo "No email address provided";
		 }

	     if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $ajax_email)) {
		    echo "Email address is invalid"; 
		 }
		 
		 // grab an API Key from http://admin.mailchimp.com/account/api/
		 $api = new MCAPI($data->mailchimp_key);
		 
		 
		 // grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
		 // Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
		 $list_id = $data->mailchimp_list;
		 
		 if($api->listSubscribe($list_id, $ajax_email, '') === true){
	        echo 'Success! Please check your email.';
		 }else{
	        echo 'Error: ' . $api->errorMessage;
		 }
	
	  }
	  
   }
   
   $_ajax = new MAILCHIMP();
   
   $ajax_email = filter_var($_POST['newsletter'], FILTER_SANITIZE_EMAIL);
   
   if($ajax_email){ 
      $_ajax->storeAddress($ajax_email);
   }
   
   echo $ajax_email;
//}
?>

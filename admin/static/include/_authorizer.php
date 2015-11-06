<?php
/*
* ----------------------------------------------------------------------
* AUTHORIZER
* ----------------------------------------------------------------------
*/


class SessionAdmin extends HeaderGlobal{
   
   protected $conn;
   
   function __construct() {
      $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }
   
   
   function checkTime($post_end_time){
      $sql		= "SELECT TIMESTAMPDIFF(second, '$post_end_time', NOW()) AS `second`";
	  $result	= $this->fetchData('single', $sql);
	  
      return $result;
   }
   
   
   function countToken(){
      $sql    	= "SELECT COUNT(*) AS `rows` FROM `tbl_token`";
	  $result	= $this->fetchData('single', $sql);
	  
	  return $result;
   }
   
   
   function getAdminTokens(){
      $sql    	= "SELECT * FROM `tbl_token`";
	  $result	= $this->fetchData('multiple', $sql);
	  
	  return $result;
   }
   
   
   function getAdminToken($type, $token, $tokentime){
      $sql    	= "SELECT COUNT(*) AS rows FROM `tbl_token` WHERE `type` = '$type'";
	  $result	= $this->fetchData('single', $sql);
	  
	  if($result->rows > 0){
	     $sql    	= "SELECT `token`, `description`, `created_date`, `parameter` FROM `tbl_token` WHERE `token` = '$token'";
		 $result	= $this->fetchData('single', $sql);
		 
		 $temp_token	= $this->verify($result->description.cleanurl($result->created_date.$result->parameter), $token);
		 if($temp_token){
		    $result = $result;
			
		 }else{
		    $result = 0;
			
		 }
	  
	  }else{
	     $result = 0;
	  
	  }
	  
	  return $result;
   }
   
   
   function updateToken($created_date){
      $sql    = "DELETE FROM `tbl_token` WHERE `created_date` = ?";
	  $stmt   = $this->conn->prepare($sql);
	  
      if($stmt === false) {
	     trigger_error('Database error: ' . $sql . ' Error: ' . $this->conn->errno . ' ' . $this->conn->error, E_USER_ERROR);
	  }else{
	     $stmt->bind_param("s", $created_date);
	     $stmt->execute(); 
	  }
	  
      $stmt->close();
   }

}


$_get		= new SessionAdmin();


/* --- ADMIN SESISON HANDLER --- */
if(isset($_SESSION['admin'][DOMAIN_ADDRESS])){
   /* --- CRON: TOKEN TIME  --- */
   $countToken	= $_get->countToken();
   if($countToken->rows > 0){
      $tokens	= $_get->getAdminTokens();
	  foreach($tokens as $tokens){
	     $loginDate	= $_get->checkTime($tokens->created_date);
		 if($loginDate->second > 14400){
		    $_get->updateToken($tokens->created_date);
			
		 }else{
		    
		 }
		 
	  }
	  
   }else{
   
   }
   
   if(isset($_SESSION['admin'][DOMAIN_ADDRESS]['login'])){
      if($_SESSION['admin'][DOMAIN_ADDRESS]['login'] === 0){
	     safe_redirect('logout');
		 
	  }else{
	     $verifyToken	= $_get->getAdminToken(1, $_SESSION['admin'][DOMAIN_ADDRESS]['token'], $_SESSION['admin'][DOMAIN_ADDRESS]['time']);
		 if(is_object($verifyToken)){
		    $loginTime	= $_get->checkTime($_SESSION['admin'][DOMAIN_ADDRESS]['time']);
			
			if($loginTime->second > 14400){
			   if(!isset($_SESSION['admin'][DOMAIN_ADDRESS]['auth'])){
			      $_SESSION['admin'][DOMAIN_ADDRESS]['auth'] = 1;
				  safe_redirect('self');
				  
			   }else if($_SESSION['admin'][DOMAIN_ADDRESS]['auth'] === 1){
			      $_SESSION['admin'][DOMAIN_ADDRESS]['auth']	= 2;
			      safe_redirect('logout');
				  
			   }else{
			      
			   }
			   
			   
			}else{
			   $_SESSION['admin'][DOMAIN_ADDRESS]['login']	= 1;
			   $_SESSION['admin'][DOMAIN_ADDRESS]['time']	= date('Y-m-d H:i:s');
			   
			   $_adm_data	= $verifyToken;
			   
			}
			
		 }else{
		    if(isset($_SESSION['admin'][DOMAIN_ADDRESS]['auth'])){
			   
			}else{
			   $_SESSION['admin'][DOMAIN_ADDRESS]['auth'] = 1;
			   safe_redirect('logout');
			}
		    
			
		 }
		 
	  }
	  
   }else{
      safe_redirect('logout');
   
   }
   
}else{
   if(substr(BASE_URL, -6) === 'admin/' && ACT === 'account/_login/signin'){
   }else if(substr(BASE_URL, -6) === 'admin/' && ACT === 'static/_cleaner'){
   }else if(substr(BASE_URL, -9) === 'logout.php'){
   }else{
      
      if(!isset($_SESSION['admin'][DOMAIN_ADDRESS]['login-controller'])){
	  
	  }else{
         unset($_SESSION['admin'][DOMAIN_ADDRESS]['login-controller']);
		 safe_redirect('logout');
	     
	  }
	  
   }
   
}


/* --- CRON --- */
$_count	= $_get->countToken();
if($_count->rows > 0){
   $_data	= $_get->getAdminTokens();
   foreach($_data as $_data){
      $_time	= $_get->checkTime($_data->created_date);
	  if($_time->second > 14400){
	     $_get->updateToken($_data->created_date);
		 
	  }
	  
   }
   
}
?>
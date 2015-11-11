<?php 
include('static/_header.php');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1000px">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $_global_general->website_title;?> Admin</title>
    
    <meta name="format-detection" content="telephone=no">
    <!--<link rel="stylesheet" href="<?php echo BASE_URL;?>css/normalize.css"> obsolete-->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>css/bootstrap-nr.css"> <!--old-->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>script/jquery-ui-1.11.1.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>css/animate.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL.substr($_global_general->icon, 1);?>">

    <!--[if lt IE 9]>
      <link href="<?php echo BASE_URL;?>css/ie.css" rel="stylesheet">
      <script src="<?php echo BASE_URL;?>script/html5shiv.js"></script>
      <script src="<?php echo BASE_URL;?>script/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo BASE_URL;?>script/modernizr-2.6.1.min.js"></script>
    <script src="<?php echo BASE_URL;?>script/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASE_URL;?>script/javascript.js"></script>
    <script src="<?php echo BASE_URL;?>script/jquery-ui-1.11.1.js"></script>
    <script src="<?php echo BASE_URL;?>script/bootstrap.js"></script>
    
	<script src="<?php echo BASE_URL;?>script/plugins.js"></script> <!--old-->
    <!--<script src="<?php echo BASE_URL;?>script/header.js"></script> obsolete -->
    <script src="<?php echo BASE_URL;?>script/holder.js"></script>
    <script src="<?php echo BASE_URL;?>script/main.js"></script>
    <script src="<?php echo BASE_URL;?>script/dragtable.js"></script>
  </head>
  <body onLoad="initialization()" <?php if(empty($_SESSION['admin'])){ echo ' class="signin"';}?>>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->
    
    <!--<div id="container">-->
    <div class="pageload">
      <img src="<?php echo BASE_URL;?>../files/common/loading.gif" width="20" class="hidden">
    </div>

    <!--<div class="nav-ribbon view-admin">
      <div class="container">
        Admin View
      </div>
    </div>-->

	<?php
	/*
	# ----------------------------------------------------------------------
	# NAVBAR
	# ----------------------------------------------------------------------
	*/
	
	//if(isset($_SESSION['admin']['login_id'])){
	if(isset($_SESSION['admin'][DOMAIN_ADDRESS]['login']) && $_SESSION['admin'][DOMAIN_ADDRESS]['login'] === 1){
	   include("custom/static/header.php");
	}
	
	
	
	/*
	# ----------------------------------------------------------------------
	# DYNAMIC CONTENT
	# ----------------------------------------------------------------------
	*/
	
	if(empty($_REQUEST['act'])){
	   if(isset($_SESSION['admin'][DOMAIN_ADDRESS]['login']) && $_SESSION['admin'][DOMAIN_ADDRESS]['login'] === 1){
	      safe_redirect(DEFAULT_PAGE);
	   
	   }else{
		  if(!isset($_SESSION['admin']['control_login'])){
		     $_SESSION['admin']['control_login'] = 1;
			 safe_redirect('self');
			 
		  }else if(isset($_SESSION['admin']['control_login']) && $_SESSION['admin']['control_login'] == 1){
	         safe_redirect('login');
			 
		  }
	      
		  include(str_replace ('http','',$_REQUEST['act']).".php");
	   
	   }
	
	}else{
	   if(isset($_SESSION['admin'][DOMAIN_ADDRESS]['login']) && $_SESSION['admin'][DOMAIN_ADDRESS]['login'] === 1){   
		  if(isset($_SESSION['admin']['control_login'])){
		     if($_REQUEST['act'] != 'account/_login/signin' || ACT != 'account/_forgot/forgot' || ACT != 'account/_recover/recover'){
			    include(str_replace ('http','',$_REQUEST['act']).".php");
				
			 }else{
			    safe_redirect('logout');
				
			 }
			 
		  }else{
		     $_SESSION['admin']['control_login'] = 1;
			 //safe_redirect('login');
			 safe_redirect(DEFAULT_PAGE);
			 
		  }
		  
	   }else{
		  if(isset($_SESSION['admin']['control_login']) && $_SESSION['admin']['control_login'] === 1){
			 unset($_SESSION['admin']['control_login']);
	         safe_redirect('logout');
			 
		  }else{
			 if(isset($_SESSION['admin']['control_login']) && $_SESSION['admin']['control_login'] === 1){
			    unset($_SESSION['admin']['control_login']);
			    safe_redirect('login');
				
			 }else{
			    if(ACT === 'account/_login/signin'  || ACT === 'account/_forgot/forgot' || ACT === 'account/_recover/recover'){
				   include(str_replace ('http','',$_REQUEST['act']).".php");
				   
				}else{
				   safe_redirect('login');
				   
				}
			 
			 }
			 
		  }
		  
	   }
	   
	}
	
	
	/*
	# ----------------------------------------------------------------------
	# FOOTER
	# ----------------------------------------------------------------------
	*/
	//if(isset($_SESSION['admin']['login_id'])){
	if(isset($_SESSION['admin'][DOMAIN_ADDRESS]['login']) && $_SESSION['admin'][DOMAIN_ADDRESS]['login'] === 1){
	   include("static/footer.php");
	}
	?>

  </body>
</html>


<?php 
include('static/bottom.php');
?>
<?php $prefix="../";
include($prefix.'admin/static/_header.php');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    
    <?php include($prefix."static/head.php"); ?>
	
    <?php //include($prefix."static/analytics.php"); ?>

  </head>
  <body class="news">
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->



    <div id="main">

      <?php include($prefix."static/navbar.php"); ?>

      <div class="jumbotron jumbo-contact" id="section3">
	
        <h1 class="title animated fadeInUp">Contact Us</h1>
        <!-- <p class="subtitle">Lorem Ipsum Dolor Sit Amet.</p> -->
      </div>

      <!-- <div class="row">
        <div class="col-md-2 col-md-offset-4">
          <h3>Contact Us</h3>
          <div class="news-line"></div>
        </div>
        <div class="col-md-2">
          <h3>Social Media</h3>
          <div class="news-line"></div>
        </div>
      </div> -->
	<?php
	require $prefix.'admin/emails/_mailgun/vendor/autoload.php';
	use Mailgun\Mailgun;
	$headers	= '';

	if(isset($_POST['btn-contact']) && $_POST['btn-contact'] == 'Submit'){

		//$_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		   $name      = filter_var($_POST['name'], FILTER_SANITIZE_STRING); 
		   $email     = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
		   $recipient = $_global_info->email; 
		   $mail_body = preg_replace("/\n/","\n<br>",$_POST['message']);
		   $subject   = "[".$_global_general->website_title."] ".filter_var($_POST['subject'], FILTER_SANITIZE_STRING); 
		   $headers   = "Content-Type: text/html; charset=ISO-8859-1\r\n".
		   $headers  .= "From: ". $name . " <" . $email . ">\r\n";

		   $mail_body = filter_var($mail_body, FILTER_SANITIZE_STRING);


	   //mail($recipient, $subject, $mail_body, $headers);
	   /*
	   $headers   = '';
	   $name      = $_global_general->website_title; 
	   $email     = $email; 
	   $recipient = $_global_info->email;  

	   echo $subject   = '['.$_global_general->website_title.'] Contact: '.$email; 
	   $headers  .= "Content-Type: text/html; charset=ISO-8859-1\r\n".
	   $headers  .= "From: ".$_global_general->website_title." <" .$_global_info->email. ">\r\n";
		
		echo $headers;
	   mail($recipient, $subject, $mail_body, $headers);
		*/
	   $_mailgun_api_key 	= MAILGUN_KEY;
	   $_mailgun_domain  	= MAILGUN_DOMAIN;
	   $_mailgun_from    	= $name.' <'.$email.'>';
	   $_mailgun_to      	= $recipient;
	   $_mailgun_subject 	= $subject;
	   $_mailgun_text    	= $mail_body;
	   $mg					= new Mailgun($_mailgun_api_key);
	   $domain				= $_mailgun_domain;
	
	   # Now, compose and send your message.
	   $mg->sendMessage($domain, array('from'    => $_mailgun_from, 
	                                   'to'      => $_mailgun_to, 
	                                   'subject' => $_mailgun_subject, 
	                                   'html'    => $mail_body));


	   $_global->counter_mailgun();
		
	   $page = 'self';
	   $type = "success";
	   $msg  = "Thank you! We will review your email as soon as possible.";

	   set_alert($type, $msg);
	   safe_redirect($page);
	}
	?>
	<?php
	show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?>
	
	  
      <div class="container main">
        <p class="contact-text">Fill in the form below and we'll try to reply you as soon as possible.</p>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <form role="form" method="post">
              <div class="form-group">
                <input type="name" class="form-control" id="name" name="name" placeholder="Name" required="">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required="">
              </div>
              <div class="form-group">
                <textarea type="message" class="form-control" rows="5" name="message" id="message" placeholder="Message" required=""></textarea>
              </div>
              <button type="submit" name="btn-contact" value="Submit" class="btn btn-primary btn-block">SEND</button>
            </form>
          </div><!--.col-->
        </div><!--.row-->
      </div><!--.container.main-->

      <section class="social-container">
        <div class="container">
          <ul class="social">
            <li class="col-sm-4">
              <a href="mailto:<?=$_global_info->email;?>?subject=Halo Fira">
                <img src="<?php echo $prefix;?>assets/img/icons/icon_email.png" class="img-responsive" alt="" />
                <p>E-mail</p>
                <p class="soc-content"><?=$_global_info->email;?></p>
              </a>
            </li>
            <li class="col-sm-4">
              <a href="https://twitter.com/" target="_blank">
                <img src="<?php echo $prefix;?>assets/img/icons/icon_twitter.png" class="img-responsive" alt="" />
                <p>Twitter</p>
                <p class="soc-content">@fira</p>
              </a>
            </li>
            <li class="col-sm-4">
              <a href="https://www.facebook.com/?_rdr=p" target="_blank">
                <img src="<?php echo $prefix;?>assets/img/icons/icon_facebook.png" class="img-responsive" alt="" />
                <p>Facebook</p>
                <p class="soc-content">info@fira.co</p>
              </a>
            </li>
          </ul>
        </div><!--.content-->
      </section><!--.main-banner-3-->

    </div><!--#main-->

<?php include($prefix."static/footer.php"); ?>
<?php include($prefix."static/script.php"); ?>

<script>
  
  $('#nav-contact').addClass('active');

</script>

<?php
/* --- REMOVE ALERT --- */
if(isset($_SESSION['alert'])){
   unset($_SESSION['alert']);
   
   echo '<script>';
   echo '';
   echo '</script>';
   
}
?>

<script>
$(document).ready(function(e) {
   
   setTimeout(function(){ 
      //alert("Hello"); 
	  $('.alert').removeClass('slideInDown');
	  $('.alert').addClass('slideOutUp');
   }, 5000);
   
   setTimeout(function(){ 
	  $('.alert').addClass('hidden');
   }, 6000);
   
   
   $('#id-btn-dissmiss-alert').on('click', function(){
      setInterval(function(){ 
         //alert("Hello"); 
	     $('.alert').removeClass('slideInDown');
	     $('.alert').addClass('slideOutUp');
	  }, 0);
   
      setInterval(function(){ 
	     $('.alert').addClass('hidden');
      }, 250);
   });

});
</script>

  </body>
</html>

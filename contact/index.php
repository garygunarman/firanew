<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <?php $prefix="../";?>
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

      <div class="container main">
        <p class="contact-text">Fill in the form below and we'll try to reply you as soon as possible.</p>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <form role="form">
              <div class="form-group">
                <input type="name" class="form-control" id="name" placeholder="Name" required="">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="E-mail" required="">
              </div>
              <div class="form-group">
                <textarea type="message" class="form-control" rows="5" id="message" placeholder="Message" required=""></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block">SEND</button>
            </form>
          </div><!--.col-->
        </div><!--.row-->
      </div><!--.container.main-->

      <section class="social-container">
        <div class="container">
          <ul class="social">
            <li class="col-sm-4">
              <a href="mailto:info@fira.co?subject=Halo Fira">
                <img src="<?php echo $prefix;?>assets/img/icons/icon_email.png" class="img-responsive" alt="" />
                <p>E-mail</p>
                <p class="soc-content">info@fira.co</p>
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

  </body>
</html>

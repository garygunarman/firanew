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
  <body class="about">
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

    <div id="main">

      <?php include($prefix."static/navbar.php"); ?>

      <div class="jumbotron jumbo-about">
        <h1 class="title animated fadeInUp">About Fira</h1>

        <!-- <p class="subtitle">Lorem Ipsum Dolor Sit Amet.</p> -->
      </div>

      <!-- <div class="jumbotron jumbo-senior"></div> -->

      <section class="about-text">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div id="logo-innovation" class="animated fadeIn delayp1">
                <img class="img-responsive" src="<?php echo $prefix;?>assets/img/logo_fira-color.png" alt="" width="100%">
              </div>
            </div>
            <div class="col-md-7">
              <div class="text-title text-dark animated fadeIn delayp2">
                <h2>Innovation. Masterpiece. Talent</h2>
                <div class="line"></div>
                <p class="body">We are a group of passionate and talented people who has vision and faith that technology could improve quality
                of human life. We start from mobile and keep innovating and looking possibility to explore
                to other platform.</p>
                <p class="body">Our internal motto is "Berkarya bukan semata berkerja" to motivates our team to keep delivering the best services you.</p>
              </div>
            </div>
          </div><!--.row-->
        </div><!--.container.main-->
      </section>

      <section class="vision2">
        <div class="row content">
          <div class="container-fluid col-md-8 col-md-offset-2">
            <div class="container-content">
              <p class="animated fadeIn delayp2">
              <span class="quote-from">Vision</span><br>
              Establish Fira as The Premier Provider of The Most Intuitive Digital Platform in Indonesia with continuous innovation, creativity, and delivering high quality products.
              </p>
            </div><!--.container-->
          </div>
        </div><!--.content-->
      </section><!--.main-banner-3-->

      <section>
        <ul class="row row-n">
          <li class="col-xs-4 col-sm-2"><img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/about_david.jpg" alt="" /></li>
          <li class="col-xs-4 col-sm-2"><img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/about_arum.jpg" alt="" /></li>
          <li class="col-xs-4 col-sm-2"><img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/about_oloan.jpg" alt="" /></li>
          <li class="col-xs-4 col-sm-2"><img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/about_sam.jpg" alt="" /></li>
          <li class="col-xs-4 col-sm-2"><img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/about_andry.jpg" alt="" /></li>
          <li class="col-xs-4 col-sm-2"><img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/about_elaine.jpg" alt="" /></li>
        </ul>
      </section>

      <section class="vision2 m_t_0">
        <div class="row content">
          <div class="container-fluid col-md-8 col-md-offset-2">
            <div class="container-content">
              <p class="animated fadeIn delayp2">
              <span class="quote-from">Mission</span><br>
              To enhance unique user experiences and redefine digital platform in Indonesia, one service at a time.
              </p>
            </div><!--.container-->
          </div>
        </div><!--.content-->
      </section><!--.main-banner-3-->

      <!-- <div class="jumbotron jumbo-about-last text-center">
        <img class="img-responsive text-center" src="<?php echo $prefix;?>assets/img/logo_fira.png" alt="" />
      </div> -->

    </div><!--#main-->

    <?php include($prefix."static/footer.php"); ?>
    <?php include($prefix."static/script.php"); ?>

<script>
  
  $('#nav-about').addClass('active');

</script>

  </body>
</html>

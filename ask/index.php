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
  <body class="ask">
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

    <div class="container main">
      <img class="logo animated fadeIn delayp1" src="<?php echo $prefix;?>assets/img/logo_fira-color.png">
      <div class="input-group animated fadeIn delayp2">
        <input type="text" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <img src="<?php echo $prefix;?>assets/img/icons/ic_search.svg"></button>
          </button>
        </span>
      </div><!--.input-group-->
      <div class="row bookmark animated fadeIn delayp3">
        <a href="http://polytron.co.id/" class="col-xs-4">
          <img src="<?php echo $prefix;?>assets/img/icons/book_polytron.png" width="100%">
          <p>Polytron</p>
        </a><!--.col-sm-4-->
        <a href="https://memangcanggih.com/" class="col-xs-4">
          <img src="<?php echo $prefix;?>assets/img/icons/book_memangcanggih.png" width="100%">
          <p>Memang Canggih</p>
        </a><!--.col-sm-4-->
        <a href="http://www.klikbca.com/" class="col-xs-4">
          <img src="<?php echo $prefix;?>assets/img/icons/book_klikbca.png" width="100%">
          <p>KlikBCA</p>
        </a><!--.col-sm-4-->
      </div><!--.row-->
    </div>

    <?php include($prefix."static/script.php"); ?>

  </body>
</html>

<?php $prefix="../";
include($prefix.'admin/static/_header.php');?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="author" content="<?php echo $_global_general->website_title;?>">
  <meta name="description" content="<?=$detail->meta_description;?>">
  <meta name="keywords" content="<?=$detail->meta_keywords;?>">
  <head>
    <?php include($prefix."static/head.php"); ?>
    <?php //include($prefix."static/analytics.php"); ?>
  </head>
  <body class="detail-news">
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

	<?php
	//include('../admin/static/_header.php');

	class BLOGDETAIL_GET extends HeaderDatabase{

		function get_news_detail($news_id){

		         $sql    = "SELECT * FROM `tbl_news` AS `news_` INNER JOIN `tbl_news_category` AS `cat_` ON `news_`.news_category = `cat_`.category_id WHERE `news_`.news_id = '$news_id'";

			  $query  = $this->conn->query($sql);
			  $result = $query->fetch_object();

			  return $result;
		   }

	}


	$news_id = $_REQUEST['id'];

	$get = new BLOGDETAIL_GET();
	$detail = $get->get_news_detail($news_id);


	?>
	
    <div id="main">

      <?php include($prefix."static/navbar.php"); ?>

      <div class="jumbotron jumbo-blog-detail"></div>

      <div class="container main">
        <div class="row m_t_30 m_b_30">
          <div class="col-md-offset-2 col-md-8">
            <div class="news-box">
              <div class="breadcrumb">
                <a href="<?php echo $prefix;?>news/"><i class="fa fa-angle-left"></i> &nbsp;Back to News</a>
              </div>
              <header class="text-title text-dark">
                <h1 class="text-center"><?=$detail->news_title;?></h1>
                <p class="datestamp text-center"><?php echo date('l, F j Y', strtotime($detail->news_date));?></p>
                <div class="line m_t_20 m_b_30"></div>
              </header>
              <section>
                <?=$detail->news_content;?>
              </section>
            </div>
          </div><!--.col-->
          <!-- <div class="col-md-4 col-lg-4">
            <div class="sidebar">
              <div class="related-box">
                <h3 class="title">Related Post</h3>
                <header>
                  <h4>Lorem Ipsum Dolor Sit</h4>
                  <p class="datestamp">Saturday, June 1 2016</p>
                </header>
                <section>
                  <p>Being the savage's bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...</p>
                </section>
                <a class="news-link">Read more ></a>
                <div class="news-line"></div>
              </div>
              <div class="related-box">
                <header>
                  <h4>Lorem Ipsum Dolor Sit</h4>
                  <p class="datestamp">Saturday, June 1 2016</p>
                </header>
                <section>
                  <p>Being the savage's bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...</p>
                </section>
                <a class="news-link">Read more ></a>
                <div class="news-line"></div>
              </div>
              <div class="related-box">
                <h3 class="title">News</h3>
                <header>
                  <h4>Lorem Ipsum Dolor Sit</h4>
                  <p class="datestamp">Saturday, June 1 2016</p>
                </header>
                <section>
                  <p>Being the savage's bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...</p>
                </section>
                <a class="news-link">Read more ></a>
                <div class="news-line"></div>
              </div>
            </div>
          </div> -->
        </div>

      </div><!--.container.main-->

    </div><!--#main-->

    <?php include($prefix."static/footer.php"); ?>
    <?php include($prefix."static/script.php"); ?>

<script>
  
  $('#nav-news').addClass('active');

</script>

  </body>
</html>

<?php
include('../admin/static/_header.php');

class BLOG_GET extends HeaderDatabase{
	
	function count_news($post_search, $post_sort_by, $query_per_page){
      $sql    = "SELECT * FROM tbl_news AS news INNER JOIN tbl_news_category AS cat ON news.news_category = cat.category_id 
                 WHERE $post_search
                 ORDER BY $post_sort_by
			    ";
      $query  = $this->conn->query($sql);

	  $full_order['total_query'] = $query->num_rows;
	  $full_order['total_page']  = ceil($full_order['total_query'] / $query_per_page);

	  return $full_order;
   }


   function get_listing_news($post_search, $post_sort_by, $post_first_record, $post_qpp){
      $sql    = "SELECT * FROM tbl_news AS news INNER JOIN tbl_news_category AS cat ON news.news_category = cat.category_id 
                 WHERE $post_search
                 ORDER BY $post_sort_by
			     LIMIT $post_first_record, $post_qpp
			    ";
      $query = $this->conn->query($sql);
      $row   = array();

	  while($result = $query->fetch_object()){
	     array_push($row, $result);
	  }

      return $row;
   }
}


$pg = $_REQUEST['pg'];
if ($pg==''){$pg=1;}

$qpp = 12;
$first_record = ($pg-1)*$qpp;

$get = new BLOG_GET();
$count = $get->count_news('1','news_date DESC',$qpp);
$total_query = $count['total_query'];
$total_page = $count['total_page'];

$news = $get->get_listing_news('1','news_date DESC',$first_record,$qpp);
?>

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


      <div class="jumbotron jumbo-blog">
        <h1 class="title animated fadeInUp">News</h1>
        <!-- <p class="subtitle">Lorem Ipsum Dolor Sit Amet.</p> -->
      </div>

      <div class="container main">
        <div class="row">
          <?php
          foreach($news as $news_){
		  ?>
			<div class="col-sm-6 col-md-4 col-lg-">
	            <a href="<?php echo $prefix;?>news-read/<?=$news_->news_id;?>" class="news-box">
	              <div class="img">
	                <img class="img-responsive" src="<?php echo $prefix.$news_->news_image;?>" width="100%">
	              </div>
	              <header>
	                <h3><?=$news_->news_title;?></h3>
	                <p class="datestamp"><?php echo date('l, F j Y', strtotime($news_->news_date));?></p>
	                <div class="news-line"></div>
	              </header>
	              <section>
	                <p><?=$news_->news_excerpt;?></p>
	              </section>
	              <p class="news-link">Read more</p>
	            </a><!--.news-box-->
	          </div><!--.col-->
		  <?php
		  }
          ?>
		
          
        </div><!--.row-->
        <ul class="pager">
		  <?php
		  if ($pg>1){
				$nextpg = $pg-1;
				
		  ?>
          <li class="previous"><a href="<?=$prefix;?>news/<?=$nextpg;?>">&larr; Newer</a></li> <!-- HANYA MUNCUL KALAU ADA YANG NEWER-->
		  <?php
	  		}
			if ($pg<$total_page){
					$nextpg = $pg*1+1;
					
		  ?>		  
          <li class="next"><a href="<?=$prefix;?>news/<?=$nextpg;?>">Older &rarr;</a></li>
		  <?php
	  		}
		  ?>
        </ul>
      </div><!--.container.main-->

    </div><!--#main-->

    <?php include($prefix."static/footer.php"); ?>
    <?php include($prefix."static/script.php"); ?>

<script>
  
  $('#nav-news').addClass('active');

</script>

  </body>
</html>

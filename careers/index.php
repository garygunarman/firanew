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
  <body class="detail-news">
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->
	<?php
	class CAREER_GET extends HeaderDatabase{

		function get_job($src_param, $post_order_by){


		   $sql    = "SELECT * FROM tbl_career AS job LEFT JOIN tbl_career_category AS dept ON job.category = dept.category_id
		              WHERE $src_param
					  ORDER BY $post_order_by
					 ";
		      $query = $this->conn->query($sql);
		      $row   = array();

			  while($result = $query->fetch_object()){
			     array_push($row, $result);
			  }

		      return $row;
		}
	}
	/*
	if ($_REQUEST['pq']!=''){
		$prefix == '../';
	}

	$pg = $_REQUEST['pg'];
	if ($pg==''){$pg=1;}

	$qpp = 1;
	$first_record = ($pg-1)*$qpp;
	*/
	$_get = new CAREER_GET();


	$careers = $_get->get_job('1','career_id DESC');
	?>
	
    <div id="main">

      <?php include($prefix."static/navbar.php"); ?>

      <div class="jumbotron jumbo-career" id="section2">
         <h1 class="title animated fadeInUp">Career</h1>
         <!-- <p class="subtitle">Lorem Ipsum Dolor Sit Amet.</p> -->

      </div>

      <section id="career-head">
        <div class="container main">
          <div class="row">
            <div class="col-md-4 hidden-xs hidden-sm animated fadeIn delayp1">
              <div class="img">
                <img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/career_img_1.jpg" width="100%">
              </div><!-- 
              <div class="img">
                <img class="img-responsive" src="<?php echo $prefix;?>assets/img/about/career_img_2.jpg" width="100%">
              </div> -->
            </div>
            <div class="col-md-offset-1 col-md-7 about-text animated fadeIn delayp2">
              <div class="text-title text-dark">
                <h2>Innovation. Masterpiece. Talent</h2>
                <div class="line"></div>
                <p class="body">Being the savage's bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while
                Being the savage's bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while</p>
              </div>
            </div><!--.col-->
          </div>
        </div><!--.container.main-->
      </section>

      <section id="workwithus">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="text-title text-dark">
              <h2>Work with FIRA</h2>
              <div class="line"></div>
            </div>
            <p class="careers-text">Here at Fira we love to work with people that inspitres us.
            Will you be one of them? Apply for one position now to find out.</p>
            
            <div class="panel-group m_b_30" id="accordion">
			  	<?php
				$i = 1;
				foreach($careers as $career){
				?>
              <div class="panel panel-default">			
                <div class="panel-heading <?php if($i==1){ ?>actives<?php } ?>">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i;?>">
                    <h4 class="panel-title">
                      <?=$career->career_name;?>
                      <i class="indicator glyphicon glyphicon-chevron-up  pull-right"></i>
                    </h4>
                  </a>
                </div>
                <div id="collapse<?=$i;?>" class="panel-collapse collapse <?php if($i==1){ ?>in <?php } ?>">
                  <div class="panel-body">
                    <p><?=$career->description;?>
                    </p>
                    <strong>Reports to</strong>
                    <p><?=$career->reports;?>
                    </p>
                    <strong>Education</strong>
                    <p><?=$career->education;?>
                    </p>
                    <a href="mailto:info@fira.co?subject=<?=$career->career_name;?>"  class="btn btn-light m_r_5">APPLY NOW</a>
                  </div><!-- panel body -->
                </div>
              </div>
			  <?php
			  	$i++;
				}
			  ?>
              
              
            </div><!-- end panel -->
          </div><!-- end col -->

        </div>
      </section>

      <div class="back-dark hidden">
        <div class="container main">
          <div class="row">
            <h1 class="text-center">Apply Now</h1>
            <div class="col-md-6 col-md-offset-3">
              <form role="form">
                <div class="input-group">
                  <span class="btn btn-default btn-file pull-right">
                      Upload <input type="file" />
                  </span>
                  <input type="text" class="form-control" id="name" placeholder="Cover letter (.doc or PDF)" />
                </div>
                <div class="input-group">
                  <span class="btn btn-default btn-file pull-right">
                      Upload <input type="file" />
                  </span>
                  <input type="text" class="form-control" id="name" placeholder="Resume (.doc or PDF)" />
                </div>
              </form>
            </div>
          </div><!--.row-->
        </div><!--.container.main-->
      </div><!--.back-dark-->


    </div><!--#main-->

    <?php include($prefix."static/footer.php"); ?>
    <?php include($prefix."static/script.php"); ?>

<script>
  
  $('#nav-career').addClass('active');

</script>

  </body>
</html>

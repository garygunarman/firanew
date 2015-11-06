<?php
/*
# ----------------------------------------------------------------------
# PAGES - HOME: VIEW
# ----------------------------------------------------------------------
*/

require(dirname(__FILE__).'/../../custom/pages/home/control.php');
include("control.php");
?>
  
  <!-- START: CHOSEN -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>script/chosen/public/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
  <!-- END: CHOSEN -->

  <form method="post" enctype="multipart/form-data">
    <div class="modal fade" id="link-pops" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header clearfix">
            <div class="pull-right">
              <input type="hidden" name="link_id" id="link-id">
              <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" id="btn_cancel">
              <input type="submit" class="btn btn-danger btn-sm" value="Delete" id="btn_pop_delete">
              <input type="submit" class="btn btn-success btn-sm" value="Save Changes" name="btn-link-banner" id="btn_pop_save">
            </div>
            <h4 class="modal-title pull-left">Image Link</h4>
          </div><!--.modal-header-->
          <div class="modal-body">
            <div class="form-group row" id="lbl_name_link">
              <label class="col-xs-3 control-label">Link</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="name-link" name="name_link">
                <p class="help-block">Paste your link here.</p>
              </div>
            </div>
          </div><!--.modal-body-->
        </div><!--.modal-content-->
      </div><!--.modal-dialog-->
    </div><!--.modal-->
  </form>
  
  <form method="post" enctype="multipart/form-data">

    <div class="subnav">
      <div class="container clearfix">
        <h1><span class="glyphicon glyphicon-home"></span> &nbsp; Home</h1>
        <div class="btn-placeholder">
          <input type="submit" class="btn btn-success btn-sm" value="Save Changes" name="btn-pages-home">
        </div>
      </div>
    </div>

    <?php
	/* --- IMPORTANT --- */
	echo '<span id="id-alert-image"></span>';
	
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?>

    <div class="container main">
      <div class="box row" id="pages_banner">
        <div class="desc col-xs-3">
          <h3>Banners</h3>
          <p>Edit home page banners.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="field-set">
            <li class="form-group row img-placeholder underlined">
              <label class="control-label col-xs-3">Main Banners</label>
              <div class="col-xs-9">
                <div class="row row-5" id="row_slide">
                  
                  <?php
                  $row = 1;
                  echo '<ul id="sortable">';
                  
                  foreach($slideshow_get as $slider){
                  ?>
                  
                  <!-- NEED STYLING "col-xs-4 image" ga actual drag-nya kalo ga "#sortable li { float: left; width: 198px; height: 105px;}" -->                    
                  
                  <li class="col-xs-4">
                    <div class="" onMouseOver="removeButton('<?php echo $slider->id;?>')" id="slide-<?php echo $slider->id;?>">
                      <div class="img img-banner-17x10">
                        <div class="hidden" id="remove-slider-<?php echo $slider->id;?>">
                          <div class="image-delete" id="btn-slider-<?php echo $slider->id;?>" onClick="clearImage('<?php echo $slider->id;?>')">
                            <span class="glyphicon glyphicon-remove"></span>
                          </div>
                          <div class="image-link <?php if(!empty($slider->link)){ echo "linked";}?>" data-toggle="modal" href="#link-pops" onclick="showLink('<?php echo $slider->id;?>')" id="btn-link-<?php echo $slider->id;?>">
                            <span class="fa fa-link fa-flip-horizontal"></span>
                          </div>
                          <div class="image-overlay" onClick="openBrowser('<?php echo $slider->id;?>')"></div>
                          <input type="hidden" name="link_slide_<?php echo $slider->id;?>" id="link-slide-<?php echo $slider->id;?>">
                        </div>
                        <img class="" id="upload-slider-<?php echo $slider->id;?>" src="<?php echo BASE_URL."static/thimthumb.php?src=../".$slider->filename."&w=195&q=100";?>">
                        <span id="tester">
                          <input disabled="disabled" type="file" name="upload_slider_<?php echo $slider->id;?>" id="slider-<?php echo $slider->id;?>" onchange="readURL(this,'<?php echo $slider->id;?>')" class="hidden"/>
                        </span><!--tester-->
                        
                        <input type="checkbox" name="slideshow_id[]" class="hidden"  value="<?php echo $slider->id;?>" id="id_slideshow_<?php echo $slider->id;?>">
                        <input type="hidden" name="flag_<?php echo $slider->id;?>" id="slideshow-flag-<?php echo $slider->id;?>" value="<?php echo $slider->filename;?>">
                        <input type="hidden" name="link_<?php echo $slider->id;?>" id="link-<?php echo $slider->id;?>" value="<?php echo $slider->link;?>">
                        <input type="text" name="order_image[]" class="hidden" value="<?php echo $slider->id;?>" /> 
                      </div><!--.img-->
                    </div>
                  </li>
                  
                  <?php
                   }
                   echo '</ul>' /* -- sortable -- */;
                   
                   /* --- EMPTY SPACE --- */
                   $max_slideshow = 6;
                   $total_left    = $max_slideshow - $count_slideshow->rows;
                   $asd           = $new_id->new_id;
                   
                   for($i=1;$i<=$total_left;$i++){
                   $new_id = $i + $asd;
                   ?>
                  
                  <div class="col-xs-4" onmouseover="removeButton('<?php echo $new_id;?>')" id="slide-<?php echo $new_id;?>">
                    <div class="img img-banner-17x10">
                      <div class="hidden" id="remove-slider-<?php echo $new_id;?>">
                        <div class="image-delete hidden" id="btn-slider-<?php echo $new_id;?>" onClick="clearImage('<?php echo $new_id;?>')">
                          <span class="glyphicon glyphicon-remove"></span>
                        </div>
                        <div class="image-link hidden" data-toggle="modal" href="#link-pops" onclick="showLink('<?php echo $new_id;?>')" id="btn-link-<?php echo $new_id;?>">
                          <span class="fa fa-link fa-flip-horizontal"></span>
                        </div>
                        <div class="image-overlay" onClick="openBrowser('<?php echo $new_id;?>')"></div>
                        <input type="hidden" name="link_slide_<?php echo $slider->id;?>" id="link-slide-<?php echo $new_id;?>">
                      </div>
                      
                      <img class="hidden" id="upload-slider-<?php echo $new_id;?>">
                      
                      <span id="tester-<?php echo $new_id;?>">
                        <input type="file" disabled="disabled" name="upload_slider_<?php echo $new_id;?>" id="slider-<?php echo $new_id;?>" onchange="readURL(this,'<?php echo $new_id;?>')" class="hidden"/>
                      </span><!--tester-->
                      <input type="checkbox" name="slideshow_id[]" class="hidden"  value="<?php echo $new_id;?>" id="id_slideshow_<?php echo $new_id;?>">
                      <input type="hidden" name="flag_<?php echo $new_id;?>" id="slideshow-flag-<?php echo $new_id;?>">
                      <input type="hidden" name="link_<?php echo $new_id;?>" id="link-<?php echo $new_id;?>">
                    </div>
                  </div>
                          
        				  <?  
        				  }
        				  ?>
                  
                </div><!--row-->
                <p class="help-block">Recommended dimensions of 1200 x 675 px</p>
              </div><!--col-xs-9-->
            </li><!--form-group-->
          </ul><!--field-set-->
        </div><!--content-->
      </div><!--box-->
      
      <span id="main-content"></span>
    </div><!--container main-->     
  </form>
 
<script src="<?php echo BASE_URL;?>script/slideshow.js"></script>
<script src="<?php echo BASE_URL;?>script/chosen/public/chosen.jquery.js"></script>         
<script>
$(document).ready(function(e) {
   activeNAvbar('pages');
   
   
   $(function() {
      $("#sortable").sortable();
      $("#sortable").disableSelection();
   });
});
</script>


<?php
include("custom/pages/home/index.php");
?>  

<style>
#sortable { list-style-type: none;}
#sortable li { float: left;}
</style>
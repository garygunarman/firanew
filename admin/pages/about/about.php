<?php
/*
# ----------------------------------------------------------------------
# PAGES - ABOUT: VIEW
# ----------------------------------------------------------------------
*/

include("custom/pages/about/control.php");
include("control.php");
?>

<script src="<?php echo BASE_URL.'ckeditor/ckeditor.js';?>"></script>

  <form method="post">
    <div class="subnav">
      <div class="container clearfix">
        <h1><span class="glyphicon glyphicon-font"></span> &nbsp; About</h1>
        <div class="btn-placeholder">
          <input type="submit" class="btn btn-success btn-sm" value="Save Changes" name="btn-about" id="btn-alias-submit">
        </div>
      </div>
    </div>

    <?php
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?>

    <div class="container main">
      <div class="box row">
        <div class="desc col-xs-3" id="custom_lang">
          <h3>Content</h3>
          <p>Descriptions about your company.</p>
          
          <span id="custom_lang"></span>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row">
              <label class="control-label col-xs-12">About</label><br /><br />
              <div class="col-xs-12">
			    
				<?php
				$get_about	= $_get->get_about_lang($lang, 'about');
				?>
                
                <textarea class="form-control" rows="5" id="id-about" name="about"><?php echo $get_about->fill;?></textarea>
                <script>
				CKEDITOR.replace('id-about');
                var data = CKEDITOR.instances.id-about.getData();
                </script>
                <br />
                <ul class="form-set clearfix">
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Page Description</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="about_description"><?php echo $get_about->description;?></textarea>
                    </div>
                  </li>
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Keywords</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="about_keywords"><?php echo $get_about->keywords;?></textarea>
                    </div>
                  </li>
                </ul>
                
              </div>
            </li>
                            
            <li class="form-group row">
              <label class="control-label col-xs-12">How To Buy</label><br /><br />
              <div class="col-xs-12">
			    
				<?php
				$get_about	= $_get->get_about_lang($lang, 'facilities');
				?>
                
                <textarea class="form-control" rows="5" id="id-facilities" name="facilities"><?php echo $get_about->fill;?></textarea>
                <script>
				CKEDITOR.replace('id-facilities');
                var data = CKEDITOR.instances.id-facilities.getData();
                </script>
               
                <br />
                <ul class="form-set clearfix">
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Page Description</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="facilities_description"><?php echo $get_about->description;?></textarea>
                    </div>
                  </li>
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Keywords</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="facilities_keywords"><?php echo $get_about->keywords;?></textarea>
                    </div>
                  </li>
                </ul>
                
              </div>
            </li>

            <li class="form-group row">
              <label class="control-label col-xs-12">Product Facilities</label><br /><br />
              <div class="col-xs-12">
			    
				<?php
				$get_about	= $_get->get_about_lang($lang, 'quality');
				?>
                
                <textarea class="form-control" rows="5" id="id-quality" name="quality"><?php echo $get_about->fill;?></textarea>
                <script>
				CKEDITOR.replace('id-quality');
                var data = CKEDITOR.instances.id-facilities.getData();
                </script>
               
                
               
                <br />
                <ul class="form-set clearfix">
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Page Description</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="quality_description"><?php echo $get_about->description;?></textarea>
                    </div>
                  </li>
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Keywords</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="quality_keywords"><?php echo $get_about->keywords;?></textarea>
                    </div>
                  </li>
                </ul>
                
              </div>
            </li>

            <li class="form-group row">
              <label class="control-label col-xs-12">Quality Management</label><br /><br />
              <div class="col-xs-12">
			    
				<?php
				$get_about	= $_get->get_about_lang($lang, 'description');
				?>
                
                <textarea class="form-control" rows="5" id="id-description" name="description"><?php echo $get_about->fill;?></textarea>
                <script>
				CKEDITOR.replace('id-description');
                var data = CKEDITOR.instances.id-description.getData();
                </script>
                
                <br />
                <ul class="form-set clearfix">
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Page Description</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="description_description"><?php echo $get_about->description;?></textarea>
                    </div>
                  </li>
                  <li class="form-group row">
                    <label class="col-xs-3 control-label" for="page-description">Keywords</label>
                    <div class="col-xs-9">
                      <textarea class="form-control" rows="3" id="page_description" name="description_keywords"><?php echo $get_about->keywords;?></textarea>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div><!--box-->
    </div><!--container-main-->
  </form>
  
  <script>
  $(document).ready(function(e){
     activeNAvbar('pages');
	 
  });
  </script>

<?php include("custom/pages/about/about.php");?>         
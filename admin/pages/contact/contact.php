<?php
/*
# ----------------------------------------------------------------------
# PAGES - CONTACT: VIEW
# ----------------------------------------------------------------------
*/

include("custom/pages/contact/control.php");
include("control.php");
?>


  <form method="post" enctype="multipart/form-data">
    <div class="subnav">
      <div class="container clearfix">
        <h1><span class="glyphicon glyphicon-earphone"></span> &nbsp; Contact</h1>
        <div class="btn-placeholder">
          <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-submit-alias">
          <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-infos" id="btn-submit">
        </div>
      </div>
    </div>

    <?php
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?>

    <div class="container main">
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Content</h3>
          <p>Your company's contact information.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row" id="id-row-emailto">
              <label class="col-xs-3 control-label">Email to <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" value="<?php echo $get_info->email;?>" name="email" id="id-emailto">
                <p class="help-block">Message from Contact Us page will be sent here.</p>
              </div>
            </li>
            <li class="form-group row hidden" id="id-row-email">
              <label class="col-xs-3 control-label">Email</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" value="<?php echo $get_info->email_display;?>" name="email_display" id="id-email">
              </div>
            </li>
            <li class="form-group row" id="id-row-phone">
              <label class="col-xs-3 control-label">Telephone</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" value="<?php echo $get_info->telephone;?>" name="telephone" id="id-phone">
              </div>
            </li>
            <li class="form-group row hidden" id="id-row-fax">
              <label class="col-xs-3 control-label">Tel. / Fax</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" value="<?php echo $get_info->fax;?>" name="fax" id="id-fax">
              </div>
            </li>
            <li class="form-group row hidden" id="id-row-hp">
              <label class="col-xs-3">HP</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" value="<?php echo $get_info->handphone;?>" name="handphone" id="id-hp">
              </div>
            </li>
            <li class="form-group row image-placeholder input-file hidden" style="position:relative; z-index:1;">
              <label class="control-label col-xs-3">Cover Image</label>
                <div class="col-xs-9">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="img img-banner-15x10" id="newer-1">
                        <div id="remove-news-1">
                          <div class="image-delete hidden" id="btn-slider-1">
                            <span class="glyphicon glyphicon-remove"></span>
                          </div>
                        <div class="image-overlay" onClick="openBrowser('1')"></div>
                      </div>
                      <img class="" id="upload-news-1" src="<?php echo $_global_info->cover.'&w=195&q=100';?>" />
                      <div id="img_replacer">
                        <input type="file" name="cover" id="news-1" onchange="readURL(this,'1')" class="hidden"/>
                      </div><!--img_replacer-->
                      <input type="checkbox" name="cover-delete" id="id-cover-delete" value="1" class="hidden">
                    </div>
                  </div>
                </div>
                <p class="help-block" style="padding-top: 10px">Recommended dimensions of 313 x 400 px.</p>
              </div>
            </li>
          </ul>
        </div>
      </div><!--box--><div class="box row">
        <div class="desc col-xs-3">
          <h3>SEO</h3>
          <p>Search engine optimization.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row">
              <label class="col-xs-3 control-label" for="page-description">Page Description</label>
              <div class="col-xs-9">
                <textarea class="form-control" rows="3" id="page_description" name="contact_description"><?php echo $get_info->description;?></textarea>
              </div>
            </li>
            <li class="form-group row">
              <label class="col-xs-3 control-label" for="page-description">Keywords</label>
              <div class="col-xs-9">
                <textarea class="form-control" rows="3" id="page_description" name="contact_keywords"><?php echo $get_info->keywords;?></textarea>
              </div>
            </li>
          </ul>
        </div>
      </div><!--box-->
    </div><!--container main-->
  </form>


<script src="<?php echo BASE_URL;?>script/page-contact.js"></script>


<?php include("custom/pages/contact/contact.php");?>       
<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK - DETAILS: VIEW
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");
include("control.php");
?> 
        

  <form method="post" enctype="multipart/form-data">
    <div class="subnav">
      <div class="container clearfix">
        <h1>
          <a href="<?php echo BASE_URL."payment-bank"?>">
            <span class="fa fa-chevron-left"></span>&nbsp;
            Payment Bank / <?php echo $detail->bank_name;?>
          </a> 
        </h1>
        <div class="btn-placeholder">
          <input type="hidden" name="cat_id" id="category_id"/>
          <a href="<?php echo BASE_URL."payment-bank";?>">
            <input type="button" class="btn btn-default btn-sm" value="Cancel" id="btn-add-category-cancel">
          </a>
          <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
          <input type="submit" class="hidden" value="Save Changes" name="btn-details-bank" id="btn-submit">
        </div>
      </div>
    </div>
    
	<?php
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?> 

    <div class="container main">
      <div class="box row">
        <div class="desc col-xs-3" id="custom_lang">
          <h3>Bank Details</h3>
          <p>Your bank details.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set" id="custom_product_category">
            <li class="form-group row hidden" id="id-row-active">
              <label class="control-label col-xs-3">Change Status</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="Active" name="active" checked id="id-active">Active
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="Inactive" name="active" checked id="id-inactive">Inactive
                </label>
              </div>
            </li>
            <li class="form-group row" id="id-row-visibility">
              <label class="control-label col-xs-3">Visibility</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="1" name="visibility" id="id-visible" <?php if($detail->bank_visibility == '1'){ echo 'checked="checked"';}?>>Yes
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="0" name="visibility" id="id-invisible" <?php if($detail->bank_visibility == '0'){ echo 'checked="checked"';}?>>No
                </label>
              </div>
            </li>
            <li class="form-group row" id="id-row-name">
              <label class="control-label col-xs-3">Category Name</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="bank-name" id="id-name" value="<?php echo $detail->bank_name;?>">
              </div>
            </li>
            <li class="form-group row hidden" id="id-row-description">
              <label class="control-label col-xs-3">City Description</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="description" id="id-description" rows="8"><?php echo $detail->category_description;?></textarea>
              </div>
            </li>
            <li class="form-group row image-placeholder input-file" style="position:relative; z-index:1;" id="id-row-image">
              <label class="control-label col-xs-3">Cover Image</label>
              <div class="col-xs-9">
                <div class="row row-5">
                  <div class="col-xs-4">
                    <div class="img img-banner-15x10" onMouseOver="removeButton('1')" id="newer-1">
                      <div id="remove-news-1">
                        <div class="image-delete hidden" id="btn-slider-1" onClick="clearImage('1')">
                          <span class="glyphicon glyphicon-remove"></span>
                        </div>
                        <div class="image-overlay" onClick="openBrowser('1')"></div>
                      </div>
                      <img class="" src="<?php echo BASE_URL.'static/thimthumb.php?src=..'.$detail->logo.'&w=196&q=80';?>" id="upload-news-1">
                      <div id="img_replacer">
                        <input type="file" name="upload_news_1" id="news-1" onchange="readURL(this,'1')" class="hidden"/>
                      </div><!--img_replacer-->    
                    </div>
                  </div>
                </div>
                <p class="help-block">Recommended dimensions of 228 x 152 px.</p>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
    </div><!--.container.main-->
  </form>
  
  <script src="<?php echo BASE_URL;?>custom/script/bank.js"></script>
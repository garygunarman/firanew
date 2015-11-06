<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY DETAILS: VIEW
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
          <span class="glyphicon glyphicon-list"></span> &nbsp; 
          <a href="<?php echo BASE_URL."news-category"?>">Location City</a> 
          <span class="info">/</span> Edit Location City
        </h1>
        <div class="btn-placeholder">
          <input type="hidden" name="cat_id" id="category_id"/>
          <a href="<?php echo BASE_URL."location-city";?>">
            <input type="button" class="btn btn-default btn-sm" value="Cancel" id="btn-add-category-cancel">
          </a>
          <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
          <input type="submit" class="hidden" value="Save Changes" name="btn-details-news-category" id="btn-submit">
        </div>
      </div>
    </div>
    
	<?php
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?> 

    <div class="container main">
      <div class="box row">
        <div class="desc col-xs-3" id="custom_lang">
          <h3>City Details</h3>
          <p>Your location city details.</p>
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
                  <input type="radio" value="Yes" name="visibility" id="id-visible" <?php if($detail_category->category_visibility == 'Yes'){ echo 'checked="checked"';}?>>Yes
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="No" name="visibility" id="id-invisible" <?php if($detail_category->category_visibility == 'No'){ echo 'checked="checked"';}?>>No
                </label>
              </div>
            </li>
            <li class="form-group row" id="id-row-name">
              <label class="control-label col-xs-3">Category Name</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="name" id="id-name" value="<?php echo $detail_category->category_name;?>">
              </div>
            </li>
            <li class="form-group row hidden" id="id-row-description">
              <label class="control-label col-xs-3">City Description</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="description" id="id-description" rows="8"></textarea>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
      
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>SEO</h3>
          <p>Search engine optimization for the category.</p>
        </div>
        <div class="content col-xs-9">
            <li class="form-group row" id="id-row-meta-description">
              <label class="control-label col-xs-3">Meta Description</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="meta_description" id="id-meta-description" rows="5"><?php echo $detail_category->meta_description;?></textarea>
              </div>
            </li>
            <li class="form-group row" id="id-row-meta-keyword">
              <label class="control-label col-xs-3">Meta Keywords</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="meta_keyword" id="id-meta-keyword" rows="5"><?php echo $detail_category->meta_keyword;?></textarea>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
    </div><!--.container.main-->
  </form>
  
  <script src="<?php echo BASE_URL;?>custom/script/_location/location-city-details.js"></script>
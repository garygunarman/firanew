<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY ADD: VIEW
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
          <a href="<?php echo BASE_URL."news-category"?>">
            <span class="fa fa-chevron-left"></span>&nbsp; Add News Category
          </a> 
        </h1>
        <div class="btn-placeholder">
          <a href="<?php echo BASE_URL."news-category";?>">
            <input type="button" class="btn btn-default btn-sm" value="Cancel" id="btn-add-category-cancel">
          </a>
          <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
          <input type="submit" class="hidden" value="Save Changes" name="btn-insert-new-category" id="btn-submit">
        </div>
      </div>
    </div>
    
	<?php
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?> 

    <div class="container main">
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Category Details</h3>
          <p>Your category details.</p>
          <br />
          <select class="form-control hidden" id="id-language-option">
             <option value="ID" <?php echo $_selected_lang_id;?>>Indonesia</option>
             <option value="EN" <?php echo $_selected_lang_en;?>>English</option>
          </select>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row hidden" id="id-row-active">
              <label class="control-label col-xs-3">Change Status</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="Active" name="active" id="id-active" checked>Active
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="Inactive" name="active" id="id-inactive">Inactive
                </label>
              </div>
            </li>
            <li class="form-group row" id="id-row-visibility">
              <label class="control-label col-xs-3">Visibility</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="Yes" name="visibility" id="id-visibility-visible" checked>Yes
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="No" name="visibility" id="id-visibility-invisible">No
                </label>
              </div>
            </li>
            <li class="form-group row" id="id-row-name">
              <label class="control-label col-xs-3">Category Name <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="name" id="id-name" placeholder="Category name">
              </div>
            </li>
            <li class="form-group row" id="id-row-description">
              <label class="control-label col-xs-3">Category Description</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="description" id="id-description" rows="8"></textarea>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
      
      <div class="box row hidden">
        <div class="desc col-xs-3">
          <h3>SEO</h3>
          <p>Search engine optimization for the category.</p>
        </div>
        <div class="content col-xs-9">
            <li class="form-group row" id="id-row-meta-description">
              <label class="control-label col-xs-3">Meta Description</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="meta_description" id="id-meta-description" rows="5"></textarea>
              </div>
            </li>
            <li class="form-group row" id="id-row-meta-keyword">
              <label class="control-label col-xs-3">Meta Keywords</label>
              <div class="col-xs-9">
                <textarea class="form-control" name="meta_keyword" id="id-meta-keyword" rows="5"></textarea>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
    </div><!--.container.main-->
  </form>


<script src="<?php echo BASE_URL;?>custom/script/news-category-add.js"></script>
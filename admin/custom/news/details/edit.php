<?php
/*
# ----------------------------------------------------------------------
# NEWS - EDIT: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>

<script src="<?php echo BASE_URL.'ckeditor/ckeditor.js';?>"></script>

          <form method="post" enctype="multipart/form-data">
            <div class="subnav">
              <div class="container clearfix">
                <h1>
                  <a href="<?php echo BASE_URL."news"?>">
                    <span class="fa fa-chevron-left"></span>&nbsp;
                    Edit News
                  </a> 
                </h1>
                <div class="btn-placeholder">
                  <a href="<?php echo BASE_URL.'news';?>">
                    <input type="button" class="btn btn-default btn-sm" value="Cancel" id="btn-alias-cancel">
                  </a>
                  <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
                  <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-edit-news" id="btn-submit">
                </div>
              </div>
            </div>

            <?php
            show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
			?>
            
            <div class="container main">
              <div class="box row">
                <div class="desc col-xs-3" id="custom_lang">
                  <h3>News Details</h3>
                  <p>Manage your news details from title, category, date, and content.</p>
                  <br />
                  <select class="form-control hidden" id="id-language-option" disabled="disabled">
                    <option value="ID" <?php echo $_selected_lang_id;?>>Indonesia</option>
                    <option value="EN" <?php echo $_selected_lang_en;?>>English</option>
                  </select>
                </div>
                <div class="content col-xs-9">
                  <ul class="form-set">
                    <li class="form-group row <?php echo $_class_hidden_en;?>" id="id-row-visibility">
                      <label class="control-label col-xs-3">Visibility</label>
                      <div class="col-xs-9">
                        <label class="radio-inline control-label">
                          <input type="radio" value="1" name="visibility" id="id-visibility-visible" <?php if($news_detail->news_visibility == '1'){ echo 'checked="checked"';}?>>Yes
                        </label>
                        <label class="radio-inline control-label">
                          <input type="radio" value="0" name="visibility" id="id-visibility-invisible" <?php if($news_detail->news_visibility == '0'){ echo 'checked="checked"';}?>>No
                        </label>
                      </div>
                    </li>
                    <li class="form-group row underlined hidden <?php echo $_class_hidden_en;?>" id="id-row-category">
                      <label class="control-label col-xs-3" for="category">Category <span>*</span></label>
                      <div class="col-xs-9">
                        <select class="form-control" id="id-category" name="category">
						  <option value="0">Select Category</option>
                          
						  <?php 
						  foreach($category as $category){
						     echo '<option value="'.$category->category_id.'"';
							 
							 if($news_detail->news_category == $category->category_id){
							    echo 'selected="selected"';
								
							 }
							 
							 echo '>'.$category->category_name.'</option>';
						  }
						  ?>
                          
                        </select>
                      </div>
                    </li>
                    
                    <li class="form-group row" id="id-row-title">
                      <label class="control-label col-xs-3">Title <span>*</span></label>
                      <div class="col-xs-9">
                        <input type="text" class="form-control" name="title" id="id-title" value="<?php echo $news_detail->news_title;?>">
                      </div>
                    </li>
                    <li class="form-group row <?php echo $_class_hidden_en;?>" id="id-row-date">
                      <label class="control-label col-xs-3">Date <span>*</span></label>
                      <div class="col-xs-9">
                        <input type="text" class="form-control" style="width: 300px" name="date" id="id-date" value="<?php echo substr($news_detail->news_date, 0, 11);?>">
                      </div>
                    </li>
                    <li class="form-group row image-placeholder input-file <?php echo $_class_hidden_en;?>" style="position:relative; z-index:1;" id="id-row-image">
                      <label class="control-label col-xs-3">Cover Image</label>
                      <div class="col-xs-9">
                        <div class="row row-5">
                          <div class="col-xs-4">
                            <div class="img img-banner-15x10" onMouseOver="removeButton('1')" id="newer-1" style="height:105px;">
                              <div id="remove-news-1">
                                <div class="image-delete hidden" id="btn-slider-1" onClick="clearImage('1')">
                                  <span class="glyphicon glyphicon-remove"></span>
                                </div>
                                <div class="image-overlay" onClick="openBrowser('1')"></div>
                              </div>
                              
                              <?php
                              if($news_detail->news_image == ''){
							     echo '<img class="hidden" id="upload-news-1" src="">';
							  }else{
							     echo '<img class="img-responsive" id="upload-news-1" src="'.BASE_URL.'static/thimthumb.php?src=../'.$news_detail->news_image.'&w=155&q=80">';
							  }
							  ?>
                              
                              <div id="img_replacer">
                                <input type="file" name="upload_news_1" id="news-1" onchange="readURL(this,'1')" class="hidden"/>
                              </div><!--img_replacer-->    
                            </div>
                          </div>
                        </div>
                        <p class="help-block">Recommended dimensions of 228 x 152 px.</p>
                      </div>
                    </li>
                    <li class="form-group row" id="id-row-excerpt">
                      <label class="control-label col-xs-3">Excerpt <span>*</span></label>
                      <div class="col-xs-9">
                        <textarea class="form-control" rows="5" id="id-excerpt" name="excerpt"><?php echo $news_detail->news_excerpt;?></textarea>
                      </div>
                    </li>
                    <li class="form-group row" id="id-row-content">
                      <label class="control-label col-xs-3">Content <span>*</span></label>
                      <div class="col-xs-9">
                        <textarea class="form-control" rows="8" id="id-content" name="content"><?php echo $news_detail->news_content;?></textarea>
						<script>
						CKEDITOR.replace('id-content');
						var data = CKEDITOR.instances.id-content.getData();
                        </script>
                      </div>
                    </li>
                  </ul>
                </div>
              </div><!--box-->
              
              <div class="box row">
                <div class="desc col-xs-3">
                  <h3>SEO</h3>
                  <p>Search engine optimization for the News.</p>
                </div>
                <div class="content col-xs-9">
                  <ul class="form-set">
                    <li class="form-group row">
                      <label class="col-xs-3 control-label" for="page-description">Page Description</label>
                      <div class="col-xs-9">
                        <textarea class="form-control" rows="5" id="id-description" name="description"><?php echo $news_detail->meta_description;?></textarea>
                      </div>
                    </li>
                    <li class="form-group row">
                      <label class="col-xs-3 control-label" for="page-description">Keywords</label>
                      <div class="col-xs-9">
                        <textarea class="form-control" rows="5" id="id-keywords" name="keywords"><?php echo $news_detail->meta_keywords;?></textarea>
                      </div>
                    </li>
                  </ul>
                </div>
              </div><!--box-->
            </div><!--main-content-->
            <input type="text" name="delete_news" id="id-delete-news" value="0" class="hidden" />
          </form>
            
            
            
<script src="<?php echo BASE_URL;?>custom/script/news-details.js"></script>

            
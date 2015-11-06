<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - GENERAL: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>


<form method="post" enctype="multipart/form-data">
  <div class="subnav">
    <div class="container clearfix">
      <h1><span class="glyphicon glyphicon-cog"></span> &nbsp; General</h1>
      <div class="btn-placeholder">
        <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
        <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-settings-general" id="btn-submit">
      </div>
    </div>
  </div>
  
  <?php
  show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
  ?>

  <div class="container main">
    <div class="box row">
      <div class="desc col-xs-3">
        <h3>Site Details</h3>
        <p>Basic details of your website.</p>
      </div>
      <div class="content col-xs-9">
        <ul>
          <li class="form-group row" id="id-row-url">
            <label class="control-label col-xs-3" for="url">URL <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-url" name="url" value="<?php echo $_global_general->url;?>">
            </div>
          </li>
          <li class="form-group row" id="id-row-title">
            <label class="control-label col-xs-3" for="website-name">Website Title <span>*</span></label>
            <div class="col-xs-9">
              <input type="text" class="form-control" id="id-title" name="title" value="<?php echo $_global_general->website_title;?>">
              <p class="help-block">Short title of your website that will be used as a title of your home page.</p>
            </div>
          </li>
          <li class="form-group row" id="id-row-description">
            <label class="control-label col-xs-3" for="website-description">Website Description <span>*</span></label>
            <div class="col-xs-9">
            <textarea class="form-control" rows="5" id="id-description" name="description"><?php echo preg_replace("/\n/","\n<br>",$_global_general->website_description);?></textarea class="form-control">  
                <p class="help-block">Short description of your website that will be used as a meta description.</p>
              </div>
            </li>
            <li class="form-group row" id="id-row-keywords">
              <label class="control-label col-xs-3" for="website-description">Website Keywords <span>*</span></label>
              <div class="col-xs-9">
                <textarea class="form-control" rows="5" id="id-keywords" name="keywords"><?php echo $_global_general->website_keywords;?></textarea class="form-control">  
                <p class="help-block">Keywords of your website that will be used as a meta keywords.</p>
              </div>
            </li>
            <li class="form-group row" id="id-row-logo">
              <label class="control-label col-xs-3">Admin Logo</label>
              <div class="col-xs-9">
                <div class="img img-admin-logo" id="picture" onclick="openBrowser()">
                   <img class="" id="upload-image" src="<?php echo BASE_URL.'static/thimthumb.php?src='.$_global_general->logo.'&w=40px&h=40px&q=90';?>">
                </div>
                <p class="help-block">Recommended dimensions of 80 x 80 px</p>
                <span id="tester">
                <input type="file" name="color_image" id="color_files" onchange="readURL(this)" class="hidden"/>
                </span><!--tester-->
              </div>
              <input type="hidden" name="hidden_logo" value="<?php echo $_global_general->logo;?>">
            </li>

            <li class="form-group row" id="id-row-icon">
              <label class="control-label col-xs-3">Favicon</label>
              <div class="col-xs-9">
                <div class="img img-favicon" id="icon-1" onclick="openBrowsericon('1')">
                   <img class="" id="upload-icon" src="<?php echo BASE_URL.substr($_global_general->icon, 1);?>">
                </div>
                <p class="help-block">Recommended dimensions of 48 x 48 px</p>
                <span id="tester-icon">
                  <input type="file" name="icon" id="file-icon-1" onchange="readURLicon(this)" class="hidden"/>
                </span><!--tester-->
              </div>
              <input type="hidden" name="icon" value="<?php echo $_global_general->favicon;?>">
            </li>

            <li class="form-group row underlined image-placeholder input-file hidden" style="position:relative; z-index:1;">
              <label class="control-label col-xs-3">Account cover Image</label>
              <div class="col-xs-9">

                <div class="row row-5">
                  
                  <div class="col-xs-4">
                    <div class="img img-banner-15x10" id="newer-1">
                      <div id="remove-news-1">
                        <div class="image-delete hidden" id="btn-slider-1">
                          <span class="glyphicon glyphicon-remove"></span>
                        </div>
                      </div>
                      <div class="image-overlay-icon"></div>
                      <img id="upload-cover-1" src="<?php echo $_global_general->cover;?>">
                      <div id="img_replacer">
                        <input type="file" name="cover" id="cover-1" onchange="readURLCover(this,'1')" class="hidden" disabled="disabled"/>
                      </div><!--img_replacer-->
                      <input type="checkbox" name="cover-delete" id="id-cover-delete" value="1" class="hidden">
                    </div><!--.img-->
                  </div><!--.col-xs-3-->

                </div><!--.row.row-5-->

              <p class="help-block">Recommended dimensions of 313 x 350 px.</p>
              </div><!--.col-xs-9-->
            </li>

          </ul>
        </div>
      </div><!--box-->
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Google Analytics</h3>
          <p>Google analytics code.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row" id="id-row-analytics">
              <label class="control-label col-xs-3" for="google">Google Analytics Code <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="google" name="analytics" value="<?php echo $_global_general->analytics_code;?>">
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Company Details</h3>
          <p>Your company details.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row" id="id-row-phone">
              <label class="control-label col-xs-3" for="phone">Phone</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="id-phone" name="phone" value="<?php echo $_global_general->company_phone;?>">
              </div>
            </li>
            <li class="form-group row" id="id-row-address">
              <label class="control-label col-xs-3" for="company-address">Address</label>
              <div class="col-xs-9">
                <textarea class="form-control" rows="5" id="company-address" name="address"><?php echo $_global_general->company_address;?></textarea class="form-control">  
              </div>
            </li>
            <li class="form-group row" id="id-row-country">
              <label class="control-label col-xs-3" for="color">Country</label>
              <div class="col-xs-9">  
                <select name="country" class="form-control" id="id-country">
                  
                  <?php
                  foreach($countries as $countries){
				     echo '<option value="'.$countries->country_name.'" ';
					 
					 if($_global_general->company_country == $countries->country_name){
					    echo 'selected="selected"';
					 }
					 
					 echo ' >'.$countries->country_name.'</option> ';
				  }
				  ?>
                  
                </select>
              </div>  
            </li>
            <li class="form-group row" id="id-row-province">
              <label class="control-label col-xs-3" for="province">Province</label>
              <div class="col-xs-9">
                <span id="ajax-loader-province"></span>
              </div>
            </li>
            <li class="form-group row">
              <label class="control-label col-xs-3" for="city">City</label>
              <div class="col-xs-9">
                <span id="ajax-loader-city"></span>
              </div>
            </li>
            <li class="form-group row underlined">
              <label class="control-label col-xs-3" for="postal-code">Postal Code</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="postal-code" name="postal" style="width: 150px" value="<?php echo $_global_general->company_postal_code;?>">
              </div>
            </li>
            <li class="form-group row">
              <label class="control-label col-xs-3" for="facebook">Facebook</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="http://www.facebook.com/username" value="<?php echo $_global_general->company_facebook;?>">
              </div>
            </li>
            <li class="form-group row">
              <label class="control-label col-xs-3" for="twitter">Twitter</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="http://www.twitter.com/username" value="<?php echo $_global_general->company_twitter;?>">
              </div>
            </li>
            <li class="form-group row">
              <label class="control-label col-xs-3" for="twitter">Instagram</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="twitter" name="instagram" placeholder="http://www.instagram.com/username" value="<?php echo $_global_general->company_instagram;?>">
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Other Details</h3>
          <p>Details such as currency. </p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row">
              <label class="control-label col-xs-3" for="rate">USD to IDR rate <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="id-currency" name="currency" value="<?php echo $_global_general->currency_rate;?>">
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Mailgun Details</h3>
          <p>Email service provider credentials. </p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set">
            <li class="form-group row">
              <label class="control-label col-xs-3" for="id-mailgun-key">API Key <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="id-mailgun-key" name="mailgun_key" value="<?php echo $data_mailgun_api;?>">
              </div>
            </li>
            <li class="form-group row">
              <label class="control-label col-xs-3" for="id-mailgun-domain">Domain <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" id="id-mailgun-domain" name="mailgun_domain" value="<?php echo $data_mailgun_domain;?>">
              </div>
            </li>
            <li class="form-group row">
              <label class="control-label col-xs-3" for="id-mailgun-key">Status <span>*</span></label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="1" name="mailgun_status" id="id-mailgun-active" <?php echo $data_mailgun_status_active;?>>Yes
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="0" name="mailgun_status" id="id-mailgun-unactive" <?php echo $data_mailgun_status_unactive;?>>No
                </label>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
    </div><!--.container.main-->
  </form>


<script src="<?php echo BASE_URL;?>script/settings-general.js"></script>
<script>
$(document).ready(function(e) {
   activeNAvbar('settings');
   
   getProvince('<?php echo $_global_general->company_province;?>', '<?php echo $_global_general->company_city;?>');
   
   $('#id-country').change(function(){
      getProvince('<?php echo $_global_general->company_province;?>', '<?php echo $_global_general->company_city;?>');
   });
   
   $('#id-province').change(function(){
      getCity('<?php echo $_global_general->company_city;?>');
   });
   
   $('#btn-alias-submit').on('click', function(){
      validation();
   });
   
});
</script>

            

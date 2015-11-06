<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>
<script src="<?php echo BASE_URL.'ckeditor/ckeditor.js';?>"></script>
<script>
$(window).load(function(){
   CKEDITOR.editorConfig = function( config ){
      config.toolbar		= 'Full';
	  config.toolbar_Full	=
	  [
	    { name: 'document', items : [ 'Source', '-', 'Preview'] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike' ] },
	    { name: 'links', items : [ 'Link','Unlink' ] },
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
	  ];
	  
   }
   
});
</script>


          <form method="post">
            <div class="subnav">
              <div class="container clearfix">
                <h1>
                  <span class="glyphicon glyphicon-road"></span> &nbsp; 
                  <a href="<?php echo BASE_URL."shipping"?>">Shipping Methods</a>
                  <span class="info">/</span> Edit Shipping Method
                </h1>
                
                <div class="btn-placeholder">
                  <a href="<?php echo BASE_URL."shipping";?>">
                    <input type="button" class="btn btn-default btn-sm" value="Cancel">
                  </a>
                  <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
                  <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-edit-shipping" id="btn-submit">
                </div>
              </div>
            </div>
            
			<?php
            show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
			?>

            <div class="container main">
              <div class="box row">
                <div class="desc col-xs-3">
                  <h3>Basic Details</h3>
                  <p>Basic details of your shipping method. </p>
                </div>
                <div class="content basic-details col-xs-9">
                  <ul class="form-set">
                    <li class="form-group row" id="id-row-name">
                      <label class="col-xs-3 control-label">Shipping Method <span>*</span></label>
                      <div class="col-xs-9" id="inner-html-courier-name">
                        <input type="text" class="form-control" placeholder="e.g., JNE (Regular)" name="name" id="id-name" value="<?php echo $courier->courier_name;?>">
                      </div>
                    </li>
                    <li class="form-group row" id="id-row-description">
                      <label class="col-xs-3 control-label">Description <span>*</span></label>
                      <div class="col-xs-9" id="inner-html-description">
                        <input type="text" class="form-control" placeholder="e.g., Regular Shipping (2-3 days delivery)" name="description" id="id-description" value="<?php echo $courier->courier_description;?>">
                      </div>
                    </li>
                    <li class="form-group row" id="id-row-track">
                      <label class="col-xs-3 control-label">Contact</label>
                      <div class="col-xs-9" id="inner-html-contact">
                        <textarea class="form-control" rows="5" id="id-track" name="track"><?php echo $courier->courier_track;?></textarea>
						<script>
						CKEDITOR.replace('id-track');
						var data = CKEDITOR.instances.id-track.getData();
                        </script>
                      </div>
                    </li>
                    <li class="form-group row" id="id-service">
                       <label class="col-xs-3 control-label">Services <span>*</span></label>
                       <div class="col-xs-9">
                         <select class="form-control" id="id-service" name="service">
                           <option value="0"></option>
                           <option value="Local Only" <?php if($service == 'Local Only'){ echo 'selected="selected"';}?>>Local only</option>
                           <option value="International Only" <?php if($service == 'International Only'){ echo 'selected="selected"';}?>>International only</option>
                           <option value="Local &amp; International" disabled="disabled">Local &amp; International</option>
                         </select>
                       </div>
                     </li>
                     <li class="form-group row" id="id-row-weight">
                       <label class="col-xs-3 control-label">Weight Counter <span>*</span></label>
                       <div class="col-xs-9">
                         <select class="form-control" name="weight" id="id-weight">
                           <option value="0.5" <?php if($courier->weight_counter == '0.5'){ echo 'selected="selected"';}?>>Every 0.5 kg</option>
                           <option value="1" <?php if($courier->weight_counter == '1'){ echo 'selected="selected"';}?>>Every 1 kg</option>
                           <option value="2" <?php if($courier->weight_counter == '2'){ echo 'selected="selected"';}?>>Every 2 kg</option>
                         </select>
                       </div>
                     </li>
                   </ul>
                 </div>
               </div><!--box-->
               
			   <?php
               /* --- AJAX LOADER --- */
			   echo '<div id="id-ajax-loader"></div>';
			   ?>
               
            </div><!--main-content-->
          </form>


<script src="<?php echo BASE_URL;?>script/settings-shipping-edit.js"></script>
<script>
$(window).load(function(e) {
   activeNAvbar('settings');
   ajaxService('<?php echo $ship_id;?>', '<?php echo $courier->weight_counter;?>');
});
</script>

           
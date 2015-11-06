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
        <span class="info">/</span> Add Shipping Method
      </h1>
      <div class="btn-placeholder">
        <a href="<?php echo BASE_URL."shipping";?>">
          <input type="button" class="btn btn-default btn-sm" value="Cancel">
        </a>
        <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn-alias-submit">
        <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-add-shipping" id="btn-submit">
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
             <input type="text" class="form-control" placeholder="e.g., JNE (Regular)" name="name" id="id-name">
           </div>
         </li>
         <li class="form-group row" id="id-row-description">
           <label class="col-xs-3 control-label">Description <span>*</span></label>
           <div class="col-xs-9" id="inner-html-description">
             <input type="text" class="form-control" placeholder="e.g., Regular Shipping (2-3 days delivery)" name="description" id="id-description">
           </div>
         </li>
         <li class="form-group row" id="id-row-contact">
           <label class="col-xs-3 control-label">Contact</label>
           <div class="col-xs-9" id="inner-html-contact">
             <textarea class="form-control" rows="5" id="id-track" name="track"></textarea>
                <script>
				CKEDITOR.replace('id-track');
                </script>
           </div>
         </li>
         <li class="form-group row" id="id-row-service">
           <label class="col-xs-3 control-label">Services <span>*</span></label>
           <div class="col-xs-9">
             <select class="form-control" id="id-service" name="service">
               <option value="0"></option>
               <option value="Local Only">Local only</option>
               <option value="International Only">International only</option>
               <option value="Local &amp; International" disabled="disabled">Local &amp; International</option>
             </select>
           </div>
         </li>
         <li class="form-group row" id="id-row-weight">
           <label class="col-xs-3 control-label">Weight Counter <span>*</span></label>
           <div class="col-xs-9">
             <select class="form-control" name="weight" id="id-weight">
               <option value="0"></option>
               <option value="0.5">Every 0.5 kg</option>
               <option value="1">Every 1 kg</option>
               <option value="2">Every 2 kg</option>
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
     
     
  </div><!--.container.main-->
</form>


<script src="<?php echo BASE_URL;?>/script/settings-shipping-add.js"></script>
<script>
$(document).ready(function(e) {
   activeNAvbar('settings');
   
   intl();
   //$('#international').hide();
   //$('#local').hide();
   
   $('#id-service').change(function(){
      ajaxService();
   });
   
   $('#id-weight').change(function(){
      perWeight();
   });
   
   $('#btn-alias-submit').click(function(){
      validationAddShipping();
   });
	
});
</script>
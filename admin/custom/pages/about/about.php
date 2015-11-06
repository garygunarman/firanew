<?php
/*
# ----------------------------------------------------------------------
# ABOUT - CUSTOM: PHP
# ----------------------------------------------------------------------
*/

$_req_lang		= '';
if(isset($_REQUEST['lang'])){
   $_req_lang		= filter_var($_REQUEST['lang'], FILTER_SANITIZE_STRING);
   if($_req_lang === 'ID'){
      $_selected_lang_id	= 'selected="selected"';
      $_selected_lang_en	= '';
	  $_class_hidden_en		= '';
	  
   }else if($_req_lang === 'EN'){
      $_selected_lang_id	= '';
      $_selected_lang_en	= 'selected="selected"';
	  $_class_hidden_en		= 'hidden';
	  
   }
   
}else{
   $_req_lang			= filter_var('ID', FILTER_SANITIZE_STRING);
   $_selected_lang_id	= 'selected="selected"';
   $_selected_lang_en	= '';
   
}
?>

<script>
/*
# ----------------------------------------------------------------------
# ABOUT - CUSTOM: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();

function getLanguage(){
   $('#custom_lang').html($('#custom_lang').html()+'<div id="custom_lang_select"></div>');
   $('#custom_lang_select').html('<br /><select class="form-control" id="id-language-option" disabled="disabled"><option value="ID" <?php echo $_selected_lang_id;?>>Indonesia</option><option value="EN" <?php echo $_selected_lang_en;?>>English</option></select>');
}
   

$(window).load(function(e) {
   
   <?php
   /* --- LANGUAGE --- */
   if($_config_language === 1){
   ?>
   
   getLanguage();
   
   $('#id-language-option').prop('disabled', false);
   $('#id-language-option').change(function(){
       var lang	= $('#id-language-option :selected').val();
	   var newsID	= $('#id-hidden-category-id').val();
	   var name	= $('#id-hidden-category-name').val();
	   location.href = base_url+'about/'+lang;
	  
   });
   
   var objLoading = {
             		"1": "btn-alias-submit",
					"2": "btn-alias-cancel"
					};
			 
   $.each(objLoading, function( key, value ){
      $('#'+value).on('click', function(){
	     var $btn	= $('#'+value).button('loading');
		
	  });
	  
   });
   
   <?php
   }
   ?>
  
});
</script>
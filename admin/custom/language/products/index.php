<?php
/*
# ----------------------------------------------------------------------
# CATEGORY - CUSTOM: PHP
# ----------------------------------------------------------------------
*/

if($lang === 'ID'){
   $_selected_lang_id	= 'selected="selected"';
   $_selected_lang_en	= '';
   $_class_hidden_en	= '';
	  
}else if($lang === 'EN'){
   $_selected_lang_id	= '';
   $_selected_lang_en	= 'selected="selected"';
   $_class_hidden_en	= 'hidden';
	  
}

$_product_alias	= filter_var($_REQUEST['product_alias'], FILTER_SANITIZE_STRING);
echo '<input type="text" class="hidden" id="custom-product-alias" value="'.$_product_alias.'">';
?>

<script>
function getLanguage(){
   $('#custom_lang').html($('#custom_lang').html()+'<div id="custom_lang_select"></div>');
   
   $('#custom_lang_select').html('<br /><select class="form-control" id="id-language-option" disabled="disabled"><option value="ID" <?php echo $_selected_lang_id;?>>Indonesia</option><option value="EN" <?php echo $_selected_lang_en;?>>English</option></select>');
}


$(window).load(function(){
   
   <?php
   if($_config_language === 1){
   ?>
   
   getLanguage();
   
   $('#id-language-option').prop('disabled', false);
   $('#id-language-option').change(function(){
       var lang		= $('#id-language-option :selected').val();
	   var name		= $('#custom-product-alias').val();
	   location.href = base_url+'product-details/'+lang+'/'+name;
	  
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

<?php
require 'control.php';
?>
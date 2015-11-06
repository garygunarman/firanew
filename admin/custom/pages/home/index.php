<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME: INDEX
# ----------------------------------------------------------------------
*/

$case = '1';

function custom_loader($case){
   
   switch($case){
      case 1:
	     echo '$.when(ajax_promo_banner()).done(function(){';
		 echo 'ajax_featured_products()';
		 echo '});';
         break;
      case 2:
         echo "ajax_promo_banner();";
         break;
      case 3:
	     echo "ajax_featured_products();";
         break;
   }
   
}
?>

<script type="text/javascript">
var base_url = $('#id-global-url').val();


/* --- PROMO BANNER --- */
function ajax_promo_banner(){
   var $btn = $('input[name=btn-pages-home]').button('loading');
   
   $.ajax({
      type: "POST",
	  url: base_url+"custom/pages/home/promo/index.php",
	  error: function(jqXHR, textStatus, errorThrown) {
	            //alert('Error: ' + textStatus + ' ' + errorThrown);
	         }
   }).done(function(msg){
      $("ul.field-set").html($("ul.field-set").html()+msg);	
	  $btn.button('reset');
   });
}


/* --- FEATURE PRODUCTS --- */
function ajax_featured_products(){
   var $btn = $('#btn_add_bag').button('loading');
   $.ajax({
      type: "POST",
	  url: base_url+"custom/pages/home/featured/index.php",
	  error: function(jqXHR, textStatus, errorThrown){
	            //alert('Error: ' + textStatus + ' ' + errorThrown);
	         }
   }).done(function(msg2) {
      $("#main-content").html($("#main-content").html()+msg2);
	  $btn.button('reset');
   });
}


$(document).ready(function(){
   
   <?php
   custom_loader($case);
   ?>
   
});	

$(document).ajaxComplete(function(){
   

   
   /* --- START: CHOSEN --- */
   var config = {
                '.chosen-select'           : {},
				'.chosen-select-deselect'  : {allow_single_deselect:true},
				'.chosen-select-no-single' : {disable_search_threshold:10},
				'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
				'.chosen-select-width'     : {width:"100%"},
                }
				
   for (var selector in config) {
      $(selector).chosen(config[selector]);
   }
   /* --- END: CHOSEN --- */
});
</script>


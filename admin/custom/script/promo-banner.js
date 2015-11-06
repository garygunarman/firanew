/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - PROMO BANNER: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();


function readURLPromo(input,i) {

   if (input.files && input.files[0]) {
      var reader  = new FileReader();
	  var counter = $('.file-insert').size();
	  
	  if(counter >= 20 ){
	     $('html,body').animate({scrollTop:0}, 800);
	     setTimeout(function(){ 
		    $('#id-alert-image').html('<div class="alert alert-danger"><div class="container">Your server only allowing 20 files uploads, please upload 20 first image</div></div>');
		 }, 800);
		 
	  }else{
   
	     reader.onload = function (e) {
			 //$("#upload-promo-"+i).fadeIn("slow");
			 $("#upload-promo-"+i).attr('src', e.target.result);
			 $('#chk_promo_banner_'+i).attr('checked', true);
			 $('#upload-promo-'+i).removeClass("hidden");
			 $('#promo-'+i).attr('onMouseOver','removeButtonPromo('+i+')');
			 $('#id_promo_delete_'+i).attr('checked', false);
			 
		    $('#promos-'+i).attr('disabled', false);
		    $('#promos-'+i).addClass('file-insert');
		 }
	  
	     reader.readAsDataURL(input.files[0]);
	  }
   }

}


function openBrowserPromo(i){
   $("#promos-"+i).click();
}


function showLinkPromo(i){
   $('#name-link').val($('#promo_link_'+i).val());
   $('#link-id').val(i);
   $('#btn_pop_save').attr('name','btn_promo_link');
   $('#btn_pop_delete').attr('name','btn_promo_link');
   
   $( "#lbl_name_link" ).after('<span class="custom_promo_name"><li class="form-group row"> <label class="col-xs-3 control-label">Name</label> <div class="col-xs-9"> <input type="text" class="form-control" id="id_name_promo_link" name="name_promo_link"> <p class="help-block">Input name</p></div></li></div>');
   
   var name = $('#hidden_name_'+i).val();
   $('#id_name_promo_link').val(name);
   
}


function removeButtonPromo(i){
   $("#remove-promo-"+i).removeClass("hidden");
   $("#remove-promo-"+i).fadeIn("fast");
   $("#btn-promo-"+i).attr('style','z-index:1000; position:absolute');
    
   var img = $('#product-'+i+'-image').val();
   
   $("#promos-"+i).attr('disabled', false);

   $("#promo-"+i).mouseleave(function(){
      var img_ = $("#promos-"+i).val();
	  
      $("#remove-promo-"+i).fadeOut("fast");
	  
	  if(typeof img_ === 'undefined'){
	     $("#promos-"+i).attr('disabled', true);
	  }else{
	     $("#promos-"+i).attr('disabled', false);
	  }
	  
   });
}


function clearImagePromo(i){
   $('#upload-promo-'+i).addClass("hidden");
   $('#tester_'+i).html('<input type="file" name="upload_promo_'+i+'" id="promos-'+i+'" onchange="readURLPromo(this,'+i+')" class="hidden"/>');
   
   //$('#promo-'+i).removeAttr('onMouseOver');
   $('#id_promo_delete_'+i).attr('checked', true);
   
   ajaxDeletePromoBanner(i);
}


function ajaxDeletePromoBanner(i){
   var $btn = $('input[name="btn-pages-home"]').button('loading');
   
   var pid = i;
   var ajx = $.ajax({
	            type : "POST",
				url  : base_url+"custom/pages/home/promo/ajax/ajax_delete.php",
				data : {pid:pid},
				error: function(jqXHR, textStatus, errorThrown) {
					   
				       }
						 
   }).done(function(data){
      $btn.button('reset');
   });
   
}


function removeName(){
   $('.custom_promo_name').each(function(index, element) {
      $(this).html(' ') 
   });
}
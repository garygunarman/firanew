/*
# ----------------------------------------------------------------------
# JAVASCRIPT: PAGES - HOME
# ----------------------------------------------------------------------
*/

var upload_max_filesize = $('#id-hidden-ini-max-upload').val();
var post_max_size       = $('#id-hidden-ini-max-post').val();
var memory_limit 		= $('#id-hidden-ini-memory-limit').val();
var max_file_uploads 	= $('#id-hidden-ini-max-file-upload').val();


function readURL(input,i) {
      
   if (input.files && input.files[0]) {
      var reader    = new FileReader();
	  var file_size = $("#slider-"+i)[0].files[0].size;
	  
	  if(file_size < upload_max_filesize){
         reader.onload = function (e) {
	        $("#upload-slider-"+i).removeClass("hidden");
		    $('#btn-slider-'+i).removeClass('hidden');
		    $("#upload-slider-"+i).attr('src', e.target.result);
	        $("#slideshow-flag-"+i).val('notempty');
	        $('#id_slideshow_'+i).attr('checked','checked');
		    $('#slider-'+i).attr('disabled', false);
	     }
	  
	     reader.readAsDataURL(input.files[0]);
	  }else{
	     alert('Please use file with size under '+upload_max_filesize+' byte(s)');
	  }
   }
	  
}


function openBrowser(i){
   document.getElementById("slider-"+i).click();
}


function removeButton(i){
	  
   var test = $('#upload-slider-'+i).attr('src');
   $('#slider-'+i).attr('disabled', false);
	  
   if(test != ""){
      $("#remove-slider-"+i).removeClass("hidden");
	  $("#remove-slider-"+i).fadeIn("fast");
	  $("#btn-slider-"+i).attr('style','z-index:12; position:absolute');
	  $("#btn-link-"+i).attr('style','z-index:13; position:absolute');
	  
	  $("#slide-"+i).mouseleave(function(){
	     $("#remove-slider-"+i).fadeOut("fast");
		 
	     var input_file = $('#slider-'+i).val();
		 
		 if(input_file == ''){
		    $('#slider-'+i).attr('disabled', true);
		 }
		 
	  });
	  
   }

}
   
   
function ajaxDeleteBanner(i){
   var bid = i;
	  
   var ajx   = $.ajax({
	              type : "POST",
				  url  : "../admin/pages/home/ajax/delete_banner.php",
				  data : {bid:bid},
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
						 
			      }).done(function(data) {	
				  
				  });
}


function clearImage(i){
   $('#tester-'+i).html('<input type="file" name="upload_slider_'+i+'" id="slider-'+i+'" onchange="readURL(this,'+i+')" class="hidden"/>');
   $("#upload-slider-"+i).attr('src', '');
   //$("#upload-slider-"+i).fadeOut("slow");
   $("#upload-slider-"+i).addClass('hidden');
   $("#slideshow-flag-"+i).val('');
   $('#id_slideshow_'+i).attr('checked', false);
	   
   ajaxDeleteBanner(i);
}
   
   $('#link-pop').hide();
   
   function showLink(i){
	  /*
      $('#link-pop').attr('style', 'position:relative; z-index:1000;').fadeIn("fast");
      */
	  
      $('#link-id').val(i);   
	  $('#name-link').val($('#link-'+i).val());
	  
	  $('#btn_pop_save').attr('name','btn-link-banner');
	  $('#btn_pop_delete').attr('name','btn-link-banner');
   }
   
   function closeLink(){
      $('#link-pop').attr('style', '').fadeOut("fast"); 
      $('#name-link').removeAttr('name');   
   }
   
   $('#link-pop-banner').hide();

function showLinkBanner(i){
   $('#link-pop-banner').attr('style', 'position:relative; z-index:1000;').fadeIn("fast");
   $('#link-id-banner').val(i);   
   $('#name-link-banner').val($('#promo-url-'+i).val());
}

function closeLinkBanner(){
   $('#link-pop-banner').attr('style', '').fadeOut("fast"); 
   $('#name-link-banner').removeAttr('name');   
}
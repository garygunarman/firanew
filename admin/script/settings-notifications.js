/*
# ----------------------------------------------------------------------
# SETTINGS - NOTIFICATION: JAVASCRIPT
# ----------------------------------------------------------------------
*/


function validation(){
   var order        = $('#id-order').val();
   var atorder      = order.indexOf("@");
   var dotorder     = order.lastIndexOf(".");
   var warehouse    = $('#id-warehouse').val();
   var atwarehouse  = warehouse.indexOf("@");
   var dotwarehouse = warehouse.lastIndexOf(".");
   var nonum        = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/
   
   $('#id-row-order').removeClass('has-error');
   $('#id-row-warehouse').removeClass('has-error');
   
   if(order == "" || atorder < 1 || dotorder < atorder + 2 || dotorder + 2 >= order.length){
      $('#id-row-order').addClass('has-error');
   }else if(warehouse == "" || atwarehouse < 1 || dotwarehouse < atwarehouse + 2 || dotwarehouse + 2 >= warehouse.length){
      $('#id-row-warehouse').addClass('has-error');
   }else{
	  $('#btn-submit').click();
   }
   
}

function readURLCover(input,i) {
                                  
   if (input.files && input.files[0]) {
      var reader = new FileReader();
	  reader.onload = function (e) {
	     $("#upload-cover-"+i).removeClass("hidden");
	     $("#upload-cover-"+i).attr('src', e.target.result);
	  }
                            		 
      reader.readAsDataURL(input.files[0]);
	  
	  $('#id-cover-delete').attr('checked', false);
   }
                            	  
}


function openBrowserCover(i){
   document.getElementById("cover-"+i).click();
}


function removeButtonCover(i){
   
   var temp_img = $('#cover-'+i).val();
   var image    = $('#upload-cover-'+i).attr('src');
   
   $('#cover-'+i).attr('disabled', false);
   
   if(temp_img != '' || image != ''){
      $("#btn-slider-"+i).removeClass("hidden");
      $("#btn-slider-"+i).fadeIn("slow");
      $("#btn-news-"+i).attr('style','z-index:1000; position:absolute');
   }
                            	  
   $("#newer-"+i).mouseleave(function(){
      $("#btn-slider-"+i).addClass("hidden");
	  var temp_img = $('#news-'+i).val();
   
      if(temp_img == ''){
         $('#cover-'+i).attr('disabled', true);
	  }else{
         $('#cover-'+i).attr('disabled', false);
	  }
   });
   
}


function clearImageCover(i){	
   $('#id-cover-delete').attr('checked', true);
   $('#upload-cover-'+i).attr('src', '');
   //$('#upload-cover-'+i).addClass('hidden');
   $('#img_replacer').html('<input type="file" name="email_logo" id="cover-'+i+'" onchange="readURLCover(this,"'+i+'")" class="hidden" disabled="disabled"/>');
}


$(document).ready(function(e) {
   activeNAvbar('settings');
   
   $('#btn-alias-submit').on('click', function(){
      validation();
   });
   
   $('#newer-1').on('mouseenter', function(){
	  removeButtonCover('1');
   });
   
   $('#newer-1').on('mouseleave', function(){
	  removeButtonCover('1');
   });
   
   $('#btn-slider-1').on('click', function(){
      clearImageCover('1');
   });
   
   $('.image-overlay').on('click', function(){
      openBrowserCover('1');
   });
   
});
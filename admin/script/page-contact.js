/*
# ----------------------------------------------------------------------
# PAGES - CONTACT: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();


function readURL(input,i) {
                                  
   if (input.files && input.files[0]) {
      var reader = new FileReader();
	  reader.onload = function (e) {
	     $("#upload-news-"+i).removeClass("hidden");
	     $("#upload-news-"+i).attr('src', e.target.result);
	  }
                            		 
      reader.readAsDataURL(input.files[0]);
	  
	  $('#id-cover-delete').attr('checked', false);
   }
                            	  
}


function openBrowser(i){
   document.getElementById("news-"+i).click();
}


function removeButton(i){
   
   var temp_img = $('#news-'+i).val();
   var image    = $('#upload-news-'+i).attr('src');
   
   //$('#news-'+i).attr('disabled', false);
   
   if(temp_img != ''){
      $("#btn-slider-"+i).removeClass("hidden");
      $("#btn-slider-"+i).fadeIn("slow");
      $("#btn-news-"+i).attr('style','z-index:1000; position:absolute');
   }
                            	  
   $("#newer-"+i).mouseleave(function(){
      $("#btn-slider-"+i).addClass("hidden");
   
      if(temp_img == ''){
         //$('#news-'+i).attr('disabled', true);
	  }else{
         //$('#news-'+i).attr('disabled', false);
	  }
   });
   
}


function clearImage(i){	
   $('#id-cover-delete').attr('checked', true);
   $('#upload-news-'+i).attr('src', '');
   $('#upload-news-'+i).addClass('hidden');
   $('#img_replacer').html('<input type="file" name="cover" id="news-'+i+'" onchange="readURL(this,'+i+')" class="hidden" disabled="disabled"/>');
}


function validate(){
   var email_to = $('#id-emailto').val();
   var atpos    = email_to.indexOf("@");
   var dotpos   = email_to.lastIndexOf(".");
   var email    = $('#id-email').val();
   var atposs   = email.indexOf("@");
   var dotposs  = email.lastIndexOf(".");
   
   
   $('#id-row-emailto').removeClass('has-error');
   $('#id-row-email').removeClass('has-error');
   
   
   if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length || email == ""){
      $('#id-row-emailto').addClass('has-error');;
   }else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length || email == ""){
      $('#id-row-email').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


$(document).ready(function(e) {
   activeNAvbar('pages');
   
   $('#newer-1').on('mouseenter', function(){
	  removeButton('1');
   });
   
   $('#newer-1').on('mouseleave', function(){
	  removeButton('1');
   });
   
   $('#btn-slider-1').on('click', function(){
      clearImage('1');
   });
   
   $('#image-overlay').on('click', function(){
      openBrowser('1');
   });
   
   
   $('#btn-submit-alias').on('click', function(){
      validate();
   });
   
});
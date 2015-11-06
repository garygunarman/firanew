/*
# ----------------------------------------------------------------------
# NEWS - ADD: JAVASCRIPT
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
	  
   }
                            	  
}


function openBrowser(i){
   document.getElementById("news-"+i).click();
}


function removeButton(i){
   var image = $('#news-'+i).val();
   
   if(image != ''){
      $("#btn-slider-"+i).removeClass("hidden");
      $("#btn-slider-"+i).fadeIn("slow");
      $("#btn-news-"+i).attr('style','z-index:1000; position:absolute');
                            	  
      $("#newer-"+i).mouseleave(function(){
         $("#btn-slider-"+i).fadeOut("fast");
	  });
   }
}


function clearImage(i){		   
   $('#img_replacer').html('<input type="file" name="upload_news_'+i+'" id="news-'+i+'" onchange="readURL(this,'+i+')" class="hidden"/>');
   $("#upload-news-"+i).attr('src', '');
   $("#upload-news-"+i).addClass('hidden');
   $("#btn-slider-"+i).fadeOut("fast");
}


function validationAddNews(){
   var category = $('#id-category option:selected').val();
   var title    = $('#id-title').val();
   var date     = $('#id-date').val();
   var content  = $('#id-content').val();
   var image    = $('#news-1').val();
   
   $('#id-row-category').removeClass('has-error');
   $('#id-row-title').removeClass('has-error');
   $('#id-row-date').removeClass('has-error');
   $('#id-row-content').removeClass('has-error');
   $('#id-row-image').removeClass('has-error');
   
   if(category == '0'){
      $('#id-row-category').addClass('has-error');
   }else if(title == ''){
      $('#id-row-title').addClass('has-error');
   }else if(date == ''){
	  $('#id-row-date').addClass('has-error');
   }else if(image = ''){
	  $('#id-row-imgae').addClass('has-error');
   }else{
      var $btn	= $('#btn-alias-submit').button('loading');
      $('#btn-submit').click();
   }
   
}


$(window).load(function(e) {
   
   $('#btn-alias-submit').on('click', function(){
      validationAddNews();
   });
   
   
   $('#id-language-option').change(function(){
      var lang = $('#id-language-option :selected').val();
	  
	  location.href=base_url+lang+'/add-news-category';
   });
   
   
   $(function() {
      $("#id-date").datepicker({
         dateFormat: "yy-mm-dd",
	  });
   });
   
   activeNAvbar('recipes');
   
   var objLoading = {
             		"1": "btn-alias-submit",
					"2": "btn-add-cancel"
					};
			 
   $.each(objLoading, function( key, value ){
      $('#'+value).on('click', function(){
	  var $btn	= $('#'+value).button('loading');
		
	  });
	  
   });
});
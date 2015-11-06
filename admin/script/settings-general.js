/*
# ----------------------------------------------------------------------
# SETTINGS - GENERAL: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();


function getProvince(province, city){
   var country = $('#id-country option:selected').val();
   
   if(country == 'Indonesia'){
      var post = 'true';
	  var $btn = $('#btn-alias-submits').button('loading');
   
      var ajax = $.ajax({
	                type : "POST",
				    url  : base_url+"settings/_general/_ajax/_ajax_province.php",
					data : { post:post, province:province},
				    error: function(jqXHR, textStatus, errorThrown) {
					    
						   }
						
				    }).done(function(data) {
				       $('#ajax-loader-province').html(data);
					   $btn.button('reset');
					   getCity(city);
				    });
	  
   }else{
      $('#ajax-loader-province').html('<input class="form-control" id="id-province" name="province" value="'+province+'">');
	  $('#ajax-loader-city').html('<input class="form-control" id="id-city" name="city" value="'+city+'">');
   }
   
}


function getCity(city){
   var country  = $('#id-country option:selected').val();
   var province = $('#id-province option:selected').val();
   
   if(country == 'Indonesia'){
	  var $btn = $('#btn-alias-submit').button('loading');
   
      var ajax = $.ajax({
	                type : "POST",
				    url  : base_url+"settings/_general/_ajax/_ajax_city.php",
					data : { province:province, city:city},
				    error: function(jqXHR, textStatus, errorThrown) {
					    
						   }
						
				    }).done(function(data) {
				       $('#ajax-loader-city').html(data);
					   $btn.button('reset');
				    });
   }else{
      $('#ajax-loader-city').html('<input class="form-control" id="id-city" name="city" value="'+city+'">');
   }
   
}


function openBrowser(){
   document.getElementById("color_files").click();
}


function readURL(input) {
      
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
	     $('#upload-image').removeClass("hidden");
		 $('#upload-image').attr('src', e.target.result);
	  }
	  
	  reader.readAsDataURL(input.files[0]);
   }
	  
}

function validation(){
   var name = $('#id_color_name').val();
   
   $('#lbl_color_name').removeClass('has-error');
   
   if(name == ''){
      $('#lbl_color_name').addClass('has-error');
   }else{
	  $('#btn-save').click();
   }
   
}


function validation(){
   var url         = $('#id-url').val();
   var title       = $('#id-title').val();
   var description = $('#id-description').val();
   var keywords    = $('#id-keywords').val();
   var logo        = $('#id-logo').val();
   
   
   $('#id-row-url').removeClass('has-error');
   $('#id-row-title').removeClass('has-error');
   $('#id-row-description').removeClass('has-error');
   $('#id-row-keywords').removeClass('has-error');
   $('#id-row-logo').removeClass('has-error');
   
   
   if(url == ''){
      $('#id-row-url').addClass('has-error');
   }else if(title == ''){
      $('#id-row-title').addClass('has-error');
   }else if(description == ''){
      $('#id-row-description').addClass('has-error');
   }else if(keywords == ''){
      $('#id-row-keywords').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


/* --- COVER --- */
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


/* --- FAVICON --- */
function readURLicon(input,i) {
                                  
   if (input.files && input.files[0]) {
      var reader = new FileReader();
	  reader.onload = function (e) {
	     $("#upload-icon").removeClass("hidden");
	     $("#upload-icon").attr('src', e.target.result);
	  }
                            		 
      reader.readAsDataURL(input.files[0]);
	  
	  $('#id-icon-delete').attr('checked', false);
   }
                            	  
}


function openBrowsericon(i){
   document.getElementById("file-icon-"+i).click();
}


function removeButtonIcon(i){
   
   var temp_img = $('#icon-'+i).val();
   var image    = $('#upload-icon-'+i).attr('src');
   
   $('#cover-'+i).attr('disabled', false);
   
   if(temp_img != '' || image != ''){
      $("#btn-icon-"+i).removeClass("hidden");
      $("#btn-icon-"+i).fadeIn("slow");
      $("#btn-icon-"+i).attr('style','z-index:1000; position:absolute');
   }
                            	  
   $("#icon-"+i).mouseleave(function(){
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
   $('#upload-cover-'+i).addClass('hidden');
   $('#img_replacer').html('<input type="file" name="cover" id="news-'+i+'" onchange="readURL(this,'+i+')" class="hidden" disabled="disabled"/>');
}


$(document).ready(function(e) {
   activeNAvbar('pages');
   
   $('#newer-1').on('mouseenter', function(){
	  removeButtonCover('1');
   });
   
   $('#newer-1').on('mouseleave', function(){
	  removeButtonCover('1');
   });
   
   $('#btn-slider-1').on('click', function(){
      clearImageCover('1');
   });
   
   $('#newer-1').on('click', function(){
      openBrowserCover('1');
   });
   
   
   /* --- FAVICON --- */
   $('#newer-1').on('mouseenter', function(){
	  //removeButtonicon('1');
   });
   
   $('#newer-1').on('mouseleave', function(){
	  removeButtonCover('1');
   });
   
   $('#btn-slider-1').on('click', function(){
      clearImageCover('1');
   });
   
   $('#id-icon-1').on('click', function(){
      openBrowsericon('1');
   });
   
});
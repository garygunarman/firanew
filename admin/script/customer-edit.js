/*
# ----------------------------------------------------------------------
# CUSTOMER - EDIT: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();


function getProvince(province, city){
   var country = $('#id-country option:selected').val();
   
   if(country == 'Indonesia'){
      var post = 'true';
	  var $btn = $('#btn-alias-submit').button('loading');
   
      var ajax = $.ajax({
	                type : "POST",
				    url  : base_url+"customers/details/_ajax/_ajax_province.php",
					data : { post:post, province:province, city:city},
				    error: function(jqXHR, textStatus, errorThrown) {
					    
						   }
						
				    }).done(function(data) {
				       $('#ajax-loader-province').html(data);
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
				    url  : base_url+"customers/details/_ajax/_ajax_city.php",
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


function validateEditUser(){
   var fname  = $('#id-fname').val();
   var lname  = $('#id-lname').val();
   var email  = $('#id-email').val();
   var atpos  = email.indexOf("@");
   var dotpos = email.lastIndexOf(".");
   var phone  = $('#id-phone').val();
   var nonum  = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/
   var address       = $('#id-address').val();
   var addressDetail = $('#address-detail').val();
   var country  = $('#id-country option:selected').val();
   
   if(country == 'Indonesia'){
      var province = $('#id-province option:selected').val();
      var city     = $('#id-city option:selected').val();
   }else{
      var province = $('#id-province').val();
      var city     = $('#id-city').val();
   }
   
   
   $('#id-row-fname').removeClass('has-error');
   $('#id-row-lname').removeClass('has-error');
   $('#id-row-phone').removeClass('has-error');
   $('#id-row-email').removeClass('has-error');
   $('#id-row-address').removeClass('has-error');
   $('#id-row-country').removeClass('has-error');
   $('#id-row-province').removeClass('has-error');
   $('#id-row-city').removeClass('has-error');


   if(fname == "" || typeof fname === 'undefined'){
      $('#id-row-fname').addClass('has-error');
   }else if(lname == "" || typeof lname === 'undefined'){
      $('#id-row-lname').addClass('has-error');
   }else if(phone == "" || typeof phone === 'undefined'){
      $('#id-row-phone').addClass('has-error');
   }else if(phone.length < 8){
      $('#id-row-phone').addClass('has-error');
   }else if(email == "" || typeof phone === 'undefined'){
      $('#id-row-email').addClass('has-error');
   }else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
      $('#id-row-email').addClass('has-error');
   }else if(address == "" || typeof address === 'undefined'){
      $('#id-row-address').addClass('has-error');
   }else if (country == "0" || typeof country === 'undefined'){
      $('#id-row-country').addClass('has-error');
   }else if (province == "0" || typeof province === 'undefined'){
      $('#id-row-province').addClass('has-error');
   }else if(city == "" || typeof city === 'undefined'){
      $('#id-row-city').addClass('has-error');
   }else{
	  $('#btn-submit').click();
   }
   
}
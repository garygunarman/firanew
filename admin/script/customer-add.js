/*
# ----------------------------------------------------------------------
# CUSTOMER - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();

function getProvince(){
   var country = $('#id-country option:selected').val();
   
   if(country == 'Indonesia'){
      var post = 'true';
	  var $btn = $('#btn-alias-submit').button('loading');
   
      var ajax = $.ajax({
	                type : "POST",
				    url  : base_url+"customers/add/_ajax/_ajax_province.php",
					data : {post:post},
				    error: function(jqXHR, textStatus, errorThrown) {
					    
						   }
						
				    }).done(function(data) {
					   $('#ajax-loader-province').html(data);
					   getCity();
				    });
	  
   }else{
      $('#ajax-loader-province').html('<input class="form-control" id="id-province" name="province">');
	  $('#ajax-loader-city').html('<input class="form-control" id="id-city" name="city">');
   }
   
}


function getCity(){
   var country  = $('#id-country option:selected').val();
   var province = $('#id-province option:selected').val();
   
   if(country == 'Indonesia'){
	  var $btn = $('#btn-alias-submit').button('loading');
   
      var ajax = $.ajax({
	                type : "POST",
				    url  : base_url+"customers/add/_ajax/_ajax_city.php",
					data : {province:province},
				    error: function(jqXHR, textStatus, errorThrown) {
					    
						   }
						
				    }).done(function(data) {
				       $('#ajax-loader-city').html(data);
					   $btn.button('reset');
				    });
   }else{
      $('#ajax-loader-city').html('<input class="form-control" id="id-city" name="city">');
   }
   
}

function validate(){
   var name   = $('#id-fname').val();
   var lname  = $('#id-lname').val();
   var phone  = $('#id-phone').val();
   var email  = $('#id-email').val();
   var pass   = $('#id-password').val();
   var cpass  = $('#id-cpassword').val();
   var atpos  = email.indexOf("@");
   var dotpos = email.lastIndexOf(".");
   
   
   $('#id-row-fname').removeClass('has-error');
   $('#id-row-lname').removeClass('has-error');
   $('#id-row-phone').removeClass('has-error');
   $('#id-row-email').removeClass('has-error');
   $('#id-row-pass').removeClass('has-error');
   $('#id-row-cpass').removeClass('has-error');
   
   
   if(name == ''){
      $('#id-row-fname').addClass('has-error');
   }else if(lname == ''){
      $('#id-row-name').addClass('has-error');
   }else if(phone == ''){
      $('#id-row-phone').addClass('has-error');
   }else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length || email == ""){
      $('#id-row-email').addClass('has-error');
   }else if(pass == ''){
      $('#id-row-pass').addClass('has-error');
   }else if(cpass == '' || pass != cpass){
      $('#id-row-cpass').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}
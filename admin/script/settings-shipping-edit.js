/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING - DETAILS: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();

function ajaxService(post, weight){
   var service = $('#id-service option:selected').val();
   
   if(service == 'Local Only'){
      
	  var ajq = $.ajax({
		           type: "POST",
				   url  : base_url+"settings/shipping/_ajax/_details/_local.php",
				   data : {post:post, weight:weight},
				   error: function(jqXHR, textStatus, errorThrown){
				          }
             }).done(function(msg){
			    $('#id-weight option[value="'+weight+'"]').attr('selected', true);
			    $('#ajax-loader').html('');
				$('#id-ajax-loader').html(msg);
			 });
	  
   }else if(service == 'International Only'){
      
	  var ajq = $.ajax({
		           type: "POST",
				   url  : base_url+"settings/shipping/_ajax/_details/_international.php",
				   data : {post:post, weight:weight},
				   error: function(jqXHR, textStatus, errorThrown){
				          }
             }).done(function(msg){
			    $('#id-weight option[value="'+weight+'"]').attr('selected', true);
			    $('#ajax-loader').html('');
				$('#id-ajax-loader').html(msg);
			 });
	  
   }
   
}


$('#international').hide();

function selectProvince(i){
   var flag = $('#province-checked-'+i).attr('flag');
   var rate = $('#courier_rate_'+i).val();
   
   if(flag == "unchecked"){
      $('#courier-city-'+i).find('[type=checkbox]').each(function() {
	     $(this).attr('checked', 'checked');
      });
	  
	  $('#province-checked-'+i).attr('flag','checked');
	  $('#custom-shipping [type=checkbox]').val(rate);

}else if(flag == "checked"){
   $('#courier-city-'+i).find(':checked').each(function() {
      $(this).removeAttr('checked');
   });
   
   $('#province-checked-'+i).attr('flag','unchecked');
   $('#custom-shipping [type=checkbox]').val('');
   }
				   
}


function selectCity(i){
   var flag = $('#province-checked-'+i).attr('flag');
   var rate = $('#courier_rate_'+i).val();
   
   if(flag != "checked"){ 
      $('#province-checked-'+i).attr('checked', 'checked');
	  $('#province-checked-'+i).attr('flag', 'checked');
	  $('#custom-shipping-'+i+' [type=checkbox]').attr('checked','checked');
	  $('#custom-shipping [type=checkbox]').val(rate);
	  $('#city-checkbox-'+i).attr('checked','checked');
   }
}


function selectService(){
   var service = $('#id-service option:selected').val();

   if(service == "International Only"){
      $('#international').removeClass('hidden');
      $('#local').addClass('hidden');
      $('#local').slideUp("slow");
      $('#international').slideDown("slow");
	  
	  $('#international input[type=checkbox]').each(function () {
	     $(this).attr('checked', true);
		 $('#local input[type=checkbox]').attr('checked', false);
	  });
	  
	  $('#international input[type=text]').each(function () {
	     $(this).attr('disabled', false);
		 $('#local input[type=text]').attr('disabled', true);
	  });
	  
   }else if(service == "Local Only"){
      $('#local').removeClass('hidden');
      $('#international').addClass('hidden');
      $('#international').slideUp("slow");
      $('#local').slideDown("slow");
	  
	  $('#local input[type=checkbox]').each(function () {
	     $(this).attr('checked', true);
		 $('#international input[type=checkbox]').attr('checked', false);
	  });
	  
	  $('#local input[type=text]').each(function () {
	     $(this).attr('disabled', false);
		 $('#international input[type=text]').attr('disabled', true);
	  });
	  
   }else if(service == "Local & International"){
      $('#international').slideDown("slow");
      $('#local').slideDown("slow");
   }else{
      $('#international').slideUp("slow");
      $('#local').slideUp("slow");
   }
   
}


function validationAddShipping(){
   var cname   = $('#id-name').val();
   var note    = $('#id-description').val();
   var service = $('#id-service option:selected').val();
   var weight  = $('#id-weight option:selected').val();
   
   $('#id-row-name').removeClass('has-error');
   $('#id-row-description').removeClass('has-error');
   $('#id-row-service').removeClass('has-error');
   $('#id-row-weight').removeClass('has-error');
   
   if(cname == ""){
      $('#id-row-name').addClass('has-error');
   }else if(note == ""){
      $('#id-row-description').addClass('has-error');
   }else if(service == 0){  
      $('#id-row-service').addClass('has-error');
   }else if(weight == 0){
      $('#id-row-weight').addClass('has-error');
   }else{
      var $btn	= $('#btn-alias-submit').button('loading');
      $('#btn-submit').click();
   }
   
}


function focusCheckbox(i){
   $('[type=checkbox][name='+i+']').attr('checked', 'checked');
   
   var source = $('#courier_rate_'+i).val();
   
   $('#ck-rate-'+i).val(source);
}


function perWeight(){
   var weight  = $('#id-weight option:selected').val();
   
   $('.custom-weight').find('p').each(function() {
      $('p#per_weight').text("/ "+weight+" kg"); 
   });
}


$(document).ajaxComplete(function(e) {
   $('#id-weight').change(function(){
     perWeight();
   });
   
   
   $('#id-service').change(function(){
      selectService();
   });
   
   
   $('#btn-alias-submit').on('click', function(){
      validationAddShipping()
   });
   
});
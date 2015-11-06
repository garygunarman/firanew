/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();

function ajaxService(){
   var service = $('#id-service option:selected').val();
   var post    = 1;
   
   if(service == 'Local Only'){
      
	  var ajq = $.ajax({
		           type: "POST",
				   url  : base_url+"settings/shipping/_ajax/_add/_local.php",
				   data : {post:post},
				   error: function(jqXHR, textStatus, errorThrown){
				          }
             }).done(function(msg){
			    $('#id-weight option[value="1"]').attr('selected', true);
			    $('#ajax-loader').html('');
				$('#id-ajax-loader').html(msg);
			 });
	  
   }else if(service == 'International Only'){
      
	  var ajq = $.ajax({
		           type: "POST",
				   url  : base_url+"settings/shipping/_ajax/_add/_international.php",
				   data : {post:post},
				   error: function(jqXHR, textStatus, errorThrown){
				          }
             }).done(function(msg){
			    $('#id-weight option[value="0.5"]').attr('selected', true);
			    $('#ajax-loader').html('');
				$('#id-ajax-loader').html(msg);
			 });
	  
   }
   
}


function selectService(){
   var service = $('#id-service option:selected').val();

   if(service == "International Only"){
	  $('#international input[type=checkbox]').each(function(){
	     $(this).attr('checked', true);
	  });
	  
	  $('#international input[type=text]').each(function(){
	     $(this).attr('disabled', false);
		 $('#local input[type=text]').attr('disabled', true);
	  });
	  
	  
	  $('#local input[type=checkbox]').each(function(){
        $(this).attr('checked', false);
	  });
	  
	  $('#local input[type=text]').each(function(){
        $(this).attr('disabled', true);
	  });
	  
	  
	  $('#international').removeClass('hidden');
      $('#local').addClass('hidden');
      //$('#local').slideUp("fast");
      //$('#international').slideDown("fast");
	  
   }else if(service == "Local Only"){
      /*
	  $('#local input[type=checkbox]').each(function(){
	     $(this).attr('checked', true);
	  });
	  
	  $('#local input[type=text]').each(function(){
	     $(this).attr('disabled', false);
	  });
	  
	  
	  $('#international input[type=checkbox]').each(function(){
        $(this).attr('checked', false);
	  });
	  
	  $('#international input[type=text]').each(function(){
        $(this).attr('disabled', true);
	  });
	  */
	  
	  $('.cl-province').each(function(){
	     $(this).attr('checked', 'checked');
	  });
	  
	  
	  $('.cl-city').each(function(){
	     $(this).attr('checked', 'checked');
	  });
	  
	  
	  $('.cl-input-city').each(function(){
	     $(this).removeAttr('disabled');
	  });
	  
	  
      $('#local').removeClass('hidden');
      $('#international').addClass('hidden');
      //$('#international').slideUp("fast");
      //$('#local').slideDown("fast");
	  
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
      $('#btn-submit').click();
   }
   
}

function focusCheckbox(i, x){
   //$('[type=checkbox][name='+i+']').attr('checked', 'checked');
   $('#city-checkbox-'+i+'-'+x).attr('checked', 'checked');
   
   var source = $('#courier_rate_'+i+'_'+x).val();
   
   $('#ck-rate-'+i+'-'+x).val(source);
   //alert(source);
}


function perWeight(){
   var weight  = $('#id-weight option:selected').val();
   var service = $('#id-service option:selected').val();
   
   if(service == 'Local Only'){
   $('.custom-weight').find('p').each(function() {
      $('p#per_weight').text("/ "+weight+" kg");
      $('p#per_weight_rate').text("/ "+weight+" kg"); 
   });
   }else{
   
   $('#weight-half').addClass('hidden');
   $('#weight-one').addClass('hidden');
   $('#weight-two').addClass('hidden');
   $('#weight-half-rate').addClass('hidden');
   $('#weight-one-rate').addClass('hidden');
   $('#weight-two-rate').addClass('hidden');
   
   
   if(weight == '0.5'){
      $('.custom-weight').find('p').each(function(){
	    $('p#weight-one').addClass('hidden');
		$('p#weight-one-rate').addClass('hidden');
	    $('p#weight-two').addClass('hidden');
		$('p#weight-two-rate').addClass('hidden');
		
        $('p#weight-half').removeClass('hidden');
        $('p#weight-half-rate').removeClass('hidden');
	  });
   }else if(weight == '1'){
      $('.custom-weight').find('p').each(function(){
	    $('p#weight-half').addClass('hidden');
		$('p#weight-half-rate').addClass('hidden');
	    $('p#weight-two').addClass('hidden');
		$('p#weight-two-rate').addClass('hidden');
        
		$('p#weight-one').removeClass('hidden');
        $('p#weight-one-rate').removeClass('hidden');
	  });
   }else if(weight == '2'){
      $('.custom-weight').find('p').each(function(){
	    $('p#weight-half').addClass('hidden');
		$('p#weight-half-rate').addClass('hidden');
	    $('p#weight-one').addClass('hidden');
		$('p#weight-one-rate').addClass('hidden');
        
		$('p#weight-two').removeClass('hidden');
        $('p#weight-two-rate').removeClass('hidden');
	  });
   }
   }
   
}


function checkIt(i){
   $('#chk-'+i).attr('checked', true);
}


function intl(i){
   $('#international li').click(function(){
      $('input[type=checkbox]#chk-'+i).attr('checked', true);
	  $('int-rate-'+i).val('0');
   });
}


function selectProvince(i){
   var flag = $('#province-checked-'+i).attr('flag');
   var rate = $('#courier_rate_'+i).val();
   
   if(flag == "unchecked"){
      $('#courier-city-'+i).find('[type=checkbox]').each(function() {
	     $(this).attr('checked', true);
	  });
	  
	  $('#province-checked-'+i).attr('flag','checked');
      $('#custom-shipping [type=checkbox]').val(rate);
   }else if(flag == "checked"){
      $('#courier-city-'+i).find(':checked').each(function() {
	     $(this).removeAttr('checked');
	  });
				   
      $('#province-checked-'+i).attr('flag','unchecked');
	  $('#custom-shipping [type=checkbox]').val('inactive');
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
      //$('[type=checkbox][name=][attribute=attribute-'+i+']').attr('checked','checked');
   }
}
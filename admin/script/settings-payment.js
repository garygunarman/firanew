/*
# ----------------------------------------------------------------------
# SETTINGS - PAYMENT: JAVASCRIPT
# ----------------------------------------------------------------------
*/


var base_url = $('#id-global-url').val();


function ajaxGet(){
   var bank = $('#id-method option:selected').val();
   
   var ajx  = $.ajax({
	             type : "POST",
				 url  : base_url+"settings/payment/_ajax/ajax.php",
				 data : {bank:bank},
				 error: function(jqXHR, textStatus, errorThrown) {
					   
				        }
						 
			   }).done(function(data) {	
			      $('#ajax-loader').html(data);
				  
				  if($.isNumeric(bank)){
				     $('#btn-delete').removeClass('hidden');
				  }else{
				     $('#btn-delete').addClass('hidden');
				  }
				  
			   });
}


function validation(){
   var bank   = $('#id-name').val();
   var number = $('#id-number').val();
   var name   = $('#id-account').val();
   
   $('#id-row-name').removeClass('has-error');
   $('#id-row-number').removeClass('has-error');
   $('#id-row-account').removeClass('has-error');
   
   if(bank == ""){
      $('#id-row-name').addClass('has-error');
   }else if(number == ""){
      $('#id-row-number').addClass('has-error');
   }else if(name == ""){
      $('#id-row-account').addClass('has-error');
   }else{
	  $('#btn-submit').click();
   }
   
}

function checkbox(x){
   
   if(x == 'Yes'){
      $('#size-visible').attr('checked', true);
   }else if(x == 'No'){
      $('#size-invisible').attr('checked', true);
   }
   
}


function validation(){
   var name  = $('#id-name').val();
   var items = $('#id-size').val();
   var sku   = $('#id-sku').val();
   
   $('#id-row-name').removeClass('has-error');
   $('#id-row-size').removeClass('has-error');
   $('#id-row-sku').removeClass('has-error');
   
   if(name == ''){
      $('#id-row-name').addClass('has-error');
   }else if(items == ''){
      $('#id-row-size').addClass('has-error');
   }else if(sku == ''){
      $('#id-row-sku').addClass('has-error');
   }else{
	  $('#btn-submit').click();
   }
}
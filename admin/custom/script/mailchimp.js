/*
# ----------------------------------------------------------------------
# SETTINGS - MAILCHIMP: JAVASCRIPT
# ----------------------------------------------------------------------
*/


function validate(){
   var key  = $('#id-key').val();
   var list = $('#id-list').val();
   
   
   $('#id-row-key').removeClass('has-error');
   $('#id-row-list').removeClass('has-error');
   
   
   if(key == ''){
      $('#id-row-key').addClass('has-error');
   }else if(list == ''){
      $('#id-row-list').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}

$(document).ready(function(e) {
   activeNAvbar('settings');
   $('#btn-alias-submit').on('click', function(){
      validate();
   });
});
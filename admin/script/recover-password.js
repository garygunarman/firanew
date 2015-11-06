/*
# ----------------------------------------------------------------------
# CONFIRM PAYMENT: JAVASCRIPT
# ----------------------------------------------------------------------
*/

function validateRecover(){
   var pass  = $('#id-password').val();
   var cpass = $('#id-repassword').val();
   
   
   $('#id-row-password').removeClass('has-error');
   $('#id-row-repassword').removeClass('has-error');
   
   
   if(pass == ""){
      $('#id-row-password').addClass('has-error');
   }else if(cpass == ""){
      $('#id-row-repassword').addClass('has-error');
   }else if(pass != cpass){
      $('#id-row-repassword').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


$(document).ready(function(e) {
   $('#btn-alias-submit').on('click', function(){
       validateRecover();
   });
});



$(document).keypress(function(e) {
   
   if(e.which == 13) {
      $('#btn-alias-submit').click();
   }
   
});
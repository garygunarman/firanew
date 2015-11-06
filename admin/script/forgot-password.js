/*
# ----------------------------------------------------------------------
# FORGOT PASSWORD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

$(document).keypress(function(e) {
   
   if(e.which == 13) {
      $('#btn-alias-submit').click();
   }
   
});


$(document).ready(function(e) {
   $('#btn-alias-submit').bind('click', function(){
      validate();
   });
});


function validate(){
   var name = $('#id-username').val();
   
   $('#id-row-username').removeClass('has-error');
   
   if(name == ''){
      $('#id-row-username').addClass('has-error');
   }else{
      var $btn	= $('#btn-alias-submit').button('loading');
      $('#btn-submit').click();
   }
   
}


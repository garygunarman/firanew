/*
# ----------------------------------------------------------------------
# CATEGORY - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

function validate(){
   var active   = $('#id-visible:checked').length;
   var inactive = $('#id-inactive:checked').length; 
   var name     = $('#id-name').val();
   
   
   $('#id-row-active').removeClass('has-error');
   $('#id-row-name').removeClass('has-error');
   
   
   if(name == ''){
      $('#id-row-name').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}
/*
# ----------------------------------------------------------------------
# NEWS CATEGORY - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

function validate(){
   var name             = $('#id-name').val();
   var description      = $('#id-description').val();
   var meta_description = $('#id-meta-description').val();
   var meta_keywords    = $('#id-meta-keyword').val();
   
   
   $('#id-row-name').removeClass('has-error');
   $('#id-row-description').removeClass('has-error');
   $('#id-row-meta-description').removeClass('has-error');
   $('#id-row-meta-keyword').removeClass('has-error');
   
   
   if(name == ''){
      $('#id-row-name').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


$(document).ready(function(e) {
   activeNAvbar('location');
   $('#btn-alias-submit').on('click', function(){
      validate();
   });
});
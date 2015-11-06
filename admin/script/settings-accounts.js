/*
# ----------------------------------------------------------------------
# SETTINGS - ACCOUNTS: JAVASCRIPT
# ----------------------------------------------------------------------
*/

function validationAdminAccount(){
   var role   = $('#id-role option:selected').val();
   var name   = $('#id-username').val();
   var email  = $('#id-email').val();
   var atpos  = email.indexOf("@");
   var dotpos = email.lastIndexOf(".");
   var pass   = $('#id-old').val();
   var npass  = $('#id-new').val();
   var cpass  = $('#id-confirm').val();
   var alpha  = /^[a-zA-z]+$/;
   var alphan = /^[a-zA-z0-9]+$/;
   

   $('#id-row-role').removeClass('has-error');
   $('#id-row-name').removeClass('has-error');
   $('#id-row-email').removeClass('has-error');
   $('#id-row-old').removeClass('has-error');
   $('#id-row-new').removeClass('has-error');
   $('#id-row-confirm').removeClass('has-error');
   
   
   if(role == "null"){
	  $('#id-row-role').addClass('has-error');
   }else if(name == "" || name.length < 3){
      $('#id-row-name').addClass('has-error');
   }else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
      $('#id-row-email').addClass('has-error');
   }else if(pass == "" && npass != "" && cpass == "" || pass == "" && npass == "" && cpass != ""){
      $('#id-row-old').addClass('has-error');
   }else if(pass != "" && npass == "" && cpass == "" || pass != "" && npass == "" && cpass != ""){
      $('#id-row-new').addClass('has-error');
   }else if(pass != "" && npass != "" && cpass != npass){
      $('#id-row-confirm').addClass('has-error');
   }else {
      var $btn	= $('#btn-alias-submit').button('loading');
      $('#btn-submit').click();
   }
   
}


$(window).load(function(){
   $('#btn-alias-submit').on('click', function(){
      validationAdminAccount();
   });
   
});
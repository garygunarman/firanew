$(document).keypress(function(e) {
   
   if(e.which == 13) {
      $('#btn_login').click();
   }
   
   $('#btn-alias-login').bind('click', function(){
      validateLogin();
   });
   
});


$(window).load(function(e){
   $('#btn-alias-login').bind('click', function(){
      validateLogin();
   });
   
});


function validateLogin(){
   var user = $('#id-username').val();
   var pass = $('#id-password').val();
   
   
   $('#id-row-username').removeClass('has-error');
   $('#id-row-password').removeClass('has-error');
   
   if(user == ""){
      $('#id-row-username').addClass('has-error');
   }else if(pass == ""){
      $('#id-row-password').addClass('has-error');
   }else{
      var $btn	= $('#btn-alias-login').button('loading');
      $('#btn-login').click();
   }
   
}

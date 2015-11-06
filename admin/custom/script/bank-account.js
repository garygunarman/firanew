/*
# ----------------------------------------------------------------------
# PAYMENT ACCOUNT - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

function validate(){
   var bank_name = $('#id-bank :selected').val();
   var name      = $('#id-name').val();
   var account   = $('#id-number').val();
   var currency  = $('#id-currency :selected').val();
   
   $('#id-row-bank').removeClass('has-error');
   $('#id-row-name').removeClass('has-error');
   $('#id-row-number').removeClass('has-error');
   $('#id-row-currency').removeClass('has-error');
   
   if(bank_name == '' || bank_name == 0){
      $('#id-row-bank').addClass('has-error');
   }else if(name == ''){
      $('#id-row-name').addClass('has-error');
   }else if(account == ''){
      $('#id-row-number').addClass('has-error');
   }else if(currency == 0 || currency == ''){
      $('#id-row-currency').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


/*
# ----------------------------------------------------------------------
# PAYMENT ACCOUNT - DETAILS: JAVASCRIPT
# ----------------------------------------------------------------------
*/


$(document).ready(function(e) {
   activeNAvbar('settings');
});

$(window).load(function(e){
   var $btn = $('#btn-alias-submit').button('loading');
   $btn.button('reset');
   $('#btn-alias-submit').val('Save Changes');
   
   $('#btn-alias-submit').on('click', function(){
       validate();
   });
});
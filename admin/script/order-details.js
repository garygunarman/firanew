function sameAmount(){
   $('#modal_confirm_amount').removeClass('hidden');
   $('#modal_confirm_verify').addClass('hidden');
   $('#modal_confirm_btn_confirm').removeClass('hidden');
   
   //$('#modal_confirm_btn_cancel').after('<input type="button" class="btn btn-success btn-sm"  value="Confirm" name="btn-order-detailing" id="modal_confirm_btn_confirm">');
   $('#modal_confirm_btn_yes').remove();
}


function sameAmountUnpaid(){
   $('#modal_confirm_amounts').removeClass('hidden');
   $('#modal_confirm_verifys').addClass('hidden');
   $('#modal_confirm_btn_confirms').removeClass('hidden');
   
   //$('#modal_confirm_btn_cancel').after('<input type="button" class="btn btn-success btn-sm"  value="Confirm" name="btn-order-detailing" id="modal_confirm_btn_confirm">');
   $('#modal_confirm_btn_yes').remove();
}


function sameAmountFix(){
   $('#modal_confirm_amount').addClass('hidden');
   $('#modal_confirm_verify').removeClass('hidden');
   $('#modal_confirm_btn_confirm').addClass('hidden');
}


function sameAmountFixUnpaid(){
   $('#modal_confirm_amounts').addClass('hidden');
   $('#modal_confirm_verifys').removeClass('hidden');
   $('#modal_confirm_btn_confirms').addClass('hidden');
}


function clickUnpaid(){
   $('#btn-unpaid-submit').click();
}


function clickEditPayment(){
   var bank   = $('#id-unpaid-method option:selected').val();
   var name   = $('#id-unpaid-name').val();
   var amount = $('#id-unpaid-amount').val();
   var nonum  = /^[0-9]+$/;
   
   
   $('#id-unpaid-method').removeClass('has-error');
   $('#lbl_modal_name').removeClass('has-error');
   $('#lbl_modal_amount').removeClass('has-error');
   
   if(bank == ''){
      $('#id-row-unpaid-method').addClass('has-error');
   }else if(name == ''){
      $('#id-row-unpaid-name').addClass('has-error');
   }else if(amount == '' || !nonum.test(amount)){
      $('#id-row-unpaid-amount').addClass('has-error');
   }else{
      $('#btn-edit-payment-submit').click();
   }
	  
}


function clickPaid(){
   var amount   = $('#modal_confirm_text_amount').val();
   var numeric  = /^[0-9]+$/;
   
   if(!numeric.test(amount)){
      $('#modal_confirm_text_amount').attr('border', '1px solid #f00');
   }
}


function clickConfirmed(x){
   
   var $btn	= $('#modal_confirm_btn_confirm').button('loading');
   
   if(x === 'yes'){
      $('#btn_mark_as_paid').click();
   }else{
      var bank   = $('#id_modal_confirm_method option:selected').val();
      var name   = $('#modal_confirm_text_name').val();
      var amount = $('#modal_confirm_text_amount').val();
      var nonum  = /^[0-9]+$/;
	  
	  
	  $('#lbl_modal_method').removeClass('has-error');
	  $('#lbl_modal_name').removeClass('has-error');
	  $('#lbl_modal_amount').removeClass('has-error');
	  
	  
	  if(bank == ''){
         $('#lbl_modal_method').addClass('has-error');
	  }else if(name == ''){
         $('#lbl_modal_name').addClass('has-error');
	  }else if(amount == '' || !nonum.test(amount)){
         $('#lbl_modal_amount').addClass('has-error');
	  }else{
         $('#btn_mark_as_paid').click();
	  }
	  
   }
}




$("input#modal_confirm_text_amount").on({
  keyup: function(e) {
    if (e.which === 32)
      return false;
	  
   var amount   = $('#modal_confirm_text_amount').val();
   var numeric  = /^[0-9]+$/;
   
   if(!numeric.test(amount)){
      $('#modal_confirm_text_amount').attr('style', 'border:1px solid #f00');
   }else{
      $('#modal_confirm_text_amount').removeAttr('style');
   }
	  
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});





/* --- COUNT CHECKBOX --- */
function checkedCount(){
   var check = $('.table input:checked').size();
   $('#btn-deliver-item').val('Deliver '+check+' item(s)');
}




/* --- CANCEL ORDER --- */
$('#id-cancel-reason').change(function(){
   
   var reason = $('#id-cancel-reason option:selected').val();
   
   if(reason === 'defect'){
      $('#id-cancel-option-restock').attr('checked', false);
	  $('#id-cancel-option-restock').attr('disabled', true);
   }else{
	  $('#id-cancel-option-restock').attr('disabled', false);
      $('#id-cancel-option-restock').attr('checked', true);
   }
   
});


/* --- VALIDATION: SHIPPING --- */
function validationShipping(){
   var courier    = $('#id_shipping_service option:selected').val();
   var airwaybill = $('#id-shipping-number').val();
   
   
   $('#id-row-shipping-courier').removeClass('has-error');
   $('#id-row-shipping-number').removeClass('has-error');
   
   
   if(courier == ''){
      $('#id-row-shipping-courier').addClass('has-error');
   }else if(airwaybill == ''){
      $('#id-row-shipping-number').addClass('has-error');
   }else{
      $('#btn-shipping').click();
   }
}
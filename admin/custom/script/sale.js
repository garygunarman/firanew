/*
# ----------------------------------------------------------------------
# SALE: JAVASCRIPT
# ----------------------------------------------------------------------
*/


var base_url = $('#id-global-url').val();


function numbers(){
   var nonum  = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/
   var number = $('#id_amount_discount').val();
   
   if(!nonum.test(number)){
      $('#id_amount_discount').addClass("empty");
   }else{
      $('#id_amount_discount').removeClass("empty");
   }
   
}


function validateSale(){
   var amount = $('#id-amount').val();
   var from   = $('#id-from').val();
   var to     = $('#id-to').val();
   var nonum  = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/
   var type   = $('#id-category option:selected').val();
   var check  = $('.table input:checked').size();
   
   
   $('#id-row-category').removeClass('has-error');
   $('#id-row-amount').removeClass('has-error');
   $('#id-row-range').removeClass('has-error');

   
   if(check == 0){
	  $('.alert').remove();
	  $('.subnav').after('<div class="alert alert-danger"><div class="container">Select your item first</div></div>');
   }else if(amount == "" || !nonum.test(amount)){
      $('#id-row-amount').addClass('has-error');
   }else if(from == ""){
      $('#id-row-range').addClass('has-error');
   }else if(to == ""){
      $('#id-row-range').addClass('has-error')
   }else{
      $('#btn-submit').click();
   }
   
}


function textIDR(){
   var param = $('#id-category :selected').val();
   
   if (param == 2){
      $('#text_by').html("Discount (IDR) <span>*</span>");
   }else{
      $('#text_by').html("Discount (%) <span>*</span>");
   }
   
}


function ajxRemoveSale(i){
   var item_id = i;
   
   var $btn = $('#btn_remove_'+i).button('loading');
   
   var ajx = $.ajax({
              type: "POST",
			  url: base_url+"custom/promotions/_sale/_ajax/ajax_remove_sale.php",
			  data: {item_id:item_id},
			  error: function(jqXHR, textStatus, errorThrown) {
             
                     }
              }).done(function(data) {
			     $('#ajax_remove_wrapper_'+i).addClass("hidden").remove();
				 $('.table :checked').attr('checked',false);
				 $btn.button('reset');
			  });
	   
}



$(document).ready(function(e) {
   activeNAvbar('promotions');
   
   textIDR();
   
   $("input#id-amount").on({
      keydown: function(e) {
	     if (e.which === 32)
		 return false;
	  },
	  change: function() {
	     this.value = this.value.replace(/\s/g, "");
	  }
   });
   
   
   $(function() {
      $("#id-from").datepicker({
         changeMonth: true,
		 dateFormat: "yy-mm-dd",
		 minDate: 0,
	     onClose: function (selectedDate) {
	                  $("#id-to").datepicker("option","minDate", selectedDate);
				   },
				   
	  });
   
   
      $("#id-to").datepicker({
         changeMonth: true,
		 dateFormat: "yy-mm-dd",
	     onClose: function (selectedDate) {
	                  $("#id-from").datepicker("option","maxDate", selectedDate);
				   },
	  });
   
   });
   
   $('#btn-alias-submit').on('click', function(){
      validateSale();
   });
   
});



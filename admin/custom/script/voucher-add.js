/*
# ----------------------------------------------------------------------
# VOUCHER - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/


var base_url = $('#id-global-url').val();

function autoGenerate(){
   
   if($('#id-auto:checked').length == 1){
      $('#id-row-generator').removeClass('fadeOut');
      $('#id-row-generator').addClass('fadeIn');
      $('#id-row-generator').removeClass('hidden');
   }else if($('#id-manual:checked').length == 1){
      $('#id-row-generator').removeClass('fadeIn');
      $('#id-row-generator').addClass('fadeOut');
      $('#id-row-generator').addClass('hidden');
   }
   
}


function ajaxGenerate(){
   var long = $('#id-length-code').val();
   
   if(long == ''){
      $('#id-row-generator').addClass('has-error');
   }else 
   
   var $btn = $('#btn-generate').button('loading');
   
   var ajx = $.ajax({
              type: "POST",
			  url: base_url+"custom/promotions/_voucher/_ajax/ajax_generate.php",
			  data: {long:long},
			  error: function(jqXHR, textStatus, errorThrown) {
             
                     }
              }).done(function(data) {
			     if(data != 'error'){
			        $('#id-code').val(data);
				    $('#id-length-code').val('');
				 }else{
				    $('#id-length-code').val('');
					$('#id-length-code').addClass('has-error');
				 }
			     
				 $btn.button('reset');
			  });
}


function validate(){
   var code   = $('#id-code').val();
   var use    = $('#id-usability option:selected').val();
   var valid  = $('#id-validity option:selected').val();
   var amount = $('#id-amount').val();
   var start  = $('#id-from').val();
   var end    = $('#id-to').val();
   
   
   $('#id-row-code').removeClass('has-error');
   $('#id-row-usability').removeClass('has-error');
   $('#id-row-validity').removeClass('has-error');
   $('#id-row-amount').removeClass('has-error');
   $('#id-row-range').removeClass('has-error');
   
   if(code == ''){
      $('#id-row-code').addClass('has-error');
   }else if(use == ''){
      $('#id-row-usability').addClass('has-error');
   }else if(valid == '' && valid != '2'){
      $('#id-row-validity').addClass('has-error');
   }else if(amount == '' && valid != '2'){
      $('#id-row-amount').addClass('has-error');
   }else if(start = ''){
      $('#id-row-range').addClass('has-error');
   }else if(end = ''){
      $('#id-row-range').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


function amount(){
   alert($('#id-amount').length);
}


function uppercase(){
   $('input#id-code').val (function () {
      return this.value.toUpperCase();
   });
}



function changeOption(){
   var action = $('#news-action option:selected').val();
   
   if(action == "delete" || action == ""){
      $('#news-option').addClass("hidden");
	  $('#lbl-news-option').addClass("hidden");
	  $('#news-option').attr('disabled', true);
   }else if(action == "change"){
	  $('#news-option').removeClass("hidden");
	  $('#lbl-news-option').removeClass("hidden");
	  $('#news-option').removeAttr('disabled');
   }
   
}


$(document).ready(function(e){
   activeNAvbar('promotions');
   changeOption();



$(function() {
   $("#order_date_search").datepicker({
      altField:'#order_date_search',
	  dateFormat: "yy-mm-dd",
	  onSelect: function () {
	     document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
         searchQueryOption('order_date');
      },
   });
});


function sameHeight(){
   var left  = $('#id_content_left').height();
   var right = $('#id_content_right').height();
   
   if(left < right){
      $('#id_content_left').css('height', (right+35)+'px');
   }else if(left > right){
      $('#id_content_right').css('height', (left+35)+'px');
   }
   
}
	 
   $('#btn-alias-submit').on('click', function(){
      validate();
   });
	 
   $(function() {
      $("#id-from").datepicker({
	     changeMonth: true,
		 dateFormat: "yy-mm-dd",
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
   
   
   /* --- GENERATE --- */
   $('#id-auto').on('click', function(){
      autoGenerate();
   });
   
   
   $('#id-manual').on('click', function(){
      autoGenerate();
   });
   
   $('#btn-generate').on('click', function(){
      ajaxGenerate();
   });
   
   
   /* --- VALIDITY --- */
   $('#id-validity').on('change', function(){
      
	  if($('#id-validity option:selected').val() == 2){
         $('#id-row-type').addClass('hidden');
         $('#id-row-amount').addClass('hidden');
	  }else{
         $('#id-row-type').removeClass('hidden');
         $('#id-row-amount').removeClass('hidden');
	  }
	  
   });
   
   if($('#id-validity option:selected').val() == 2){
      $('#id-row-type').addClass('hidden');
      $('#id-row-amount').addClass('hidden');
   }else{
      $('#id-row-type').removeClass('hidden');
      $('#id-row-amount').removeClass('hidden');
   }
   
   
   /* --- TYPE --- */
   $('#id-type').on('change', function(){
	   
      if($('#id-type option:selected').val() == 2){
	     $('#id-label-amount').html('Discount (RP. ) <span>*</span>');
	  }else{
	     $('#id-label-amount').html('Discount (%) <span>*</span>');
	  }
	  
   });
   
   if($('#id-type option:selected').val() == 2){
      $('#id-label-amount').html('Discount (RP. ) <span>*</span>');
   }else{
      $('#id-label-amount').html('Discount (%) <span>*</span>');
   }
   
   
   
   $("input#id-amount").on({
      keydown: function(e) {
	     if (e.which === 32)
		 return false;
	  },
	  change: function() {
	     this.value = this.value.replace(/\s/g, "");
	  }
   });
   
   
   $('input#id-amount').keyup(function(e){
	   
      if (/[a-z]/g.test(this.value)){
	     this.value = this.value.replace(/[a-z]/g, '');
	  }
   });
   
   $('input#id-amount').keyup(function(e){
      var value = $(this).val();
	  
	  if(value > 99){
	     $('#id-type option[value="1"]').attr('disabled', true);
	     $('#id-type option[value="2"]').attr('selected', true);
	  }else{
	  }
	  
   });
   
   var value = $(this).val();
	  
   if(value > 99){
      $('#id-type option[value="2"]').attr('selected', true);
   }else{
   }
   
   
   $('#id-code').keyup(function(e){
      uppercase();
   });
   
   
});
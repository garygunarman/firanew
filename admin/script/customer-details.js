/*
# ----------------------------------------------------------------------
# CUSTOMER - DETAILS: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();



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
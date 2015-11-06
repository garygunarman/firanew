/*
# ----------------------------------------------------------------------
# NEWS: JAVASCRIPT
# ----------------------------------------------------------------------
*/


function changeAction(){
   var action = $('#product-index-action option:selected').val();
   
   if (action == 'delete'){
      $("#product-index-option").addClass('hidden');
	  $("#product-index-conj").addClass('hidden');
   }else{
	  $("#product-index-option").removeClass('hidden');
	  $("#product-index-conj").removeClass('hidden');
   }
   
}


function selectCategoryOption(x){
   var category = $('#category_name_search option[value="'+x+'"]').attr('selected', true);
}


function selectFilter(x){
   
   if(typeof x !== 'undefined'){
      var category = $('#news_visibility_search option[value="'+x+'"]').attr('selected', true);
   }
   
}

$(function() {
   $("#news_created_date_search").datepicker({
      altField:'#news_created_date',
      dateFormat: "yy-mm-dd",
	  onSelect: function () {
	     document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
         searchQueryOption('news_created_date');
      },
   });
});



$(document).ready(function() {
   activeNAvbar('location');
   changeAction();
   $("#tbl_products").tableDnD();
});
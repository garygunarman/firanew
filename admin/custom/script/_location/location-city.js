/*
# ----------------------------------------------------------------------
# NEWS CATEGORY: JAVASCRIPT
# ----------------------------------------------------------------------
*/

$(document).ready(function(e) {
   activeNAvbar('location');
   changeAction();
   $("#id-tbl-category").tableDnD();
});


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
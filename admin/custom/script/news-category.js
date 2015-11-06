/*
# ----------------------------------------------------------------------
# NEWS CATEGORY: JAVASCRIPT
# ----------------------------------------------------------------------
*/

$(window).load(function(e) {
   activeNAvbar('news');
   changeAction();
   $("#id-tbl-category").tableDnD();
   
   var objLoading = {
             		"1": "id-btn-add-category",
					"2": "id-btn-index-news-category"
					};
			 
   $.each(objLoading, function( key, value ){
      $('#'+value).on('click', function(){
	  var $btn	= $('#'+value).button('loading');
		
	  });
	  
   });
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
$(document).ready(function(){
   changeAction();
});
                            
function changeAction(){
   var action_ = document.getElementById('product-index-action').value;
		 	
   if (action_ =='delete'){
      $("#product-index-option").addClass('hidden');
	  $("#product-index-conj").addClass('hidden');
	  $("#product-index-active").addClass('hidden');
   }else if(action_ == 'order'){
      $("#product-index-option").addClass('hidden');
	  $("#product-index-conj").addClass('hidden');
	  $("#product-index-active").addClass('hidden');
   }else if(action_ == 'status'){
      $("#product-index-option").addClass('hidden');
	  $("#product-index-conj").removeClass('hidden');
	  $("#product-index-active").removeClass('hidden');
   }else{
      $("#product-index-option").removeClass('hidden');
      $("#product-index-conj").removeClass('hidden');
   }
}


function activeOptionNav(x){
   $('#id-nav-'+x).addClass('active');
}


function selectedCat(x){
   $('#category_name_search option[value="'+x+'"]').attr('selected', true);
}
/*
# ----------------------------------------------------------------------
# NEWS CATEGORY - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();


function validate(){
   var name             = $('#id-name').val();
   var description      = $('#id-description').val();
   var meta_description = $('#id-meta-description').val();
   var meta_keywords    = $('#id-meta-keyword').val();
   
   
   $('#id-row-name').removeClass('has-error');
   $('#id-row-description').removeClass('has-error');
   $('#id-row-meta-description').removeClass('has-error');
   $('#id-row-meta-keyword').removeClass('has-error');
   
   
   if(name == ''){
      $('#id-row-name').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


$(window).load(function(e) {
   activeNAvbar('article');
   
   $('#btn-alias-submit').on('click', function(){
      validate();
   });
   
   var objLoading = {
             		"1": "btn-alias-submit",
					"2": "btn-add-category-cancel"
					};
			 
   $.each(objLoading, function( key, value ){
      $('#'+value).on('click', function(){
	  var $btn	= $('#'+value).button('loading');
		
	  });
	  
   });
   
});
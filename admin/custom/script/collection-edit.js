/*
# ----------------------------------------------------------------------
# COLLECTION - EDIT: JAVASCRIPT
# ----------------------------------------------------------------------
*/



var base_url = $('#id-global-url').val();


function openBrowser(){
   document.getElementById("id-color-image").click();
}


function readURL(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
	     $('#id-image').removeClass("hidden");
		 $('#id-image').attr('src', e.target.result);
	  }
	  
	  reader.readAsDataURL(input.files[0]);
   }
}


function validation(){
   var name = $('#id-name').val();
   
   $('#id-row-name').removeClass('has-error');
   
   if(name == ''){
      $('#id-row-name').addClass('has-error');
   }else{
	  $('#btn-submit').click();
   }
   
}


$(document).ready(function(e) {
   activeNAvbar('products');
   $('#btn-alias-submit').click(function(){
      validation();
   });
});
/*
# ----------------------------------------------------------------------
# COLOR MANAGER - ADD: JAVASCRIPT
# ----------------------------------------------------------------------
*/

function validation(){
   var name = $('#id-name').val();
   
   $('#id-row-name').removeClass('has-error');
   
   if(name == ''){
      $('#id-row-name').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
   
}


function openBrowser(){
   document.getElementById("color_files").click();
}


function readURL(input) {
      
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
	     $('#upload-image').removeClass("hidden");
		 $('#upload-image').attr('src', e.target.result);
	  }
	  
	  reader.readAsDataURL(input.files[0]);
   }
	  
}

$(document).ready(function(e) {
   
   $('#btn-alias-submit').click(function(){
      validation();
   });
  
   activeNAvbar('products');
});
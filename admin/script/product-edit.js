/*
# ----------------------------------------------------------------------
# PRODUCT - DETAILS: JAVASCRIPT
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();

$(document).ready(function(){
   changeSizeType();
   activeNAvbar('products');
});


function changeColor(i){
   color_id = document.getElementById("color_id_"+i).value;
   document.getElementById("type_name_"+i).value = $("#color_id_"+i+" option[value='"+color_id+"']").text();
}

function getFile(){
   document.getElementById("upfile").click();
}


var browseflag=1;

function openBrowser(i){
							   
   if(browseflag==1){
      document.getElementById("product-"+i+'-image').click();
   }
}


function readURL(input,i) {
							   
   if (input.files && input.files[0]) {
      var reader = new FileReader();var counter = $('.file-insert').size();
	  
	  if(counter >= 20 ){
	     $('html,body').animate({scrollTop:0}, 800);
	     setTimeout(function(){ 
		    $('#id-alert-image').html('<div class="alert alert-danger"><div class="container">Your server only allowing 20 files uploads, please upload 20 first image</div></div>');
		 }, 800);
		 
	  }else{
	  
	     reader.onload = function (e) {
	        $('#upload-image-'+i).removeClass('hidden');
	        $('#upload-image-'+i).attr('src', e.target.result);
		    $('#product-'+i+'-image').removeAttr('disabled');
		    $('#product-'+i+'-image').addClass('file-insert');
		 }
	  
	     reader.readAsDataURL(input.files[0]);
         document.getElementById("image-delete-"+i).value='0';
	  }
   }
}

function deleteOver(){  browseflag=0; }

function deleteOut(){   browseflag=1; }

function imageOver(i){
   var img = $('#product-'+i+'-image').val();
   
   if(typeof(img) !== 'undefined' || img == ''){
      $('#image-'+i+'-delete').removeClass('hidden'); 
   }
   
   $('#product-'+i+'-image').removeAttr('disabled');
   
}

function imageOut(i){    
   $('#image-'+i+'-delete').addClass('hidden');
   
   var img = $('#product-'+i+'-image').val();
   
   if(typeof(img) !== 'undefined' && img != ''){
	  $('#product-'+i+'-image').removeAttr('disabled'); 
   }else{
      $('#product-'+i+'-image').attr('disabled', true); 
   }

}

function deleteImage(i,i_,j_){
   browseflag=0;
   $('#upload-image-'+i).addClass('hidden');
   document.getElementById('product-'+i+'-image-wrap').innerHTML = '<input type="file" name="product_image['+i_+']['+j_+']" id="product-'+i+'-image" onchange="readURL(this,\''+i+'\')" class="hidden"/>';
   document.getElementById("image-delete-"+i).value='1';
   //document.getElementById("product-1-1-image").value="";
   //$("#upload-image-"+i).attr("src","");
   //browseflag=1;
}


function getAlias(trial){
							
   trial = (trial === undefined) ? 0 : trial;
   $('#product_alias').css({"background-image":"url('../files/common/loader.gif')","background-repeat":"no-repeat","background-position":"right"});
   var product_name = document.getElementById("product_name").value;
   var product_id = document.getElementById("product_id").value;
   document.getElementById('page_title').value = product_name;
   product_name = product_name.replace(/[^a-zA-Z0-9\/_|+ -]/g,'');
   product_name = product_name.toLowerCase();
   product_name = product_name.replace(/[\/_|+ -]+/g,'-');
   
   if(trial!=0){
      product_name = product_name + '-' + trial;
   }
   
   var ajq = $.ajax({
                type: "POST",
				url: base_url+"products/add/_ajax/ajax_check_alias.php",
				data: { product_alias: product_name,product_id: product_id },
				error: function(jqXHR, textStatus, errorThrown) {
										//alert('Error: ' + textStatus + ' ' + errorThrown);
				       }
             }).done(function(msg) {
										
			    if(msg=="existed"){
				   trial++;
				   getAlias(trial);
				}else{
				   document.getElementById('product_alias').value=product_name;
				   $('#product_alias').css({"background-image":"","background-repeat":"no-repeat","background-position":"right"});
				}
			 });								
								
}


function forceAlias(trial){
   trial = (trial === undefined) ? 0 : trial;
   $('#product_alias').css({"background-image":"url('../files/common/loader.gif')","background-repeat":"no-repeat","background-position":"right"});
   var product_name = document.getElementById("product_alias").value;
   //document.getElementById('page_title').value = product_name;
   product_name = product_name.replace(/[^a-zA-Z0-9\/_|+ -]/g,'');
   product_name = product_name.toLowerCase();
   product_name = product_name.replace(/[\/_|+ -]+/g,'-');
   
   if(trial!=0){
      product_name = product_name + '-' + trial;
   }
   
   var ajq = $.ajax({
                type: "POST",
				url: base_url+"products/add/_ajax/ajax_check_alias.php",
				data: { product_alias: product_name },
				error: function(jqXHR, textStatus, errorThrown) {
										//alert('Error: ' + textStatus + ' ' + errorThrown);
				       }
             }).done(function(msg) {
			    
				if(msg=="existed"){
				   trial++;
				   forceAlias(trial);
				}else{
				   document.getElementById('product_alias').value=product_name;
				   $('#product_alias').css({"background-image":"","background-repeat":"no-repeat","background-position":"right"});
				}
				
			 });								
								
}


function changeSizeType(i){
   i = (i === undefined) ? 1 : i;
   
   if(document.getElementById("product_stock_list_"+i)!=null){
									
      var size_type_id = document.getElementById("size_type_id").value;
	  var product_alias = document.getElementById("product_alias").value;
	  
	  var ajq = $.ajax({
	               type: "POST",
				   url: base_url+"products/details/_ajax/ajax_size.php",
				   data: { size_type_id:size_type_id, type_order:i, product_alias:product_alias},
				   error: function(jqXHR, textStatus, errorThrown) {
								//alert('Error: ' + textStatus + ' ' + errorThrown);
				          }
	             
				 }).done(function(msg) {
				    document.getElementById('product_stock_list_'+i).innerHTML=msg;
					i++;
					changeSizeType(i);
				 });
   }
}


function deleteType(i){
   document.getElementById('type_delete_'+i).value=1;
   $("#type_group_"+i).css({"overflow":"hidden","min-height":"0"});
   $("#type_group_"+i).animate({"height":0},$("#type_group_1").height());
}


function addVariant(){
   var data = new Array();
   var i = document.getElementById("next_type").innerHTML;
   
   var data = { 
              'price' : document.getElementById("type_price_1").value, 
			  'desc' : document.getElementById("type_description_1").value,
			  'weight' : document.getElementById("type_weight_1").value,
			  'sizefit' :document.getElementById('type_sizefit_1').value
              }
								
   var ajq = $.ajax({
	            type: "POST",
				url: base_url+"products/add/_ajax/ajax_type.php",
				data: { i:i,data:data},
				error: function(jqXHR, textStatus, errorThrown) {
										//alert('Error: ' + textStatus + ' ' + errorThrown);
				       }
             }).done(function(msg) {
			    document.getElementById('field_'+i).innerHTML=msg;
				
				//make visible
				$("#field_"+i).removeClass("hidden");
				
				var height = $("#type_group_1").height();
				$("#type_group_"+i).height(0);
				$("#type_group_"+i).animate({"height":height},$("#type_group_1").height());
				changeSizeType(i);
				
				//change the type
				document.getElementById('next_type').innerHTML = i*1+1;
				//customTypeField(i);
				
			    CKEDITOR.replace('type_description_'+i);
				CKEDITOR.replace('type_sizefit_'+i);
				CKEDITOR.replace('type_information_'+i);
			 });
								
}
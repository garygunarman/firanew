/*
# ----------------------------------------------------------------------
# ORDER - ADD: JAVASCRIPT SSSSS
# ----------------------------------------------------------------------
*/

var base_url = $('#id-global-url').val();
var $root    = $('html, body');


/* --- COUNT CHECKBOX --- */
function checkedCount(){
   var check = $('.table input:checked').size();
   $('#btn-deliver-item').val('Deliver '+check+' item(s)');
}


/* --- START --- */
function userAddOrder(){
   var radio_user = $('#id-box-user input:checked').size();
   
   if(radio_user > 0){
      $('#id-box-user-info').removeClass('hidden');
      //$('#id-box-option').removeClass('hidden');
   }else{
      $('#id-box-user-info').addClass('hidden');
      $('#id-box-option').addClass('hidden');
   }
   
}


function newUser(){
   var $root  = $('html, body');
   $('#id-box-user-info').addClass('hidden');
   
   var ajx   = $.ajax({
                  type: "POST",
				  url: base_url+"custom/orders/_add/_ajax/_new.php",
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
			   }).done(function(data){
			      $('#form-set-billing').html(data);
				  $('#id-box-user-info').removeClass('hidden');
				  $root.animate({
				     scrollTop: $('#form-set-billing').offset().top
				  }, 800);
				  
				  newUserShipping();
				  $('#id-different-billing').attr('checked', true);
				  
				  ajaxProvinceShipping($("option:selected", this));
				  
			   });
			    
}




/*
# ----------------------------------------------------------------------
# SHIPPING: EXISTING INFORMATION
# ----------------------------------------------------------------------
*/

function existingUser(){
   var email  = $('#id-existing-email option:selected').val();
   var $root  = $('html, body');
   
   if(email == '0'){
      $('#form-set-billing').html('');
	  $('#id-box-user-info').addClass('hidden');
   }else{
      var ajx	= $.ajax({
                     type: "POST",
				     url: base_url+"custom/orders/_add/_ajax/_existing.php",
				     data: {email:email},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
			      }).done(function(data){
			         $('#form-set-billing').html(data);
				     $('#id-box-user-info').removeClass('hidden');
					 $('#id-box-option').removeClass('hidden');
				     
					 $root.animate({
				        scrollTop: $('#form-set-billing').offset().top
				     }, 800);
					 
					 $('#id-same-billing').attr('checked', true);
					 existingUserShipping();
					 
					 
					 ajaxProvince($("option:selected", this));
   
			      });
   }
			    
}


/*
# ----------------------------------------------------------------------
# SHIPPING: NEW INFORMATION
# ----------------------------------------------------------------------
*/

function existingUserShipping(){
   var email  = $('#id-existing-email option:selected').val();
   var $root  = $('html, body');
   
   if(email == '0'){
      $('#form-set-billing').html('');
	  $('#id-box-user-info').addClass('hidden');
   }else{
      var ajx	= $.ajax({
                     type: "POST",
				     url: base_url+"custom/orders/_add/_ajax/_existing_shipping.php",
				     data: {email:email},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
							
			      }).done(function(data){
			         $('#form-set-shipping').html(data);
				     $('#id-box-user-info').removeClass('hidden');
					 $('#id-box-option').removeClass('hidden');
					 
					 
					 ajaxProvinceShipping($("option:selected", this));
					 
			      });
   }
			    
}


function newUserShipping(){
   var $root  = $('html, body');
   $('#id-box-user-info').addClass('hidden');
   
   var ajx   = $.ajax({
                  type: "POST",
				  url: base_url+"custom/orders/_add/_ajax/_new-shipping.php",
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
			   }).done(function(data){
			      $('#form-set-shipping').html(data);
				  $('#id-box-user-info').removeClass('hidden');
			   });
			    
}


/* --- MODAL: ADD PRODUCTS --- */
function add_type(){
   var product_id	= $('#id-modal-product :selected').val();
   var $btn 		= $('#btn-alias-product').button('loading');
   
   var ajx   = $.ajax({
                  type: "POST",
				  data: {product_id:product_id},
				  url: base_url+"custom/orders/_add/_ajax/_modal_product.php",
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
                         
			   }).done(function(data){
			      
				  if(product_id != 0){
				     var objField	= {
             	     				  "1": "type",
									  "2": "stock",
									  "3": "qty"
									  };
				  
				     $.each(objField, function( key, value ){
				        $('#id-row-modal-'+value).removeClass('hidden');
					 });
					 
				  }else{
				     var objField	= {
             	     				  "1": "type",
									  "2": "stock",
									  "3": "qty"
									  };
				  
				     $.each(objField, function( key, value ){
				        $('#id-row-modal-'+value).addClass('hidden');
					 });
					 
				  }
				  
				  $('#id-row-modal-type').html('');
				  $('#id-row-modal-type').html(data);
			      
				  add_stock();
				  $btn.button('reset');
					 
			   });
}


function add_stock(){
   var type_id	= $('#id-modal-type option:selected').val();
   var $btn		= $('#btn-alias-product').button('loading');
   
   var ajx   = $.ajax({
                  type: "POST",
				  data: {type_id:type_id},
				  url: base_url+"custom/orders/_add/_ajax/_modal_stock.php",
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
			   }).done(function(data){
				  $('#id-row-modal-stock').html('');
			      $('#id-row-modal-stock').html(data);
				  
				  $('#id-modal-stock').trigger('change');
					 
			      $btn.button('reset');
			   });
}


function qtyLimit(){
   var limit = $('#id-modal-stock option:selected').attr('data-total');
   var qty   = $('#id-modal-qty').val();
   
   $('#id-row-modal-qty').removeClass('has-error');
   $('#id-modal-qty-alert').html('');
   $('#id-modal-qty-alert').addClass('hidden');
   
   if(qty > limit && $.isNumeric(qty)){
      $('#id-row-modal-qty').addClass('has-error');
	  $('#id-modal-qty-alert').html('<p class="control-label">Item only available: '+limit+'</p>');
	  $('#id-modal-qty-alert').removeClass('hidden');
   }else if(qty == ''){
      $('#id-row-modal-qty').addClass('has-error');
	  $('#id-modal-qty-alert').html('<p class="control-label">Required</p>');
	  $('#id-modal-qty-alert').removeClass('hidden');
   }else if(!$.isNumeric(qty)){
      $('#id-row-modal-qty').addClass('has-error');
	  $('#id-modal-qty-alert').html('<p class="control-label">Only number</p>');
	  $('#id-modal-qty-alert').removeClass('hidden');
   }
   
}


function validateAddProduct(){
   var product = $('#id-modal-product option:selected').val();
   var type    = $('#id-modal-type option:selected').val();
   var stock   = $('#id-modal-stock option:selected').val();
   var qty     = $('#id-modal-qty').val();
   
   $('#id-row-modal-product').removeClass('has-error');
   $('#id-row-modal-type').removeClass('has-error');
   $('#id-row-modal-stock').removeClass('has-error');
   $('#id-row-modal-qty').removeClass('has-error');
   
   if(product == 0){
      $('#id-row-modal-product').addClass('has-error');
   }else if(type == 0){
      $('#id-row-modal-type').addClass('has-error');
   }else if(stock == 0){
      $('#id-row-modal-stock').addClass('has-error');
   }else if(qty == 0){
      $('#id-row-modal-qty').addClass('has-error');
   }else{
      addBag();
   }
   
}


/* --- UPDATE CART --- */
function updateVisibility(i, value){
   var qty = $('#id-cart-qty-'+i).val();
   
   if(qty > 0){
	     
      if(qty != value){
	     $('#id-label-update-'+i).removeClass('hidden');
	  }else{
	     $('#id-label-update-'+i).addClass('hidden');
	  }
		 
   }else{
	   
   }
}


function updateVisibilityAjax(){
   $('.form-control.text-center.custom-qty').each(function(index){
						    
      $(this).on('keyup', function(){
	     var value = $('#id-hidden-qty-'+index).val();
		 var qty   = $(this).val();
							   
	     //alert('Index: '+index+' Value: '+value+' Current: '+$(this).val());
							   
	     if(qty > 0){
	     
		    if(qty != value){
			   $('#id-label-update-'+index).removeClass('hidden');
			}else{
			   $('#id-label-update-'+index).addClass('hidden');
			}
		 
		 }else{
	   
		 }
							   
	  });
							
   });
}


function ajaxProvince(user_country){
   if(user_country == '' || typeof user_country === 'undefined'){
      //$('#id-country option[value="Indonesia"]').attr('selected', true);
   }else{
      $('#id-country option[value="'+user_country+'"]').prop('selected', true);
   }
   
   var country	= $('#id-billing-country option:selected').val();
   var email	= $('#id-existing-email option:selected').val();
   
   if(country === 'Indonesia'){
   
      var ajx	= $.ajax({
	                 type	: "POST",
				     url	: base_url+"custom/orders/_add/_ajax/_province.php",
				     data	: {country:country, email:email},
				     error	: function(jqXHR, textStatus, errorThrown) {
					   
					          }
							  
			      }).done(function(data) {	
				     $('#id-ajax-loader-province').html(data);
				     ajaxCity();
				  }); 
				  
   }else{
      $('#id-ajax-loader-province').html('<input type="text" name="billing-province" class="form-control input-sm w50" id="id-row-billing-province">');
	  ajaxCity();
	  //ajaxCourier();
   }
   
}



function ajaxProvinceShipping(user_country){
   if(user_country == '' || typeof user_country === 'undefined'){
      //$('#id-country option[value="Indonesia"]').attr('selected', true);
   }else{
      $('#id-shipping-country option[value="'+user_country+'"]').prop('selected', true);
   }
   
   var country	= $('#id-shipping-country option:selected').val();
   var email	= $('#id-existing-email option:selected').val();
   
   if(country === 'Indonesia'){
   
      var ajx	= $.ajax({
	                 type	: "POST",
				     url	: base_url+"custom/orders/_add/_ajax/_province-shipping.php",
				     data	: {country:country, email:email},
				     error	: function(jqXHR, textStatus, errorThrown) {
					   
					          }
							  
			      }).done(function(data){	
				     $('#id-ajax-loader-shipping-province').html(data);
					 ajaxCityShipping();
					 
				  }); 
				  
   }else{
      $('#id-ajax-loader-shipping-province').html('<input type="text" name="shipping-province" class="form-control input-sm w50" id="id-shipping-province">');
	  ajaxCityShipping();
	  ajaxCourier();
   }
   
}


function ajaxCity(){
   var country	= $('#id-billing-country option:selected').val();
   var email	= $('#id-existing-email option:selected').val();
   
   if(country == 'Indonesia'){
      var province = $('#id-billing-province option:selected').val();
   
      var ajx   = $.ajax({
	                 type: "POST",
				     url: base_url+"custom/orders/_add/_ajax/_city.php",
				     data: {province:province, email:email},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
			      }).done(function(data){	
			         $('#id-ajax-loader-city').html(data);
				     //ajaxCourier();
				  }); 
   }else{
      $('#id-ajax-loader-city').html('<input type="text" name="billing-city" class="form-control input-sm w50" id="id-billing-city">');
	  //ajaxCourier();
   }
   
}


function ajaxCityShipping(){
   var country	= $('#id-shipping-country option:selected').val();
   var email	= $('#id-existing-email option:selected').val();
   
   if(country == 'Indonesia'){
      var province = $('#id-shipping-province option:selected').val();
   
      var ajx   = $.ajax({
	                 type: "POST",
				     url: base_url+"custom/orders/_add/_ajax/_city-shipping.php",
				     data: {province:province, email:email},
				     error: function(jqXHR, textStatus, errorThrown) {
					   
					        }
							
			      }).done(function(data){
			         $('#id-ajax-loader-shipping-city').html(data);
				     ajaxCourier();
					 
				  }); 
				  
   }else{
      $('#id-ajax-loader-shipping-city').html('<input type="text" name="shipping-city" class="form-control input-sm w50" id="id-shipping-city">');
	  //ajaxCourier();
	  
   }
   
}


function ajaxCourier(){
   var country = $('#id-shipping-country option:selected').val();
   var city    = $('#id-shipping-city option:selected').val();
   
   if(typeof city === 'undefined'){
      city = 'none';
   }else{
      city = city;
   }
	  
   var ajx   = $.ajax({
	              type: "POST",
				  url: base_url+"custom/orders/_add/_ajax/_courier.php",
				  data: {country:country,city:city},
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
			   }).done(function(data) {	
			      $('#id-ajax-loader-shipping-courier').html(data);
				  
				  //setCountry();
				  //setRate();
			   });  
   
}


function ajaxShipping(){
   var country = $('#id-shipping-country option:selected').val();
   var city    = $('#id-shipping-city option:selected').val();
   
   if(typeof city === 'undefined'){
      city = 'none';
   }else{
      city = city;
   }
	  
   var ajx   = $.ajax({
	              type: "POST",
				  url: base_url+"custom/orders/_add/_ajax/_courier.php",
				  data: {country:country,city:city},
				  error: function(jqXHR, textStatus, errorThrown) {
					   
					     }
						 
			   }).done(function(data) {	
			      $('#id-ajax-loader-shipping-courier').html(data);
				  
				  //setCountry();
				  //setRate();
				  
			   });  
   
}


/*
# ----------------------------------------------------------------------
# ACTION: ADD
# ----------------------------------------------------------------------
*/

function addBag(){
   var type_id	= $('#id-modal-type option:selected').val();
   var stock_id	= $('#id-modal-stock option:selected').val();
   var qty		= $('#id-modal-qty').val();
   var $btn		= $('#btn-alias-product').button('loading');
   var i		= $('.tr-item-type').size();
   
   if(type_id != '' && stock_id != '' && qty != ''){
   
      var ajx	= $.ajax({
                     type: "POST",
					 url: base_url+"custom/orders/_add/_ajax/_modal_add.php",
					 data: {type_id:type_id, stock_id:stock_id, qty:qty},
					 error: function(jqXHR, textStatus, errorThrown) {
						        
							}
							 
	  			  }).done(function(data){	
				     $('#ajax-tbody-loader').remove();
					 $('#ajax-tfoot-loader').remove();
					 $('table.table thead').after(data);
					 $('#id-row-no-item').addClass('hidden');
					 $btn.button('reset');
					 $('#shipping-order').modal('hide');
						 
						 
				     /* --- SHOW/ HIDE UPDATE --- */
					 $('.custom-qty').each(function(){
					    $(this).on('keyup', function(){
						   var value	= $(this).attr('data-key-cart');
						   var qty		= $(this).val();
						   var cart		= $(this).attr('data-qty-cart');
						   var stored	= $(this).attr('data-qty-stored');
		 
						   if(qty != ''){
						      if(qty >= 0 && stored > 0 && (stored - qty) >= 0){
							     if(qty === '0'){
								    $('#id-label-update-'+value).addClass('hidden');
				  
								 }else if(qty === stored && qty === cart){
								    $('#id-label-update-'+value).addClass('hidden');
				  
								 }else if(qty === cart){
								    $('#id-label-update-'+value).addClass('hidden');
			
								 }else{
								    $('#id-label-update-'+value).removeClass('hidden');
				  
								 }
		 
							  }else if(qty > stored){
							     $('#bag-alert').addClass('slideInDown');
							     $('#bag-alert').removeClass('hidden');
							     $('#bag-alert').html('<div class="alert alert-danger">Remaining stock: '+stored+'pcs(s)</div>');
							     $('#id-label-update-'+value).addClass('hidden');
							     $(this).blur();
							     $(this).val(stored);
							     setTimeout(function(){
								    $('#bag-alert').addClass('hidden');
				  
								 }, 3000);
			
							  }else{
			
							  }
			
						   }
							   
						});
							
					 });
					 
					 
					 /* --- EXECUTE UPDATE --- */
					 $('.btn-bag-update').each(function(key, value){
					    $(this).on('click', function(){
						   var row = $(this).attr('data-row-id');
						   updateCart(row);
						})
					 });
						 
						 
				     /* --- START: REMOVE CART --- */
					 $('.btn-bag-remove').each(function(key, value){
					    $(this).on('click', function(){
						   var row = $(this).attr('data-row-id');
						   removeCart(row);
						})
					 });
						 
				  });
					  
   }else{
      
   }
   
}


/*
# ----------------------------------------------------------------------
# ACTION: UPDATE
# ----------------------------------------------------------------------
*/

function updateCart(x){
   var key     	= x;
   var qty     	= $('#id-cart-qty-'+x).val();
   var type_id	= $('tr#row_'+x).attr('data-type-id');
   var stock_id	= $('tr#row_'+x).attr('data-stock-id');
   var numeric 	= /^[0-9]+$/;
   var $btn    	= $('#id-btn-alias-add-product').button('loading');
   
   if(typeof x === 'undefined'){
      $('#bag_alert').removeClass('hidden');
	  $('#bag_alert').removeClass('alert-success');
      $('#bag_alert').addClass('alert-danger');
      $('#error_message').text('Please provide information');
      
	  $btn.button('reset');
   }else if(qty == 0){
      
   }else{
   
      $.ajax({
         type : "POST",
	     url  : base_url+"custom/orders/_add/_ajax/_modal_edit.php",
	     data : {type_id:type_id, stock_id:stock_id, key:key, qty:qty},
	     error: function(jqXHR, textStatus, errorThrown) {
	            
			    }
			 
      }).done(function(msg){
	     var result	= msg.substring(msg, 32);
	     if(result === '<div class="alert alert-danger">'){
	        $('#bag-alert').removeClass('hidden');
		    $('#bag-alert').html(msg);
			$('#id-cart-qty-'+x).val($('#id-hidden-qty-'+x).val());
			$('#id-label-update-'+x).addClass('hidden');
			
	     }else{
	        $('#bag-alert').removeClass('hidden');
	        $('#bag-alert').html('<div class="alert alert-success">Success update quantity!</div>');
			$('#id-label-update-'+x).addClass('hidden');
		 
		    //updatePrice(x);
		    $('#id_btn_update_'+x).addClass("hidden");	
		    $('#ajax-tbody-loader').remove();
			$('#ajax-tfoot-loader').remove();
			$('table.table thead').after(msg);
			
			
			/* --- SHOW/ HIDE UPDATE --- */
			$('.custom-qty').each(function(){
			   $(this).on('keyup', function(){
			      var value		= $(this).attr('data-key-cart');
			      var qty		= $(this).val();
			      var cart		= $(this).attr('data-qty-cart');
			      var stored	= $(this).attr('data-qty-stored');
		 
			      if(qty != ''){
				     if(qty >= 0 && stored > 0 && (stored - qty) >= 0){
					    if(qty === '0'){
						   $('#id-label-update-'+value).addClass('hidden');
				  
						}else if(qty === stored && qty === cart){
						   $('#id-label-update-'+value).addClass('hidden');
				  
						}else if(qty === cart){
						   $('#id-label-update-'+value).addClass('hidden');
			
						}else{
						   $('#id-label-update-'+value).removeClass('hidden');
				  
						}
		 
					 }else if(qty > stored){
					    $('#bag-alert').addClass('slideInDown');
					    $('#bag-alert').removeClass('hidden');
					    $('#bag-alert').html('<div class="alert alert-danger">Remaining stock: '+stored+'pcs(s)</div>');
					    $('#id-label-update-'+value).addClass('hidden');
					    $(this).blur();
					    $(this).val(stored);
					    setTimeout(function(){
						   $('#bag-alert').addClass('hidden');
				  
						}, 3000);
			
					 }else{
			
					 }
			
				  }
							   
			   });
							
			});
					 
					 
		    $('.btn-bag-update').each(function(key, value){
			   $(this).on('click', function(){
			      var row = $(this).attr('data-row-id');
			      updateCart(row);
			   })
			});
			
			
			/* --- START: REMOVE CART --- */
			$('.btn-bag-remove').each(function(key, value){
			   $(this).on('click', function(){
			      var row = $(this).attr('data-row-id');
			      removeCart(row);
			   })
			});
			
	     }
	  
	     $btn.button('reset');
	  
      });
   }
}


/*
# ----------------------------------------------------------------------
# ACTION: REMOVE
# ----------------------------------------------------------------------
*/

function removeCart(x){
   $('#row_'+x).addClass('hidden');
   var key	= x;
   var $btn	= $('#id-btn-alias-add-product').button('loading');
   $.ajax({
      type : "POST",
	  url  : base_url+"custom/orders/_add/_ajax/_modal_remove.php",
	  data : {key:key},
	  error: function(jqXHR, textStatus, errorThrown) {
	            
			 }
			 
   }).done(function(msg){
      $('#ajax-tbody-loader').remove();
	  $('#ajax-tfoot-loader').remove();
	  $('table.table thead').after(msg);
      $('#row_'+x).remove();
	  $btn.button('reset');
	  
	  //msg
	  
	  if(msg == 0){
	     $('#id-row-noitem').removeClass('hidden');
	  }
	  
	  
	  /* --- START: UPDATE QTY --- */
	  $('.custom-qty').each(function(){
	     $(this).on('keyup', function(){
		    var value	= $(this).attr('data-key-cart');
			var qty		= $(this).val();
			var cart	= $(this).attr('data-qty-cart');
			var stored	= $(this).attr('data-qty-stored');
		 
		    if(qty != ''){
			   if(qty >= 0 && stored > 0 && (stored - qty) >= 0){
			      if(qty === '0'){
				     $('#id-label-update-'+value).addClass('hidden');
				  
				  }else if(qty === stored && qty === cart){
				     $('#id-label-update-'+value).addClass('hidden');
				  
				  }else if(qty === cart){
				     $('#id-label-update-'+value).addClass('hidden');
			
				  }else{
				     $('#id-label-update-'+value).removeClass('hidden');
				  
				  }
		 
			   }else if(qty > stored){
			      $('#bag-alert').addClass('slideInDown');
			      $('#bag-alert').removeClass('hidden');
			      $('#bag-alert').html('<div class="alert alert-danger">Remaining stock: '+stored+'pcs(s)</div>');
			      $('#id-label-update-'+value).addClass('hidden');
			      $(this).blur();
			      $(this).val(stored);
			      setTimeout(function(){
				     $('#bag-alert').addClass('hidden');
				  
				  }, 3000);
			
			   }else{
			
			   }
			
			}
							   
		 });
							
	  });
					 
      $('.btn-bag-update').each(function(key, value){
	     $(this).on('click', function(){
		    var row = $(this).attr('data-row-id');
			updateCart(row);
		 });
	  });
			
			
      /* --- START: REMOVE CART --- */
	  $('.btn-bag-remove').each(function(key, value){
	     $(this).on('click', function(){
		    var row = $(this).attr('data-row-id');
		    removeCart(row);
		 });
	  });
	  
   });
}


/*
# ----------------------------------------------------------------------
# CALL: READY
# ----------------------------------------------------------------------
*/

$(document).ready(function(e) {
   
   /* --- START: USER OPTION --- */
   $('#id-user-existing').on('click', function(){
      $('#id-row-existing-email').removeClass('hidden');
      
	  var $root  = $('html, body');
	  $('#id-box-user-info').addClass('hidden');
	  $('#id-box-option').addClass('hidden');
   
      $root.animate({
         scrollTop: $('#id-box-user').offset().top
	  }, 800);
   
   });
   
   
   /* --- START: BILLING INFORMATION --- */
   $('#id-existing-email').change(function(){
      existingUser();
	  $("#id-box-user").trigger("chosen:updated");
   });
   
   
   $('#id-user-new').on('click', function(){
      $('#id-row-existing-email').addClass('hidden');
      $('#id-box-option').addClass('hidden');
	  $('#id-existing-email option[value="0"]').attr('selected', true);
	  
      newUser();
   });
   
   
   /* --- START: SHIPPING INFORMATION --- */
   $('#id-same-billing').on('click', function(){
      existingUserShipping();
   });
   
   
   $('#id-different-billing').on('click', function(){
      newUserShipping();
   });
   
   
   /* --- MODAL --- */
   $('#id-modal-product').change(function(){
      add_type();
   });
   
   
   $('#id-modal-qty').on('keyup', function(){
      qtyLimit();
   });
   
   
   $('#btn-alias-product').on('click', function(){
      validateAddProduct();
   });
   
   
   $(".modal").on("hidden.bs.modal", function(){
      $('#id-modal-product option[value="0"]').prop('selected', true);
	  $('#id-modal-product option[value="0"]').trigger('change');
	  $('#id-modal-qty').val('');
	  $('#id-modal-qty-alert').addClass('hidden');
	  add_type();
	  $('#id-modal-product').trigger("chosen:updated");
   });
   
   
   $('#btn-product').on('click', function(){
      addBag();
   });
   
   
   /* --- TRIGGER UPDATE --- */
   $('.custom-qty').each(function(){
      $(this).on('keyup', function(){
	     var value	= $(this).attr('data-key-cart');
		 var qty	= $(this).val();
		 var cart	= $(this).attr('data-qty-cart');
		 var stored	= $(this).attr('data-qty-stored');
		 
		 if(qty != ''){
	        if(qty >= 0 && stored > 0 && (stored - qty) >= 0){
		       if(qty === '0'){
			      $('#id-label-update-'+value).addClass('hidden');
				  
			   }else if(qty === stored && qty === cart){
			      $('#id-label-update-'+value).addClass('hidden');
				  
			   }else if(qty === cart){
			      $('#id-label-update-'+value).addClass('hidden');
			
			   }else{
			      $('#id-label-update-'+value).removeClass('hidden');
				  
			   }
		 
			}else if(qty > stored){
		       $('#bag-alert').addClass('slideInDown');
		       $('#bag-alert').removeClass('hidden');
			   $('#bag-alert').html('<div class="alert alert-danger">Remaining stock: '+stored+'pcs(s)</div>');
			   $('#id-label-update-'+value).addClass('hidden');
			   $(this).blur();
			   $(this).val(stored);
			   setTimeout(function(){
			      $('#bag-alert').addClass('hidden');
				  
			   }, 3000);
			
			}else{
			
			}
			
		 }
							   
	  });
							
   });
   
   
   /* --- EXECUTE UPDATE --- */
   $('.btn-bag-update').each(function(key, value){
      $(this).on('click', function(){
	     var row = $(this).attr('data-row-id');
	     updateCart(row);
	  });
   });
   
   
   /* --- REMOVE --- */
   $('.btn-bag-remove').each(function(key, value){
      $(this).on('click', function(){
	     var row = $(this).attr('data-row-id');
	     removeCart(row);
	  });
   });
   
   
   $('#id-payment-method').change(function(){
      var method = $('#id-payment-method :selected').val();
	  
	  if(method === '3'){
	     $('#id-row-doku-channel').removeClass('hidden');
	  }else{
	     $('#id-row-doku-channel').addClass('hidden');
	  }
	  
   });
   
   
});


/*
# ----------------------------------------------------------------------
# CALL: AFTER AJAX REQUEST
# ----------------------------------------------------------------------
*/

$( document ).ajaxComplete(function(){
   /*
   # ----------------------------------------------------------------------
   # PRODUCT
   # ----------------------------------------------------------------------
   */
   
   /* --- START: USER OPTION --- */
   $('#id-user-existing').on('click', function(){
      $('#id-row-existing-email').removeClass('hidden');
      
	  var $root  = $('html, body');
	  $('#id-box-user-info').addClass('hidden');
	  $('#id-box-option').addClass('hidden');
   
      $root.animate({
         scrollTop: $('#id-box-user').offset().top
	  }, 800);
   
   });
   
   
   /* --- START: BILLING INFORMATION --- */
   $('#id-existing-email').change(function(){
      existingUser();
	  $("#id-box-user").trigger("chosen:updated");
   });
   
   
   $('#id-user-new').on('click', function(){
      $('#id-row-existing-email').addClass('hidden');
      $('#id-box-option').addClass('hidden');
	  $('#id-existing-email option[value="0"]').attr('selected', true);
	  
      newUser();
   });
   
   
   /* --- START: SHIPPING INFORMATION --- */
   $('#id-same-billing').on('click', function(){
      existingUserShipping();
   });
   
   
   $('#id-different-billing').on('click', function(){
      newUserShipping();
   });
   
   
   /* --- MODAL --- */
   $('#id-modal-product').change(function(){
      add_type();
   });
   
   
   $('#id-modal-qty').on('keyup', function(){
      qtyLimit();
   });
   
   
   $('#btn-alias-product').on('click', function(){
      //validateAddProduct();
   });
   
   
   $(".modal").on("hidden.bs.modal", function(){
      $('#id-modal-product option[value="0"]').prop('selected', true);
	  $('#id-modal-product option[value="0"]').trigger('change');
	  $('#id-modal-qty').val('');
	  $('#id-modal-qty-alert').addClass('hidden');
	  add_type();
	  $('#id-modal-product').trigger("chosen:updated");
   });
   
   
   $('#btn-product').on('click', function(){
      addBag();
   });
   
   
   /* --- TRIGGER UPDATE --- */
   $('.custom-qty').each(function(){
      $(this).on('keyup', function(){
	     var value	= $(this).attr('data-key-cart');
		 var qty	= $(this).val();
		 var cart	= $(this).attr('data-qty-cart');
		 var stored	= $(this).attr('data-qty-stored');
		 
		 if(qty != ''){
	        if(qty >= 0 && stored > 0 && (stored - qty) >= 0){
		       if(qty === '0'){
			      $('#id-label-update-'+value).addClass('hidden');
				  
			   }else if(qty === stored && qty === cart){
			      $('#id-label-update-'+value).addClass('hidden');
				  
			   }else if(qty === cart){
			      $('#id-label-update-'+value).addClass('hidden');
			
			   }else{
			      $('#id-label-update-'+value).removeClass('hidden');
				  
			   }
		 
			}else if(qty > stored){
		       $('#bag-alert').addClass('slideInDown');
		       $('#bag-alert').removeClass('hidden');
			   $('#bag-alert').html('<div class="alert alert-danger">Remaining stock: '+stored+'pcs(s)</div>');
			   $('#id-label-update-'+value).addClass('hidden');
			   $(this).blur();
			   $(this).val(stored);
			   setTimeout(function(){
			      $('#bag-alert').addClass('hidden');
				  
			   }, 3000);
			
			}else{
			
			}
			
		 }
							   
	  });
							
   });
   
   
   /* --- EXECUTE UPDATE --- */
   $('.btn-bag-update').each(function(key, value){
      $(this).on('click', function(){
	     var row = $(this).attr('data-row-id');
	     updateCart(row);
	  });
   });
   
   
   /* --- REMOVE --- */
   $('.btn-bag-remove').each(function(key, value){
      $(this).on('click', function(){
	     var row = $(this).attr('data-row-id');
	     removeCart(row);
	  });
   });
   
   
   $('#id-modal-type').change(function(){
      add_stock();
   });
   
   
   $('#id-modal-stock').change(function(){
      var total = $('#id-modal-stock option:selected').attr('data-total');
      $('#id-modal-hidden-total-qty').val(total);
	  $('#id-modal-qty').val('1');
	  qtyLimit();
   });
   
   
   /*
   # ----------------------------------------------------------------------
   # CUSTOMER
   # ----------------------------------------------------------------------
   */
   
   /* --- BILLING --- */
   
   $('#id-billing-country').change(function(){
      ajaxProvince($("option:selected", this));
   });
   
   $('#id-billing-province').change(function(){
      ajaxCity();
   });
   
   
   /* --- SHIPPING --- */
   $('#id-shipping-country').change(function(){
      ajaxProvinceShipping($(this).val());
   });
   
   $('#id-shipping-province').change(function(){
      ajaxCityShipping();
   });
   
   $('#id-shipping-city').change(function(){
      ajaxCourier();
   });
   
   $('#id-shipping-courier').change(function(){
      var $shipping = $('#id-row-shipping');
	  $shipping.removeClass('hidden');
	  $('#id-row-shipping-rate').text($('#id-shipping-courier :selected').attr('data-view-rate'));
	  $('#id-total-shipping').val($('#id-shipping-courier :selected').attr('data-rate'));
   });
   
});
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK: JAVASCRIPT
# ----------------------------------------------------------------------
*/


$(document).ready(function(e) {
   activeNAvbar('settings');
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


$(window).load(function(e){
   
   /*
   * ----------------------------------------------------------------------
   * PAGE OPTION
   * ----------------------------------------------------------------------
   */
   
   $('#page-option').change(function(){
      pageOption();
   });
   
   $('#query_per_page_input').change(function(){
      changeQueryPerPage();
   });
   
   $('#product-index-action').change(function(){
      changeAction();
   });
   
   $('#select_all').on('click', function(){
      selectAllToggle();
   });
   
   
   /*
   * ----------------------------------------------------------------------
   * SORT BY
   * ----------------------------------------------------------------------
   */
   
   /* --- BANK NAME --- */
   $('#id-sort-bank_name').on('click', function(){
      sortBy('bank_name');
   });
   
   /* --- VISIBILITY --- */
   $('#id-sort-bank_visibility').on('click', function(){
      sortBy('bank_visibility');
   });
   
   
   /*
   * ----------------------------------------------------------------------
   * SERACH BY
   * ----------------------------------------------------------------------
   */
   
   /* --- BANK NAME --- */
   $('#bank_name_search').keyup(function(){
      searchQuery('bank_name');
   });
   
   $('#bank_name_search').keypress(function(event){
      return disableEnterKey(event);
   });
   
   
   /* --- VISIBILITY --- */
   $('#bank_visibility_search').change(function(){
      searchQueryOption('bank_visibility');
   });
   
   
   $('.custom-checkbox-row').each(function(index, element) {
      $(this).on('click', function(e){
	     var key = index + 1;
	     selectRowCheck(key);
	  });
	  
	  $(this).mouseover(function(e){
	     downCheck();
	  });
	  
	  $(this).mouseout(function(e){
	     upCheck();
	  });
   });
   
   
   $('.custom-tr-row').each(function(index, element) {
      var key = index + 1;
      
	  $(this).on('click', function(e){
		  selectRow(key);
	  });
   
   });
   
   
   /* --- REMOVES DISABLED --- */
   $('#page-option').attr('disabled', false);
   $('#query_per_page_input').attr('disabled', false);
   $('#product-index-action').attr('disabled', false);
   $('#category_name_search').attr('disabled', false);
   
   $('#account_name_search').attr('disabled', false);
   $('#bank_name_search').attr('disabled', false);
   $('#currency_search').attr('disabled', false);
   $('#account_number_search').attr('disabled', false);
   //$('#total_order_search').attr('disabled', false);
   $('#visibility_search').attr('disabled', false);
   
   var $btn = $('input[type="submit"][name="btn-index-bank"]').button('loading');
   $btn.button('reset');
   $('input[type="submit"][name="btn-index-bank"]').val('GO');
   
});


/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT (ADD): JAVASCRIPT
# ----------------------------------------------------------------------
*/


function validateAddAcc(){
   var bank    = $('#id-bank option:selected').val();
   var name    = $('#id-name').val();
   var account = $('#id-number').val();
   
   $('#id-row-bank').removeClass('has-error');
   $('#id-row-name').removeClass('has-error');
   $('#id-row-number').removeClass('has-error');
   
   if(name === ""){
      $('#id-row-name').addClass('has-error');
   }if(bank === 0){
      $('#id-row-bank').addClass('has-error');
   }if(account === 0){
      $('#id-row-number').addClass('has-error');
   }else{
      $('#btn-submit').click();
   }
}


function readURL(input,i) {
                                  
   if (input.files && input.files[0]) {
      var reader = new FileReader();
	  reader.onload = function (e) {
	     $("#upload-news-"+i).removeClass("hidden");
	     $("#upload-news-"+i).attr('src', e.target.result);
	  }
                            		 
      reader.readAsDataURL(input.files[0]);
	  
   }
                            	  
}


function openBrowser(i){
   document.getElementById("news-"+i).click();
}


function removeButton(i){
   var image = $('#news-'+i).val();
   
   if(image != ''){
      $("#btn-slider-"+i).removeClass("hidden");
      $("#btn-slider-"+i).fadeIn("slow");
      $("#btn-news-"+i).attr('style','z-index:1000; position:absolute');
                            	  
      $("#newer-"+i).mouseleave(function(){
         $("#btn-slider-"+i).fadeOut("fast");
	  });
   }
}


function clearImage(i){		   
   $('#img_replacer').html('<input type="file" name="upload_news_'+i+'" id="news-'+i+'" onchange="readURL(this,'+i+')" class="hidden"/>');
   $("#upload-news-"+i).attr('src', '');
   $("#upload-news-"+i).addClass('hidden');
   $("#btn-slider-"+i).fadeOut("fast");
}


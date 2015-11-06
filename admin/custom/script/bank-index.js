/*
# ----------------------------------------------------------------------
# BANK: JAVASCRIPT
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
   activeNAvbar('settings');
   changeAction();
});


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
   
   $('#category_name_search').change(function(e){
      selectCategory();
   });
   
   
   /*
   * ----------------------------------------------------------------------
   * SORT BY
   * ----------------------------------------------------------------------
   */
   
   /* --- ACCOUNT NAME --- */
   $('#id-sort-account_name').on('click', function(){
      sortBy('account_name');
   });
   
   /* --- BANK NAME --- */
   $('#id-sort-bank_name').on('click', function(){
      sortBy('bank_name');
   });
   
   /* --- CURRENCY --- */
   $('#id-sort-currency').on('click', function(){
      sortBy('currency');
   });
   
   /* --- ACCOUNT NUMBER --- */
   $('#id-sort-account_number').on('click', function(){
      sortBy('account_number');
   });
   
   /* --- TOTAL ORDER --- */
   $('#id-sort-total_order').on('click', function(){
      sortBy('total_order');
   });
   
   /* --- VISIBILITY --- */
   $('#id-sort-visibility').on('click', function(){
      sortBy('visibility');
   });
   
   
   /*
   * ----------------------------------------------------------------------
   * SERACH BY
   * ----------------------------------------------------------------------
   */
   
   
   /* --- ACCOUNT NAME --- */
   $('#account_name_search').keyup(function(){
      searchQuery('account_name');
   });
   
   $('#account_name_search').keypress(function(event){
      return disableEnterKey(event);
   });
   
   /* --- BANK NAME --- */
   $('#bank_name_search').change(function(){
      searchQueryOption('bank_name');
   });
   
   
   /* --- CURRENCY --- */
   $('#currency_search').change(function(){
      searchQueryOption('currency');
   });
   
   
   /* --- ACCOUNT NUMBER --- */
   $('#account_number_search').keyup(function(){
      searchQuery('account_number');
   });
   
   $('#account_number_search').keypress(function(event){
      return disableEnterKey(event);
   });
   
   
   /* --- TOTAL ORDER --- */
   $('#total_order_search').keyup(function(){
      searchQuery('total_order');
   });
   
   $('#total_order_search').keypress(function(event){
      return disableEnterKey(event);
   });
   
   
   /* --- VISIBILITY --- */
   $('#visibility_search').change(function(){
      searchQueryOption('visibility');
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
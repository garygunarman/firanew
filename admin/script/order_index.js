$(function(){
   $("#order_date_search").datepicker({
      altField:'#order_date_search',
	  altFormat: "yy/mm/dd",
	  onSelect: function () {
	     document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
         searchQueryOption('order_date');
      },
   });
});


function changeOption(){
   var action = $('#news-action option:selected').val();
   
   if(action == "delete" || action == ""){
      $('#news-option').addClass("hidden");
	  $('#lbl-news-option').addClass("hidden");
	  $('#news-option').prop('disabled', true);
   }else if(action == "change"){
	  $('#news-option').removeClass("hidden");
	  $('#lbl-news-option').removeClass("hidden");
	  $('#news-option').prop('disabled', false);
   }
   
}


/* --- UNCHECKABLE IF EXPIRED OR CANCEL --- */
function uncheckable(value, param, id){
   
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
   
   $('#news-action').change(function(){
      changeOption();
   });
   
   $('#select_all').on('click', function(){
      selectAllToggle();
   });
   
   
   /*
   * ----------------------------------------------------------------------
   * SORT BY
   * ----------------------------------------------------------------------
   */
   
   var objSort	= {
             	  "1-select": "order_number",
				  "2-select": "order_date",
				  "3-select": "order_billing_fullname",
				  "4-string": "order_confirm_bank",
				  "5-string": "order_total_amount",
				  "6-string": "payment_status",
				  "7-select": "fulfillment_status"
				  };
			 
   $.each(objSort, function( key, value ){
      $('#id-sort-'+value).on('click', function(){
	     sortBy(value);
	  });
   });
   
   
   /*
   * ----------------------------------------------------------------------
   * SERACH BY
   * ----------------------------------------------------------------------
   */
   
   var objSearch	= {
             	  	  "1-string": "order_number",
					  "2-string": "order_date",
					  "3-string": "order_billing_fullname",
					  "4-select": "order_payment_method",
					  "5-select": "payment_status",
					  "6-select": "fulfillment_status"
					  };
			 
   $.each(objSearch, function( key, value ){
	  var field = value;
	  var type	= key.substr(-6);
	  
	  if(type === 'string'){
	     $('#'+value+'_search').keyup(function(){
		    searchQuery(value);
		 });
		 
		 $('#'+value+'_search').keypress(function(event){
		    return disableEnterKey(event);
		 });
	  
	  }else if(type === 'key'){
	     $('#'+value+'_search').change(function(){
		    searchQueryOption(value);
		 });
		 
	  }
	  
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
   
   
   /*
   * ----------------------------------------------------------------------
   * REMOVES DISABLED
   * ----------------------------------------------------------------------
   */
   var objDisabled = {
             		 "1-select": "page-option",
					 "2-select": "query_per_page_input",
					 "3-select": "news-action",
					 "4-string": "order_number_search",
					 "5-string": "order_date_search",
					 "6-string": "order_billing_fullname_search",
					 "7-select": "order_payment_method_search",
					 "8-select": "payment_status_search",
					 "9-select": "fulfillment_status_search"
					 };
			 
   $.each(objDisabled, function( key, value ){
      $('#'+value).prop('disabled', false);
	  
	  /*
      var field = value;
	  var type	= key.substr(-6);
	  */
   });
   
   
   
   var $btn = $('input[type="submit"][name="index-order"]').button('loading');
   $btn.button('reset');
   $('input[type="submit"][name="index-order"]').val('GO');
   
});
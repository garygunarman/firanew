<?php
/* --- CLOSE CONNECTION --- */
$mysqli->close();


/* --- REMOVE ALERT --- */
if(isset($_SESSION['alert'])){
   unset($_SESSION['alert']);
   
   echo '<script>';
   echo '';
   echo '</script>';
   
}



if('ACT' == 'products/details/edit'){
   $_SESSION['custom_product_detail'] = $_REQUEST['product_alias'];
}else{
   unset($_SESSION['custom_product_detail']);
}
?>

<script>
$(document).ready(function(e) {
   
   setTimeout(function(){ 
      //alert("Hello"); 
	  $('.alert').removeClass('slideInDown');
	  $('.alert').addClass('slideOutUp');
   }, 3000);
   
   setTimeout(function(){ 
	  $('.alert').addClass('hidden');
   }, 4000);
   
   
   $('#id-btn-dissmiss-alert').on('click', function(){
      setInterval(function(){ 
         //alert("Hello"); 
	     $('.alert').removeClass('slideInDown');
	     $('.alert').addClass('slideOutUp');
	  }, 0);
   
      setInterval(function(){ 
	     $('.alert').addClass('hidden');
      }, 250);
   });

});
</script>
<script src="<?php echo BASE_URL;?>../../../script/promo-banner.js"></script>
<script>
$(document).ready(function(e) {
   $('#btn_cancel').click(function(){
      removeName();
   });
   
   
   $(function() {
      $("#sortable_promo").sortable();
      $("#sortable_promo").disableSelection();
   });
   
});
</script>
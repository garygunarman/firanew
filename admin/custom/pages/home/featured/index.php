<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - FEATURED PRODUCTS: INDEX
# ----------------------------------------------------------------------
*/

include('control.php');
?>
<!-- START: CHOSEN -->
  <link rel="stylesheet" href="<?php BASE_URL;?>/script/chosen/public/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
  <!-- END: CHOSEN -->


  <div class="box row" id="pages_banner">
    <div class="desc col-xs-3">
      <h3>Featured Products</h3>
    </div>
    <div class="content col-xs-9">
      <ul class="form-set">
      
	    <?php
        for($i = 0; $i < 6; $i++){
		   $get_featured_alias_id = $_get->get_featured($i);
		?>
        
        <li class="form-group row">
          <label class="control-label col-xs-3">Product <?php echo ($i + 1);?></label>
          <div class="col-xs-9">
            <select class="form-control chosen-select" tabindex="4" id="product-name-<?php echo $i;?>" name="product-name[]">
              <option value="0"></option>
            
			  <?php
              foreach($get_featured as $featured){
			     $total_stock = $_get->get_featured_product_stock($featured->type_id);
				 $visibility  = $_get->get_featured_product_visibility($featured->id);
				 $check       = $_get->count_featured($featured->id, $i);
				 
				 if($total_stock->total_stock > 0){
					 
				    if($visibility->visibility == 0){
					   $note     = ' (Not Visible)';
					}else{
					   $note     = '';
					}
					
				 }else{
				    $note     = ' (Sold Out)';
					
				 }
				 
			     echo '<option value="'.$featured->id.'" ';
				 
				 if($check->rows > 0){
				    echo ' selected="selected" ';
				 }
				 
				 echo '>'.$featured->product_name.$note.'</option>';
			  }
			  ?>
          
            </select>
          </div>
        </li>
            
        <?php 
		}
		?>
      
      </ul>
    </div>
  </div><!--box-->
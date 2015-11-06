<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - PROMO BANNER: INDEX
# ----------------------------------------------------------------------
*/

include('control.php');
?>

<style>
/* --- SORTING --- */
#sortable_promo { list-style-type: none;}
#sortable_promo li { float: left;}
</style>

<li class="form-group row image-placeholder">
  <label class="control-label col-xs-3">Promo Banners</label>
    <div class="col-xs-9" id="promo_banner">
      <div class="row row-5">
        <ul id="sortable_promo">
          
		  <?php
          foreach($promo_banner as $promo_banner){
		  ?>
          
          <li class="col-xs-4">
            <div onmouseover="removeButtonPromo(<?php echo $promo_banner->id;?>)" id="promo-<?php echo $promo_banner->id;?>" style="width: 100%">
              <div class="img img-banner-17x10">
                <div class="hidden" id="remove-promo-<?php echo $promo_banner->id;?>">
                  <div class="image-delete" id="btn-promo-1" onClick="clearImagePromo(<?php echo $promo_banner->id;?>)">
                    <span class="glyphicon glyphicon-remove"></span>
                  </div>
                  
                  <div class="image-link <?php if(!empty($promo_banner->link)){ echo "linked";}?>" onclick="showLinkPromo(<?php echo $promo_banner->id;?>)" id="btn-link-<?php echo $promo_banner->id;?>"  href="#link-pops" data-toggle="modal">
                    <span class="fa fa-link fa-flip-horizontal"></span>
                  </div>
                  <div class="image-overlay" onClick="openBrowserPromo(<?php echo $promo_banner->id;?>)"></div>
                </div>
                
				<?php
                if($promo_banner->filename == ''){
				   echo '<img class="hidden" id="upload-promo-'.$promo_banner->id.'" src="" />';
				}else{
				   echo '<img id="upload-promo-'.$promo_banner->id.'" src="'.BASE_URL.'../../../../static/thimthumb.php?src=../'.$promo_banner->filename.'&w=195&q=100" />';
				}
				?>
                
                <div id="tester_<?php echo $promo_banner->id;?>">
                  <input disabled="disabled" type="file" name="upload_promo_<?php echo $promo_banner->id;?>" id="promos-<?php echo $promo_banner->id;?>" onchange="readURLPromo(this,<?php echo $promo_banner->id;?>)" class="hidden"/>
                </div><!--tester-->
                
                <input type="checkbox" class="hidden" name="promo_id[]" value="<?php echo $promo_banner->id;?>" id="chk_promo_banner_<?php echo $promo_banner->id;?>">
                <input type="hidden" name="promo_link_<?php echo $promo_banner->id;?>" id="promo_link_<?php echo $promo_banner->id;?>" value="<?php echo $promo_banner->link;?>">
                <input type="hidden" name="promo_order[]" value="<?php echo $promo_banner->id;?>">
                <input type="checkbox" class="hidden" name="promo_delete_<?php echo $promo_banner->id;?>" value="<?php echo $promo_banner->id?>" id="id_promo_delete_<?php echo $promo_banner->id?>">
                <input type="hidden" name="hidden_image_<?php echo $promo_banner->id;?>" value="<?php echo $promo_banner->filename;?>">
                <input type="hidden" id="hidden_name_<?php echo $promo_banner->id;?>" value="<?php echo $promo_banner->name;?>">
              </div>
            </div> 
          </li>
          
		  <?php
		  }
		  ?>
          
        </ul><!--sortable-->
        
		<?php
		$total_promo_banner = $item;
		$promo_loop         = $total_promo_banner - $count_promo_banner->rows;
		for($i = ($max_id_promo->max_id + 1); $i <= ($promo_loop + $max_id_promo->max_id); $i++){
		?>
          
        <div class="col-xs-4" id="promo-<?php echo $i;?>">
          <div class="img img-banner-17x10" onmouseover="removeButtonPromo('<?php echo $i;?>')" id="promo-<?php echo $i;?>" style="width: 100%">
            <div class="hidden" id="remove-promo-<?php echo $i;?>">
              <div class="image-delete" id="btn-promo-<?php echo $i;?>" onClick="clearImagePromo('<?php echo $i;?>')">
                <span class="glyphicon glyphicon-remove"></span>
              </div>
            </div>
            <div class="image-overlay" onClick="openBrowserPromo('<?php echo $i;?>')"></div>
            <img class="hidden" id="upload-promo-<?php echo $i;?>" />
            <div id="tester_<?php echo $i?>">
              <input type="file" disabled="disabled" name="upload_promo_<?php echo $i;?>" id="promos-<?php echo $i;?>" onchange="readURLPromo(this,'<?php echo $i;?>')" class="hidden"/>
            </div>
            <input type="checkbox" class="hidden" name="promo_id[]" value="<?php echo $i;?>" id="chk_promo_banner_<?php echo $i;?>">
          </div>
        </div>
        
		<?php
		}
		?>
        
      </div><!--.row-->
    <p class="help-block">Recommended dimensions of 320 x 129 px.</p>  
  </li>
  

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
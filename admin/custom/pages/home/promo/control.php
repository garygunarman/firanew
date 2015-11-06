<?php
/*
# ----------------------------------------------------------------------
# CUSTOM PAGES - HOME - PROMO BANNER: CONTROL
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");

$_get    = new PROMO_BANNER_GET();
$_update = new PROMO_BANNER_UPDATE();


$item = 4;
$count_promo_banner = $_get->count_promos();
$max_id_promo       = $_get->promo_get_maxid();
$promo_banner       = $_get->get_promos($item);
$promo_row          = 1;


/* --- BUTTON HANDLER --- */
if(isset($_POST['btn-pages-home']) && $_POST['btn-pages-home'] == "Save Changes"){

   if(isset($_POST['promo_id'])){
      $promo_banner_id	= $_POST['promo_id'];
	  
      foreach($promo_banner_id as $promo_key=>$promo_banner_id){
      
	     if($_FILES['upload_promo_'.$promo_banner_id]['name'] != ''){
	        $promo_banner_id = filter_var($promo_banner_id, FILTER_SANITIZE_NUMBER_INT);
		    $promo_total     = 0;
			
			if(isset($_POST['promo_order'])){
			   $promo_order	= $_POST['promo_order'][$promo_key];
			}
		    
			
			/* --- UPLOADS IMAGE --- */
		    $filename	= upload_file($_global_general->url, 'images', $_FILES['upload_promo_'.$promo_banner_id], 'promo-banner-', 'files/uploads/promo/', $ini_max_upload);
			
			//$promo_filename	= 'files/uploads/promo/'.$promo_prefix.$promo_userfile_name;
			$promo_filename	= $filename;
			$promo_dml		= $_get->check_promos($promo_banner_id);
			
			if(isset($_POST['promo_link_'.$promo_banner_id])){
			   $promo_link		= filter_var($_POST['promo_link_'.$promo_banner_id], FILTER_SANITIZE_URL);
			}else{
			   $promo_link	= '';
			}
			
			
			if($promo_dml->rows > 0){
	           $_update->update_promo($promo_filename, $promo_link, $promo_order, ' ', $promo_banner_id);
			
			}else{
		       if($count_promo_banner->rows > 0){
		          $temp_order = $_get->promo_get_max_order(0);
		          $row_order  = array();
		 
			      foreach($temp_order as $temp_order){
			         array_push($row_order, $temp_order->id);
				  }
			
			      $order   = $max_id_promo->max_id + ($promo_key + 1);
			   }else{
			      $order = 0;
			   }
		 
			   $_update->insert_promo($promo_banner_id, $promo_filename, '', $order, '');
			}
	  
		 }
		 
		 /* --- IMAGE ORDER --- */
		 if(isset($_POST['promo_order'])){
		    $promo_order     = $_POST['promo_order'];
		    foreach($promo_order as $promo_order_key=>$promo_order){
               $promo_id = $promo_order_key + 1;
			   $_update->update_order_promo($promo_id, $promo_order);
			}
		 }
		 
	  }
   }
}


/* --- PROMO LINK --- */
if(isset($_POST['btn_promo_link'])){
   $post_promo_id   = filter_var($_POST['link_id'], FILTER_SANITIZE_NUMBER_INT);
   $post_promo_link = filter_var($_POST['name_link'], FILTER_SANITIZE_URL);
   $promo_name      = filter_var($_POST['name_promo_link'], FILTER_SANITIZE_STRING);

   if($_POST['btn_promo_link'] == "Delete"){
      $_update->update_promo_link('', $promo_name, $post_promo_id);
   }else if($_POST['btn_promo_link'] == "Save Changes"){
     $_update-> update_promo_link($post_promo_link, $promo_name, $post_promo_id);
   }
   
   safe_redirect('self');

}
?>
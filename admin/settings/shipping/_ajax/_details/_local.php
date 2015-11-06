<?php
/*
# ----------------------------------------------------------------------
# AJAX: LOCAL
# ----------------------------------------------------------------------
*/


if($_POST){
   
   require_once('../../../../static/_header.php');
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
	  
	  
	  function get_province(){
         $sql   = "SELECT * FROM province ORDER BY `province_name`";
         $query = $this->conn->query($sql);
         $row   = array();
	  
	     while($result = $query->fetch_object()){
	       array_push($row, $result);
		 }
   
         return $row;
	  }
	  
	  
	  function get_city($post_courier_province, $post_courier_name){
         $sql   = "SELECT * FROM tbl_courier_rate WHERE `courier_province` = '$post_courier_province' AND `courier_name` = '$post_courier_name' ORDER BY `courier_city`";
         $query = $this->conn->query($sql);
         $row   = array();
	  
	     while($result = $query->fetch_object()){
		    array_push($row, $result);
		 }
   
         return $row;
	  }
	  
   }
   
   
   $_ajax          = new AJAX();
   $province       = filter_var($_POST['post'], FILTER_SANITIZE_STRING);
   $weight         = filter_var($_POST['weight'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
   $provinces      = $_ajax->get_province();
   ?>
   
   <div class="box row" id="local">
     <div class="desc col-xs-3">
       <h3>Local Shipping</h3>
       <p>Details of local shipping.</p>
     </div>
     <div class="content col-xs-9">
       <ul class="form-set">
         
		 <?php 
		 $row = 0;
		 
		 foreach($provinces as $provinces){
		    $row++;
			$city = $_ajax->get_city($provinces->province_name, $province);
		 ?>
         
         <li class="form-group m_b_20" style="position: relative" id="courier-city-<?php echo $row;?>">
           <div class="checkbox p_b_15" style="border-bottom: 1px solid #eee">
             <label>
               <input type="checkbox" value="<?php echo $provinces->province_name?>" name="province_name[]" onclick="selectProvince('<?php echo $row;?>')" id="province-checked-<?php echo $row;?>" flag="unchecked" class="cl-province hidden" checked><?php echo $provinces->province_name?>
             </label>
           </div>
           <ul class="clearfix">
             
			 <?php 
			 $san=0; 
			 foreach($city as $city){ 
			    $san++;
			 ?>
             
             <li class="form-group clearfix" onclick="selectCity('<?php echo $row;?>')" id="id-row-city-<?php echo $row;?>">
               <div class="col-xs-9">
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" value="<?php echo $city->courier_city;?>" id="city-checkbox-<?php echo $row;?>-<?php echo $san;?>" name="city_name[]" attribute="attribute-<?php echo $row?>" province="<?php echo $city->courier_city;?>" class="cl-city hidden" checked><?php echo $city->courier_city;?>
                   </label>
                 </div>
               </div>
               <div class="col-xs-3">
                 <p class="control-label pull-left m_r_10">IDR</p>
                 <input class="form-control pull-left cl-input-city" style="width: 100px;" type="text" name="courier_rate[]" placeholder="0" onfocus="focusCheckbox(<?php echo $row.", ".$san?>)" onkeyup="focusCheckbox(<?php echo $row.", ".$san?>)" id="courier_rate_<?php echo $row."_".$san?>" value="<?php echo price(1, $city->courier_rate);?>">
                 <div id="custom-shipping-<?php echo $row;?>">
                   <input type="checkbox" name="array_rate[]" id="ck-rate-<?php echo $row;?>-<?php echo $san;?>" class="hidden" value="0">
                 </div>
                 <span class="custom-weight">
                   <p class="control-label pull-left m_l_10" id="per_weight"> / <?php echo $weight;?> kg</p>
                 </span>
               </div>
             </li>
             
			 <?php
			 }
			 ?>
             
           </ul>
         </li>
         
		 <?php
		 }
		 ?>
         
         </ul>
       </div>
     </div><!--box-->
     
     <?php
   
   
}
?>
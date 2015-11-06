<?php
/*
# ----------------------------------------------------------------------
# AJAX: INTERNATIONAL
# ----------------------------------------------------------------------
*/


if($_POST){
   
   require_once('../../../../static/_header.php');
   
   class AJAX{
   
      private $conn;
   
      function __construct() {
         $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	  }
	  
	  
	  function get_country(){
         $sql   = "SELECT * FROM countries ORDER BY `country_name`";
         $query = $this->conn->query($sql);
         $row   = array();
	  
	     while($result = $query->fetch_object()){
	       array_push($row, $result);
		 }
   
         return $row;
	  }
	  
   }
   
   
   $_ajax          = new AJAX();
   $country      = $_ajax->get_country();
   ?>
   
   <div class="box row" id="international">
       <div class="desc col-xs-3">
         <h3>International Shipping</h3>
         <p>Details of international shipping cost.</p>
       </div>
       <div class="content col-xs-9">
         <ul class="form-set">
           
		   <?php
		   $row = 0;
		   foreach($country as $country){
		   ?>
           
           <li class="form-group row clearfix underlined">
             <div class="col-xs-9">
               <div class="checkbox">
                 <input type="checkbox" class="input-checkbox"  style="top: 14px;" name="international_id[]" value="<?php echo $country->country_name;?>" id="chk-<?php echo $row;?>" checked="checked">
                 <label class="control-label"><?php echo $country->country_name;?></label>
               </div>
             </div>
             <div class="col-xs-3">
               <ul class="form-set">
                 <li class="form-group row clearfix">
                   <p style="margin-left:30px;">Basic Rate</p>
                   <p class="control-label pull-left m_r_10">IDR</p>
                   <input type="text" class="form-control pull-left" style="width: 100px" placeholder="0" onfocus="checkIt('<?php echo $row;?>')" name="international_rate[]" id="intl-rate-<?php echo $row;?>">
                   <span class="custom-weight">
                     <p class="control-label pull-left m_l_10 hidden" id="per_weight"> / 0.5 kg</p>
                     <p class="control-label pull-left m_l_10" id="weight-half"> / 0.5 kg</p>
                     <p class="control-label pull-left m_l_10 hidden" id="weight-one"> / 1 kg</p>
                     <p class="control-label pull-left m_l_10 hidden" id="weight-two"> / 2 kg</p>
                   </span>
                 </li>
                 <li class="form-group row clearfix">
                   <p style="margin-left:30px;">Progressive Rate</p>
                   <p class="control-label pull-left m_r_10">IDR</p>
                   <input type="text" class="form-control pull-left" style="width: 100px" placeholder="0" onfocus="checkIt('<?php echo $row;?>')" name="international_rate_extend[]" id="intl-rate-<?php echo $row;?>">
                   <span class="custom-weight">
                     <p class="control-label pull-left m_l_10 hidden" id="per_weight_rate"> / 0.5 kg</p>
                     <p class="control-label pull-left m_l_10" id="weight-half-rate"> / 0.5 kg</p>
                     <p class="control-label pull-left m_l_10 hidden" id="weight-one-rate"> / 1 kg</p>
                     <p class="control-label pull-left m_l_10 hidden" id="weight-two-rate"> / 2 kg</p>
                   </span>
                 </li>
               </ul>
             </div>
           </li>
           
		   <?php
		      $row++;
		   }
		   ?>
         
         </ul>
       </div>
     </div><!--box-->
     
     <?php
   
   
}
?>
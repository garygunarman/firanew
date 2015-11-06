<?php
/*
# ----------------------------------------------------------------------
# SETTINGS - SHIPPING: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>

<form method="post">
   
   
  <div class="subnav">
    <div class="container clearfix">
      <h1><span class="glyphicon glyphicon-road"></span> &nbsp; Shipping Methods</h1>
      <div class="btn-placeholder">
        <a href="<?php echo BASE_URL."add-shipping"?>">
          <input type="button" class="btn btn-success btn-sm" value="Add Shipping Method">
        </a>
      </div>         
    </div>
  </div>
  
  <?php
  show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
  ?>

  <div class="container main">
    <div class="box row">
      <div class="content">
        <div class="actions clearfix">
          <div class="pull-left">
            <div class="pull-left custom-select-all" onclick="selectAllToggle()">
              <input type="checkbox" id="select_all">
            </div>
            <div class="divider"></div>
            <p>Page</p>
            <select class="form-control" id="page-option" onchange="pageOption()">
			  <?php view_page($total_page, $page);?>
            </select>
            <p>of <strong><?php echo $total_page;?></strong> pages</p>
            <div class="divider"></div>
            <p>Show</p>
            <select class="form-control" name="query_per_page" id="query_per_page_input" onchange="changeQueryPerPage()">
			  <?php view_per_page($query_per_page, $total_query);?>
            </select>
            <p>of <strong><?php echo $total_query;?></strong> records</p>
          </div>
          <div class="pull-right">
            <p>Actions</p>
            <select class="form-control" name="ship-action" onchange="changeAction()" id="product-index-action"> 
              <option value="status">Set Status</option>
              <option value="delete">Delete</option>
            </select>
            <p id="product-index-conj">to</p>
            <select class="form-control" name="ship-option" id="product-index-option">
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
            <input type="submit" class="btn btn-success pull-left" name="btn-index-shipping" value="GO">
          </div>
        </div><!--actions-->

        <table class="table">
          <thead>
            <tr class="headings">
              <th width="20"><span id="eyeopen" class="glyphicon glyphicon-eye-open" onclick="showEye()"></span></th>
              <th class="sort" width="170" onclick="sortBy('courier_name')">Courier Name<?php echo $arr_courier_name;?></th>
              <th class="sort" width="330" onclick="sortBy('courier_description')">Description<?php echo $arr_courier_description;?></th>
              <th class="sort" width="250" onclick="sortBy('services')">Services<?php echo $arr_service;?></th>
              <th class="sort" width="190" onclick="sortBy('active_status')">Status<?php echo $arr_active_status;?></th>
            </tr>
            <tr class="filter">
              <th>
                <a href="<?php echo BASE_URL."shipping"?>">
                  <button class="btn btn-danger btn-xs <?php echo $reset;?>">
                    <span class="glyphicon glyphicon-remove"></span>
                  </button>
                </a>
              </th>
              <th><input type="text" class="form-control" id="courier_name_search" onkeyup="searchQuery('courier_name')" onkeypress="return disableEnterKey(event)" <?php order_disabling_search($_REQUEST['src'], 'courier_name');?>></th>
              <th><input type="text" class="form-control" id="courier_description_search" onkeyup="searchQuery('courier_description')" onkeypress="return disableEnterKey(event)" <?php order_disabling_search($_REQUEST['src'], 'courier_description');?>></th>
              <th>
                <select class="form-control" id="services_search" onchange="searchQueryOption('services')" <?php order_disabling_search($_REQUEST['src'], 'services');?>>
                  <option value="0"></option>
                  <option value="Local Only">Local only</option>
                  <option value="International Only">International only</option>
                  <option value="Local-International">Local &amp; International</option>
                </select>
              </th>
              <th>
                <select class="form-control" id="active_status_search" onchange="searchQueryOption('active_status')" <?php order_disabling_search($_REQUEST['src'], 'active_status');?>>
                  <option value="0"></option>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </th>
            </tr>
          </thead>

          <tbody>
            <?php 
			/* --- NO RECORDS --- */
			if($total_query == 0){
			   echo '<tr><td class="no-record" colspan="8">No records found.</td></tr>';	
			}
			
						
			$row=0;
			
			foreach($listing_order as $shipping){
               $row++;
            ?>

            <tr id="<?php echo "row_".$row?>" onclick="selectRow('<?php echo $row;?>')">
              <td><input type="checkbox" name="courier_id[]" id="<?php echo "check_".$row?>" value="<?php echo $shipping->courier_id;?>" onmouseover="downCheck()" onmouseout="upCheck()" onclick="selectRowCheck('<?php echo $row;?>')"></td>
              <td><a href="<?php echo BASE_URL."edit-shipping/".$shipping->courier_id;?>"><?php echo $shipping->courier_name;?></a></td>
              <td><?php echo $shipping->courier_description;?></td>
              <td><?php echo $shipping->services;?></td>
              <td><?php echo $shipping->active_status;?></td>
            </tr>
            
            <?php
			}
			?>
            
          </tbody>
        </table>
      </div><!--.content-->
    </div><!--.box.row-->
  </div><!--.container.main-->
</form>


<script>
function changeAction(){
   var action_ = document.getElementById('product-index-action').value;
		 	
   if (action_ =='delete'){
      $("#product-index-option").addClass('hidden');
	  $("#product-index-conj").addClass('hidden');
   }else if(action_ == 'status'){
      $("#product-index-option").addClass('hidden');
	  $("#product-index-conj").removeClass('hidden');
	  $("#product-index-active").removeClass('hidden');
   }else{
      $("#product-index-option").removeClass('hidden');
      $("#product-index-conj").removeClass('hidden');
   }
}
$(document).ready(function() {
   activeNAvbar('settings');
});

<?php if($search_parameter == "services"){?>
$('#services_search option[value="<?php echo $search_value?>"]').attr('selected', 'selected');
<?php }?>


<?php if($search_parameter == "active_status"){?>
$('#active_status_search option[value=="<?php echo $search_value?>"]').attr('selected', 'selected');
<?php }?>
</script>

            
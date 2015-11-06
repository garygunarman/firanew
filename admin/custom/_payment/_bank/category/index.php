<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - BANK: VIEW
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");
include("control.php");
?>

          <form method="post" enctype="multipart/form-data" id="id-form-add-bank">
            <div class="subnav">
              <div class="container clearfix">
                <h1><span class="glyphicon glyphicon-list"></span> &nbsp; Manage Bank</h1>
                <div class="btn-placeholder">
                  <a href="<?php echo BASE_URL.'add-payment-bank';?>">
                    <input type="button" class="btn btn-success btn-sm" value="Add Bank">
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
                      <div class="pull-left custom-select-all">
                        <input type="checkbox" id="select_all">
                      </div>
                      <div class="divider"></div>
                      <p>Page</p>
                      <select class="form-control" id="page-option" disabled="disabled">
                        <?php view_page($total_page, $_REQUEST['pg']);?>
                      </select>
                      <p>of <strong><?php echo $total_page;?></strong> pages</p>
                      <div class="divider"></div>
                      <p>Show</p>
                      <select class="form-control" name="query_per_page" id="query_per_page_input" disabled="disabled">
					    <?php view_per_page($query_per_page, $total_query);?>
                      </select>
                      <p>of <strong><?php echo $total_query;?></strong> records</p>
                    </div>
                    <div class="pull-right">
                      <p>Actions</p>
                      <select class="form-control" name="option-action" id="product-index-action" disabled="disabled"> 
                        <option value='visibility'>Set Visibility</option>
                        <option value="delete">Delete</option>
                      </select>
                      <p id="product-index-conj" class="hidden">to</p>
                      <select class="form-control hidden" name="option-option" id="product-index-option">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                      <input type="submit" class="btn btn-success pull-left disabled" value="GO" name="btn-index-bank" disabled="disabled">
                    </div>
                  </div><!--actions-->
                  <table class="table" id="id-tbl-category">
                    <thead>
                      <tr class="headings">
                        <th width="20"><span id="eyeopen" class="glyphicon glyphicon-eye-open hidden" onclick="showEye()"></span></th>
                        <th class="sort" width="680" id="id-sort-bank_name">Bank Name<?php echo $arr_category_name;?></th>
                        <th class="sort hidden" width="70">News</th>
                        <th class="sort" width="130">Account <?php echo $arr_category_active;?></th>
                        <th class="sort" width="60"  id="id-sort-bank_visibility">Visibility<?php echo $arr_category_visibility;?></th>
                      </tr>
                      <tr class="filter" id="filter">
                        <th>
                          <a href="<?php echo BASE_URL.'payment-bank';?>">
                            <button type="button" style="width: 100%;" class="btn btn-danger btn-xs <?php echo $reset;?>">
                              <span class="glyphicon glyphicon-remove"></span>
                            </button>
                          </a>
                          </th>
                          <th><input type="text" class="form-control" id="bank_name_search" <?php order_disabling_search($_REQUEST['src'], 'bank_name');?> disabled="disabled"></th>
                          <th><input type="text" class="form-control" disabled="disabled"></th>
                          <th class="hidden">
                            <select class="form-control">
                              <option>Active</option>
                              <option>Inactive</option>
                            </select>
                          </th>
                          <th>
                            <select class="form-control" id="bank_visibility_search" <?php order_disabling_search($_REQUEST['src'], 'bank_visibility');?>>
                              <option></option>
                              <option value="1" <?php if($_REQUEST['src'] == 'bank_visibility' && $_REQUEST['srcval'] == '1'){ echo 'selected="selected"';}?>>Yes</option>
                              <option value="0" <?php if($_REQUEST['src'] == 'bank_visibility' && $_REQUEST['srcval'] == '0'){ echo 'selected="selected"';}?>>No</option>
                            </select>
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody onload="loading()" id="checkbox">
                        <!--<div id="loading" style="position: absolute; z-index: 2; background: #000; width: 940px; height: 200px"></div>-->
                        <?php
					    if($total_query < 1){
					       echo '<tr><td class="no-record" colspan="8">No records found.</td></tr>';
						}
						
						
						$row = 0;
                        foreach($all_bank as $bank){
						   $accs = $_get->count_bank_account($bank->bank_id);
						   
						   /* --- BANK VISIBILITY --- */
						   if($bank->bank_visibility == '1'){
							   $bank_visibility = 'Yes';
							}else if($bank->bank_visibility == '0'){
							   $bank_visibility = 'No';
							}
						?>
                        
                        <tr class="" id="<?php echo "row_".$row?>" onclick="selectRow('<?php echo $row;?>')">
                          <td><input type="checkbox" name="bank_id[]" id="<?php echo "check_".$row?>" value="<?php echo $bank->bank_id;?>" onmouseover="downCheck()" onmouseout="upCheck()" onclick="selectRowCheck('<?php echo $row;?>')"></td>
                          <td>
                            <a href="<?php echo BASE_URL.'payment-bank-detail/'.$bank->hash_id;?>">
                              <?php echo $bank->bank_name;?>
                            </a>
                          </td>
                          <td class="tr">
                            <a href="<?php echo BASE_URL.'payment-bank-account-view/1/'.$bank->bank_id.'/25/news_created_date/-';?>">
							  <?php echo $accs->rows;?>
                            </a>
                          </td>
                          <td class="hidden" id="cat_active_stat_<?php echo $bank->bank_id;?>"><?php echo $bank->active;?></td>
                          <td id="cat_visible_stat_<?php echo $bank->bank_id;?>">
                           <?php
                            echo $bank_visibility; 
						    echo '<input type="text" class="hidden" name="category_order[]" value="'.$bank->bank_id.'">';
						    ?>
                          </td>
                        </tr>
                        
						<?php
						   $row++;
						}
						?>
                        
                        </tbody>
                      </table><!--</div>table-wrapper-->
                    </div><!--.content-->
                  </div><!--.box-->
                </div><!--.container.main-->
              </form>


        
<script src="<?php echo BASE_URL;?>custom/script/bank.js"></script>

            
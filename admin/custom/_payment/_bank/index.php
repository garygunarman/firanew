<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>



            <div class="subnav">
              <div class="container clearfix">
                <h1><span class="glyphicon glyphicon-list"></span> &nbsp; Manage Bank Account</h1>
                <select class="form-control" id="category_name_search" disabled="disabled">
                  <option value="top">All Bank</option>
				  
				  <?php
				  $array_bank = array();
                  foreach($bank as $bank){
				     echo '<option value="'.$bank->bank_id.'"';
					 
					 if(isset($_REQUEST['cat'])){
					    
						if($_REQUEST['cat'] === $bank->bank_id){
						   echo ' selected="selected" ';
						}
						
					 }
					 
					 echo '>'.$bank->bank_name.'</option>';
					 
					 array_push($array_bank, $bank);
				  }
				  ?>
                  
                </select>
                <div class="btn-placeholder">
                  <a href="<?php echo BASE_URL.'add-payment-bank-account';?>">
                    <input type="button" class="btn btn-success btn-sm" value="Add Account">
                  </a>
                </div>
              </div>
            </div>

            <?php
            show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
			?> 
            
            <form method="post">
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
                      <select class="form-control" name="option-action" id="product-index-action"> 
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
                  <table class="table">
                    <thead>
                      <tr class="headings">
                        <th width="20"><span id="eyeopen" class="glyphicon glyphicon-eye-open hidden" onclick="showEye()"></span></th>
                        <th class="sort" width="350" id="id-sort-account_name">Account Name<?php echo $arr_account_name;?></th>
                        <th class="sort" width="150" id="id-sort-bank_name">Bank<?php echo $arr_bank_name;?></th>
                        <th class="sort" width="100" id="id-sort-currency">Currency<?php echo $arr_currency;?></th>
                        <th class="sort" width="200" id="id-sort-account_number">Account No.<?php echo $arr_account_number;?></th>
                        <th class="sort" width="100">Total Order</th>
                        <th class="sort" width="60" id="id-sort-visibility">Visibility<?php echo $arr_visibility;?></th>
                      </tr>
                      <tr class="filter" id="filter">
                        <th>
                          <a href="<?php echo BASE_URL.'payment-bank-account';?>">
                            <button type="button" style="width: 100%;" class="btn btn-danger btn-xs <?php echo $reset;?>">
                              <span class="glyphicon glyphicon-remove"></span>
                            </button>
                          </a>
                        </th>
                        <th>
                          <input type="text" class="form-control" id="account_name_search" <?php order_disabling_search($_REQUEST['src'], 'account_name');?> disabled="disabled">
                        </th>
                        <th>
                          <select class="form-control" id="bank_name_search" <?php order_disabling_search($_REQUEST['src'], 'bank_name');?> disabled="disabled">
                            <option></option>
                            <?php
                            foreach($array_bank as $array_bank){
							   echo '<option value="'.$array_bank->bank_name.'"';
							   
							   if($_REQUEST['src'] == 'bank_name' && $_REQUEST['srcval'] == $array_bank->bank_name){
							      echo ' selected="selected"';
							   }
							   
							   echo '>'.$array_bank->bank_name.'</option>';
							}
							?>
                          </select>
                        </th>
                        <th>
                          <select class="form-control" id="currency_search" <?php order_disabling_search($_REQUEST['src'], 'currency');?> disabled="disabled">
                            <option></option>
                            <option value="1" <?php if($_REQUEST['src'] == 'currency' && $_REQUEST['srcval'] == '1'){ echo 'selected="selected"';}?>>Rp.</option>
                            <option value="2" <?php if($_REQUEST['src'] == 'currency' && $_REQUEST['srcval'] == '2'){ echo 'selected="selected"';}?>>USD$</option>
                          </select>
                        </th>
                        <th>
                          <input type="text" class="form-control" id="account_number_search" <?php order_disabling_search($_REQUEST['src'], 'account_number');?> disabled="disabled">
                        </th>
                        <th>
                          <input type="text" class="form-control" id="total_order_search" <?php order_disabling_search($_REQUEST['src'], 'total_order');?> disabled="disabled">
                        </th>
                        <th>
                          <select class="form-control" id="visibility_search" <?php order_disabling_search($_REQUEST['src'], 'visibility');?> disabled="disabled">
                            <option></option>
                            <option value="1" <?php if($_REQUEST['src'] == 'visibility' && $_REQUEST['srcval'] == '1'){ echo 'selected="selected"';}?>>Yes</option>
                            <option value="0" <?php if($_REQUEST['src'] == 'visibility' && $_REQUEST['srcval'] == '0'){ echo 'selected="selected"';}?>>No</option>
                          </select>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      
					  <?php
					  if($total_query < 1){
					    echo '<tr><td class="no-record" colspan="8">No records found.</td></tr>';
					  }
					  
                      $record = 1;
					  $row    = 1;
					  foreach($all_news as $all_news){
						 $view_currency = '';
						 
						 /* --- CURRENCY --- */
						 if($all_news->currency == 1){
						    $view_currency = 'Rp.';
						 }else if($all_news->currency == 2){
						    $view_currency = 'USD$';
						 }
						 
						 /* --- VISIBILITY --- */
						 if($all_news->visibility == '1'){
						     $view_visibility = 'Yes';
						  }else if($all_news->visibility == '0'){
						     $view_visibility = 'No';
						  }
					     
						 /* --- TOTAL ORDER --- */
						 $total_order = $_get->count_total_order($all_news->id);
					  ?>
                      
                      <tr id="<?php echo "row_".$row?>" onclick="selectRow('<?php echo $row;?>')">
                        <td><input type="checkbox" name="news_id[]" id="<?php echo "check_".$row?>" value="<?php echo $all_news->id;?>" onmouseover="downCheck()" onmouseout="upCheck()" onclick="selectRowCheck('<?php echo $row;?>')"></td>
                        <td><a href="<?php echo BASE_URL.'payment-bank-account-detail/'.$all_news->id;?>"><?php echo $all_news->account_name;?></a></td>
                        <td><?php echo $all_news->bank_name;?></td>
                        <td><?php echo $view_currency;?></td>
                        <td><?php echo $all_news->account_number;?></td>
                        <td><?php echo $total_order->rows;?></td>
                        <td class="text-right"><?php echo $view_visibility;?></td>
                      </tr>
                      
                      <?php
					     $row++;
					  }
					  ?>
                      
                    </tbody>
                  </table>
                  <!--</div>table-wrapper-->
                </div><!--.content-->
              </div><!--.box-->
            </div><!--.container.main-->
          </form>


<script src="<?php echo BASE_URL;?>custom/script/bank-index.js"></script>          
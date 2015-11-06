<?php
/*
# ----------------------------------------------------------------------
# LOCATION: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>



            <div class="subnav">
              <div class="container clearfix">
                <h1><span class="glyphicon glyphicon-list"></span> &nbsp; Manage Location</h1>
                <select class="form-control" id="category_name_search" onchange="selectCategory()" style="width: 150px;">
                  <option value="top">All City</option>
                  
                  <?php
                  if($count_category->rows > 0){
				     
					 foreach($get_category as $get_category){
					    echo '<option value="'.$get_category->category_id.'"';
						
						if($req_category == $get_category->category_id){
						   echo 'selected="selected"';
						}
						
						echo '>'.$get_category->category_name.'</option>';
					 }
					 
				  }
				  ?>
                  
                </select>
                <div class="btn-placeholder">
                  <a href="<?php echo BASE_URL.'add-location';?>">
                    <input type="button" class="btn btn-success btn-sm" value="Add Location">
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
                      <div class="pull-left custom-select-all" onclick="selectAllToggle()">
                        <input type="checkbox" id="select_all">
                      </div>
                      <div class="divider"></div>
                      <p>Page</p>
                      <select class="form-control" id="page-option" onchange="pageOption()">
                        <?php view_page($total_page, $_REQUEST['pg']);?>
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
                      <select class="form-control" name="option-action" id="product-index-action" onchange="changeAction()"> 
                        <option value='visibility'>Set Visibility</option>
                        <option value='order'>Set Order</option>
                        <option value="delete">Delete</option>
                      </select>
                      <p id="product-index-conj" class="hidden">to</p>
                      <select class="form-control hidden" name="option-option" id="product-index-option">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                      <input type="submit" class="btn btn-success pull-left" value="GO" name="btn-index-news">
                    </div>
                  </div><!--actions-->
                  <table class="table" id="tbl_products">
                    <thead>
                      <tr class="headings">
                        <th width="20"><span id="eyeopen" class="glyphicon glyphicon-eye-open hidden" onclick="showEye()"></span></th>
                        <th class="sort" width="680" onclick="sortBy('news_title')">Location Name<span class="sort-arrow-up"></span></th>
                        <th class="sort" width="200" onclick="sortBy('news_created_date')">City</th>
                        <th class="sort" width="60" onclick="sortBy('news_visibility')">Visibility</th>
                      </tr>
                      <tr class="filter" id="filter">
                        <th>
                          <a href="<?php echo BASE_URL.'location';?>">
                            <button type="button" style="width: 100%;" class="btn btn-danger btn-xs <?php echo $reset;?>">
                              <span class="glyphicon glyphicon-remove"></span>
                            </button>
                          </a>
                        </th>
                        <th><input type="text" class="form-control" id="news_title_search" onkeyup="searchQuery('news_title')" onkeypress="return disableEnterKey(event)" <?php order_disabling_search($_REQUEST['src'], 'news_title');?>></th>
                        <th><input type="text" class="form-control" id="news_created_date_search" onkeyup="searchQuery('news_created_date')" onkeypress="return disableEnterKey(event)" <?php order_disabling_search($_REQUEST['src'], 'news_created_date');?>></th>
                        <th>
                          <select class="form-control" id="news_visibility_search" onchange="searchQueryOption('news_visibility')" <?php order_disabling_search($_REQUEST['src'], 'news_visibility');?>>
                            <option></option>
                            <option value="1" <?php if($_REQUEST['src'] == 'news_visibility' && $_REQUEST['srcval'] == '1'){ echo 'selected="selected"';}?>>Yes</option>
                            <option value="0" <?php if($_REQUEST['src'] == 'news_visibility' && $_REQUEST['srcval'] == '0'){ echo 'selected="selected"';}?>>No</option>
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
					     $row++;
					     //$_update->update_order($row, $all_news->news_id);
					  ?>
                      
                      <tr id="<?php echo "row_".$row?>" onclick="selectRow('<?php echo $row;?>')">
                        <td><input type="checkbox" name="news_id[]" id="<?php echo "check_".$row?>" value="<?php echo $all_news->news_id;?>" onmouseover="downCheck()" onmouseout="upCheck()" onclick="selectRowCheck('<?php echo $row;?>')"></td>
                        <td><a href="<?php echo BASE_URL.'location-detail/'.$all_news->news_id."/".cleanurl($all_news->news_title);?>"><?php echo $all_news->news_title;?></a></td>
                        <td><?php echo $all_news->category_name;//echo format_date($all_news->news_created_date);?></td>
                        <td class="text-right">
						  
						  <?php 
						  if($all_news->news_visibility == '1'){
						     echo 'Yes';
						  }else if($all_news->news_visibility == '0'){
						     echo 'No';
						  }
						  
						  /* --- ORDER --- */
						  echo '<input type="hidden" name="hidden_id[]" value="'.$all_news->news_id.'">';
						  echo '<input type="hidden" name="hidden_order[]" value="'.$all_news->order_.'">';
						  ?>
                          
                        </td>
                      </tr>
                      
                      <?php
					  }
					  ?>
                      
                    </tbody>
                  </table>
                  <!--</div>table-wrapper-->
                </div><!--.content-->
              </div><!--.box-->
            </div><!--.container.main-->
          </form>


<script src="<?php echo BASE_URL;?>custom/script/_location/location.js"></script>           
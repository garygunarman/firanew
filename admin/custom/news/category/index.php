<?php
/*
# ----------------------------------------------------------------------
# NEWS - CATEGORY: VIEW
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");
include("control.php");
?>

          <form method="post" enctype="multipart/form-data">
            <div class="subnav">
              <div class="container clearfix">
                <h1><span class="glyphicon glyphicon-list"></span> &nbsp; Manage News Categories</h1>
                <div class="btn-placeholder">
                  <a href="<?php echo BASE_URL.'add-news-category';?>">
                    <input type="button" class="btn btn-success btn-sm" value="Add Category" id="id-btn-add-category">
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
                        <option value="delete">Delete</option>
                        <option value='visibility'>Set Visibility</option>
                        <option value='order'>Set Order</option>
                      </select>
                      <p id="product-index-conj" class="hidden">to</p>
                      <select class="form-control hidden" name="option-option" id="product-index-option">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                      <input type="submit" class="btn btn-success pull-left" name="btn-index-news-category" id="id-btn-index-news-category" value="GO">
                    </div>
                  </div><!--actions-->
                  <table class="table" id="id-tbl-category">
                    <thead>
                      <tr class="headings">
                        <th width="20"><span id="eyeopen" class="glyphicon glyphicon-eye-open hidden" onclick="showEye()"></span></th>
                        <th class="sort" width="680" onclick="sortBy('category_name')">Category Name<?php echo $arr_category_name;?></th>
                        <th class="sort" width="70">News</th>
                        <th class="sort hidden" width="130" onclick="sortBy('category_active')">Status <?php echo $arr_category_active;?></th>
                        <th class="sort" width="60" onclick="sortBy('category_visibility')">Visibility<?php echo $arr_category_visibility;?></th>
                      </tr>
                      <tr class="filter" id="filter">
                        <th>
                          <a href="<?php echo BASE_URL.'news-category';?>">
                            <button type="button" style="width: 100%;" class="btn btn-danger btn-xs <?php echo $reset;?>">
                              <span class="glyphicon glyphicon-remove"></span>
                            </button>
                          </a>
                          </th>
                          <th><input type="text" class="form-control" id="category_name_search" onkeyup="searchQuery('category_name')" onkeypress="return disableEnterKey(event)" <?php order_disabling_search($_REQUEST['src'], 'category_name');?>></th>
                          <th><input type="text" class="form-control" disabled="disabled"></th>
                          <th class="hidden">
                            <select class="form-control">
                              <option>Active</option>
                              <option>Inactive</option>
                            </select>
                          </th>
                          <th>
                            <select class="form-control" id="category_visibility_search" onchange="searchQueryOption('category_visibility')" <?php order_disabling_search($_REQUEST['src'], 'category_visibility');?>>
                              <option>Yes</option>
                              <option>No</option>
                            </select>
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody onload="loading()" id="checkbox">
                        <?php
					    if($total_query < 1){
					       echo '<tr><td class="no-record" colspan="8">No records found.</td></tr>';
						}
						
						
						$row = 0;
                        foreach($all_news as $list_category){
						   $row++;
						?>
                        
                        <tr class="" id="<?php echo "row_".$row?>" onclick="selectRow('<?php echo $row;?>')">
                          <td><input type="checkbox" name="cat_id[]" id="<?php echo "check_".$row?>" value="<?php echo $list_category->category_id;?>" onmouseover="downCheck()" onmouseout="upCheck()" onclick="selectRowCheck('<?php echo $row;?>')"></td>
                          <td>
                            <a href="<?php echo BASE_URL.'news-category-detail/ID/'.$list_category->category_id.'/'.cleanurl($list_category->category_name);?>">
                              <?php echo $list_category->category_name;?>
                            </a>
                          </td>
                          <td class="tr">
                            <a href="<?php echo BASE_URL.'news-view/1/'.$list_category->category_id.'/25/news_created_date/-';?>">
							  <?php echo $list_category->total_news;?>
                            </a>
                          </td>
                          <td class="hidden" id="cat_active_stat_<?php echo $list_category->category_id;?>"><?php echo $list_category->category_active;?></td>
                          <td id="cat_visible_stat_<?php echo $list_category->category_id;?>">
						    <?php echo $list_category->category_visibility;?>
                            
                            <?php
                            echo '<input type="hidden" name="category_order[]" value="'.$list_category->category_id.'">';
							?>
                          </td>
                        </tr>
                        
						<?php
						}
						?>
                        
                        </tbody>
                      </table><!--</div>table-wrapper-->
                    </div><!--.content-->
                  </div><!--.box-->
                </div><!--.container.main-->
              </form>


        
<script src="<?php echo BASE_URL;?>custom/script/news-category.js"></script>

            
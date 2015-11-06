<?php
/*
# ----------------------------------------------------------------------
# PAYMENT ACCOUNT - DETAILS: VIEW
# ----------------------------------------------------------------------
*/

include('get.php');
include('update.php');
include('control.php');
?>

          <form method="post" enctype="multipart/form-data">
            <div class="subnav">
              <div class="container clearfix">
                <h1>
                  <a href="<?php echo BASE_URL."payment-bank-account"?>">
                    <span class="fa fa-chevron-left"></span>&nbsp;
                    Payment Bank / <?php echo $data_account->account_name.' ('.$data_account->account_number.')';?>
                  </a>
                </h1>
                <div class="btn-placeholder">
                  <a href="<?php echo BASE_URL.'payment-bank-account';?>">
                    <input type="button" class="btn btn-default btn-sm" value="Cancel">
                  </a>
                  <input type="button" class="btn btn-success btn-sm disabled" value="loading..." id="btn-alias-submit" disabled="disabled">
                  <input type="submit" class="btn btn-success btn-sm hidden" value="Save Changes" name="btn-details-account" id="btn-submit">
                </div>
              </div>
            </div>

            <?php
            show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
			?>
            
            <div class="container main">
              <div class="box row">
                <div class="desc col-xs-3" id="custom_lang">
                  <h3>Bank Account Details</h3>
                  <p>Your bank acount details.</p>
                </div>
                <div class="content col-xs-9">
                  <ul class="form-set">
                    <li class="form-group row hidden" id="id-row-active">
                      <label class="control-label col-xs-3">Change Status</label>
                      <div class="col-xs-9">
                        <label class="radio-inline control-label">
                          <input type="radio" value="1" name="active" id="id-active" checked>Active
                        </label>
                        <label class="radio-inline control-label">
                          <input type="radio" value="0" name="active" id="id-inactive">Inactive
                        </label>
                      </div>
                    </li>
                    <li class="form-group row" id="id-row-bank">
                      <label class="control-label col-xs-3">Bank Name</label>
                        <div class="col-xs-9">
                          <select class="form-control" id="id-bank" name="bank">
                            <option value="0">-- Select Bank--</option>
                            
							<?php
                            foreach($data_bank as $bank){
							   echo '<option value="'.$bank->bank_id.'"';
							   
							   if($data_account->bank_id === $bank->bank_id){
							      echo ' selected="selected"';
							   }
							   
							   echo '>'.$bank->bank_name.'</option>';
							}
							?>
                          
                          </select>
                        </div>
                      </li>
            <li class="form-group row" id="id-row-visibility">
              <label class="control-label col-xs-3">Visibility</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="1" name="visibility" id="id-visibility-visible" <?php if($data_account->visibility == 1){ echo 'checked="checked"';}?>>Yes
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="0" name="visibility" id="id-visibility-invisible"<?php if($data_account->visibility == 0){ echo 'checked="checked"';}?>>No
                </label>
              </div>
            </li>
            <li class="form-group row" id="id-row-name">
              <label class="control-label col-xs-3">Account Name <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="bank-name" id="id-name" placeholder="Account name" value="<?php echo $data_account->account_name;?>">
              </div>
            </li>
            <li class="form-group row hidden" id="id-row-description">
              <label class="control-label col-xs-3">Account Description.</label>
              <div class="col-xs-9">
                <textarea class="form-control" rows="5" name="bank-description" id="id-description"></textarea>
              </div>
            </li>
            <li class="form-group row" id="id-row-number">
              <label class="control-label col-xs-3">Account No.</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="bank-number" id="id-number" placeholder="Account No." value="<?php echo $data_account->account_number;?>">
              </div>
            </li>
            <li class="form-group row" id="id-row-currency">
              <label class="control-label col-xs-3">Currency. <span>*</span></label>
              <div class="col-xs-3">
                <select id="id-currency" name="currency" class="form-control">
                  <option value="0">-- Choose Currency --</option>
                  <option value="1" <?php if($data_account->currency == 1){ echo 'selected="selected"';}?>>Rp</option>
                  <option value="2" <?php if($data_account->currency == 2){ echo 'selected="selected"';}?>>USD$</option>
                </select>
              </div>
            </li>
                  </ul>
                </div>
              </div><!--box-->
            </div><!--main-content-->
            <input type="text" name="delete_news" id="id-delete-news" value="0" class="hidden" />
          </form>
            
            
            
<script src="<?php echo BASE_URL;?>custom/script/bank-account.js"></script>

            
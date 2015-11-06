<?php
/*
# ----------------------------------------------------------------------
# PAYMENT - ACCOUNT - ADD: VIEW
# ----------------------------------------------------------------------
*/

include("get.php");
include("update.php");
include("control.php");
?> 
        

  <form method="post" enctype="multipart/form-data">
    <div class="subnav">
      <div class="container clearfix">
        <h1>
          <a href="<?php echo BASE_URL."payment-bank-account"?>">
            <span class="fa fa-chevron-left"></span>&nbsp;
            Add Payment Bank
          </a> 
        </h1>
        <div class="btn-placeholder">
          <a href="<?php echo BASE_URL."payment-bank-account";?>">
            <input type="button" class="btn btn-default btn-sm" value="Cancel" id="btn-add-category-cancel">
          </a>
          <input type="button" class="btn btn-success btn-sm disabled" name="btn-insert-account" value="loading..." id="btn-alias-submit" disabled="disabled">
          <input type="submit" class="hidden" value="Save Changes" name="btn-insert-account" id="btn-submit">
        </div>
      </div>
    </div>
    
	<?php
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?> 

    <div class="container main">
      <div class="box row">
        <div class="desc col-xs-3">
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
              <label class="control-label col-xs-3">Bank Name <span>*</span></label>
              <div class="col-xs-9">
                <select class="form-control required-validate" id="id-bank" name="bank">
                  <option value="0">-- Select Bank--</option>
                  
                  <?php
                  foreach($data_bank as $bank){
				     echo '<option value="'.$bank->bank_id.'">'.$bank->bank_name.'</option>';
				  }
				  ?>
                  
                </select>
              </div>
            </li>
            <li class="form-group row" id="id-row-visibility">
              <label class="control-label col-xs-3">Visibility</label>
              <div class="col-xs-9">
                <label class="radio-inline control-label">
                  <input type="radio" value="1" name="visibility" id="id-visibility-visible" checked>Yes
                </label>
                <label class="radio-inline control-label">
                  <input type="radio" value="0" name="visibility" id="id-visibility-invisible">No
                </label>
              </div>
            </li>
            <li class="form-group row" id="id-row-name">
              <label class="control-label col-xs-3">Account Name <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="bank-name" id="id-name" placeholder="Account name">
              </div>
            </li>
            <li class="form-group row" id="id-row-description">
              <label class="control-label col-xs-3">Account Description.</label>
              <div class="col-xs-9">
                <textarea class="form-control" rows="5" name="bank-description" id="id-description"></textarea>
              </div>
            </li>
            <li class="form-group row" id="id-row-number">
              <label class="control-label col-xs-3">Account No. <span>*</span></label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="bank-number" id="id-number" placeholder="Account No.">
              </div>
            </li>
            <li class="form-group row" id="id-row-currency">
              <label class="control-label col-xs-3">Currency. <span>*</span></label>
              <div class="col-xs-3">
                <select id="id-currency" name="currency" class="form-control">
                  <option value="0">-- Choose Currency --</option>
                  <option value="1">Rp</option>
                  <option value="2">USD$</option>
                </select>
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->
    </div><!--.container.main-->
  </form>


<script src="<?php echo BASE_URL;?>custom/script/bank-account.js"></script>
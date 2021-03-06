<?php
include('get.php');
include('update.php');
include('control.php');
?>

<form method="post" enctype="multipart/form-data">

    <div class="subnav">
      <div class="container clearfix">
        <h1><span class="glyphicon glyphicon-list"></span> &nbsp; <a href="<?php echo $prefix_url."career"?>">Career</a> <span class="info">/</span> Add Position</h1>
        <div class="btn-placeholder">
          <input type="hidden" name="cat_id" id="category_id"/>
          <a href="<?php echo $prefix_url."career";?>">
            <input type="button" class="btn btn-default btn-sm" value="Cancel" id="btn-add-category-cancel">
          </a>
          <input type="button" class="btn btn-success btn-sm" value="Save Changes" id="btn_alias">
          <input type="submit" class="hidden" value="Save Changes" name="btn_add_job" id="btn_save">
        </div>
      </div>
    </div>
    
	<?php
    show_alert($_SESSION['alert']['type'], $_SESSION['alert']['msg']);
	?>

    <div class="container main">

      <div class="box row">
        <div class="desc col-xs-3">
          <h3>Position Details</h3>
          <p>Your position details.</p>
        </div>
        <div class="content col-xs-9">
          <ul class="form-set" id="custom_product_category">
            <li class="form-group row hidden">
              <label class="control-label col-xs-3">Change Status</label>
              <div class="col-xs-9">
                <label class="radio-inline">
                  <input type="radio" value="Active" name="active_status" id="category_active_status_active" checked>Active
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Inactive" name="active_status" id="category_active_status_inactive">Inactive
                </label>
              </div>
            </li>
            
            <li class="form-group row">
              <label class="control-label col-xs-3">Visibility</label>
              <div class="col-xs-9">
                <label class="radio-inline">
                  <input type="radio" value="1" name="visibility_status" id="category_visibility_status_visible">Yes
                </label>
                <label class="radio-inline">
                  <input type="radio" value="0" name="visibility_status" id="category_visibility_status_invisible">No
                </label>
              </div>
            </li>
            
            <li class="form-group row hidden" id="lbl_category_department">
              <label class="control-label col-xs-3">Department</label>
              <div class="col-xs-9">
                <select class="form-control" name="category_department" id="category_department">
                  <?php
                  foreach($department as $department){
				     echo '<option value="'.$department->category_id.'">'.$department->category_name.'</option>';
				  }
				  ?>
                </select>
              </div>
            </li>
            
            <li class="form-group row" id="lbl_category_name">
              <label class="control-label col-xs-3">Position Name</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="category_name" placeholder="ex: Senior Manager" id="id_category_name">
              </div>
            </li>
            
            <li class="form-group row" id="lbl_career_description">
              <label class="control-label col-xs-3">Description</label>
              <div class="col-xs-9">
                <!--<input type="text" class="form-control" name="category_name" placeholder="ex: Jakarta" id="category_name">-->
                <textarea class="form-control" name="career_description" id="id_career_description" rows="5"></textarea>
              </div>
            </li>

			<li class="form-group row" id="lbl_career_reports">
              <label class="control-label col-xs-3">Reports To</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="career_reports" placeholder="" id="id_career_reports">
              </div>
            </li>

			<li class="form-group row" id="lbl_career_education">
              <label class="control-label col-xs-3">Education</label>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="career_education" placeholder="ex: Bachelor's degree required." id="id_career_education">
              </div>
            </li>
          </ul>
        </div>
      </div><!--.box-->

    </div><!--.container.main-->

</form>

<style>
.has-error {
border-color: #b94a48;
}
</style>

<script>
function initial(){
   $('#category_active_status_active').attr('checked', true);
   $('#category_visibility_status_visible').attr('checked', true);
   $('#id_category_name').focus();
}

function validation(){
  
  var dept = $('#category_department option:selected').val();
  var job  = $('#id_category_name').val();
  var desc = $('#id_career_description').val();
  
  $('#lbl_category_department').removeClass('has-error');
  $('#lbl_category_name').removeClass('has-error');
  $('#lbl_career_description').removeClass('has-error');
  
  if(dept == 'empty'){
     $('#lbl_category_department').addClass('has-error');
  }else if(job == ''){
     $('#lbl_category_name').addClass('has-error');
  }else if(desc == ''){
     $('#lbl_career_description').addClass('has-error');
  }else{
     $('#btn_save').click();
  }
  
}


$(document).ready(function(e) {
   initial();
   
   $('#btn_alias').click(function (){
      validation()
   });
});
</script>
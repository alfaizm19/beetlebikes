<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
<div class="d-flex align-items-center">
  <div class="mr-auto">
    <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
  </div>
 <a href="<? echo base_url('admin/collections') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
          </a></div>
</div>

<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
  <!--begin::Form-->
  <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="collections_form" id="collections_form" novalidate="novalidate">
    <div class="m-portlet__body pb-2">
      <div class="box-header with-border">
        <div id="delete_allmsg_div"></div>
        <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
      </div>
      
      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="collections_id"> Gender<span class="text-danger">*</span>
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <select name="gender" class="form-control m-select m_select_select " id="gender" data-placeholder="Select gender" required data-msg-required="Please select gender." data-allow-clear="true" >
          <option value="">Select Gender</option>
<?php
          if ($collections->gender == "Men") {

            ?>

             <option value="Men" selected>Men</option>
             <option value="Women" >Women</option>
                 <?php
              } else {
              ?>
              <option value="Women" selected>Women</option>
              <option value="Men" >Men</option>
              <?php
                  
              }
?>

</select>
          <div class="has-error"></div>
        </div>
      </div>
      
      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="collections"> Collections<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="collections" name="collections"  value="<?php echo $collections->collections ?>" required data-msg-required="Please enter collections name.">
        </div>
      </div>

      <div class="form-group m-form__group row Image">
          <label class="col-form-label col-lg-3 col-sm-12" for="image_path"> Image  (1920px W * 606px H) </label>
          <div class="col-lg-9 col-md-12 col-sm-12">
              <div class="cropoutterwrap">
                  <input type="file"  class="form-control validImage" name="image_path" id="image_path" data-image-crop="1" data-image-height="606" data-image-width="1920" data-caption="Image" data-image-path ="collection/" data-msg-required="Please upload image">
              </div>
              <?php if ($collections->image_path != ""): ?>
                  <div class="w-25 mt-2">
                      <img class="w-100" src="<?php echo base_url($collections->image_path); ?>">
                  </div>
              <?php endif; ?>
          </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title<span class="text-danger">*</span></label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control input-lg m-input" id="meta_title" name="meta_title" value="<?php echo $collections->meta_title ?>" data-msg-required="Please enter Meta Title.">
          </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_key_words"> Meta Keywords</label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <textarea name="meta_key_words" cols="4" rows="4" id="meta_key_words" class="form-control input-lg m-input" ><?php echo $collections->meta_key_words ?></textarea>
          </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description</label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <textarea name="meta_description" cols="4" rows="4" id="meta_description" class="form-control input-lg m-input" ><?php echo $collections->meta_description ?></textarea>
          </div>
      </div>

                
      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
        <div class="col-sm-2">
          <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order"  value="<?php echo $collections->collections ?>" name="display_order" value="0">
        </div>
      </div>
      <hr class="my-2">
      <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
        <div class="m-form__actions m-form__actions py-0 ">
          <div class="row">
            <div class="col-lg-9 ml-lg-auto">
              <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i>
                Save
              </button>
              <a  class="btn btn-secondary" href="<? echo base_url('admin/collections'); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>

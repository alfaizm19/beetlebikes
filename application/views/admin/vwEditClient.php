<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
<div class="d-flex align-items-center">
  <div class="mr-auto">
    <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
  </div>
 <a href="<? echo base_url('admin/clients') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
          </a></div>
</div>

<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
  <!--begin::Form-->
  <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="testimonial_form" id="testimonial_form" novalidate="novalidate">
    <div class="m-portlet__body pb-2">
      <div class="box-header with-border">
        <div id="delete_allmsg_div"></div>
        <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
      </div>
      
      
      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name"> Name<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="name" name="name" value="<? echo get_input('name',$client->name); ?>" required data-msg-required="Please enter name.">
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="client_image">Logo  <? echo CLIENT_SIZE; ?></label> 
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input type="file"  class="form-control validImage" name="client_image" id="client_image" data-image-crop="1" data-image-height="<? echo CLIENT_SIZE_HEIGHT; ?>" data-image-width="<? echo CLIENT_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="clients/"  data-msg-required="Please upload image">
          </div>
              <? if($client->logo != ""): ?>
              <div class="w-25 mt-2">
                <img src="<? echo base_url($client->logo); ?>">
              </div>
            <? endif; ?>
        </div>
      </div>

         <!-- <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="external_link">
            External link  
          </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input valid_custom_url" value="<? echo get_input('external_link',$client->external_link); ?>" name="external_link" id="external_link"  data-msg-required="Please enter external link">
          </div>
        </div> -->
        
      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
        <div class="col-sm-2">
          <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<? echo get_input('display_order',$client->display_order); ?>">
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
              <a  class="btn btn-secondary" href="<? echo base_url('admin/clients'); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>

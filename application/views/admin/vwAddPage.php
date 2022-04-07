<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title">
        <? echo $page_title ?> </h3>
    </div>
    <a href="<? echo base_url('admin/page') ?>" class="btn btn-success m-btn m-btn--icon">
      <span>
        <i class="fa fa-arrow-circle-o-left"></i>
        <span></span>Back</span>
    </a>
  </div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data"
      name="user_form" id="user_form" novalidate="novalidate">
      <div class="m-portlet__body pb-2">

        <div class="box-header with-border">
          <div id="delete_allmsg_div"></div>
          <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="page_name"> Page Name<span class="text-danger">*</span> </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('page_name'); ?>" name="page_name" id="page_name"
              required data-msg-required="Please enter page name.">
          </div>
        </div>
        
        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="page_title"> Page Title<span class="text-danger">*</span> </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('page_title'); ?>" name="page_title" id="page_title"
              required data-msg-required="Please enter page title.">
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="banner_caption"> Banner Image Caption<span class="text-danger">*</span> </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('banner_caption'); ?>" name="banner_caption" id="banner_caption"
              required data-msg-required="Please enter banner image caption.">
          </div>
        </div>


        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="banner_image"> Banner Image<? echo BANNER_IMAGE_SIZE; ?><span class="text-danger">*</span></span></label>
          <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="cropoutterwrap">
              <input type="file" required class="form-control validImage" name="banner_image" id="banner_image" data-image-crop="1" data-image-height="<? echo BANNER_IMAGE_SIZE_HEIGHT; ?>"
              data-image-width="<? echo BANNER_IMAGE_SIZE_WIDTH; ?>" data-caption="Image" data-image-path="page/content/" required data-msg-required="Please upload image">
            </div>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="banner_text"> Banner Image Text </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('banner_text'); ?>" name="banner_text" id="banner_text">
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="banner_description"> Banner Image Description </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <textarea name="banner_description" id="banner_description" class="form-control input-lg m-input" rows="3" ><? echo get_input('banner_description'); ?></textarea>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="description"> Page Description </label>
          <div class="col-lg-6 col-md-9 col-sm-12">
            <textarea name="description" id="description" required data-msg-ckrequired="Please enter page description" class="form-control description input-lg m-input" rows="3"><? echo get_input('description'); ?></textarea>
            <div class="has-error"></div>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title <span class="text-danger">*</span></label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" required data-msg-required="Please enter meta title." value="<? echo get_input('meta_title'); ?>" name="meta_title" id="meta_title">
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_keyword"> Meta Keyword </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <textarea name="meta_keyword" id="meta_keyword" class="form-control input-lg m-input" rows="3"><? echo get_input('meta_keyword'); ?></textarea>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <textarea name="meta_description" id="meta_description" class="form-control input-lg m-input" rows="3" ><? echo get_input('meta_description'); ?></textarea>
          </div>
        </div>

        <hr class="my-2">
        <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
          <div class="m-form__actions m-form__actions py-0 ">
            <div class="row">
              <div class="col-lg-9 ml-lg-auto">
                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i>Save
                </button>
                <a class="btn btn-secondary" href="<? echo base_url('admin/page'); ?>"><i class="fa fa-times"></i> Cancel </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form>
    <!--end::Form-->
  </div>
</div>
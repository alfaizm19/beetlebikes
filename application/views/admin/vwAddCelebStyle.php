<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
<div class="d-flex align-items-center">
  <div class="mr-auto">
    <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
  </div>
 <a href="<? echo base_url('admin/celeb-style') ?>" class="btn btn-success m-btn m-btn--icon">
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
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Title<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="title" name="title"  value="<? echo get_input('title'); ?>" required data-msg-required="Please enter title.">
        </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="description">Description<span class="text-danger">*</span></label>
          <div class="col-lg-9 col-md-9 col-sm-12">
              <textarea name="description" cols="4" rows="4" id="description" class="form-control ckerequired description input-lg m-input" required data-msg-ckrequired="Please enter description." ><?php echo get_input('description'); ?></textarea>
              <div class="has-error"></div>
          </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Price (AED)<span class="text-danger">*</span></label>
        <div class="col-lg-2 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="price_aed" name="price_aed"  value="<? echo get_input('price_aed'); ?>" required data-msg-required="Please enter price aed.">
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Price (USD)<span class="text-danger">*</span></label>
        <div class="col-lg-2 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="price_usd" name="price_usd"  value="<? echo get_input('price_usd'); ?>" required data-msg-required="Please enter price usd.">
        </div>
      </div>

      <div class="form-group m-form__group row imageFile">
        <label class="col-form-label col-lg-3 col-sm-12" for="celeb_image">Celeb Image (409px W * 585px H) <span class="text-danger">*</span></label>
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input required type="file" class="form-control validImage" name="celeb_image" id="celeb_image" data-image-crop="1" data-image-height="585" data-image-width="409" data-caption="Image" data-image-path ="celeb-image/" data-msg-required="Please upload image.">
          </div>
        </div>
      </div>

      <div class="form-group m-form__group row imageFile">
        <label class="col-form-label col-lg-3 col-sm-12" for="product_image">Product Image in PNG (409px W * 585px H)</label>
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input type="file" class="form-control validImage" name="product_image" id="product_image" data-image-crop="1" data-image-height="585" data-image-width="409" data-caption="Image" data-image-path ="celeb-image/product-image/" data-msg-required="Please upload image.">
          </div>
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Link</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="link" name="link"  value="<? echo get_input('link'); ?>" data-msg-required="Please enter link.">
        </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="country">
               Background Color <span class="text-danger">*</span>
          </label>

          <div class="col-lg-4 col-md-9 col-sm-12">
              <select name="background" class="form-control " id="background" data-placeholder="Select background" required data-msg-required="Please select background." data-allow-clear="true">
                  <option value="">Select Background Color</option>
                  <option value="white">White</option>
                  <option value="light_grey">Light Grey</option>
                  <option value="peach">Peach</option>
              </select> 
              <div class="has-error"></div>
          </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
        <div class="col-sm-2">
          <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<? echo get_input('display_order'); ?>">
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
              <a  class="btn btn-secondary" href="<? echo base_url('admin/celeb-style'); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>
<script type="text/javascript">
   function mediaType(mediaId)
    {
      //alert(mediaId);
      if(mediaId == "2")
      {
        $(".Video").hide();
        $(".VideoFile").show();
      }
      else if(mediaId == "3")
      {
        $(".Video").show();
        $(".VideoFile").hide();
      }
      else
      {
        $(".Video").hide();
        $(".VideoFile").hide();
      }
    }
    mediaType("");
</script>

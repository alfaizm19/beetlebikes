<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
<div class="d-flex align-items-center">
  <div class="mr-auto">
    <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
  </div>
 <a href="<? echo base_url('admin/site-reviews') ?>" class="btn btn-success m-btn m-btn--icon">
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
        <label class="col-form-label col-lg-3 col-sm-12" for="testimonial">Testimonial<span class="text-danger">*</span></label>
        <div class="col-lg-6 col-md-9 col-sm-12">
          <textarea required name="testimonial" id="testimonial" data-msg-required="Please enter testimonial" class="form-control   input-lg m-input" rows="8"><? echo get_input('testimonial'); ?></textarea>
          <div class="has-error"></div>
        </div>
      </div>

	  <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Name<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="name" name="name"  value="<? echo get_input('name'); ?>" required data-msg-required="Please enter name.">
        </div>
      </div>
	  <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Company Name/Designation<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="designation" name="designation"  value="<? echo get_input('designation'); ?>" required data-msg-required="Please enter designation.">
        </div>
      </div>


      <div class="form-group m-form__group row imageFile">
        <label class="col-form-label col-lg-3 col-sm-12" for="review_image">Profile Picture
		<? echo CLIENT_SIZE; ?> </label>
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input type="file" class="form-control validImage" name="review_image" id="review_image" data-image-crop="1" data-image-height="<? echo CLIENT_SIZE_HEIGHT;?>" data-image-width="<? echo CLIENT_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="site-reviews/" data-msg-required="Please upload image.">
          </div>
        </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="country">
               Rating <span class="text-danger">*</span>
          </label>

          <div class="col-lg-4 col-md-9 col-sm-12">
              <select name="rating" class="form-control " id="rating" data-placeholder="Select rating" required data-msg-required="Please select rating." data-allow-clear="true">
                  <option value="">Select Rating</option>
                  <option value="0.5">0.5 Stars - Very Bad</option>
                  <option value="1">1 Stars - Bad</option>
                  <option value="1.5">1.5 Stars - Bad</option>
                  <option value="2">2 Stars - Poor</option>
                  <option value="2.5">2.5 Stars - Poor</option>
                  <option value="3">3 Stars - Average</option>
                  <option value="3.5">3.5 Stars - Average</option>
                  <option value="4">4 Stars - Great</option>
                  <option value="4.5">4.5 Stars - Excellent</option>
                  <option value="5">5 Stars - Excellent</option>
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
              <a  class="btn btn-secondary" href="<? echo base_url('admin/reviews'); ?>"><i class="fa fa-times"></i> Cancel </a>
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

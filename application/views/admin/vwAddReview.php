<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
<div class="d-flex align-items-center">
  <div class="mr-auto">
    <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
  </div>
 <a href="<? echo base_url('admin/reviews') ?>" class="btn btn-success m-btn m-btn--icon">
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
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Company Name<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="company_name" name="company_name"  value="<? echo get_input('company_name'); ?>" required data-msg-required="Please enter company name.">
        </div>
      </div>
	  <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Client Name<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="client_name" name="client_name"  value="<? echo get_input('client_name'); ?>" required data-msg-required="Please enter client name.">
        </div>
      </div>
	  <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Designation<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="designation" name="designation"  value="<? echo get_input('designation'); ?>" required data-msg-required="Please enter designation.">
        </div>
      </div>


      <div class="form-group m-form__group row imageFile">
        <label class="col-form-label col-lg-3 col-sm-12" for="review_image">Logo<span class="text-danger">*</span>
		<? echo CLIENT_SIZE; ?> </label>
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input type="file" required class="form-control validImage" name="review_image" id="review_image" data-image-crop="1" data-image-height="<? echo CLIENT_SIZE_HEIGHT;?>" data-image-width="<? echo CLIENT_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="reviews/" data-msg-required="Please upload image.">
          </div>
        </div>
      </div>

         <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="testimonial">Testimonial</label>
          <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea name="testimonial" id="testimonial" data-msg-required="Please enter testimonial" class="form-control   input-lg m-input" rows="8"><? echo get_input('testimonial'); ?></textarea>
                        <div class="has-error"></div>
        </div>
		</div>

    <div class="form-group m-form__group row">
         <label class="col-form-label col-lg-3 col-sm-12" for="media_type">Media Type
         </label>
         <div class="col-lg-4 col-md-9 col-sm-12">
             <select name="media_type" id="media_type" class="form-control select-control" data-msg-required="Please select media type." onchange="mediaType(this.value)">
                 <option value="">Select Media Type</option>
                 <option value="3">Embed Code</option>
                 <option value="2">Video</option>
             </select>
         </div>
     </div>
     <div class="form-group m-form__group row Video" style="">
         <label class="col-form-label col-lg-3 col-sm-12" for="video_link">Media Embed Code</label>
         <div class="col-lg-4 col-md-9 col-sm-12">
             <textarea class="form-control m-input" id="video_link" name="video_link" rows="3" data-msg-required="Please etner embed code"></textarea>
         </div>
     </div>

     <div class="form-group m-form__group row VideoFile" style="">
                 <label class="col-form-label col-lg-3 col-sm-12" for="video_file">Video File (.mp4/.mkv)</label>
                 <div class="col-lg-4 col-md-9 col-sm-12">
                     <input type="file" class="form-control validVideo" name="video_file" id="video_file" data-msg-required="Please upload video." data-caption="video file" data-image-path="banner-video/">

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

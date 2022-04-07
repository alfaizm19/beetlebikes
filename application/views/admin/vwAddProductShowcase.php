<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
  <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
</div>
<a href="<?php echo base_url('admin/product_showcase/index/'.$this->uri->segment(4).'') ?>" class="btn btn-success m-btn m-btn--icon">
  <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
</a></div>
</div>

<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

  <!--begin::Form-->
  <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="product_form" id="product_form" novalidate="novalidate">
    <div class="m-portlet__body pb-2">
      <div class="box-header with-border">
        <div id="delete_allmsg_div"></div>
        <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
      </div>

      <div class="form-group m-form__group row" style="display:none;">
        <label class="col-form-label col-lg-3 col-sm-12" for="type"> Type <span class="text-danger">*</span> </label> 
        <div class="col-lg-4 col-md-9 col-sm-12">
          <div class="cropoutterwrap">
            <select class="form-control m-select m_select_select" id="type" name="type" data-placeholder="Select Type" required data-msg-required="Please select tpye." data-allow-clear="true">
              <option value="image">Image</option>
              <option value="video">Video</option>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group m-form__group row video_url_div" style="display: none;">
          <label class="col-form-label col-lg-3 col-sm-12" for="video_url">Video URL<span class="text-danger">*</span></label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control input-lg m-input" id="video_url" name="video_url" value="<?php echo get_input('video_url'); ?>" required data-msg-required="Please enter video URL.">
          </div>
      </div>

      <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12" for="title1"> Title <span class="text-danger">*</span></label> 
        <div class="col-lg-4 col-md-9 col-sm-12">
          <div class="cropoutterwrap">
            <input type="text" class="form-control" name="title1" id="title1" data-msg-required="Please enter title" required>
          </div>
        </div>
      </div>

      <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12" for="description1"> Description <span class="text-danger">*</span></label> 
        <div class="col-lg-4 col-md-9 col-sm-12">
          <div class="cropoutterwrap">
            <textarea type="text" class="form-control" name="description1" id="description1" data-msg-required="Please enter description" required></textarea>
          </div>
        </div>
      </div>

      <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12" for="product_image1"> Image   (220px W * 220px H)<?php //echo PRODUCT_IMAGES;?><span class="text-danger">*</span> </label> 
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input type="file" required  class="form-control validImage" name="product_image1" id="product_image1" data-image-crop="0" data-image-height="<?=PRODUCT_IMAGES_HEIGHT?>" data-image-width="<?=PRODUCT_IMAGES_WIDTH?>" data-caption="Image" data-image-path ="productimage/" data-msg-required="Please upload image">
          </div>
        </div>
      </div>

      <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12" for="product_image_alt1"> Image ALT </label> 
        <div class="col-lg-4 col-md-9 col-sm-12">
          <div class="cropoutterwrap">
            <input type="text" class="form-control" name="product_image_alt1" id="product_image_alt1" data-msg-required="Please enter image alt">
          </div>
        </div>
      </div>


      <div id="addmore_product" class="Image"></div>

      <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12 " for=""></label>
        <div class="col-sm-2">
          <a class="btn btn-success"   onclick="addMore(this);"><i class="fa fa-plus"></i> Add more</a>
        </div>
      </div>
      <input type="hidden" value="1" name="hide_total_field" id="hide_total_field" />
      <input type="hidden" value="<?=$this->uri->segment(4);?>" name="hid_product_id" />
      <hr class="my-2">
      <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
        <div class="m-form__actions m-form__actions py-0 ">
          <div class="row">
            <div class="col-lg-9 ml-lg-auto">
              <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i>
                Save
              </button>
              <a  class="btn btn-secondary" href="<?php echo base_url('admin/product_image/index/'.$this->uri->segment(4).''); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>

<script id="addMoreImage" type="text/x-jQuery-tmpl">
<div class="added_Image">

  <div class="form-group m-form__group row Image">
    <label class="col-form-label col-lg-3 col-sm-12" for="title${intIndex}"> Title <span class="text-danger">*</span></label> 
    <div class="col-lg-4 col-md-9 col-sm-12">
      <div class="cropoutterwrap">
        <input type="text" class="form-control" name="title${intIndex}" id="title${intIndex}" data-msg-required="Please enter title" required>
      </div>
    </div>
  </div>

  <div class="form-group m-form__group row Image">
    <label class="col-form-label col-lg-3 col-sm-12" for="description${intIndex}"> Description <span class="text-danger">*</span></label> 
    <div class="col-lg-4 col-md-9 col-sm-12">
      <div class="cropoutterwrap">
        <textarea type="text" class="form-control" name="description${intIndex}" id="description${intIndex}" data-msg-required="Please enter description" required></textarea>
      </div>
    </div>
  </div>

  <div class="form-group m-form__group row Image">
    <label class="col-form-label col-lg-3 col-sm-12" for="product_image${intIndex}"> Image  (220px W * 220px H)<?php //echo PRODUCT_IMAGES; ?><span class="text-danger">*</span> </label> 
    <div class="col-lg-9 col-md-12 col-sm-12">
      <div class="cropoutterwrap">
        <input type="file" data-image-crop="0" required class="form-control validImage" name="product_image${intIndex}" id="product_image${intIndex}" data-image-crop="0" data-image-height="<?= PRODUCT_IMAGES_HEIGHT ?>" data-image-width="<?= PRODUCT_IMAGES_WIDTH ?>" data-caption="Image" data-image-path ="productimage/" data-msg-required="Please upload image">
      </div>
    </div>
  </div>
  <div class="form-group m-form__group row Image">
    <label class="col-form-label col-lg-3 col-sm-12" for="product_image_alt${intIndex}"> Image ALT </label> 
    <div class="col-lg-4 col-md-9 col-sm-12">
      <div class="cropoutterwrap">
        <input type="text" class="form-control" name="product_image_alt${intIndex}" id="product_image_alt${intIndex}" data-msg-required="Please enter image alt">
      </div>
    </div>
  </div>
  <div class="form-group m-form__group row ">
    <label class="col-form-label col-lg-3 col-sm-12" for=""></label>
    <div class="col-lg-4 col-md-9 col-sm-12" ><a class="btn btn-danger"  onclick="removeMore(this);"><i class="fa fa-fw fa-trash-o"></i></a></div></div>
  </div>
</script>
<script>
  var intIndex = 1;
  function addMore(thisval) {
    intIndex++;
    $("#hide_total_field").val(intIndex);
    $("#addMoreImage").tmpl(intIndex).appendTo("#addmore_product");
  }
  function removeMore(thisval) {
    $(thisval).parent().parent().parent().remove();
  }

  $("#type").click(function(event) {
    type = $(this).val();

    if (type == 'video') {
      $(".Image").hide();
      $(".video_url_div").show()
    } else {
      $(".video_url_div").hide()
      $(".Image").show();
    }

  });
</script>
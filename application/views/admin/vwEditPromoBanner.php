<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/promo_banner') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<?php if (empty($banner)): ?>
    <?php $this->load->view('admin/partials/_admin_not_found'); ?>
    <?php return FALSE;
endif;
?>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
<?php echo display_flash('error'); ?>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="banner_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="media_type">Media Type<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select required name="media_type" id="media_type" class="form-control select-control" data-msg-required="Please select media type." onchange="mediaType(this.value)">
                            <option value="1" <?php if(get_input('media_type', $banner->media_type) == "1") {?>selected<?php } ?>>Image</option>
                            <option value="3" <?php if(get_input('media_type', $banner->media_type) == "3") {?>selected<?php } ?>>Embed Code</option>
                            <option value="2" <?php if(get_input('media_type', $banner->media_type) == "2") {?>selected<?php } ?>>Video</option>
                        </select>
                    </div>
                </div>
                <div class="imageFile">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_title">Promo Banner Title <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="banner_title" required name="banner_title"  value="<?php echo get_input('banner_title', $banner->banner_title); ?>"  data-msg-required="Please enter banner title." maxlength="60">
                    </div>
                </div>

                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_title_color">Promo Banner Title Color<span class="text-danger">* </span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input jscolor {hash:true} w-30" required id="banner_title_color" name="banner_title_color" value="<?php echo get_input('banner_title_color', $banner->banner_title_color); ?>"  data-msg-required="Please enter banner title color.">
                    </div>
                </div> -->


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_caption">Promo Banner Caption  </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="banner_caption" class="form-control input-lg m-input" id="banner_caption" name="banner_caption"  value="<?php echo get_input('banner_caption', $banner->banner_caption); ?>"  data-msg-required="Please enter banner caption.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_image">Promo Banner Image <?php echo PROMO_BANNER_IMAGE_SIZE; ?> </label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="banner_image" id="banner_image" data-image-crop="1" data-image-height="<?php echo PROMO_BANNER_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<?php echo PROMO_BANNER_IMAGE_SIZE_WIDTH; ?>" data-caption="Promo Banner Image" data-image-path ="banner/">
                        </div>
<?php if ($banner->banner_image != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<?php echo base_url($banner->banner_image); ?>">
                            </div>
<?php endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="answer"> Description<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" required data-msg-ckrequired="Please enter description." class="form-control  input-lg m-input" rows="4" maxlength="130"><?php echo get_input('description', $banner->description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button1_text">Button 1 Text </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="button1_text" name="button1_text"  value="<?php echo get_input('button1_text', $banner->button1_text); ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button1_link">Button 1 Link </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="button1_link" name="button1_link"  value="<?php echo get_input('button1_link', $banner->button1_link); ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button2_text">Button 2 Text </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="button2_text" name="button2_text"  value="<?php echo get_input('button2_text', $banner->button2_text); ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button2_link">Button 2 Link </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="button2_link" name="button2_link"  value="<?php echo get_input('button2_link', $banner->button2_link); ?>">
                    </div>
                </div>
              </div>
              <div class="form-group m-form__group row Video" style="display:none;">
                  <label class="col-form-label col-lg-3 col-sm-12" for="video_link">Media Embed Code<span class="text-danger">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-12">
                      <textarea class="form-control m-input" id="video_link" name="video_link" rows="3" data-msg-required="Please etner embed code" required><? echo get_input('embed_video', $banner->embed_video); ?></textarea>

                  </div>
              </div>
              <div class="form-group m-form__group row VideoFile" style="display:none;">
                  <label class="col-form-label col-lg-3 col-sm-12" for="video_file">Video File (.mp4/.mkv)<span class="text-danger">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-12">
                      <input type="file" class="form-control validVideo" name="video_file"  id="video_file" data-msg-required="Please upload video." data-caption="video file" data-image-path="banner-video/">

                  </div>
              </div>

              <?php
                if($banner->media_type == 2)
                {
                  echo "<div class='text-center videoFilePreview'><video controls='controls' preload='none' name='media' class='admin-grid-img'><source src='" . base_url() . $banner->banner_video . "'  type='video/mp4'></video></div>";
                }
                if($banner->media_type == 3)
                {
                  echo "<div class='text-center admin-embedcode videoPreview'>" . $banner->embed_video . "</div>";
                }
              ?>
                <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="start_date">
                        Start Date<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date start_date w-50">
                            <input type="text" id="start_date" name="start_date" value="<?php echo get_input('start_date', ($banner->start_date != DEFAULT_DATE) ? $banner->start_date : ''); ?>" class="form-control m_datepicker start_date  m-input small-textbox" required data-msg-required="Please enter start date."  data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="end_date">
                        End Date<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date end_date w-50" >
                            <input type="text" required id="end_date" name="end_date" value="<?php echo get_input('end_date', ($banner->end_date != DEFAULT_DATE) ? $banner->end_date : ''); ?>" class="form-control m_datepicker end_date m-input small-textbox"  data-msg-required="Please enter end date."  data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>
                        </div>
                    </div>
                </div>

         <!-- <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="external_link">
            External link
          </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input validurl" value="<?php echo get_input('external_link',$banner->external_link); ?>" name="external_link" id="external_link"  data-msg-required="Please enter external link">
          </div>
        </div> -->
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order', $banner->display_order); ?>">
                    </div>
                </div>

                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
                                </button>
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/promo_banner'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
mediaType(<?php echo get_input('media_type', $banner->media_type); ?>);
    $(function () {
        var dateFormat = "yyyy-mm-dd",
                from = $(".start_date")
                .datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true,
                    pickerPosition: 'bottom-right',
                    autoclose: true
                })
                .on("change", function (e) {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $(".end_date").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            pickerPosition: 'bottom-right',
            autoclose: true
        })
                .on("change", function (e) {
                    from.datepicker("option", "maxDate", getDate(this));
                });
        function getDate(element) {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var flag = false;
            if (start_date <= end_date) {
                flag = true;
            } else if (start_date >= end_date) {
                flag = false;
                return  $("#end_date").val('');
            }

        }

    });

    function mediaType(mediaId)
    {
      if(mediaId == "1")
      {
        $(".imageFile").show();
        $(".Video").hide();
        $(".VideoFile").hide();
      }
      if(mediaId == "2")
      {
        $(".imageFile").hide();
        $(".Video").hide();
        $(".VideoFile").show();
      }
      if(mediaId == "3")
      {
        $(".imageFile").hide();
        $(".Video").show();
        $(".VideoFile").hide();
      }
    }
</script>

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/banner') ?>" class="btn btn-success m-btn m-btn--icon">
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
<?php 
    echo display_flash('error');
?>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="banner_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row" style="display:none;">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_title">Banner Type <span class="text-danger">* </span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="banner_type" class="form-control input-lg m-input" required id="banner_type" data-msg-required="Please select banner type.">
                            <option <?php echo $banner->banner_type == 'image'? 'selected':''; ?> value="image">Image</option>
                            <option <?php echo $banner->banner_type == 'video'? 'selected':''; ?> value="video">Video</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="form-group m-form__group type-video row <?php echo $banner->banner_type == 'video'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="video_url">Video URL <span class="text-danger">* </span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" required id="video_url" name="video_url" value="<?php echo $banner->video_url ?>"
                         data-msg-required="Please enter video url.">
                    </div>
                </div> -->

                <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_image">Banner Image 
                        <?php if (empty($banner->banner_image)): ?>
                        <span class="text-danger">* </span>
                        <?php endif ?>
                        (1940px W * 670px H) 
                    </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12"> 
                        <div class="cropoutterwrap">
                        <input type="file" 
                        <?php echo empty($banner->banner_image)? 'required':'';  ?>
                        class="form-control validImage" name="banner_image" id="banner_image" data-image-crop="0" data-image-height="670" data-image-width="1940" data-caption="Image" data-image-path ="banner/" <?php echo empty($banner->banner_image)? 'required':''; ?> data-msg-required="Please upload banner image."> 
                    </div> 
                    <?php if ($banner->banner_image != ""): ?>
                        <div class="w-25 mt-2">
                            <img class="w-100" src="<?php echo base_url($banner->banner_image); ?>">
                        </div>
                    <?php endif; ?>
                    </div> 
                </div>

                <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_image_alt">Banner Image Alt</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="banner_image_alt" name="banner_image_alt" value="<?php echo get_input('banner_image_alt', $banner->banner_alt); ?>"
                         data-msg-required="Please enter banner image alt.">
                    </div>
                </div>

                <!-- <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>"> 
                    <label class="col-form-label col-lg-3 col-sm-12" for="mob_banner_image">
                        Mob Banner Image 
                        <?php if (empty($banner->mob_banner_image)): ?>
                            <span class="text-danger">* </span>
                        <?php endif ?>
                        (375px W * 650px H) 
                    </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12"> 
                        <div class="cropoutterwrap">
                            <input type="file" 
                            <?php echo empty($banner->mob_banner_image)? 'required ':'' ?>
                            class="form-control validImage" name="mob_banner_image" id="mob_banner_image" data-image-crop="0" data-image-height="650" data-image-width="375" data-caption="Image" data-image-path ="banner/mob/" <?php echo empty($banner->banner_image)? 'required':''; ?> data-msg-required="Please upload mob banner image.">
                        </div> 
                        <?php if ($banner->mob_banner_image != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<?php echo base_url($banner->mob_banner_image); ?>">
                            </div>
                        <?php endif; ?>
                    </div> 
                </div> -->

                <!-- <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="mob_banner_image_alt">Mob Banner Image Alt</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="mob_banner_image_alt" name="mob_banner_image_alt" value="<?php echo get_input('mob_banner_image_alt', $banner->mob_banner_alt); ?>"
                         data-msg-required="Please enter mob banner image alt.">
                    </div>
                </div> -->

                <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="heading">Banner Heading</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="heading" name="heading" value="<?php echo get_input('heading', $banner->heading); ?>"
                         data-msg-required="Please enter banner heading">
                    </div>
                </div>

                <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="content">Banner Content</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea class="form-control input-lg m-input w-30" name="content" id="content" data-msg-required="Please enter mob banner image alt."><?php echo get_input('content', $banner->content); ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button_name">Button Name</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="button_name" name="button_name" value="<?php echo get_input('button_name', $banner->button_name); ?>"
                         data-msg-required="Please enter button name">
                    </div>
                </div>

                <div class="form-group m-form__group type-image row <?php echo $banner->banner_type == 'image'? '':'hide'; ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button_link">Button Link</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="button_link" name="button_link" value="<?php echo get_input('button_link', $banner->button_link); ?>"
                         data-msg-required="Please enter button link name">
                    </div>
                </div>
                
                <!-- <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_date">
                        Display Date
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date display_date w-50">
                            <input type="text" id="display_date" name="display_date" value="<?php echo $banner->display_date ?>" class="form-control m_datepicker display_date m-input small-textbox" data-msg-required="Please enter display date." data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_time">
                        Display Time
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date display_time w-50">
                            <input type="text" id="display_time" name="display_time" value="<?php echo !empty($banner->display_time)? date('h:i A', strtotime($banner->display_time)):'' ?>" class="form-control m_timepicker display_time m-input small-textbox" data-msg-required="Please enter display time." data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="end_time">
                        End Time
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date end_time w-50">
                            <input type="text" id="end_time" name="end_time" value="<?php echo !empty($banner->end_time)? date('h:i A', strtotime($banner->end_time)):'' ?>" class="form-control m_timepicker end_time m-input small-textbox" data-msg-required="Please enter display time." data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>
                        </div>
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/banner'); ?>"><i class="fa fa-times"></i> Cancel </a>
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

    $("#banner_type").change(function(event) {
        bannerType = $(this).val();

        if (bannerType == 'video') {
            $(".type-image").addClass('hide');
            $(".type-video").removeClass('hide');
        } else {
            $(".type-video").addClass('hide');
            $(".type-image").removeClass('hide');
        }

    });
</script>

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/banner') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a></div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <?php echo display_flash('error'); ?>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="banner_form" id="banner_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">

                <?php 
                  $fieldError = $this->session->flashdata('fieldError');
                  $fieldValue = $this->session->flashdata('fieldValue');
                  // print_r($fieldError);
                  // print_r($fieldValue);
                ?>

                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row" style="display: none;">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_type">Banner Type <span class="text-danger">* </span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="banner_type" class="form-control input-lg m-input" id="banner_type" data-msg-required="Please select banner type.">
                            <option <?php echo (isset($fieldValue['banner_type']) && $fieldValue['banner_type'] == 'image')? 'selected':''; ?> value="image">Image</option>
                            <option <?php echo (isset($fieldValue['banner_type']) && $fieldValue['banner_type'] == 'video')? 'selected':''; ?> value="video">Video</option>
                        </select>

                        <?php if (isset($fieldError['banner_type'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['banner_type']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group type-image row
                <?php
                    if (isset($fieldValue['banner_type'])) {
                        if ($fieldValue['banner_type'] == 'video'){echo 'hide';
                        }
                    }
                ?>
                "> <label class="col-form-label col-lg-3 col-sm-12" for="banner_image">Banner Image <span class="text-danger">* </span></span>(1940px W * 670px H) </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12"> 
                        <div class="cropoutterwrap"> 
                            <input type="file" class="form-control validImage" name="banner_image" id="banner_image" data-image-crop="0" data-image-height="670" data-image-width="1940" data-caption="Image" data-image-path ="banner/" data-msg-required="Please upload banner image."> 
                        </div> 
                        <?php if (isset($fieldError['banner_image'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['banner_image']; ?>
                          </span>
                        <?php endif ?>
                    </div> 
                </div>

                <div class="form-group m-form__group type-image row
                <?php
                    if (isset($fieldValue['banner_type'])) {
                        if ($fieldValue['banner_type'] == 'video'){echo 'hide';
                        }
                    }
                ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_image_alt">Banner Image Alt</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="banner_image_alt" name="banner_image_alt" value="<?php echo isset($fieldValue['banner_image_alt'])? $fieldValue['banner_image_alt']:get_input('banner_image_alt'); ?>"
                         data-msg-required="Please enter banner image alt.">

                        <?php if (isset($fieldError['banner_image_alt'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['banner_image_alt']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group type-image row <?php
                    if (isset($fieldValue['banner_type'])) {
                        if ($fieldValue['banner_type'] == 'video'){echo 'hide';
                        }
                    }
                ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="heading">Banner Heading</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="heading" name="heading" value="<?php echo isset($fieldValue['heading'])? $fieldValue['heading']:get_input('heading'); ?>"
                         data-msg-required="Please enter banner heading">

                        <?php if (isset($fieldError['heading'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['heading']; ?>
                          </span>
                        <?php endif ?>

                    </div>
                </div>

                <div class="form-group m-form__group type-image row <?php
                    if (isset($fieldValue['banner_type'])) {
                        if ($fieldValue['banner_type'] == 'video'){echo 'hide';
                        }
                    }
                ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="content">Banner Content</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea class="form-control input-lg m-input w-30" name="content" id="content" data-msg-required="Please enter mob banner image alt."><?php echo isset($fieldValue['content'])? $fieldValue['content']:get_input('content'); ?></textarea>

                        <?php if (isset($fieldError['content'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['content']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group type-image row <?php
                    if (isset($fieldValue['banner_type'])) {
                        if ($fieldValue['banner_type'] == 'video'){echo 'hide';
                        }
                    }
                ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button_name">Button Name</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="button_name" name="button_name" value="<?php echo isset($fieldValue['button_name'])? $fieldValue['button_name']:get_input('button_name'); ?>"
                         data-msg-required="Please enter button name">

                        <?php if (isset($fieldError['button_name'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['button_name']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group type-image row <?php
                    if (isset($fieldValue['banner_type'])) {
                        if ($fieldValue['banner_type'] == 'video'){echo 'hide';
                        }
                    }
                ?>">
                    <label class="col-form-label col-lg-3 col-sm-12" for="button_link">Button Link</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="button_link" name="button_link" value="<?php echo isset($fieldValue['button_link'])? $fieldValue['button_link']:get_input('button_link'); ?>"
                         data-msg-required="Please enter button link name">

                        <?php if (isset($fieldError['button_link'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['button_link']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo isset($fieldValue['display_order'])? $fieldValue['display_order']:get_input('display_order'); ?>">

                        <?php if (isset($fieldError['display_order'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['display_order']; ?>
                          </span>
                        <?php endif ?>
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
//                    return element.value;
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

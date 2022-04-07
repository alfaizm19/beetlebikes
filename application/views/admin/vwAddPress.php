<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/product') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a></div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <?php echo display_flash('error'); ?>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="product_form" id="product_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="press_name">Press Name<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="press_name" name="press_name" value="<?php echo get_input('press_name'); ?>" required data-msg-required="Please enter press name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="title">Title<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="title" name="title" value="<?php echo get_input('title'); ?>" required data-msg-required="Please enter title.">
                    </div>
                </div>

                <div class="form-group m-form__group row Image">
                    <label class="col-form-label col-lg-3 col-sm-12" for="image_path"> Image  (242px W * 360px H)<span class="text-danger">*</span> </label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" required  class="form-control validImage" name="image_path" id="image_path" data-image-crop="1" data-image-height="360" data-image-width="242" data-caption="Image" data-image-path ="press/" data-msg-required="Please upload image">
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row Image">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner"> Banner  (1920px W * 158px H)<span class="text-danger">*</span> </label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" required  class="form-control validImage" name="banner" id="banner" data-image-crop="1" data-image-height="158" data-image-width="1920" data-caption="Image" data-image-path ="press/banner/" data-msg-required="Please upload image">
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order'); ?>">
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/press'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
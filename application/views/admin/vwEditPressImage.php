<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/press_image/index/' . $this->uri->segment(4) . '') ?>" class="btn btn-success m-btn m-btn--icon">
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
                    <div class="form-group m-form__group row Image">
                        <label class="col-form-label col-lg-3 col-sm-12" for=""> Image (736px W * 479px H)<span class="text-danger">*</span> </label> 
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file" class="form-control validImage" name="press_image" id="press_image" data-image-crop="1" data-image-height="479" data-image-width="736" data-caption="Image" data-image-path ="pressimage/" data-msg-required="Please upload image">
                            </div>
                            <?php if ($press->medium_image_path != ""): ?>
                                <div class="w-25 mt-2">
                                    <img class="w-100" src="<?php echo base_url($press->medium_image_path); ?>">
                                </div>
                            <?php endif; ?>  
                        </div>
                    </div>
                      
                <input type="hidden" value="<?= $this->uri->segment(4); ?>" name="hid_press_id" />
                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
                                </button>
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/press_image/index/' . $this->uri->segment(4) . ''); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
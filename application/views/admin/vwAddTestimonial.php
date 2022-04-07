<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/testimonial') ?>" class="btn btn-success m-btn m-btn--icon">
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

                <div class="form-group m-form__group type-image row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="name">Name <span class="text-danger">* </span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input w-30" id="name" name="name" value="<?php echo isset($fieldValue['name'])? $fieldValue['name']:get_input('name'); ?>" data-msg-required="Please enter banner name" required>

                        <?php if (isset($fieldError['name'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['name']; ?>
                          </span>
                        <?php endif ?>

                    </div>
                </div>

                <div class="form-group m-form__group type-image row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="review">Review <span class="text-danger">* </span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea required class="form-control input-lg m-input w-30" name="review" id="review" data-msg-required="Please enter mob banner image alt."><?php echo isset($fieldValue['review'])? $fieldValue['review']:get_input('review'); ?></textarea>

                        <?php if (isset($fieldError['review'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['review']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group type-image row"> <label class="col-form-label col-lg-3 col-sm-12" for="banner_image">Testimonia Image <span class="text-danger">* </span></span>(80px W * 80px H) </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12"> 
                        <div class="cropoutterwrap"> 
                            <input required type="file" class="form-control validImage" name="banner_image" id="banner_image" data-image-crop="0" data-image-height="80" data-image-width="80" data-caption="Image" data-image-path ="testimonial/" data-msg-required="Please upload banner image."> 
                        </div> 
                        <?php if (isset($fieldError['banner_image'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['banner_image']; ?>
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/testimonial'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>

<style type="text/css">
    .inlineCheckbox{
        position: relative;
        margin-left: 30px;
        margin-right: 10px;
        bottom: 20px;
    }
</style>
<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/staycations') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="user_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="emirates">
                         Emirates <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="emirates" class="form-control " id="emirates" data-placeholder="Select emirates" required data-msg-required="Please select emirates" data-allow-clear="true" >
                            <option value="">Select Emirates</option>
                            <option value="Abu Dhabi">Abu Dhabi</option>
                            <option value="Dubai">Dubai</option>
                            <option value="Sharjah">Sharjah</option>
                            <option value="Umm al-Qaiwain">Umm al-Qaiwain</option>
                            <option value="Fujairah">Fujairah</option>
                            <option value="Ajman">Ajman</option>
                            <option value="Ra's al-Khaimah">Ra's al-Khaimah</option>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="staycationsName">
                         Staycations Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $this->input->post('staycationsName') ?>" name="staycationsName" id="staycationsName" required data-msg-required="Please enter tour name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" required data-msg-ckrequired="Please enter description." class="form-control ckerequired description input-lg m-input" rows="4"><?php echo $this->input->post('description') ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="dayNight">
                        Day/Night <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $this->input->post('dayNight') ?>" name="dayNight" id="dayNight" required data-msg-required="Please enter day/night">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="aed">
                        Price (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" min="1" class="form-control input-lg m-input" value="<?php echo $this->input->post('aed') ?>" name="aed" id="aed" data-msg-required="Please enter Price (AED)">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="usd">
                        Price (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" min="1" class="form-control input-lg m-input" value="<?php echo $this->input->post('usd') ?>" name="usd" id="usd" data-msg-required="Please enter Price (USD)">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="discount">
                        Discount (%)
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo $this->input->post('discount') ?>" name="discount" id="discount" data-msg-required="Please enter discount">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="amenities">
                        Amenities <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="" name="amenities[]" id="amenities" required data-msg-required="Please enter Amenities">
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <a href="javascript:void(0)" class="addAmenties btn btn-success m-btn m-btn--icon">
                            <span> <i class="fa fa-plus"></i><span></span>Add</span>
                        </a>
                    </div>
                </div>

                <div id="appendAmenties"></div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pickup">
                        Deals
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="delas" id="delas" data-msg-required="Please enter free delas"> <span class="inlineCheckbox">Yes</span>
                        </label>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="homepage">
                        Display on Home Page
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="homepage" id="homepage" data-msg-required="Please select display on home page"> <span class="inlineCheckbox">Yes</span>
                        </label>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="coverImage">Cover Image<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" required class="form-control validImage" name="coverImage" id="coverImage" data-image-crop="1"  
                            data-image-height="292" data-image-width="292" 
                            data-caption="Tour Image" 
                                   data-image-path ="staycations/cover/" data-msg-required="Please upload tour image">
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="staycationImage">Image<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" required class="form-control validImage" name="staycationImage" id="staycationImage" data-image-crop="1"  
                            data-image-height="415" data-image-width="937" 
                            data-caption="Tour Image" 
                                   data-image-path ="staycations/" data-msg-required="Please upload tour image">
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="staycationBanner">Banner<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" required class="form-control validImage" name="staycationBanner" id="staycationBanner" data-image-crop="1"  
                            data-image-height="300" data-image-width="1920" 
                            data-caption="Tour Banner" 
                                   data-image-path ="staycations/banner/" data-msg-required="Please upload tour banner image">
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('meta_title'); ?>" required data-msg-required="Please enter meta title." name="meta_title" id="meta_title">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_keyword"> Meta Keyword </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_keyword" id="meta_keyword" class="form-control input-lg m-input" rows="3"><? echo get_input('meta_keyword'); ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_description" id="meta_description" class="form-control input-lg m-input" rows="3" ><? echo get_input('meta_description'); ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" min="1" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order'); ?>">
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/staycations'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    jQuery(document).ready(function($) {
        $(".addAmenties").click(function(event) {
            $("#appendAmenties").append(`

                <div class="append_div form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="amenities">
                        &nbsp;
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="" name="amenities[]" id="amenities" required data-msg-required="Please enter Amenities">
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <a href="javascript:void(0)" class="removeAment btn btn-success m-btn m-btn--icon">
                            <span> <i class="fa fa-remove"></i><span></span>Remove</span>
                        </a>
                    </div>
                </div>

            `);
        });

        $("#appendAmenties").on('click', '.removeAment', function(event) {
            event.preventDefault();
            
             $(this).closest('.append_div').remove();

        });
    });
</script>
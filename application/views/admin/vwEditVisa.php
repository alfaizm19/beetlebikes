<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/visa') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<? if (empty($visa)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;

$visa = $visa[0];
?>

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
                    <label class="col-form-label col-lg-3 col-sm-12" for="visaType">
                         Visa Type <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="visaType" class="form-control " id="visaType" data-placeholder="Select visa type" required data-msg-required="Please select visa type." data-allow-clear="true" >
                            <option value="">Select Visa Type</option>
                            <option <?php echo $visa['type'] == 'UAE Visa'? 'selected':''; ?> value="UAE Visa">UAE Visa</option>
                            <option <?php echo $visa['type'] == 'International Visa'? 'selected':''; ?> value="International Visa">International Visa</option>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="country">
                         Country <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="country" class="form-control " id="country" data-placeholder="Select country" required data-msg-required="Please select country." data-allow-clear="true" >
                            <option value="">Select Country</option>
                            <?php 
                                if (!empty($countries)):
                                    foreach($countries as $country):
                            ?>
                                <option <?php echo $visa['country'] == $country->id? 'selected':''; ?> value="<?php echo $country->id ?>"><?php echo $country->nicename ?></option>
                            <?php endforeach; endif ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="visaName">
                         Visa Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('visaName', $visa['visa_name']); ?>" name="visaName" id="visaName" required data-msg-required="Please enter blog title.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" required data-msg-ckrequired="Please enter description." class="form-control ckerequired description input-lg m-input" rows="4"><? echo get_input('description', $visa['description']); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="documents"> Documents <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="documents" id="documents" required data-msg-ckrequired="Please enter documents." class="form-control ckerequired description input-lg m-input" rows="4"><? echo get_input('documents', $visa['documents']); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="howToApply"> How To Apply <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="howToApply" id="howToApply" required data-msg-ckrequired="Please enter how to apply." class="form-control ckerequired description input-lg m-input" rows="4"><? echo get_input('how_to_apply', $visa['how_to_apply']); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="visaImage">Image<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" class="form-control validImage" name="visaImage" id="visaImage" data-image-crop="1"  
                            data-image-height="215" data-image-width="303" 
                            data-caption="Visa Image" 
                                   data-image-path ="visa/" data-msg-required="Please upload visa image">
                        </div>
                        <? if ($visa['image'] != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($visa['image']); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="visaBanner">Banner<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" class="form-control validImage" name="visaBanner" id="visaBanner" data-image-crop="1"  
                            data-image-height="300" data-image-width="1920" 
                            data-caption="Visa Banner" 
                                   data-image-path ="visa/banner/" data-msg-required="Please upload visa banner image">
                        </div>
                        <? if ($visa['banner_image'] != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($visa['banner_image']); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('meta_title', $visa['meta_title']); ?>" required data-msg-required="Please enter meta title." name="meta_title" id="meta_title">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_keyword"> Meta Keyword </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_keyword" id="meta_keyword" class="form-control input-lg m-input" rows="3"><? echo get_input('meta_keyword', $visa['meta_keyword']); ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_description" id="meta_description" class="form-control input-lg m-input" rows="3" ><? echo get_input('meta_description', $visa['meta_description']); ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" min="1" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order', $visa['display_order']); ?>">
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/visa'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
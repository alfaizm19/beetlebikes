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
        <a href="<? echo base_url('admin/collaborations') ?>" class="btn btn-success m-btn m-btn--icon">
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
                    <label class="col-form-label col-lg-3 col-sm-12" for="title">
                        Title <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="" name="title" id="title" required data-msg-required="Please enter title.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" required data-msg-ckrequired="Please enter description." class="form-control ckerequired description input-lg m-input" rows="4"></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="collabBanner">Banner (2560px W * 985px H )<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" required class="form-control validImage" name="collabBanner" id="collabBanner" data-image-crop="1"  
                            data-image-height="985" data-image-width="2560" data-caption="Collaboration Banner"  data-image-path ="collaboration/" data-msg-required="Please upload collaboration banner">
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="videoBackgroundImage">Video Background Image (998px W * 278px H)</label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" class="form-control validImage" name="videoBackgroundImage" id="videoBackgroundImage" data-image-crop="1"  
                            data-image-height="278" data-image-width="998"
                            data-caption="Video Background Image" 
                                   data-image-path ="collaboration/background/" data-msg-required="Please upload Video Background Image">
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="video">
                        Video (Embed Code)
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea class="form-control input-lg m-input" value="" name="video" id="video" data-msg-required="Please enter video."></textarea>
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/collaborations'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
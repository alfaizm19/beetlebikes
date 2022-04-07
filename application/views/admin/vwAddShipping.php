<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/shipping/') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a></div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="location_form" id="location_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="country">
                        Country <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="country" class="form-control " id="country" data-placeholder="Select country" required="" data-msg-required="Please select country." data-allow-clear="true">
                            <option value="">Select Country</option>
                            <?php 

                                $countries = $this->Master_model->country();

                                if (!empty($countries)):
                                    foreach($countries as $country):
                            ?>
                                <option value="<?php echo $country->id ?>"><?php echo $country->nicename ?></option>
                            <?php endforeach; endif; ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="first_half_aed"> Shipping Cost (1st Half  Kg) (AED)<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="first_half_aed" name="first_half_aed"  value="<?php echo get_input('first_half_aed'); ?>" required data-msg-required="Please enter first half aed.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="first_half_usd"> Shipping Cost (1st Half  Kg) (USD)<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="first_half_usd" name="first_half_usd"  value="<?php echo get_input('first_half_usd'); ?>" required data-msg-required="Please enter first half usd.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="adnl_half_kg_aed"> Shipping Cost (Adnl. Half Kg) (AED)<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="adnl_half_kg_aed" name="adnl_half_aed"  value="<?php echo get_input('adnl_half_kg_aed'); ?>" required data-msg-required="Please enter additional half kg.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="adnl_half_kg_usd"> Shipping Cost (Adnl. Half Kg) (USD)<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="adnl_half_kg_usd" name="adnl_half_usd"  value="<?php echo get_input('adnl_half_kg_usd'); ?>" required data-msg-required="Please enter additional half kg.">
                    </div>
                </div>
                
                <div class="form-group m-form__group row" style="display: none;">
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/shipping/'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>

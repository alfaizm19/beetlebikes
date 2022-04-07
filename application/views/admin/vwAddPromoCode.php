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
        <a href="<? echo base_url('admin/promo-code') ?>" class="btn btn-success m-btn m-btn--icon">
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
                    <label class="col-form-label col-lg-3 col-sm-12" for="promoTitle">
                        Promo Title <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="" name="promoTitle" id="promoTitle" required data-msg-required="Please enter promo title." maxlength="40">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="category">
                        Category
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control input-lg m-input" name="category" id="category" data-msg-required="Please select category">
                            <option value="">Select Category</option>
                            <?php 
                                if (!empty($category)):
                                    foreach($category as $cat):
                            ?>
                                <option value="<?php echo $cat->id ?>">
                                    <?php echo $cat->category ?>
                                </option>
                            <?php endforeach; endif ?>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="sub_category"> Sub Category </label>
                    <div class="col-lg-4 col-md-9 col-sm-12 sub_category">
                        <select name="sub_category[]" class="form-control m-select2 m_select2_select " multiple="multiple" id="sub_category" data-placeholder="Select sub category" data-msg-required="Please select sub category." data-allow-clear="true" >

                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="exclusion_sub_category">Exclusion Sub Category </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="exclusion_sub_category[]" class="form-control m-select2 m_select2_select " multiple="multiple" id="exclusion_sub_category" data-placeholder="Select sub category" data-msg-required="Please select sub category." data-allow-clear="true" >

                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="exclusion_sku">Exclusion SKU </label>
                    <div class="col-lg-4 col-md-9 col-sm-12 exclusion_sku">
                        <select name="exclusion_sku[]" class="form-control m-select2 m_select2_select_ajax_sku_search " multiple="multiple" id="exclusion_sku" data-placeholder="Search SKU" data-msg-required="Please select sub category." data-allow-clear="true" >
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="inclusion_product">Inclusion Product </label>
                    <div class="col-lg-4 col-md-9 col-sm-12 inclusion_product">
                        <select name="inclusion_product[]" class="form-control m-select2 m_select2_select_ajax_product_search " multiple="multiple" id="inclusion_product" data-placeholder="Search Product" data-msg-required="Please select product" data-allow-clear="true" >
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="usage">
                        Usage <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control input-lg m-input" required name="usage" id="usage" data-msg-required="Please select usage">
                            <option value="single">One Time</option>
                            <option value="multiple">Multiple</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row max_used_div" style="display:none;">
                    <label class="col-form-label col-lg-3 col-sm-12" for="max_used">
                        Max Used <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" id="max_used" class="form-control input-lg m-input" value="" name="max_used" id="max_used" data-msg-required="Please enter max used">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="discountType">
                        Discount Type <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control input-lg m-input" name="discountType" id="discountType" required data-msg-required="Please select discount type.">
                            <option value="1">Percentage</option>
                            <option value="2">Flat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="code">
                        Promo Code (8 digit long) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input pattern="^[a-zA-Z0-9]+$" minlength="3" required maxlength="8" type="text" class="form-control input-lg m-input" value="" name="code" id="code" data-msg-required="Please enter promo code">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="startDate">
                        Start Date
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="date" min="1" class="form-control input-lg m-input" value="" name="startDate" id="startDate" data-msg-required="Please enter start date">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="endDate">
                        End Date
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="date" min="1" class="form-control input-lg m-input" value="" name="endDate" id="endDate" data-msg-required="Please enter end date">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="discount">
                        Discount <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="" name="discount" id="discount" data-msg-required="Please enter discount">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="min_cart_value">
                        Min Cart Value
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="" name="min_cart_value" id="min_cart_value" data-msg-required="Please enter minimum cart value">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="max_discount">
                        Max Discount
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="" name="max_discount" id="max_discount" data-msg-required="Please enter maximum discount">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="stock">
                        Coupon Inventory <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" required class="form-control input-lg m-input" value="" name="stock" id="stock" data-msg-required="Please enter stock">
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/promo-code'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
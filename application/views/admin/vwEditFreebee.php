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
        <a href="<? echo base_url('admin/freebee') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<? if (empty($freebee)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;
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
                                <option <?php echo $cat->id==$freebee->category_id? 'selected':'' ?> value="<?php echo $cat->id ?>">
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
                            <?php 
                                if (!empty($sub_category)):
                                    
                                    $subCatArr = explode(',', $freebee->sub_category_id);

                                    foreach ($sub_category as $scat):

                                        if (in_array($scat->id, $subCatArr)) {
                                            $sel = 'selected';
                                        } else {
                                            $sel = '';
                                        }
                            ?>
                                <option <?php echo $sel; ?> value="<?php echo $scat->id ?>">
                                    <?php echo $scat->category ?>
                                </option>
                            <?php endforeach; endif; ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="inclusion_product">Product <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12 inclusion_product">
                        <select name="inclusion_product" class="form-control m-select2 m_select2_select_ajax_product_search" id="inclusion_product" data-placeholder="Search Product" data-msg-required="Please select product" data-allow-clear="true" required>
                            <?php if (!empty($inclusion_product)): ?>
                                <?php echo $inclusion_product; ?>
                            <?php endif ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="category">
                        Category
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control input-lg m-input" name="freebee_category" id="freebee_category" data-msg-required="Please select category">
                            <option value="">Select Category</option>
                            <?php 
                                if (!empty($category)):
                                    foreach($category as $cat):
                            ?>
                                <option <?php echo $cat->id==$freebee->freebee_category_id? 'selected':'' ?> value="<?php echo $cat->id ?>">
                                    <?php echo $cat->category ?>
                                </option>
                            <?php endforeach; endif ?>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="freebee_sub_category"> Sub Category </label>
                    <div class="col-lg-4 col-md-9 col-sm-12 freebee_sub_category">
                        <select name="freebee_sub_category[]" class="form-control m-select2 m_select2_select " multiple="multiple" id="freebee_sub_category" data-placeholder="Select sub category" data-msg-required="Please select sub category." data-allow-clear="true" >
                            <?php 
                                if (!empty($sub_category)):
                                    
                                    $subCatArr = explode(',', $freebee->freebee_sub_category_id);

                                    foreach ($freebee_sub_category as $scat):

                                        if (in_array($scat->id, $subCatArr)) {
                                            $sel = 'selected';
                                        } else {
                                            $sel = '';
                                        }
                            ?>
                                <option <?php echo $sel; ?> value="<?php echo $scat->id ?>">
                                    <?php echo $scat->category ?>
                                </option>
                            <?php endforeach; endif; ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="freebee_product">Freebee Product <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12 freebee_product">
                        <select name="freebee_product" class="form-control m-select2 m_select2_select_ajax_freebee_product_search" id="freebee_product" data-placeholder="Search Product" data-msg-required="Please select product" data-allow-clear="true" required>
                            <?php if (!empty($freebee_product)): ?>
                                <?php echo $freebee_product; ?>
                            <?php endif ?>
                        </select> 
                        <div class="has-error"></div>
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/freebee'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
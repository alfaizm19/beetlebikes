<style type="text/css">
    .inlineCheckbox{
        position: relative;
        margin-left: 30px;
        margin-right: 10px;
        bottom: 20px;
    }
</style>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/user-rights') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a></div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <?php echo display_flash('error'); ?>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="category_form" id="category_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="name">Name<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="name" class="form-control input-lg m-input" id="name" name="name" value="" required data-msg-required="Please enter name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="email">Email<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="email" class="form-control input-lg m-input" id="email" name="email" value="" required data-msg-required="Please enter email.">
                    </div>
                </div>
                
                <div class="form-group m-form__group row type_name_password">
                    <label class="col-form-label col-lg-3 col-sm-12" for="password">Password <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="password" class="form-control input-lg m-input" id="password" name="password" value=""  data-msg-required="Please enter password.">
                        
                    </div>
                </div>

                <div class="form-group m-form__group row">
                  <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="user_image"> Profile Picture <? echo PROFILE_SIZE; ?></label> 
                  <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="cropoutterwrap">
                    <input type="file"  class="form-control validImage" name="user_image" id="user_image" data-image-crop="1" data-image-height="<? echo PROFILE_SIZE_HEIGHT; ?>" data-image-width="<? echo PROFILE_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="profile/" >
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <strong>User Rights <span class="text-danger">*</span></strong>

                        <a id="selectAll" href="javascript:void(0)" class="btn btn-success m-btn m-btn--icon">
                            <span>Select All</span>
                        </a>

                        <a id="unselectAll" href="javascript:void(0)" class="btn btn-success m-btn m-btn--icon">
                            <span>Unselect All</span>
                        </a>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Order
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[order][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[order][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[order][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[order][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Product
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Product Gallery
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_gallery][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_gallery][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_gallery][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_gallery][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Product Review
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_review][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_review][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_review][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_review][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Product Attribute
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_attribute][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_attribute][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_attribute][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[product_attribute][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Category Level 1
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_1][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_1][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_1][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_1][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Category Level 2
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_2][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_2][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_2][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[category_level_2][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Promo Code
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[promo_code][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[promo_code][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[promo_code][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[promo_code][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Pincode
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[pincode][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[pincode][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[pincode][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[pincode][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Abandoned Cart
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[cart][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[cart][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[cart][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[cart][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Site Settings
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[setting][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[setting][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[setting][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[setting][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Banner
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[banner][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[banner][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[banner][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[banner][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        Google Analytics
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[google_analytics][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[google_analytics][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[google_analytics][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[google_analytics][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pages">
                        User Right
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[user_right][create]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Create</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[user_right][read]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Read</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[user_right][update]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Update</span>
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" class="form-control input-lg m-input" value="1" name="permission[user_right][delete]" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Delete</span>
                        </label>

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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/user'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    var count = $("#Show").attr("countcall");
    function changeType() {
        if ($("#password").val() != "") {
            if (count % 2 != 0) {
                $("#password").prop('type', 'text');
                $("#Show").text("Hide");
            } else {
                $("#password").prop('type', 'password');
                $("#Show").text("Show");
            }
            $("#Show").attr("countcall", ++count);
        }
    }
    
    $(document).ready(function () {
        // var selval = $("#login_type option:selected").val();
        // if (selval == '1') {
        //     $('.type_pin').find('input').prop('required', false);
        //     $('.type_name_password').find('input').prop('required', true);
        //     $('.type_pin').hide();
        //     $('.type_name_password').show();
        // } else if (selval == '2') {
        //     $('.type_name_password').find('input').prop('required', false);
        //     $('.type_pin').find('input').prop('required', true);
        //     $('.type_pin').show();
        //     $('.type_name_password').hide();
        // } else {
        //     $('.type_name_password').find('input').prop('required', false);
        //     $('.type_pin').find('input').prop('required', false);
        //     $('.type_pin').hide();
        //     $('.type_name_password').hide();
        // }
    });

    // function isLoginType(thisval) {
    //     var obj = $(thisval);
    //     var elVal = $(thisval).val();
    //     if (elVal == '1') {
    //         $('.type_pin').find('input').prop('required', false);
    //         $('.type_name_password').find('input').prop('required', true);
    //         $('.type_pin').hide();
    //         $('.type_name_password').show();
    //     } else if (elVal == '2') {
    //         $('.type_name_password').find('input').prop('required', false);
    //         $('.type_pin').find('input').prop('required', true);
    //         $('.type_pin').show();
    //         $('.type_name_password').hide();
    //     } else {
    //         $('.type_name_password').find('input').prop('required', false);
    //         $('.type_pin').find('input').prop('required', false);
    //         $('.type_pin').hide();
    //         $('.type_name_password').hide();
    //     }

    // }

    $("#selectAll").click(function(event) {
        var checkboxes = document.getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    });

    $("#unselectAll").click(function(event) {
        var checkboxes = document.getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    });
</script>

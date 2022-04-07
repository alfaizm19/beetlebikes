<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/user') ?>" class="btn btn-success m-btn m-btn--icon">
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
                    <label class="col-form-label col-lg-3 col-sm-12" for="role_id">Role<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control m-select m_select_select" id="role_id" name="role_id" data-placeholder="Select role" required data-msg-required="Please select role." data-allow-clear="true">
                            <?php
                            foreach ($roles as $key => $role) {
                                $checkid = '';
                                if(!isset($_POST["role_id"]))
                                {
                                    if ($role->id == $user->role_id) {
                                        $checkid = "selected";
                                    } else {
                                        $checkid = "";
                                    }
                                }
                                ?>
                                <option class="form-control" value="<?php echo $role->id ?>" <?php echo $checkid; ?> <?php echo set_select('role_id',$role->id);?> ><?php echo $role->role_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="name">Name<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="name" class="form-control input-lg m-input" id="name" name="name" value="<?php echo get_input('name', $user->first_name); ?>" required data-msg-required="Please enter name.">
                    </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="login_type">Login Type<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control m-select m_select_select" id="login_type" name="login_type" onchange="isLoginType(this);"  data-placeholder="Select login type" required data-msg-required="Please select login type." data-allow-clear="true">
                            <option value="">Select Login Type</option>
                            <option value="1" <?php //echo ($user->login_type == 1) ? "selected" : '' ?> >User Name / Password</option>
                            <option value="2" <?php //echo ($user->login_type == 2) ? "selected" : '' ?> >Pin</option>
                        </select>
                    </div>
                </div> -->

                <div class="form-group m-form__group row type_name_password">
                    <label class="col-form-label col-lg-3 col-sm-12" for="user_name">User Name<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="name" class="form-control input-lg m-input" id="user_name" name="user_name" value="<?php echo get_input('user_name', $user->username); ?>" required data-msg-required="Please enter user name.">
                    </div>
                </div>
                <div class="form-group m-form__group row type_name_password">
                    <label class="col-form-label col-lg-3 col-sm-12" for="password">Password </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control input-lg m-input" id="password" name="password" value="<?php echo get_input('password'); ?>"  data-msg-required="Please enter password.">
                        
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
</script>

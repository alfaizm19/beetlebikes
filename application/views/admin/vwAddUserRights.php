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

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="name">Name<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="name" class="form-control input-lg m-input" id="name" name="name" value="<?php echo isset($fieldValue['name'])? $fieldValue['name']:''; ?>" data-msg-required="Please enter name.">

                        <?php if (isset($fieldError['name'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['name']; ?>
                          </span>
                        <?php endif ?>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="email">Email<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="email" name="email" value="<?php echo isset($fieldValue['email'])? $fieldValue['email']:''; ?>" data-msg-required="Please enter email.">

                        <?php if (isset($fieldError['email'])): ?>
                            <span class="text-danger">
                                <?php echo $fieldError['email']; ?>
                            </span>
                        <?php endif ?>
                    </div>
                </div>
                
                <div class="form-group m-form__group row type_name_password">
                    <label class="col-form-label col-lg-3 col-sm-12" for="password">Password <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="password" class="form-control input-lg m-input" id="password" name="password" value=""  data-msg-required="Please enter password.">

                        <?php if (isset($fieldError['password'])): ?>
                            <span class="text-danger">
                                <?php echo $fieldError['password']; ?>
                            </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="role">Role <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control" name="role" id="role">
                            <option value="">Select Role</option>
                            <option <? echo (isset($fieldValue['role']) && $fieldValue['role'] == 'super_admin'? 'selected':'') ?> value="super_admin">Super Admin</option>
                            <option <? echo (isset($fieldValue['role']) && $fieldValue['role'] == 'admin'? 'selected':'') ?> value="admin">Admin</option>
                            <option <? echo (isset($fieldValue['role']) && $fieldValue['role'] == 'operations'? 'selected':'') ?> value="operations">Operations</option>
                            <option <? echo (isset($fieldValue['role']) && $fieldValue['role'] == 'catalog'? 'selected':'') ?> value="catalog">Catalog</option>
                        </select>

                        <?php if (isset($fieldError['role'])): ?>
                            <span class="text-danger">
                                <?php echo $fieldError['role']; ?>
                            </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                  <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="user_image"> Profile Picture <? echo PROFILE_SIZE; ?></label> 
                  <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="cropoutterwrap">
                        <input type="file"  class="form-control validImage" name="user_image" id="user_image" data-image-crop="0" data-image-height="<? echo PROFILE_SIZE_HEIGHT; ?>" data-image-width="<? echo PROFILE_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="profile/" >
                    </div>

                    <?php if (isset($fieldError['user_image'])): ?>
                        <span class="text-danger">
                            <?php echo $fieldError['user_image']; ?>
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
</script>

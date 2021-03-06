<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"><? echo $page_title; ?></h3>
    </div>
  </div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="user_form" id="user_form" novalidate="novalidate">
      <div class="m-portlet__body pb-2">

        <?php 
          $fieldError = $this->session->flashdata('fieldError');
        ?>

        
        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="email_address"> Email </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="email" class="form-control input-lg m-input" id="email_address" name="email_address" value="<? echo get_input('email',$this->session->userdata('email')); ?>" disabled>
            <input type="hidden" class="form-control input-lg m-input" id="email" name="email" value="<? echo get_input('email',$this->session->userdata('email')); ?>" readonly>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="old_password">
          Old Password<span class="text-danger">*</span>
          </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input required type="password" class="form-control input-lg m-input" value="" name="old_password" id="old_password"   data-msg-required="Please enter password." maxlength="12" minlength="5">

            <?php if (isset($fieldError['old_password'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['old_password']; ?>
              </span>
            <?php endif ?>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="new_password">
          New Password<span class="text-danger">*</span>
          </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input required type="password" class="form-control input-lg m-input" value="" name="new_password" id="new_password"  data-msg-required="Please enter new password." maxlength="12" minlength="5">

            <?php if (isset($fieldError['new_password'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['new_password']; ?>
              </span>
            <?php endif ?>

          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="cpassword">
          Confirm Password<span class="text-danger">*</span>
          </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="password" class="form-control input-lg m-input" required data-rule-equalTo="#new_password" maxlength="12" minlength="5" value="" name="cpassword" id="cpassword"  data-msg-equalTo="Please enter same as new password." data-msg-required="Please enter confirm password.">

            <?php if (isset($fieldError['cpassword'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['cpassword']; ?>
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
                <a  class="btn btn-secondary" href="<? echo current_url(); ?>"><i class="fa fa-times"></i> Cancel </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form>
    <!--end::Form-->
  </div>
</div>

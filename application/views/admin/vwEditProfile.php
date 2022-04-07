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
          $fieldValue = $this->session->flashdata('fieldValue');

          $adminData = $this->db->get_where('admins', array(
            'id' => get_admin_id()
          ))->row();

          $name = '';

          if (!empty($adminData)) {
            $name = $adminData->username;
          }

        ?>
        
        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="email"> Email<span class="text-danger">*</span></label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="email" required class="form-control input-lg m-input" id="email" name="email" data-msg-required="Please enter email." value="<? echo ( isset($fieldValue['email']) && !empty($fieldValue['email']) )? $fieldValue['email']:get_input('email',$this->session->userdata('email')); ?>">

            <?php if (isset($fieldError['email'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['email']; ?>
              </span>
            <?php endif ?>

          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="first_name">
            Name<span class="text-danger">*</span>
          </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input required type="text" class="form-control input-lg m-input" value="<?php echo $name; ?>" name="first_name" id="first_name" data-msg-required="Please enter name.">

            <?php if (isset($fieldError['first_name'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['first_name']; ?>
              </span>
            <?php endif ?>

          </div>
        </div>
        
        
        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12 text-capitalize" for="user_image"> Profile Picture <? echo PROFILE_SIZE; ?></label> 
          <div class="col-lg-8 col-md-9 col-sm-12">
            <div class="cropoutterwrap">
            <input type="file"  class="form-control validImage" name="user_image" id="user_image" data-image-crop="1" data-image-height="<? echo PROFILE_SIZE_HEIGHT; ?>" data-image-width="<? echo PROFILE_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="profile/" >
            </div>
            <? if($this->session->userdata('user_image') != ""): ?>
              <div class="w-50 mt-4">
                <img class="w-25" src="<? echo file_exists_admin($this->session->userdata('user_image')); ?>">
              </div>
            <? endif; ?>

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
                <a  class="btn btn-secondary" href="<? echo current_url(); ?>"> <i class="fa fa-times"></i> Cancel </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form>
    <!--end::Form-->
  </div>
</div>

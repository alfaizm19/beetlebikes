<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
    </div>
    <a href="<? echo base_url('admin/email_template') ?>" class="btn btn-success m-btn m-btn--icon">
        <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
      </a>
  </div>
</div>

<? if(empty($email_template)): ?>
  <? $this->load->view('admin/partials/_admin_not_found'); ?>
<? return FALSE; endif;  ?>

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
        <label class="col-form-label col-lg-3 col-sm-12" for="email_template_title">
        Email Template Title <span class="text-danger">*</span>
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="text" class="form-control input-lg m-input" value="<? echo get_input('email_template_title',$email_template->email_template_title); ?>" name="email_template_title" id="email_template_title" required data-msg-required="Please enter email template title.">
        </div>
      </div>
      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="email_template_subject">
        Email Template Subject <span class="text-danger">*</span>
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="text" class="form-control input-lg m-input" value="<? echo get_input('email_template_subject',$email_template->email_template_subject); ?>" name="email_template_subject" id="email_template_subject" required data-msg-required="Please enter email template subject.">
        </div>
      </div>  
      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="email_template_description"> Description<span class="text-danger">*</span></label>
          <div class="col-lg-8 col-md-9 col-sm-12">
            <textarea name="email_template_description" id="email_template_description"  required data-msg-ckrequired="Please enter description." class="form-control description ckerequired input-lg m-input" rows="3"><? echo get_input('email_template_description',$email_template->email_template_description); ?></textarea>
            <div class="has-error"></div>
          </div>
        </div>  
      <hr class="my-2">
      <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
        <div class="m-form__actions m-form__actions py-0 ">
          <div class="row">
            <div class="col-lg-9 ml-lg-auto">
              <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
              </button>
              <a  class="btn btn-secondary" href="<? echo base_url('admin/email_template'); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>

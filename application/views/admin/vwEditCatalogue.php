<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
    </div>
    <a href="<?php echo base_url('admin/catalogue') ?>" class="btn btn-success m-btn m-btn--icon">
        <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
      </a>
  </div>
</div>

<?php if(empty($catalogue)): ?>
  <?php $this->load->view('admin/partials/_admin_not_found'); ?>
<?php return FALSE; endif;  ?>

<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
  <!--begin::Form-->
  <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="catalogue_form" id="catalogue_form" novalidate="novalidate">
    <div class="m-portlet__body pb-2">
      <div class="box-header with-border">
        <div id="delete_allmsg_div"></div>
        <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
      </div>
      <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="catalogue">Catalogue Name<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="catalogue" name="catalogue" value="<?php echo get_input('catalogue',$catalogue->catalogue); ?>" required data-msg-required="Please enter catalogue name .">
                    </div>
      </div>
      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="catalogue_pdf">Catalogue PDF  </label> 
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input type="file"  class="form-control validPdf" name="catalogue_pdf" id="catalogue_pdf" data-caption="Pdf" data-image-path="catalogue/pdf/">
          </div>
          <?php if($catalogue->catalogue_pdf != ""): ?>
              <div class="w-25 mt-2">
                <a href="<?php echo base_url() . $catalogue->catalogue_pdf; ?>" title="report" download><img src='<?= DEFAULT_PDF ?>' style='width: 25px;;padding-top:10px;'></a>
              </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="catalogue_image">Catalogue Image  <?php echo CATALOGUE_SIZE; ?></label> 
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div class="cropoutterwrap">
            <input type="file"  class="form-control validImage" name="catalogue_image" id="catalogue_image" data-image-crop="1" data-image-height="<?php echo CATALOGUE_SIZE_HEIGHT; ?>" data-image-width="<?php echo CATALOGUE_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="catalogue/image/"  data-msg-required="Please upload image">
          </div>
              <?php if($catalogue->catalogue_image != ""): ?>
              <div class="w-25 mt-2">
                <img  src="<?php echo base_url($catalogue->catalogue_image); ?>">
              </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
        <div class="col-sm-2">
          <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order',$catalogue->display_order); ?>">
        </div>
      </div>
      
      <hr class="my-2">
      <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
        <div class="m-form__actions m-form__actions py-0 ">
          <div class="row">
            <div class="col-lg-9 ml-lg-auto">
              <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
              </button>
              <a  class="btn btn-secondary" href="<?php echo base_url('admin/catalogue'); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>

<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title">
                <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/brand') ?>" class="btn btn-success m-btn m-btn--icon">
            <span>
                <i class="fa fa-arrow-circle-o-left"></i>
                <span></span>Back
            </span>
        </a>
    </div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="certification_form" id="certification_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">

                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="name">Name<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('name',$brand->name); ?>" name="name" id="name" required data-msg-required="Please enter name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="logo">Logo <? echo LOGO_SIZE; ?> </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                      <div class="cropoutterwrap">
                        <input type="file" class="form-control validImage" name="logo" id="logo" data-image-crop="1" data-image-height="<? echo LOGO_SIZE_HEIGHT;?>" data-image-width="<? echo LOGO_SIZE_WIDTH; ?>" data-caption="Logo" data-image-path ="brand/logo/" data-msg-required="Please upload image.">
                      </div>
                      <? if ($brand->logo != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($brand->logo); ?>">
                            </div>
                        <? endif; ?>
                    </div>
              </div>

              <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="roll_over_logo">Roll Over Logo <? echo LOGO_SIZE; ?> </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                      <div class="cropoutterwrap">
                        <input type="file" class="form-control validImage" name="roll_over_logo" id="roll_over_logo" data-image-crop="1" data-image-height="<? echo LOGO_SIZE_HEIGHT;?>" data-image-width="<? echo LOGO_SIZE_WIDTH; ?>" data-caption="Roll Over Logo" data-image-path ="brand/RollOverLogo/" data-msg-required="Please upload role over logo.">
                      </div>
                      <? if ($brand->roll_over_logo != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($brand->roll_over_logo); ?>">
                            </div>
                        <? endif; ?>
                    </div>
              </div>

             <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="banner_image">Banner Image <? echo BANNER_IMAGE_SIZE; ?> </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                      <div class="cropoutterwrap">
                        <input type="file" class="form-control validImage" name="banner_image" id="banner_image" data-image-crop="1" data-image-height="<? echo BANNER_IMAGE_SIZE_HEIGHT;?>" data-image-width="<? echo BANNER_IMAGE_SIZE_WIDTH; ?>" data-caption="Banner Image" data-image-path ="brand/banner/" data-msg-required="Please upload banner image.">
                      </div>
                      <? if ($brand->banner_image != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($brand->banner_image); ?>">
                            </div>
                        <? endif; ?>
                    </div>
              </div>


              <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12" for="catalogue_pdf">Brand Catalogue</label> 
                <div class="col-lg-9 col-md-12 col-sm-12">
                  <div class="cropoutterwrap">
                    <input type="file" class="form-control validPdf" name="catalogue_pdf" id="catalogue_pdf" data-msg-required="Please upload catalogue pdf." data-image-path="brand/brand-catalogue/" data-caption="Pdf">
                  </div>
                   <?php if($brand->catalogue_pdf != ""): ?>
                      <div class="w-25 mt-2">
                        <a href="<?php echo base_url() . $brand->catalogue_pdf; ?>" title="report" download><img src='<?= DEFAULT_PDF ?>' style='width: 25px;;padding-top:10px;'></a>
                      </div>
                    <?php endif; ?>
                </div>
              </div>

              <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="short_description"> Brand Description</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="short_description" id="short_description" class="form-control input-lg m-input" rows="3"><? echo get_input('short_description',$brand->short_description); ?></textarea>
                    </div>
                </div>

              <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description">Product Description</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" required data-msg-ckrequired="Please enter description." class="form-control description input-lg m-input" rows="4"><? echo get_input('description',$brand->description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <? if ($certification): ?>
                <? $certificate=explode(',',$brand->certification); ?>
                 <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="certification">Certification<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12 certification">
                        <? foreach($certification as $key=>$val) :?>
                            <input id="<?=$key?>" type="checkbox" class="package_features__checkbox" name="certification[]" value="<?=$key?>"  required
                            <? if(in_array($key, $certificate)){
                                echo "checked"; 
                                } 
                            ?>
                            />
                            <label class="form-label col-sm-10 checkbox_lable" for="<?=$key?>"><?=$val?></label><br>
                        <? endforeach;?>
                    </div>
                </div>
                <? endif; ?>
                    <div class="form-group m-form__group row">
                      <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                      <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order',$brand->display_order); ?>">
                      </div>
                    </div>                            
                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                <a class="btn btn-secondary" href="<? echo base_url('admin/brand'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>

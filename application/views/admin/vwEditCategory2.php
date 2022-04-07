<div class="col-sm-12">
  <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
    </div>
    <a href="<? echo base_url('admin/category-level-2') ?>" class="btn btn-success m-btn m-btn--icon">
      <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
    </a></div>
  </div>

  <div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
      <!--begin::Form-->
      <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="category_form" id="category_form" novalidate="novalidate">
        <div class="m-portlet__body pb-2">
          <div class="box-header with-border">
            <div id="delete_allmsg_div"></div>
            <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
          </div>

          <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12" for="parent"> Parent<span class="text-danger">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <select name="parent" class="form-control" id="parent" require data-msg-required="Please select parent category">
                <?php 
                  if (!empty($parentCategories)):

                    $currParentID = $category->parent;

                    foreach($parentCategories as $parentCat):

                      if ($currParentID == $parentCat->id) {
                        $sel = 'selected';
                      } else {
                        $sel = '';
                      }
                ?>
                  <option <?php echo $sel; ?> value="<?php echo $parentCat->id ?>"><?php echo $parentCat->category ?></option>
                <?php endforeach; endif ?>
              </select>
            </div>
          </div>
          
          <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12" for="category"> Category<span class="text-danger">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control input-lg m-input" id="category" name="category"  value="<?php echo $category->category ?>" required data-msg-required="Please enter category name.">
            </div>
          </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="categorySlug"> Category Slug<span class="text-danger">*</span></label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control input-lg m-input" id="categorySlug" name="categorySlug"  value="<?php echo $category->slug ?>" required data-msg-required="Please enter category slug.">
          </div>
        </div>

        <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="heading"> Heading </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="heading" value="<?php echo $category->heading ?>" name="heading" data-msg-required="Please enter heading.">
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="content"> Content </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="content" value="<?php echo $category->content ?>" name="content" data-msg-required="Please enter content.">
        </div>
      </div>

      <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12" for="image_path"> Image (1920px W * 350px H)  
          <?php if (empty($category->banner_image)): ?>
            <span class="text-danger">*</span> 
          <?php endif ?>
        </label>
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="cropoutterwrap">
                <input type="file" <?php echo empty($category->banner_image)? 'required':''; ?> class="form-control validImage" name="image_path" id="image_path" data-image-crop="0" data-image-height="350" data-image-width="1920" data-caption="Image" data-image-path="category2/" data-msg-required="Please upload image">
            </div>
            <?php if ($category->banner_image != ""): ?>
                <div class="w-25 mt-2">
                    <img class="w-100" src="<?php echo base_url($category->banner_image); ?>">
                </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="alt_tag"> ALT Tag </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="alt_tag" name="alt_tag" value="<?php echo $category->banner_image_alt ?>" data-msg-required="Please enter ALT Tag.">
        </div>
      </div>

      <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12" for="category_image"> Category Image (500px W * 500px H)
          <?php if (empty($category->category_image)): ?>
            <span class="text-danger">*</span> 
          <?php endif ?>
        </label>
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="cropoutterwrap">
                <input type="file" <?php echo empty($category->category_image)? 'required':''; ?> class="form-control validImage" name="category_image" id="category_image" data-image-crop="1" data-image-height="500" data-image-width="500" data-caption="Image" data-image-path ="category2/image/" data-msg-required="Please upload image">
            </div>
            <?php if ($category->category_image != ""): ?>
                <div class="w-25 mt-2">
                    <img class="w-100" src="<?php echo base_url($category->category_image); ?>">
                </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="image_alt_tag"> ALT Tag </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control input-lg m-input" id="image_alt_tag" name="image_alt_tag" value="<?php echo $category->category_image_alt ?>" data-msg-required="Please enter ALT Tag.">
          </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12"> Display on Homepage</label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <div class="mt">
                  <label>
                      <input <?php echo $category->display_on_home? 'checked':'' ?> type="checkbox" name="homepage" id="homepage" value="1">
                      <span></span>
                  </label>
              </div>
          </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="template"> Template<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <select name="template" class="form-control" id="template" required data-msg-required="Please select template">
            <option <?php echo $category->template == 'listing'? 'selected':''; ?> value="listing">Listing Template</option>
            <!-- <option <?php echo $category->template == 'custom'? 'selected':''; ?> value="custom">Custom Template</option> -->
          </select>
        </div>
      </div>

      <!-- <div id="customTempDiv" class="form-group m-form__group row <?php echo $category->template == 'custom'? '':'hide'; ?>">
          <label class="col-form-label col-lg-3 col-sm-12" for="custom_template">Custom Template<span class="text-danger">*</span></label>
          <div class="col-lg-9 col-md-9 col-sm-12">
              <textarea name="custom_template" cols="4" rows="4" id="custom_template" class="form-control ckerequired description input-lg m-input" required data-msg-ckrequired="Please enter template." ><?php echo $category->custom_template ?></textarea>
              <div class="has-error"></div>
          </div>
      </div> -->

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="footer_content">Footer Content</label>
          <div class="col-lg-9 col-md-9 col-sm-12">
              <textarea name="footer_content" cols="4" rows="4" id="footer_content" class="form-control description input-lg m-input" data-msg-ckrequired="Please enter footer content." ><?php echo get_input('footer_content', $category->footer_content); ?></textarea>
              <div class="has-error"></div>
          </div>
      </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title<span class="text-danger">*</span></label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="meta_title" name="meta_title" value="<?php echo $category->meta_title ?>" data-msg-required="Please enter Meta Title.">
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_key_words"> Meta Keywords</label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <textarea name="meta_key_words" cols="4" rows="4" id="meta_key_words" class="form-control input-lg m-input" ><?php echo $category->meta_key_words ?></textarea>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description</label>
          <div class="col-lg-4 col-md-9 col-sm-12">
            <textarea name="meta_description" cols="4" rows="4" id="meta_description" class="form-control input-lg m-input" ><?php echo $category->meta_description ?></textarea>
          </div>
        </div>
        
        <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
          <div class="col-sm-2">
            <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order"  value="<?php echo $category->display_order ?>" name="display_order" value="0">
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
                <a  class="btn btn-secondary" href="<? echo base_url('admin/category-level-2'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
  $("#template").change(function(event) {
    
    template = $(this).val();
    if (template == 'custom') {
      $("#customTempDiv").removeClass('hide');
    } else {
      $("#customTempDiv").addClass('hide');
    }

  });
</script>

<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
<div class="d-flex align-items-center">
  <div class="mr-auto">
    <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
  </div>
 <a href="<? echo base_url('admin/second_sub_category') ?>" class="btn btn-success m-btn m-btn--icon">
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
          <label class="col-form-label col-lg-3 col-sm-12" for="category_id"> Category<span class="text-danger">*</span>
          </label>
          <div class="col-lg-4 col-md-9 col-sm-12">
              <select name="category_id" class="form-control m-select m_select_select " id="category_id" data-placeholder="Select category"  required data-msg-required="Please select category." data-allow-clear="true" >
                  <option value="" <?php echo set_select('category_id','',TRUE); ?>>--Please Select Category--</option>
                  <?php
                  foreach ($categories as $key => $category) {
                    if ($category->id == $second_sub_category->category_id) {
                        $checkid = "selected";
                    } else {
                        $checkid = "";
                    }
                      ?>
                      <option  value="<?php echo $category->id ?>" <?php echo $checkid; ?> <?php echo set_select('category_id',$category->id); ?>><?php echo $category->name ?></option>
                      <?php
                  }
                  ?>
              </select>
              <div class="has-error"></div>
          </div>
      </div>

      <!-- <div id="subcategory" style="padding-top: 10px; padding-bottom: 10px;">
      </div> -->
      <div id="subcategory" style="padding-top: 10px; padding-bottom: 10px;">
          <div class="form-group m-form__group row">
              <label class="col-form-label col-lg-3 col-sm-12" for="sub_category_id">Sub Category <span class="text-danger">*</span></label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                  <select  class="form-control input-lg m-input"  name="sub_category_id" id="sub_category_id" required  data-msg-required="Please select sub category type.">
                      <option   value="0">--Please Select Sub Category--</option>
                      <?php
                      foreach ($subcategory as $subcat) {
                        if($second_sub_category->category_id != $subcat->category_id)
                        {
                          continue;
                        }
                          $checkid = '';
                              if ($subcat->id == $second_sub_category->sub_category_id) {
                                  $checkid = "selected";
                              } else {
                                  $checkid = "";
                              }
                          ?>
                          <option <?php echo $checkid; ?>  value="<?php echo $subcat->id; ?>" <?php echo set_select('sub_category_id',$subcat->id); ?> ><?php echo $subcat->sub_category_name; ?></option>
                          <?php
                      }
                      ?>
                  </select>
              </div>
          </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="second_sub_category_name">Second Sub Category<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="second_sub_category_name" name="second_sub_category_name" value="<?php echo get_input('second_sub_category_name',$second_sub_category->second_sub_category_name); ?>" required data-msg-required="Please enter sub category name.">
        </div>
      </div>
	  <!--/*Start :: Meta Title code here */-->
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="meta_title">Meta Title<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('meta_title', $second_sub_category->meta_title); ?>" name="meta_title" id="meta_title" required data-msg-required="Please enter meta title.">
                        </div>
                    </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_keyword">Meta Keyword </label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="meta_keyword" id="meta_keyword" data-msg-required="Please enter  meta keyword" class="form-control   input-lg m-input" rows="8"><? echo get_input('meta_keyword', $second_sub_category->meta_keyword); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_description">Meta Description </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea name="meta_description" id="meta_description" data-msg-required="Please enter meta description" class="form-control   input-lg m-input" rows="8"><? echo get_input('meta_description', $second_sub_category->meta_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <!--/*End :: Meta Title code here */-->

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
        <div class="col-sm-2">
          <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order',$second_sub_category->display_order); ?>">
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
              <a  class="btn btn-secondary" href="<? echo base_url('admin/second_sub_category'); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>
<script>

$("#category_id").change(function() {
    var subVal = $(this).val();
    var id = $('#sub_id').val();
    var scnd_sub_id = $('#2nd_sub_id').val();
    if (subVal > 0 && subVal != '') {
        $.ajax({
            url: base_url + "admin/product/getSubcategory",
            type: "post",
            data: {sub: subVal,id:id,scnd_sub_id:scnd_sub_id},
            dataType: 'html',
            success: function (res) {
                $('#subcategory').html(res);
                // $('#scndsubcategory').html('');
            }
        });
    }else{
        $('#subcategory').html('');
        // $('#scndsubcategory').html('');
    }
});

$("#category_id").trigger("change");


</script>

<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
</div>
<a href="<?php echo base_url('admin/product') ?>" class="btn btn-success m-btn m-btn--icon">
<span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
</a></div>
</div>

<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
<?php echo display_flash('error'); ?>
<!--begin::Form-->
<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="product_form" id="product_form" novalidate="novalidate">
<div class="m-portlet__body pb-2">
<div class="box-header with-border">
    <div id="delete_allmsg_div"></div>
    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
</div>

<?php 
  $fieldError = $this->session->flashdata('fieldError');
  $fieldValue = $this->session->flashdata('fieldValue');
?>

<div class="form-group m-form__group row">
    <label class="col-form-label col-lg-3 col-sm-12" for="product_name">Product Name<span class="text-danger">*</span></label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <input type="text" class="form-control input-lg m-input" id="product_name" name="product_name" data-msg-required="Please enter product name." 
        value="<? echo ( isset($fieldValue['product_name']) && !empty($fieldValue['product_name']) )? $fieldValue['product_name']:get_input('product_name',$this->session->userdata('product_name')); ?>" required>

        <?php if (isset($fieldError['product_name'])): ?>
          <span class="text-danger">
            <?php echo $fieldError['product_name']; ?>
          </span>
        <?php endif ?>
    </div>
</div>


<div class="form-group m-form__group row">
    <label class="col-form-label col-lg-3 col-sm-12" for="category_lv_1"> Category Level 1<span class="text-danger">*</span>
    </label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <select name="category_lv_1" class="form-control m-select m_select_select " id="categoryLv1" data-placeholder="Select category" data-msg-required="Please select category." data-allow-clear="true" required>
            <option value="">Please Select Category</option>
            <?php 
            if (!empty($categoryLevel1)):
                foreach($categoryLevel1 as $catLv1):
                    ?>
                    <option value="<?php echo $catLv1->id ?>"><?php echo $catLv1->category ?></option>
                <?php endforeach; endif; ?>
            </select>
            <div class="has-error"></div>
            <?php if (isset($fieldError['category_lv_1'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['category_lv_1']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="category_lv_2"> Category Level 2
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <select name="category_lv_2" class="form-control m-select m_select_select " id="categoryLv2" data-placeholder="Select category" data-msg-required="Please select category." data-allow-clear="true">
                <option value="">Please Select Category</option>

            </select>
            <div class="has-error"></div>
            <?php if (isset($fieldError['category_lv_2'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['category_lv_2']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="description">Side Description<span class="text-danger">*</span></label>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <textarea name="description" cols="4" rows="4" id="description" class="form-control ckerequired description input-lg m-input" data-msg-ckrequired="Please enter description." required><? echo ( isset($fieldValue['description']) && !empty($fieldValue['description']) )? $fieldValue['description']:get_input('description',$this->session->userdata('description')); ?></textarea>
            <div class="has-error"></div>

            <?php if (isset($fieldError['description'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['description']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="specifications">Main Description<span class="text-danger">*</span></label>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <textarea name="specifications" cols="4" rows="4" id="specifications" class="form-control ckerequired description input-lg m-input" data-msg-ckrequired="Please enter specifications." required><? echo ( isset($fieldValue['specifications']) && !empty($fieldValue['specifications']) )? $fieldValue['specifications']:get_input('specifications',$this->session->userdata('specifications')); ?></textarea>
            <div class="has-error"></div>

            <?php if (isset($fieldError['specifications'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['specifications']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

  <!--   <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="short_description">Short Description</label>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <textarea name="short_description" cols="4" rows="4" id="short_description" class="form-control description input-lg m-input" data-msg-ckrequired="Please enter description." >
            <? echo ( isset($fieldValue['short_description']) && !empty($fieldValue['short_description']) )? $fieldValue['short_description']:get_input('short_description',$this->session->userdata('short_description')); ?>
            </textarea>
            <div class="has-error"></div>
        </div>
    </div> -->

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="sku_code"> SKU Code<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="sku_code" name="sku_code" 
            data-msg-required="Please enter SKU code."
            value="<? echo ( isset($fieldValue['sku_code']) && !empty($fieldValue['sku_code']) )? $fieldValue['sku_code']:get_input('sku_code',$this->session->userdata('sku_code')); ?>"
            required 
            >
            <?php if (isset($fieldError['sku_code'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['sku_code']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="hsn_code"> HSN Code<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="hsn_code" name="hsn_code" value="<?php echo get_input('hsn_code'); ?>" 
            data-msg-required="Please enter HSN code."
            value="<? echo ( isset($fieldValue['hsn_code']) && !empty($fieldValue['hsn_code']) )? $fieldValue['hsn_code']:get_input('hsn_code',$this->session->userdata('hsn_code')); ?>"
            required
            >

            <?php if (isset($fieldError['hsn_code'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['hsn_code']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="hsn_code"> Wheel Size</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="wheel_size" name="wheel_size" value="<?php echo get_input('wheel_size'); ?>" 
            
            value="<? echo ( isset($fieldValue['wheel_size']) && !empty($fieldValue['wheel_size']) )? $fieldValue['wheel_size']:get_input('wheel_size',$this->session->userdata('wheel_size')); ?>"
            
            >

            <?php if (isset($fieldError['wheel_size'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['wheel_size']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="hsn_code"> Frame Size</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="frame_size" name="frame_size" value="<?php echo get_input('frame_size'); ?>" 
         
            value="<? echo ( isset($fieldValue['frame_size']) && !empty($fieldValue['frame_size']) )? $fieldValue['frame_size']:get_input('frame_size',$this->session->userdata('frame_size')); ?>"
            
            >

            <?php if (isset($fieldError['frame_size'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['frame_size']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="hsn_code"> Frame Material</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="frame_material" name="frame_material" value="<?php echo get_input('frame_material'); ?>" 
         
            value="<? echo ( isset($fieldValue['frame_material']) && !empty($fieldValue['frame_material']) )? $fieldValue['frame_material']:get_input('frame_material',$this->session->userdata('frame_material')); ?>"
            
            >

            <?php if (isset($fieldError['frame_material'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['frame_material']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="dimension">Recommended Age<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="dimension" name="dimension" 
           
            value="<? echo ( isset($fieldValue['dimension']) && !empty($fieldValue['dimension']) )? $fieldValue['dimension']:get_input('dimension',$this->session->userdata('dimension')); ?>" 
          
            >

            <?php if (isset($fieldError['dimension'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['dimension']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="net_weight"> Item Weight<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="net_weight" name="net_weight" 
            data-msg-required="Please enter net weight."
            value="<? echo ( isset($fieldValue['net_weight']) && !empty($fieldValue['net_weight']) )? $fieldValue['net_weight']:get_input('net_weight',$this->session->userdata('net_weight')); ?>" 
            required
            >

            <?php if (isset($fieldError['net_weight'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['net_weight']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>
   <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="tyre_type"> Tyre Type</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="tyre_type" name="tyre_type" value="<?php echo get_input('tyre_type'); ?>" 
         
            value="<? echo ( isset($fieldValue['tyre_type']) && !empty($fieldValue['tyre_type']) )? $fieldValue['tyre_type']:get_input('tyre_type',$this->session->userdata('tyre_type')); ?>"
            
            >

            <?php if (isset($fieldError['tyre_type'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['tyre_type']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>
   <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="handle_type"> Handle Type</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="handle_type" name="handle_type" value="<?php echo get_input('handle_type'); ?>" 
         
            value="<? echo ( isset($fieldValue['handle_type']) && !empty($fieldValue['handle_type']) )? $fieldValue['handle_type']:get_input('handle_type',$this->session->userdata('handle_type')); ?>"
            
            >

            <?php if (isset($fieldError['handle_type'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['handle_type']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="break_type"> Brake Type</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="break_type" name="break_type" value="<?php echo get_input('break_type'); ?>" 
         
            value="<? echo ( isset($fieldValue['break_type']) && !empty($fieldValue['break_type']) )? $fieldValue['break_type']:get_input('break_type',$this->session->userdata('break_type')); ?>"
            
            >

            <?php if (isset($fieldError['break_type'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['break_type']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>
<?php /*
    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="deno"> Deno (gm)<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="number" class="form-control input-lg m-input" id="deno" name="deno" 
            data-msg-required="Please enter deno."
            value="<? echo ( isset($fieldValue['deno']) && !empty($fieldValue['deno']) )? $fieldValue['deno']:get_input('deno',$this->session->userdata('deno')); ?>" 
            required
            >

            <?php if (isset($fieldError['deno'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['deno']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>
*/ ?>
    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="stock"> Stock & Quantity <span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="number" maxlength="4" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="stock" name="stock" 
            data-msg-required="Please enter Stock & Quantity."
            value="<? echo ( isset($fieldValue['stock']) && !empty($fieldValue['stock']) )? $fieldValue['stock']:get_input('stock',$this->session->userdata('stock')); ?>"
            required 
            >

            <?php if (isset($fieldError['stock'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['stock']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="mrp"> MRP<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input min="1" type="number" class="form-control input-lg m-input validPrice" id="mrp" name="mrp" 
            data-msg-required="Please enter MRP."
            value="<? echo ( isset($fieldValue['mrp']) && !empty($fieldValue['mrp']) )? $fieldValue['mrp']:get_input('mrp',$this->session->userdata('mrp')); ?>" 
            required
            >

            <?php if (isset($fieldError['mrp'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['mrp']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row UAE_stock_dpy">
        <label class="col-form-label col-lg-3 col-sm-12" for="sp"> Selling Price </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input min="1" type="number" class="form-control input-lg m-input validPrice" id="sp" name="sp" 
            data-msg-required="Please enter selling price."
            value="<? echo ( isset($fieldValue['sp']) && !empty($fieldValue['sp']) )? $fieldValue['sp']:get_input('sp',$this->session->userdata('sp')); ?>" 
            >

            <?php if (isset($fieldError['sp'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['sp']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="gst"> GST<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input min="1" type="number" class="form-control input-lg m-input validPrice" id="gst" name="gst" 
            data-msg-required="Please enter gst."
            value="<? echo ( isset($fieldValue['gst']) && !empty($fieldValue['gst']) )? $fieldValue['gst']:get_input('gst',$this->session->userdata('gst')); ?>" 
            required
            >

            <?php if (isset($fieldError['gst'])): ?>
              <span class="text-danger">
                <?php echo $fieldError['gst']; ?>
              </span>
            <?php endif ?>
        </div>
    </div>

    <?php
        $attributes = $attributes;
        if (!empty($attributes)):
            
            /* 
            -----Multi----
            class="m-select2 m_select2_select"
            multiple="multiple"

            -----Single----
            class="m-select m_select_select"            
            */

            foreach($attributes as $attr):
                $title = ucwords($attr->slug);
                $attrID = $attr->id;
                
                $class = 'm-select2 m_select2_select';
                $htmlAtttr = 'multiple="multiple"';

                if (!$attr->multi) {
                    $class = 'm-select m_select_select';
                    $htmlAtttr = '';
                }

                $getValue = $this->db->get_where('attribute_value', array('attrib_id' => $attrID))->result_object();
    ?>
        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12" for="<?php $title ?>"> <?php echo $title ?>
            </label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <select name="attribute[<?php echo $attrID ?>][]" class="form-control <?php echo $class ?>" <?php echo $htmlAtttr; ?> id="<?php $title ?>" data-placeholder="Select <?php $title ?>" data-msg-required="Please select <?php $title ?>." data-allow-clear="true" >
                    
                    <?php if (!empty($getValue)): ?>

                        <?php if (!$attr->multi): ?>
                            <option value="">Select <?php echo $title ?></option>
                        <?php endif ?>

                        <?php foreach ($getValue as $attrVal): ?>
                            <option value="<?php echo $attrVal->id ?>"><?php echo $attrVal->name ?></option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
            <div class="has-error"></div>
            </div>
        </div>

    <?php endforeach; endif; ?>

                <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_date">
                        Display Date
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date display_date w-50">
                            <input type="text" id="display_date" name="display_date" class="form-control m_datepicker display_date m-input small-textbox" data-msg-required="Please enter display date." data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" 
                            readonly=""
                            value="<? echo ( isset($fieldValue['display_date']) && !empty($fieldValue['display_date']) )? $fieldValue['display_date']:get_input('display_date',$this->session->userdata('display_date')); ?>" 
                            >
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>

                            <?php if (isset($fieldError['display_date'])): ?>
                              <span class="text-danger">
                                <?php echo $fieldError['display_date']; ?>
                              </span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php /*    
                <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_time">
                        Display Time
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date display_time w-50">
                            <input type="text" id="display_time" name="display_time" class="form-control m_timepicker display_time m-input small-textbox" data-msg-required="Please enter display time." data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly=""
                            value="<? echo ( isset($fieldValue['display_time']) && !empty($fieldValue['display_time']) )? $fieldValue['display_time']:get_input('display_time',$this->session->userdata('display_time')); ?>" 
                            >
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>

                            <?php if (isset($fieldError['display_time'])): ?>
                              <span class="text-danger">
                                <?php echo $fieldError['display_time']; ?>
                              </span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                */ ?>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12"> Featured</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class=" mt">
                            <label>
                                <input type="checkbox" name="featured" id="featured" value="1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

              <!--   <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12"> Popular</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class=" mt">
                            <label>
                                <input type="checkbox" name="popular" id="popular" value="1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12"> On Sale</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class=" mt">
                            <label>
                                <input type="checkbox" name="sale" id="sale" value="1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div> -->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12"> Display on Homepage</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="mt">
                            <label>
                                <input type="checkbox" name="homepage" id="homepage" value="1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

              <!--   <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="product_tag"> Product Tag</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="product_tag" name="product_tag" value="<?php echo get_input('product_tag'); ?>" data-msg-required="Please enter product tag.">
                    </div>
                </div>
 -->
                <div class="form-group m-form__group row Image">
                    <label class="col-form-label col-lg-3 col-sm-12" for="image_path"> Image (226px W * 155px H)<span class="text-danger">*</span> </label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" class="form-control validImage" name="image_path" id="image_path" data-image-crop="0" data-image-height="370" data-image-width="370" data-caption="Image" data-image-path ="product/" data-msg-required="Please upload image" required>

                            <?php if (isset($fieldError['image_path'])): ?>
                              <span class="text-danger">
                                <?php echo $fieldError['image_path']; ?>
                              </span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="label"> Label</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="label" name="label" data-msg-required="Please enter Meta Title."
                        value="<? echo ( isset($fieldValue['label']) && !empty($fieldValue['label']) )? $fieldValue['label']:get_input('label',$this->session->userdata('label')); ?>"
                        
                        >

                        <?php if (isset($fieldError['label'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['label']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="meta_title" name="meta_title" data-msg-required="Please enter Meta Title."
                        value="<? echo ( isset($fieldValue['meta_title']) && !empty($fieldValue['meta_title']) )? $fieldValue['meta_title']:get_input('meta_title',$this->session->userdata('meta_title')); ?>"
                        
                        >

                        <?php if (isset($fieldError['meta_title'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['meta_title']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_key_words"> Meta Keywords</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_key_words" cols="4" rows="4" id="meta_key_words" class="form-control input-lg m-input" ><? echo ( isset($fieldValue['meta_key_words']) && !empty($fieldValue['meta_key_words']) )? $fieldValue['meta_key_words']:get_input('meta_key_words',$this->session->userdata('meta_key_words')); ?></textarea>

                        <?php if (isset($fieldError['meta_key_words'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['meta_key_words']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_description" cols="4" rows="4" id="meta_description" class="form-control input-lg m-input" ><? echo ( isset($fieldValue['meta_description']) && !empty($fieldValue['meta_description']) )? $fieldValue['meta_description']:get_input('meta_description',$this->session->userdata('meta_description')); ?></textarea>

                        <?php if (isset($fieldError['meta_description'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['meta_description']; ?>
                          </span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" 
                        value="<? echo ( isset($fieldValue['display_order']) && !empty($fieldValue['display_order']) )? $fieldValue['display_order']:get_input('display_order',$this->session->userdata('display_order')); ?>">

                        <?php if (isset($fieldError['display_order'])): ?>
                          <span class="text-danger">
                            <?php echo $fieldError['display_order']; ?>
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/product'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    jQuery(document).ready(function($) {

        $("#categoryLv1").change(function(event) {

            var catId = $(this).val();

            $.ajax({
                url: '<?php echo base_url("admin/Product/getCategoryLv2") ?>',
                type: 'POST',
                dataType: 'json',
                data: {catId: catId},
                success: function(res) {
                    if (res.error == false) {
                        $("#categoryLv2").html(res.data);
                    }
                }
            });


        });

    });
</script>

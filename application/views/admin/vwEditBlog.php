<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/blog') ?>" class="btn btn-success m-btn m-btn--icon">
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
                        <label class="col-form-label col-lg-3 col-sm-12" for="blog_title">Blog Title<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" id="blog_title" name="blog_title" data-msg-required="Please enter blog title." 
                            value="<? echo ( isset($fieldValue['blog_title']) && !empty($fieldValue['blog_title']) )? $fieldValue['blog_title']:get_input('blog_title', $blog->title); ?>" requireds>

                            <?php if (isset($fieldError['blog_title'])): ?>
                              <span class="text-danger">
                                <?php echo $fieldError['blog_title']; ?>
                            </span>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="blog_link">Blog Link<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" id="blog_link" name="blog_link" 
                            data-msg-required="Please enter blog link."
                            value="<? echo ( isset($fieldValue['blog_link']) && !empty($fieldValue['blog_link']) )? $fieldValue['blog_link']:get_input('blog_link',$blog->link); ?>"
                            requireds
                            >

                            <?php if (isset($fieldError['blog_link'])): ?>
                              <span class="text-danger">
                                <?php echo $fieldError['blog_link']; ?>
                            </span>
                        <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="author_name">Author Name<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" id="author_name" name="author_name" 
                            data-msg-required="Please enter author name."
                            value="<? echo ( isset($fieldValue['author_name']) && !empty($fieldValue['author_name']) )? $fieldValue['author_name']:get_input('author_name',$blog->author_name); ?>"
                            requireds
                            >

                            <?php if (isset($fieldError['author_name'])): ?>
                              <span class="text-danger">
                                <?php echo $fieldError['author_name']; ?>
                            </span>
                        <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="description">Description<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea name="description" cols="4" rows="4" id="description" class="form-control ckerequireds description input-lg m-input" data-msg-ckrequired="Please enter description." required><? echo ( isset($fieldValue['description']) && !empty($fieldValue['description']) )? $fieldValue['description']:get_input('description',$blog->description); ?></textarea>
                            <div class="has-error"></div>

                            <?php if (isset($fieldError['description'])): ?>
                              <span class="text-danger">
                                <?php echo $fieldError['description']; ?>
                            </span>
                        <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group  m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="display_date">
                            Display Date <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group date display_date w-50">
                                <input type="text" id="display_date" name="display_date" class="form-control m_datepicker display_date m-input small-textbox" data-msg-required="Please enter display date." data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" 
                                readonly=""
                                value="<? echo ( isset($fieldValue['display_date']) && !empty($fieldValue['display_date']) )? $fieldValue['display_date']:get_input('display_date',$blog->date); ?>" requireds 
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

                    <div class="form-group m-form__group row Image">
                        <label class="col-form-label col-lg-3 col-sm-12" for="image_path"> Image (945px W * 654px H)<span class="text-danger">*</span> </label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file" class="form-control validImage" name="image_path" id="image_path" data-image-crop="0" data-image-height="654" data-image-width="945" data-caption="Image" data-image-path ="blog/" data-msg-required="Please upload image" <?php empty($blog->image)? 'required':''; ?>>

                                <?php if ($blog->image != ""): ?>
                                    <div class="w-25 mt-2">
                                        <img class="w-100" src="<?php echo base_url($blog->image); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($fieldError['image_path'])): ?>
                                  <span class="text-danger">
                                    <?php echo $fieldError['image_path']; ?>
                                </span>
                            <?php endif ?>
                        </div>
                    </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                        <div class="col-sm-2">
                            <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" 
                            value="<? echo ( isset($fieldValue['display_order']) && !empty($fieldValue['display_order']) )? $fieldValue['display_order']:get_input('display_order', $blog->display_order); ?>">

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
                <a  class="btn btn-secondary" href="<?php echo base_url('admin/blog'); ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
        </div>
    </div>
</div>


</div>
</form>
<!--end::Form-->
</div>
</div>

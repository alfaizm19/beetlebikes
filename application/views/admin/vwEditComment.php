<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/comment/index/'.$com->blog_id) ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a></div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="name"> Name<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="name" class="form-control input-lg m-input" id="name" name="name" value="<?php echo get_input('name', $com->name); ?>" required data-msg-required="Please enter name." readonly disabled>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="email"> Email<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="email" class="form-control input-lg m-input" id="email" name="email" value="<?php echo get_input('email', $com->email); ?>" required data-msg-required="Please enter email." readonly disabled>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="title"> Title<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="title" id="title" class="form-control input-lg m-input" rows="4" required data-msg-required="Please enter title."><?php echo get_input('title', $com->title) ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="comment"> Comment<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="comment" id="comment" class="form-control input-lg m-input" rows="4" required data-msg-required="Please enter comment."><?php echo get_input('comment', $com->comment) ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order', $com->display_order); ?>">
                        <input type="hidden" required name="blogId" value="<?php echo $com->blog_id ?>">
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/comment/index/'.$com->blog_id); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>

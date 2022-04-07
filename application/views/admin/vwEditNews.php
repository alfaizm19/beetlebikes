<style>
.datepicker{
  z-index: 999 !important;
}
</style>
<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/news') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<? if (empty($blog)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;
?>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="user_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="categories">
                        Category <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="categories" class="form-control" id="categories" data-placeholder="Select category" required data-msg-required="Please select category." data-allow-clear="true" >
                            <option value="">Select Category</option>
                            <? foreach ($categories as $key => $value) : ?>
                                <option <? echo set_select('categories', $key); ?> value="<? echo $key; ?>" <? echo ($key == $blog->category_id) ? "selected" : '' ?>><? echo $value; ?></option>
                            <? endforeach; ?>
                        </select>
                        <div class="has-error"></div>
                    </div>
                </div> -->
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tag_list"> Tags <span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="tag_list[]" class="form-control m-select2 m_select2_select " multiple="multiple" id="tag_list" data-placeholder="Select tag" required data-msg-required="Please select tag." data-allow-clear="true" >
                             <option value="">Select  tag</option>
                            <?
                            $tag_list = array_column($tag_lists, 'tag_id');
                            foreach ($tags as $key => $value) {
                                if (in_array($key, $tag_list)) {
                                    $selected = "selected";
                                } else {
                                    $selected = '';
                                }
                                ?>
                                <option <? echo set_select('tag_list', $key); ?> <? echo $selected; ?>  value="<? echo $key; ?>"><? echo $value; ?></option>
                            <? }; ?>
                        </select>
                        <div class="has-error"></div>
                    </div>
                </div> -->


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="blog_title">
                        Title <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('blog_title', $blog->blog_title); ?>" name="blog_title" id="blog_title" required data-msg-required="Please enter blog title.">
                    </div>
                </div>

<!--                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="blog_url">
                        Url <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control input-lg m-input" value="<? echo get_input('blog_url', $blog->blog_url); ?>" name="blog_url" id="blog_url" required data-msg-required="Please enter blog url.">
                    </div>
                </div>-->


                <div class="form-group  m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="blog_date">
                        News Date <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date blog_date m_datepicker m-input w-50">
                            <input type="text" id="blog_date" name="blog_date" class="form-control blog_date m_datepicker m-input small-textbox" value="<? echo get_input('blog_date', ($blog->blog_date != DEFAULT_DATE) ? $blog->blog_date : ''); ?>"  required data-msg-required="Please enter blog date."  data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                            <span class="input-group-addon"><i class="fa fa-calendar py-2 mt-1"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="blog_author">
                        Author <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('blog_author', $blog->blog_author); ?>" name="blog_author" id="blog_author" required data-msg-required="Please enter blog author.">
                    </div>
                </div>

                <!--                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12" for="image_caption"> Image Caption<span class="text-danger">*</span> </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <input type="image_caption" class="form-control input-lg m-input" id="image_caption" name="image_caption"  value="<? // echo get_input('image_caption', $blog->image_caption);  ?>" required data-msg-required="Please enter image caption.">
                                    </div>
                                </div>-->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="blog_image">News Image  <? echo BLOG_IMAGE_SIZE; ?></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="blog_image" id="blog_image" data-image-crop="1" data-image-height="<? echo BLOG_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<? echo BLOG_IMAGE_SIZE_WIDTH; ?>" data-caption="Blog image"  data-image-path ="blog/" >
                        </div>
                        <? if ($blog->blog_image != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($blog->blog_image); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" required data-msg-ckrequired="Please enter description." class="form-control ckerequired description input-lg m-input" rows="3"><? echo get_input('description', $blog->description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('meta_title', $blog->meta_title); ?>" required data-msg-required="Please enter meta title." name="meta_title" id="meta_title">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_keyword"> Meta Keyword </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_keyword" id="meta_keyword" class="form-control input-lg m-input" rows="3"><? echo get_input('meta_keyword', $blog->meta_keyword); ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_description" id="meta_description" class="form-control input-lg m-input" rows="3" ><? echo get_input('meta_description', $blog->meta_description); ?></textarea>
                    </div>
                </div>


                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
                                </button>
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/news'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    $(function () {
        $(".blog_date").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            pickerPosition: 'bottom-right',
            autoclose: true,
            beforeShow: function() {
              setTimeout(function(){
                  $('.blog_date').css('z-index', 9999);
              }, 0);
            }
        });
    });
</script>

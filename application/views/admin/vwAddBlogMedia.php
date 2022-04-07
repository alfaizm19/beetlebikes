<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/blog_media/index/' . $this->uri->segment(4) . '') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a></div>
</div>

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
                    <label class="col-form-label col-lg-3 col-sm-12" for="blog_media_type_id">Media Type<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select required name="blog_media_type_id" id="blog_media_type_id" class="form-control select-control" data-msg-required="Please select media type." onchange="galleryType(this.value)">
                            <?
                            foreach ($blog_gallery as $blog_gallery_val) {
                                echo '<option value=' . $blog_gallery_val['blog_gallery_type_id'] . '>' . $blog_gallery_val['blog_gallery_type'] . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="caption1"> Caption</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="caption1" name="caption1"  value="<? echo get_input('caption1'); ?>">
                    </div>
                </div>
                <div class="form-group m-form__group row Image">
                    <label class="col-form-label col-lg-3 col-sm-12" for="blogs_image1"> Image <? echo BLOG_MEDIA_IMAGE_SIZE; ?><span class="text-danger">*</span> </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" required class="form-control validImage" name="blogs_image1" id="blogs_image1" data-image-crop="1" data-image-height="<?= BLOG_MEDIA_IMAGE_SIZE_HEIGHT ?>" data-image-width="<?= BLOG_MEDIA_IMAGE_SIZE_WIDTH ?>" data-caption="Image" data-image-path ="blog-image/" data-msg-required="Please upload image">
                        </div>
                    </div>
                </div>
                <div id="addmore_blogs" class="Image"></div>

                <div class="form-group m-form__group row Image">
                    <label class="col-form-label col-lg-3 col-sm-12 " for=""></label>
                    <div class="col-sm-2">
                        <a class="btn btn-success"   onclick="AddText();"><i class="fa fa-plus"></i> Add more</a>
                    </div>
                </div>

                <input type="hidden" value="1" name="hide_total_field" id="hide_total_field" />

                <div class="form-group m-form__group row Video" style="display:none;">
                    <label class="col-form-label col-lg-3 col-sm-12" for="video_link">Media Embed Code<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea class="form-control m-input" id="video_link" name="video_link" rows="3" data-msg-required="Please etner embed code" required><? echo get_input('video_link'); ?></textarea>

                    </div>
                </div>
                <div class="form-group m-form__group row VideoFile" style="display:none;">
                    <label class="col-form-label col-lg-3 col-sm-12" for="video_file">Video File (.mp4/.mkv)<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="file" required class="form-control validVideo" name="video_file"  id="video_file" data-msg-required="Please upload video." data-caption="video file" data-image-path="blog-video/">

                    </div>
                </div>
                <input type="hidden" value="<?= $this->uri->segment(4); ?>" name="hid_blog_id" />

                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i>
                                    Save
                                </button>
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/blog_media/index/' . $this->uri->segment(4) . ''); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
<div class="clone" id="clone" style="display: none;">
    <div class="form-group m-form__group row Caption mt-4">
        <label class="col-form-label col-lg-3 col-sm-12" for="caption"> Caption</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <input type="text" class="form-control input-lg m-input" id="caption" name="caption">
        </div>
    </div>
    <div class="form-group m-form__group row Image">
        <label class="col-form-label col-lg-3 col-sm-12" for="blogs_image"> Image <? echo BLOG_MEDIA_IMAGE_SIZE; ?><span class="text-danger">*</span> </label> 
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="cropoutterwrap">
                <input type="file" required class="form-control validImage" name="blogs_image" id="blogs_image" data-image-crop="0" data-image-height="<?= BLOG_MEDIA_IMAGE_SIZE_HEIGHT ?>" data-image-width="<?= BLOG_MEDIA_IMAGE_SIZE_WIDTH ?>" data-caption="Image" data-image-path ="blog-image/" data-msg-required="Please upload image"><br /><a class="btn btn-danger"   onclick="removeElement(this);"><i class="fa fa-fw fa-trash-o"></i></a>
            </div>
        </div>
    </div>
</div>
<script>
    var intTextBox = 1;
    function AddText() {
        intTextBox++;
        var i = $("#hide_total_field").val(intTextBox).val();
        var data_element = '';
        var clone = $("#clone").clone();
        clone.find(':input').each(function (index, el) {
            $(this).attr("name", el.name + intTextBox)
            $(this).attr("id", el.id + intTextBox)
        });
        clone.find('span').each(function (index, el) {
            $(this).attr("id", el.id + intTextBox + "lbl")
        });
        var create_div = $('<div/>').attr('id', 'blogs_image_' + intTextBox).attr('class', 'blogs-image');
        create_div.html(clone.html());
        create_div.find('[data-image-crop="0"]').attr('data-image-crop', 1)
        $("#addmore_blogs").append(create_div);
        filechangeevent();
    }
    function removeElement(p_this) {
        var parentdiv = $(p_this).parents("div.blogs-image:first");
        parentdiv.remove();

        /* 
         * intTextBox--;
         $("#hide_total_field").val(intTextBox);
         var idindex = 2;
         $(".blogs-image").each(function (index, el) {
         $(this).attr("id", "blogs_image_" + idindex);
         $(this).find(':input').each(function (index, el) {
         $(this).attr("name", el.name.slice(0, -1) + idindex)
         $(this).attr("id", el.id.slice(0, -1) + idindex)
         });
         idindex++;
         });*/
    }
</script>
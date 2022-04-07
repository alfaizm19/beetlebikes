<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/news_media/index/' . $this->uri->segment(4) . '') ?>" class="btn btn-success m-btn m-btn--icon">
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
                        <input type="hidden"  name="blog_media_type_id" value="<? echo $blogs->blog_media_type_id; ?>"/>
                        <select disabled required name="blog_media_type_id" id="blog_media_type_id" class="form-control select-control" data-msg-required="Please select media type." onchange="galleryType(this.value)">
                            <?
                            foreach ($blog_gallery as $nkey => $blog_gallery_val) {
                                if ($blog_gallery_val['blog_gallery_type_id'] == $blogs->blog_media_type_id) {
                                    $checkid = "selected";
                                } else {
                                    $checkid = '';
                                }
                                echo '<option value=' . $nkey . ' ' . $checkid . '>' . $blog_gallery_val['blog_gallery_type'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="caption"> Caption</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" id="caption" name="caption"  value="<? echo get_input('caption', $blogs->caption); ?>">
                    </div>
                </div>
<? if ($blogs->blog_media_type_id == 1) { ?>  
                    <div class="form-group m-form__group row Image">
                        <label class="col-form-label col-lg-3 col-sm-12" for="blogs_image"> Image <? echo BLOG_MEDIA_IMAGE_SIZE; ?></label> 
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file" class="form-control validImage" name="blogs_image" id="blogs_image" data-image-crop="1" data-image-height="<?= BLOG_MEDIA_IMAGE_SIZE_HEIGHT ?>" data-image-width="<?= BLOG_MEDIA_IMAGE_SIZE_WIDTH ?>" data-caption="Image" data-image-path ="blog-image/" data-msg-required="Please upload image">
                            </div>
    <? if ($blogs->image_path != ""): ?>
                                <div class="w-25 mt-2">
                                    <img class="w-100" src="<? echo base_url($blogs->image_path); ?>">
                                </div>
                            <? endif; ?>  
                        </div>
                    </div>
                        <? } elseif ($blogs->blog_media_type_id == 2) { ?>  
                    <div class="form-group m-form__group row Video">
                        <label class="col-form-label col-lg-3 col-sm-12" for="video_link">Media Embed Code<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <textarea class="form-control m-input" id="video_link" name="video_link" rows="3" data-msg-required="Please etner embed code" required><? echo get_input('video_link', $blogs->video_link); ?></textarea>
    <? if ($blogs->video_link != ""): ?>
                                <div class="w-25 mt-2">
                                    <div class="w-100"><?= $blogs->video_link; ?></div>
                                </div>
                            <? endif; ?>  
                        </div> 
                    </div>
                        <? } elseif ($blogs->blog_media_type_id == 3) {
                            ?>  
                    <div class="form-group m-form__group row VideoFile">
                        <label class="col-form-label col-lg-3 col-sm-12" for="video_file">Video File (.mp4/.mkv)</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="file" class="form-control validVideo" name="video_file"  id="video_file" data-msg-required="Please upload video." data-caption="video file" data-image-path="blog-video/">
                    <? if ($blogs->video_file != ""): ?>
                                <div class="w-25 mt-2">
                                    <video width="500px" controls class="image-video-display" src="<?= base_url() . $blogs->video_file; ?>" type="video/mp4"></video>
                                </div>
                            <? endif; ?>  
                        </div>

                    </div>
                        <? } ?>  
                <input type="hidden" value="<?= $this->uri->segment(4); ?>" name="hid_blog_id" />
                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
                                </button>
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/news_media/index/' . $this->uri->segment(4) . ''); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
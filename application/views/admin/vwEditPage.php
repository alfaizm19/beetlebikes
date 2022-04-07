<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"><? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/page') ?>" class="btn btn-success m-btn m-btn--icon">
            <span>
                <i class="fa fa-arrow-circle-o-left"></i>
                <span></span>Back
            </span>
        </a>
    </div>
</div>
<? if (empty($page)): ?>
    <div class="col-sm-12">
        <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
            <div class="m-portlet__body pb-2 text-bolder text-center">
                <h4 class="text-cneter text-bolder"> No Data Found ! </h4>
            </div>
        </div>
    </div>
    <?
    return FALSE;
endif;
?>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data"
              name="user_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">

                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="page_name"> Page Name<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('page_name', $page->page_name); ?>" disabled name="page_name" id="page_name"
                               required data-msg-required="Please enter page name.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="title"> Title<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('title', $page->title); ?>" name="title" id="title"
                               required data-msg-required="Please enter title.">
                    </div>
                </div>

                <!-- banner image -->
                <?  
                    $notAllowed = array(
                        1, 10, 11, 13, 14, 15, 23, 16, 9, 24, 17, 25, 26, 18, 35, 36
                    );
                if (!in_array($page->id, $notAllowed)) {

                    if ($page->id == 32) {
                        $BANNER_INNER_SIZE_HEIGHT = 328;
                        $BANNER_INNER_SIZE_WIDTH = 1280;
                        $BANNER_INNER_IMAGE_SIZE = '('.$BANNER_INNER_SIZE_WIDTH .'px W *'.$BANNER_INNER_SIZE_HEIGHT.'px H';
                    } elseif ($page->id == 34) {
                        $BANNER_INNER_SIZE_HEIGHT = 853;
                        $BANNER_INNER_SIZE_WIDTH = 569;
                        $BANNER_INNER_IMAGE_SIZE = '('.$BANNER_INNER_SIZE_WIDTH.'px W * '.$BANNER_INNER_SIZE_HEIGHT.'px H';
                    } else {
                        $BANNER_INNER_SIZE_HEIGHT = BANNER_INNER_SIZE_HEIGHT;
                        $BANNER_INNER_SIZE_WIDTH = BANNER_INNER_SIZE_WIDTH;
                        $BANNER_INNER_IMAGE_SIZE = BANNER_INNER_IMAGE_SIZE;
                    }
                ?>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="banner_image"> Banner Image <? echo $BANNER_INNER_IMAGE_SIZE; ?></span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file"  class="form-control validImage" name="banner_image" id="banner_image" data-image-crop="1" data-image-height="<? echo $BANNER_INNER_SIZE_HEIGHT; ?>" data-image-width="<? echo $BANNER_INNER_SIZE_WIDTH; ?>" data-caption="Image" data-image-path="page/banner-image/"  data-msg-required="Please upload banner image.">
                            </div>
                            <? if ($page->banner_image_path != ""): ?>
                                <div class="w-25 mt-2">
                                    <img class="w-100" src="<? echo base_url($page->banner_image_path); ?>">
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                <? } ?>
                 <!-- end banner image -->

                <!-- catalogue image -->
                <?  if ($page->id == 6) {?>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="catalogue_image"> Catalogue Image <? echo CATALOGUE_IMAGE_SIZE; ?></span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file"  class="form-control validImage" name="catalogue_image" id="catalogue_image" data-image-crop="1" data-image-height="<? echo CATALOGUE_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<? echo CATALOGUE_IMAGE_SIZE_WIDTH; ?>" data-caption="Catalogue Image" data-image-path="page/catalogue-image/"  data-msg-required="Please upload catalogue image.">
                            </div>
                            <? if ($page->catalogue_image != ""): ?>
                                <div class="w-25 mt-2">
                                    <img class="w-100" src="<? echo base_url($page->catalogue_image); ?>">
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                <? } ?>
                 <!-- end catalogue image -->

                <!-- Description -->
                <?  if ($page->id == 3 || $page->id == 6 || $page->id == 21 || $page->id == 4) {?>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description1">Description</label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="description1" data-msg-required="Please enter  " class="form-control   input-lg m-input" rows="8"><? echo get_input('description1', $page->description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                 <? } ?>
                <!-- Description -->

                <!-- Contact Location Title and Description -->
                <? if($page->id == 10) {
                    ?>
                <!-- <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="right_image">Right Image <? echo CONTACT_IMAGE_SIZE; ?></span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file"  class="form-control validImage" name="right_image" id="right_image" data-image-crop="1" data-image-height="<? echo CONTACT_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<? echo CONTACT_IMAGE_SIZE_WIDTH; ?>" data-caption="Right Image" data-image-path="page/contact/"  data-msg-required="Please upload contact image.">
                            </div>
                            <? if ($page->right_image != ""): ?>
                                <div class="w-25 mt-2">
                                    <img class="w-100" src="<? echo base_url($page->right_image); ?>">
                                </div>
                            <? endif; ?>
                        </div>
                            </div> -->

                        <!-- <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12" for="contact_location_title">Contact Location Title<span class="text-danger">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input type="text" class="form-control input-lg m-input" value="<? echo get_input('contact_location_title', $page->contact_location_title); ?>" name="contact_location_title" id="contact_location_title" required data-msg-required="Please enter contact location title.">
                            </div>
                        </div> -->
                    <!-- <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="contact_location_description">Contact Location Description<span class="text-danger">*</span></label>
                        <div class="col-lg-6 col-md-9 col-sm-8">
                            <textarea name="contact_location_description" data-msg-required="Please enter  contact location description." class="form-control   input-lg m-input" rows="8" required><? echo get_input('contact_location_description', $page->contact_location_description); ?></textarea>
                            <div class="has-error"></div>
                        </div>
                    </div> -->

                <? }

                if ($page->is_description == 1) {
                    ?>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea name="description" id="description"   class="form-control description  input-lg m-input" rows="3"><? echo get_input('description', $page->description); ?></textarea>

                        </div>
                    </div>
                    <?
                }
                if ($page->id == 1) {
                    ?>
                    <!-- <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="about_us_title1">About Us Title 1<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('about_us_title1', $page->about_us_title1); ?>" name="about_us_title1" id="about_us_title1"
                                   required data-msg-required="Please enter about us title 1.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="about_us_title2">About Us Title 2<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('about_us_title2', $page->about_us_title2); ?>" name="about_us_title2" id="about_us_title2"
                                   required data-msg-required="Please enter about us title 2.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="about_us_description"> About Us Description </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea name="about_us_description" id="about_us_description"   class="form-control description  input-lg m-input" rows="3"><? echo get_input('about_us_description', $page->about_us_description); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="project_title_1">Project Title 1<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('project_title_1', $page->project_title_1); ?>" name="project_title_1" id="project_title_1"
                                   required data-msg-required="Please enter project title 1.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="project_title_2">Project Title 2<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('project_title_2', $page->project_title_2); ?>" name="project_title_2" id="project_title_2"
                                   required data-msg-required="Please enter project title 2.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature_1">Feature 1<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature_1', $page->feature_1); ?>" name="feature_1" id="feature_1"
                                   required data-msg-required="Please enter feature 1.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature_2">Feature 2<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature_2', $page->feature_2); ?>" name="feature_2" id="feature_2"
                                   required data-msg-required="Please enter feature 2.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature_3">Feature 3<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature_3', $page->feature_3); ?>" name="feature_3" id="feature_3"
                                   required data-msg-required="Please enter feature 3.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature_4">Feature 4<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature_4', $page->feature_4); ?>" name="feature_4" id="feature_4"
                                   required data-msg-required="Please enter feature 4.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="brand_title1">Brand Title 1<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('brand_title1', $page->brand_title1); ?>" name="brand_title1" id="brand_title1"
                                   required data-msg-required="Please enter brand title 1.">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="brand_title2">Brand Title 2<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('brand_title2', $page->brand_title2); ?>" name="brand_title2" id="brand_title2"
                                   required data-msg-required="Please enter brand title 2.">
                        </div>
                    </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="brand_description">Brand Description </label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="brand_description" id="brand_description" data-msg-required="Please enter brand description" class="form-control   input-lg m-input" rows="8"><? echo get_input('brand_description', $page->brand_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="contact_us_title">Contact Us Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('contact_us_title', $page->contact_us_title); ?>" name="contact_us_title" id="contact_us_title"
                                   required data-msg-required="Please enter contact us title.">
                        </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="contact_us_description">Contact Us Description </label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="contact_us_description" id="contact_us_description" data-msg-required="Please enter contact us description" class="form-control   input-lg m-input" rows="8"><? echo get_input('contact_us_description', $page->contact_us_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="blog_title1">Blog Title 1<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('blog_title1', $page->blog_title1); ?>" name="blog_title1" id="blog_title1"
                                   required data-msg-required="Please enter blog title 1.">
                        </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="blog_title2">Blog Title 2<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('blog_title2', $page->blog_title2); ?>" name="blog_title2" id="blog_title2"
                                   required data-msg-required="Please enter blog title 2.">
                        </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="blog_description">Blog Description </label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="blog_description" id="blog_description" data-msg-required="Please enter blog description" class="form-control   input-lg m-input" rows="8"><? echo get_input('blog_description', $page->blog_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->

                <? }  if ($page->id == 12) { ?>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="company_title1">Company Title 1<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('company_title1', $page->company_title1); ?>" name="company_title1" id="company_title1"
                            required data-msg-required="Please enter company title 1.">
                        </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="company_title2">Company Title 2<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('company_title2', $page->company_title2); ?>" name="company_title2" id="company_title2"
                                   required data-msg-required="Please enter company title 2.">
                        </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="company_description">Company Description <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="company_description" id="company_description" class="form-control description  input-lg m-input" data-msg-required="Please enter company description" rows="3"><? echo get_input('company_description', $page->company_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="company_image">Company Image <? echo COMPANY_IMAGE_SIZE; ?></span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file"  class="form-control validImage" name="company_image" id="company_image" data-image-crop="1" data-image-height="<? echo COMPANY_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<? echo COMPANY_IMAGE_SIZE_WIDTH; ?>" data-caption="Company Image" data-image-path="page/company/image/"  data-msg-required="Please upload company image.">
                            </div>
                            <? if ($page->company_image != ""): ?>
                                <div class="w-25 mt-2">
                                    <img class="w-100" src="<? echo base_url($page->company_image); ?>">
                                </div>
                            <? endif; ?>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="video_image"> Video Image <? echo ABOUT_VIDEO_IMAGE_SIZE; ?></span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file"  class="form-control validImage" name="video_image" id="video_image" data-image-crop="1" data-image-height="<? echo ABOUT_VIDEO_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<? echo ABOUT_VIDEO_IMAGE_SIZE_WIDTH; ?>" data-caption="Video Image" data-image-path="page/company/image/"  data-msg-required="Please upload image.">
                            </div>
                            <? if ($page->video_image != ""): ?>
                                <div class="w-25 mt-2">
                                    <img class="w-100" src="<? echo base_url($page->video_image); ?>">
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="form-group m-form__group row set_video">
                    <label class="col-form-label col-lg-3 col-sm-12" for="video_type">Video Type<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12"><input type="hidden" name="videohid[]" value="1">
                        <select  class="form-control input-lg m-input" onchange="videoType(this);" name="video_type" id="video_type"  required data-msg-required="Please select video type.">
                            <option value=""<? echo set_select('video_type', '', TRUE); ?>>Select Video Type</option>
                            <option <? echo ($page->video_type == '1') ? 'selected' : ''; ?> value="1"<? echo set_select('video_type', '1'); ?>>Video Embed Code</option>
                            <option <? echo ($page->video_type == '2') ? 'selected' : ''; ?> value="2"<? echo set_select('video_type', '2'); ?>>Video</option>
                        </select>
                    </div>
                </div>

                    <input type="hidden" name="video_data" id="video_data" value="<?=$page->page_video?>">
                    <div class="form-group m-form__group row videofile" style="display:none;">
                        <label class="col-form-label col-lg-3 col-sm-12" for="page_video"> Video </span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file"  class="form-control validVideo" name="page_video" id="page_video" data-caption="Video" data-image-path="page/company/video/"  data-msg-required="Please upload video.">
                            </div>
                            <? if ($page->page_video != ""): ?>
                                <div class="w-25 mt-2">
                                    <video width="500px" controls class="image-video-display" src="<? echo base_url($page->page_video); ?>" type="video/mp4"></video>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>

                    <div class="form-group m-form__group row video_embed" style="display:none;">
                        <label class="col-form-label col-lg-3 col-sm-12" for="video_embed_code"> Video Embed Code<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <textarea name="video_embed_code" cols="4" rows="4" id="video_embed_code" class="form-control input-lg m-input" required data-msg-required="Please enter video embed code." ><? echo get_input('video_embed_code',$page->video_embed_code); ?></textarea>
                        </div>

                    </div>
                    <div class="form-group m-form__group row"><label class="col-form-label col-lg-3 col-sm-12"></label><div class="col-lg-4 col-md-9 col-sm-12">
                    <? if ($page->video_embed_code != ""): ?>
                                <div class="w-25 mt-2">
                                    <?=$page->video_embed_code?>
                                </div>
                            <? endif; ?></div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="company_catalogue">Company Catalogue PDF<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                          <div class="cropoutterwrap">
                            <input type="file"  class="form-control validPdf" name="company_catalogue" id="company_catalogue" data-caption="Pdf" data-image-path="page/company/catalogue/">
                          </div>
                          <?php if($page->company_catalogue != ""): ?>
                              <div class="w-25 mt-2">
                                <a href="<?php echo base_url() . $page->company_catalogue; ?>" title="report" download><img src='<?= DEFAULT_PDF ?>' style='width: 25px;;padding-top:10px;'></a>
                              </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="mission">Mission <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="mission" id="mission" required data-msg-required="Please enter mission" class="form-control   input-lg m-input" rows="8"><? echo get_input('mission', $page->mission); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="vision">Vision <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="vision" id="vision" required data-msg-required="Please enter vision" class="form-control   input-lg m-input" rows="8"><? echo get_input('vision', $page->vision); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                 <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="company_advantage_title">Company Advantage Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('company_advantage_title', $page->company_advantage_title); ?>" name="company_advantage_title" id="company_advantage_title"
                                   required data-msg-required="Please enter company advantage title.">
                        </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="company_advantage_description">Company Advantage Description<span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="company_advantage_description" id="company_advantage_description" data-msg-required="Please enter company advantage description" class="form-control   input-lg m-input" rows="8" required=""><? echo get_input('company_advantage_description', $page->company_advantage_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <!-- <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="company_advantage_description1"> Company Advantage Description1<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea name="company_advantage_description1" id="description" class="form-control description  input-lg m-input" rows="3" required=""><? echo get_input('company_advantage_description1', $page->company_advantage_description1); ?></textarea>

                        </div>
                </div> -->
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature1_icon"> Feature 1 Icon <? echo FEATURE_ICON_SIZE; ?></span></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="feature1_icon" id="feature1_icon" data-image-crop="1" data-image-height="<? echo FEATURE_ICON_SIZE_WIDTH; ?>" data-image-width="<? echo FEATURE_ICON_SIZE_HEIGHT; ?>" data-caption="Feature 1 Icon" data-image-path="page/company/image/"  data-msg-required="Please upload image.">
                        </div>
                        <? if ($page->feature1_icon != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-25" src="<? echo base_url($page->feature1_icon); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature1_title">Feature 1 Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature1_title', $page->feature1_title); ?>" name="feature1_title" id="feature1_title"
                                   required data-msg-required="Please enter Feature 1 title.">
                        </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature1_description">Feature 1 Description <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="feature1_description" id="feature1_description" required data-msg-required="Please enter Feature 1 description" class="form-control   input-lg m-input" rows="8"><? echo get_input('feature1_description', $page->feature1_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature2_icon"> Feature 2 Icon <? echo FEATURE_ICON_SIZE; ?></span></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="feature2_icon" id="feature2_icon" data-image-crop="1" data-image-height="<? echo FEATURE_ICON_SIZE_WIDTH; ?>" data-image-width="<? echo FEATURE_ICON_SIZE_HEIGHT; ?>" data-caption="Feature 2 Icon" data-image-path="page/company/image/"  data-msg-required="Please upload image.">
                        </div>
                        <? if ($page->feature2_icon != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-25" src="<? echo base_url($page->feature2_icon); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature2_title">Feature 2 Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature2_title', $page->feature2_title); ?>" name="feature2_title" id="feature2_title"
                                   required data-msg-required="Please enter Feature 2 title.">
                        </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature2_description">Feature 2 Description <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="feature2_description" id="feature2_description" required data-msg-required="Please enter Feature 2 description" class="form-control   input-lg m-input" rows="8"><? echo get_input('feature2_description', $page->feature2_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature3_icon"> Feature 3 Icon <? echo FEATURE_ICON_SIZE; ?></span></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="feature3_icon" id="feature3_icon" data-image-crop="1" data-image-height="<? echo FEATURE_ICON_SIZE_WIDTH; ?>" data-image-width="<? echo FEATURE_ICON_SIZE_HEIGHT; ?>" data-caption="Feature 3 Icon" data-image-path="page/company/image/"  data-msg-required="Please upload image.">
                        </div>
                        <? if ($page->feature3_icon != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-25" src="<? echo base_url($page->feature3_icon); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature3_title">Feature 3 Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature3_title', $page->feature3_title); ?>" name="feature3_title" id="feature3_title" required data-msg-required="Please enter Feature 3 title.">
                        </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature3_description">Feature 2 Description <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="feature3_description" id="feature3_description" required data-msg-required="Please enter Feature 3 description" class="form-control   input-lg m-input" rows="8"><? echo get_input('feature3_description', $page->feature3_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature4_icon"> Feature 4 Icon <? echo FEATURE_ICON_SIZE; ?></span></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="feature4_icon" id="feature4_icon" data-image-crop="1" data-image-height="<? echo FEATURE_ICON_SIZE_WIDTH; ?>" data-image-width="<? echo FEATURE_ICON_SIZE_HEIGHT; ?>" data-caption="Feature 4 Icon" data-image-path="page/company/image/"  data-msg-required="Please upload image.">
                        </div>
                        <? if ($page->feature4_icon != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-25" src="<? echo base_url($page->feature4_icon); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature4_title">Feature 4 Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature4_title', $page->feature4_title); ?>" name="feature4_title" id="feature4_title" required data-msg-required="Please enter Feature 4 title.">
                        </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature4_description">Feature 4 Description <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="feature4_description" id="feature4_description" required data-msg-required="Please enter Feature 4 description" class="form-control   input-lg m-input" rows="8"><? echo get_input('feature4_description', $page->feature4_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature5_icon"> Feature 5 Icon <? echo FEATURE_ICON_SIZE; ?></span></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="feature5_icon" id="feature5_icon" data-image-crop="1" data-image-height="<? echo FEATURE_ICON_SIZE_WIDTH; ?>" data-image-width="<? echo FEATURE_ICON_SIZE_HEIGHT; ?>" data-caption="Feature 5 Icon" data-image-path="page/company/image/"  data-msg-required="Please upload image.">
                        </div>
                        <? if ($page->feature5_icon != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-25" src="<? echo base_url($page->feature5_icon); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature5_title">Feature 5 Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature5_title', $page->feature5_title); ?>" name="feature5_title" id="feature5_title" required data-msg-required="Please enter Feature 5 title.">
                        </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature5_description">Feature 5 Description <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="feature5_description" id="feature5_description" required data-msg-required="Please enter Feature 5 description" class="form-control   input-lg m-input" rows="8"><? echo get_input('feature5_description', $page->feature5_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature6_icon"> Feature 6 Icon <? echo FEATURE_ICON_SIZE; ?></span></label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="feature6_icon" id="feature6_icon" data-image-crop="1" data-image-height="<? echo FEATURE_ICON_SIZE_WIDTH; ?>" data-image-width="<? echo FEATURE_ICON_SIZE_HEIGHT; ?>" data-caption="Feature 6 Icon" data-image-path="page/company/image/"  data-msg-required="Please upload image.">
                        </div>
                        <? if ($page->feature6_icon != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-25" src="<? echo base_url($page->feature6_icon); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="feature6_title">Feature 6 Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('feature6_title', $page->feature6_title); ?>" name="feature6_title" id="feature6_title" required data-msg-required="Please enter Feature 6 title.">
                        </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="feature6_description">Feature 6 Description <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="feature6_description" id="feature6_description" required data-msg-required="Please enter Feature 6 description" class="form-control   input-lg m-input" rows="8"><? echo get_input('feature6_description', $page->feature6_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->


                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="client_title">Client Title <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('client_title', $page->client_title); ?>" name="client_title" id="client_title"
                                   required data-msg-required="Please enter client title.">
                        </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="client_description">Client Description <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="client_description" id="client_description" data-msg-required="Please enter client description" class="form-control   input-lg m-input" rows="8"><? echo get_input('client_description', $page->client_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <? } ?>
                <!--/*Start :: Meta Title code here */-->
                <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12" for="meta_title">Meta Title<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control input-lg m-input" value="<? echo get_input('meta_title', $page->meta_title); ?>" name="meta_title" id="meta_title" required data-msg-required="Please enter meta title.">
                        </div>
                    </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_keyword">Meta Keyword </label>
                    <div class="col-lg-6 col-md-9 col-sm-8">
                        <textarea name="meta_keyword" id="meta_keyword" data-msg-required="Please enter  meta keyword" class="form-control   input-lg m-input" rows="8"><? echo get_input('meta_keyword', $page->meta_keyword); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_description">Meta Description </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea name="meta_description" id="meta_description" data-msg-required="Please enter meta description" class="form-control   input-lg m-input" rows="8"><? echo get_input('meta_description', $page->meta_description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>
                <!--/*End :: Meta Title code here */-->
                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
                                </button>
                                <a class="btn btn-secondary" href="<? echo base_url('admin/page'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    $(document).ready(function(){
        //videoType($('#video_type').val());
        $('#video_type').trigger('change');
    });
    function videoType(thisval) {
        var videoVal = $(thisval).val();
        if(videoVal == 1){
            $('.videofile').hide();
            $('.video_embed').show();
            $('.embed').show();
            $('#video_embed_code').prop('required',true);
            $('#page_video').prop('required',false);
        }else if(videoVal == 2){
            $('.videofile').show();
            if($('#video_data').val() == ''){
            $('#page_video').prop('required',true);
            }$('#video_embed_code').prop('required',false);
            $('.video_embed').hide();
            $('.embed').hide();
        }else{
            $('.videofile').hide();
            $('.video_embed').hide();
            $('.embed').hide();
            $('#video_embed_code').prop('required',false);
            $('#page_video').prop('required',false);
        }
    }
</script>

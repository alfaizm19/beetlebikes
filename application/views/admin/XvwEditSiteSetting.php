<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"><? echo $page_title; ?></h3>
        </div>
    </div>
</div>
<? if (empty($setting)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;
?>
<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="site_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="site_name">
                        Project Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('site_name', $setting->site_project_name); ?>" name="site_name" id="site_name"  required data-msg-required="Please enter site name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="site_url"> Website<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control input-lg m-input " id="site_url" name="site_url" value="<? echo get_input('site_url', $setting->site_url) ?>" required data-msg-required="Please enter site url.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="web_front_logo"> Website Frontend Logo <? echo FRONDEND_LOGO_SIZE; ?></label> 
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="web_front_logo" id="web_front_logo" data-image-crop="1" data-image-height="<? echo FRONDEND_LOGO_SIZE_HEIGHT; ?>" data-image-width="<? echo FRONDEND_LOGO_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="site-setting/frontend/" >
                        </div>
                        <? if ($setting->website_frontend_logo != ""): ?>
                            <div class="w-50 mt-2">
                                <img id="website_frontend_logo"  src="<? echo base_url($setting->website_frontend_logo); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="website_admin_logo"> Website Admin Logo 
                        <? echo ADMIN_LOGO_SIZE; ?></label> 
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="website_admin_logo" id="website_admin_logo" data-image-crop="1" data-image-height="<? echo ADMIN_LOGO_SIZE_HEIGHT; ?>" data-image-width="<? echo ADMIN_LOGO_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="site-setting/adminlogo/" >
                        </div>
                        <? if ($setting->website_admin_logo != ""): ?>
                            <div class="w-50 mt-2">
                                <img  src="<? echo base_url($setting->website_admin_logo); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>

               <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="web_front_hed_logo1">Years of Experience Logo <? echo HEADER_LOGO_SIZE; ?></label> 
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="web_front_hed_logo1" id="web_front_hed_logo1" data-image-crop="1" data-image-height="<? echo HEADER_LOGO_SIZE_HEIGHT; ?>" data-image-width="<? echo HEADER_LOGO_SIZE_WIDTH; ?>" data-caption="Website Frontend Headre Logo1 " data-image-path ="site-setting/frontend-header-logo1/" >
                        </div>
                        <? if ($setting->website_frontend_header_logo1 != ""): ?>
                            <div class="w-50 mt-2">
                                <img id="website_frontend_header_logo1"  src="<? echo base_url($setting->website_frontend_header_logo1); ?>">
                            </div>
                            <a href="javascript:void(0)" class="remove-logo" id="remove" title="Remove Image" onclick=" return RemoveHeaderImage(<?=$setting->id?>,'website_frontend_header_logo1')" <? if($setting->website_frontend_header_logo1 == ''){ ?> style="display:none;" <? } ?>>Remove Image</a>
                        <? endif; ?>
                    </div>
                </div>
<? /*
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="web_front_hed_logo2">Frontend Headre Logo2 <? echo HEADER_LOGO_SIZE; ?></label> 
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="web_front_hed_logo2" id="web_front_hed_logo2" data-image-crop="1" data-image-height="<? echo HEADER_LOGO_SIZE_HEIGHT; ?>" data-image-width="<? echo HEADER_LOGO_SIZE_WIDTH; ?>" data-caption="Website Frontend Headre Logo2" data-image-path ="site-setting/frontend-header-logo2/" >
                        </div>
                        <? if ($setting->website_frontend_header_logo2 != ""): ?>
                            <div class="w-50 mt-2">
                                <img id="website_frontend_header_logo2"  src="<? echo base_url($setting->website_frontend_header_logo2); ?>">
                            </div>
                            <a href="javascript:void(0)" class="remove-logo" id="remove" title="Remove Image" onclick=" return RemoveHeaderImage(<?=$setting->id?>,'website_frontend_header_logo2')" <? if($setting->website_frontend_header_logo2 == ''){ ?> style="display:none;" <? } ?>>Remove Image</a>
                        <? endif; ?>
                    </div>
                </div> */?>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="footer_logo">Footer Logo <? echo FOOTER_LOGO_SIZE; ?></label> 
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="footer_logo" id="footer_logo" data-image-crop="1" data-image-height="<? echo FOOTER_LOGO_SIZE_HEIGHT; ?>" data-image-width="<? echo FOOTER_LOGO_SIZE_WIDTH; ?>" data-caption="Website Frontend footer logo" data-image-path ="site-setting/footer-logo/" >
                        </div>
                        <? if ($setting->footer_logo != ""): ?>
                            <div class="w-50 mt-2">
                                <img id="footer_logo"  src="<? echo base_url($setting->footer_logo); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>                

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="file_path">Location Map</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImageAndPdf" name="file_path" id="file_path" data-caption="Pdf" data-image-path="site-setting/location-map/">
                        </div>
                        <? if ($setting->location_map != ""): ?>
                            <div class="w-25 mt-2">
                                <a href="<? echo base_url() . $setting->location_map; ?>" title="report" download><img src='<?= DEFAULT_PDF ?>' style='width: 25px;padding-top:10px;'></a>
                            </div>
                        <? endif; ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="menu_name">
                        Menu Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<? echo get_input('menu_name', $setting->site_menu_name); ?>" name="menu_name" id="menu_name"  required data-msg-required="Please enter site name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="description" id="description" class="form-control input-lg m-input" rows="3"  required data-msg-required="Please enter description."><? echo $setting->site_frontend_footer_description; ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="address"> Address<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="address" id="address" class="form-control input-lg m-input" rows="3"  required data-msg-required="Please enter address."><? echo $setting->site_address; ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="site_email"> Email<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="email" class="form-control input-lg m-input" id="site_email" name="site_email"  value="<? echo get_input('site_email', $setting->site_email) ?>" required data-msg-required="Please enter email.">
                    </div>
                </div>

                <!--admin side close-->
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="mobile_number"> Phone Number<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control validPhoneNumber input-lg m-input" id="mobile_number" minlength="10" maxlength="20" onkeydown="return validate_phonenumber(this, event);" name="mobile_number"  value="<? echo get_input('mobile_number', $setting->site_phone_number) ?>" required data-msg-required="Please enter mobile number.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="fax_number">Fax Number<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control validPhoneNumber input-lg m-input"   maxlength="20" id="fax_number" name="fax_number" value="<?php echo get_input('fax_number', $setting->site_fax_number) ?>"  data-msg-required="Please enter fax number." required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="admin_mailing_address"> Contact Mailing Address<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="email" class="form-control input-lg m-input" id="admin_mailing_address" name="admin_mailing_address"  value="<? echo get_input('admin_mailing_address', $setting->admin_mailing_address) ?>" required data-msg-required="Please enter contact mailing address.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="video_image"> Video Image 
                        <? echo VIDEO_IMAGE_SIZE; ?></label> 
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="video_image" id="video_image" data-image-crop="1" data-image-height="<? echo VIDEO_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<? echo VIDEO_IMAGE_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="site-setting/videoimage/" >
                        </div>
                        <? if ($setting->video_image != ""): ?>
                            <div class="w-50 mt-2">
                                <img  src="<? echo base_url($setting->video_image); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                
                    <div class="form-group m-form__group row set_video">
                    <label class="col-form-label col-lg-3 col-sm-12" for="video_type">Video Type<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12"><input type="hidden" name="videohid[]" value="1">
                        <select  class="form-control input-lg m-input" onchange="videoType(this);" name="video_type" id="video_type"  required data-msg-required="Please select video type.">
                            <option value=""<? echo set_select('video_type', '', TRUE); ?>>Select Video Type</option>
                            <option <? echo ($setting->video_type == '1') ? 'selected' : ''; ?> value="1"<? echo set_select('video_type', '1'); ?>>Video Embed Code</option>
                            <option <? echo ($setting->video_type == '2') ? 'selected' : ''; ?> value="2"<? echo set_select('video_type', '2'); ?>>Video</option>
                        </select>
                    </div>
                </div>

                    <input type="hidden" name="video_data" id="video_data" value="<?=$setting->video?>">
                    <div class="form-group m-form__group row videofile" style="display:none;">
                        <label class="col-form-label col-lg-3 col-sm-12" for="video"> Video<span class="text-danger">*</span> </span></label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="cropoutterwrap">
                                <input type="file"  class="form-control validVideo" name="video" id="video" data-caption="Video" data-image-path="site-setting-video/"  data-msg-required="Please upload video.">
                            </div>
                            <? if ($setting->video != ""): ?>
                                <div class="w-25 mt-2">
                                    <video width="500px" controls class="image-video-display" src="<? echo base_url($setting->video); ?>" type="video/mp4"></video>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group m-form__group row video_embed" style="display:none;">
                        <label class="col-form-label col-lg-3 col-sm-12" for="video_embed_code"> Video Embed Code<span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <textarea name="video_embed_code" cols="4" rows="4" id="video_embed_code" class="form-control input-lg m-input" required data-msg-required="Please enter video embed code." ><? echo get_input('video_embed_code',$setting->video_embed_code); ?></textarea>
                        </div>
                        
                    </div>
                    <div class="form-group m-form__group row embed"><label class="col-form-label col-lg-3 col-sm-12"></label><div class="col-lg-4 col-md-9 col-sm-12">
                    <? if ($setting->video_embed_code != ""): ?>
                                <div class="w-25 mt-2">
                                    <?=$setting->video_embed_code?>
                                </div>
                            <? endif; ?></div>
                    </div>
                
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="linkedin_link">Linkedin<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control input-lg m-input" id="linkedin_link" name="linkedin_link"  value="<? echo get_input('linkedin_link', $setting->linkedin_link) ?>" required data-msg-required="Please enter indeed link.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="instagram_link"> Instagram<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control input-lg m-input " id="instagram_link" name="instagram_link"  value="<? echo get_input('instagram_link', $setting->instagram_link) ?>" required data-msg-required="Please enter instagram link.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="twitter_link">Twitter<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="url" class="form-control input-lg m-input" id="twitter_link" name="twitter_link" value="<? echo get_input('twitter_link', $setting->twitter_link) ?>" required data-msg-required="Please enter YouTube link.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="map_iframe"> Map Embed Code<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="map_iframe" id="map_iframe" class="form-control input-lg m-input" rows="4"  required data-msg-required="Please enter map embed code."><? echo $setting->map_iframe; ?></textarea>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="site_copy_right"> Copy Right<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" required data-msg-required="Please enter copy right." id="site_copy_right" name="site_copy_right" value="<? echo get_input('site_copy_right', $setting->site_copy_right) ?>" >
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
                                <a  class="btn btn-secondary" href="<? echo current_url(); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
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
            $('#video').prop('required',false);
        }else if(videoVal == 2){
            $('.videofile').show();
            if($('#video_data').val() == ''){
            $('#video').prop('required',true);
            }$('#video_embed_code').prop('required',false);
            $('.video_embed').hide();
            $('.embed').hide();
        }else{
            $('.videofile').hide();
            $('.video_embed').hide();
            $('.embed').hide();
            $('#video_embed_code').prop('required',false);
            $('#video').prop('required',false);
        }
    }
</script>

<script>
function RemoveHeaderImage(id,field)
{
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/site_settings/delete_image",
            data: {'id':id,'field':field},
            cache: false,
            success: function(html)
            { 
                if(html=="delete"){
                window.location.reload();
                }
            },
            error: function() {
            },
        });
 }
</script>    

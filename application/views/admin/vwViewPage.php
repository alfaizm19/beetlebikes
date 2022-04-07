<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/page') ?>" class="btn btn-success m-btn m-btn--icon"> <span> <i class="fa fa-arrow-circle-o-left"></i> <span></span>Back</span> </a> </div>
</div>
<? if (empty($page)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;
?>
<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <div class="m-portlet__body pb-2">
            <table class="table table-bordered tableformat">
                <thead>
                    <tr>
                        <th width="30%">Page Name</th>
                        <th width="70%"><? echo $page->page_name ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Page Title</th>
                        <th width="70%"><? echo $page->title; ?></th>
                    </tr>
                    <?php 
                        
                        $notAllowed = array(
                        1, 10, 11, 13, 14, 15, 23, 16, 9, 24, 17, 25, 26, 18, 35, 36);

                        if (!in_array($page->id, $notAllowed)) {

                    ?>
                        <tr>
                            <th width="30%">Banner Image</th>
                            <th width="70%">
                                <div class="w-50">
                                    <img class="w-100" src="<? echo base_url($page->banner_image_path); ?>">
                                </div>
                            </th>
                        </tr>
                        <?
                    }
                    if ($page->id == 6 && $page->catalogue_image != "") { ?>
                        <tr>
                            <th width="30%">Catalogue Image</th>
                            <th width="70%">
                                <div class="w-50">
                                    <img class="w-100" src="<? echo base_url($page->catalogue_image); ?>">
                                </div>
                            </th>
                        </tr>
                    <? }
                    if ($page->id == 10 && $page->right_image != "") { ?>
                        <tr>
                            <th width="30%">Right Image</th>
                            <th width="70%">
                                <div class="w-50">
                                    <img class="w-100" src="<? echo base_url($page->right_image); ?>">
                                </div>
                            </th>
                        </tr>
                    <? }
                    if (($page->id == 3 || $page->id == 5 || $page->id == 7 || $page->id == 10 || $page->id == 6) && !empty($page->description)) {
                        ?>
                        <tr>
                            <th>Description</th>
                            <th><? echo $page->description ?></th>
                        </tr>
                    <? }

                    if($page->id == 10) {
                        ?>
                         <tr>
                            <th>Contact Location Title</th>
                            <th><? echo $page->contact_location_title ?></th>
                        </tr>
                         <tr>
                            <th>Contact Location Description</th>
                            <th><? echo $page->contact_location_description ?></th>
                        </tr>
                    <? }

                    if ($page->is_description == 1 && !empty($page->description)) {
                        ?>
                        <tr>
                            <th width="30%">Description</th>
                            <th width="70%"><? echo $page->description ?></th>
                        </tr>
                        <?
                    }
                    if ($page->id == 1) {
                        ?>

                        <!-- <tr>
                            <th>About Us Title 1</th>
                            <th><? echo $page->about_us_title1 ?></th>
                        </tr>
                        <tr>
                            <th>About Us Title 2</th>
                            <th><? echo $page->about_us_title2 ?></th>
                        </tr>
                        <? if(!empty($page->about_us_description)) {
                            ?>
                            <tr>
                                <th>About Us Description</th>
                                <th><? echo $page->about_us_description ?></th>
                            </tr>
                        <? } ?>
                        <tr>
                            <th>Project Title 1</th>
                            <th><? echo $page->project_title_1 ?></th>
                        </tr>
                        <tr>
                            <th>Project Title 2</th>
                            <th><? echo $page->project_title_2 ?></th>
                        </tr>
                        <tr>
                            <th>Feature 1</th>
                            <th><? echo $page->feature_1 ?></th>
                        </tr>
                        <tr>
                            <th>Feature 2</th>
                            <th><? echo $page->feature_2 ?></th>
                        </tr>
                        <tr>
                            <th>Feature 3</th>
                            <th><? echo $page->feature_3 ?></th>
                        </tr>
                        <tr>
                            <th>Feature 4</th>
                            <th><? echo $page->feature_4 ?></th>
                        </tr>
                        <tr>
                            <th>Brand Title 1</th>
                            <th><? echo $page->brand_title1 ?></th>
                        </tr>
                        <tr>
                            <th>Brand Title 2</th>
                            <th><? echo $page->brand_title2 ?></th>
                        </tr> -->
                        <!-- <? if(!empty($page->brand_description)) {
                            ?>
                            <tr>
                                <th>Brand Description</th>
                                <th><? echo $page->brand_description ?></th>
                            </tr>
                        <? } ?>
                        <tr>
                            <th>Contact Us Title </th>
                            <th><? echo $page->contact_us_title ?></th>
                        </tr>
                        <? if(!empty($page->contact_us_description)) {
                            ?>
                            <tr>
                                <th>Contact Us Description</th>
                                <th><? echo $page->contact_us_description ?></th>
                            </tr>
                        <? } ?>
                        <tr>
                            <th>Blog Title 1</th>
                            <th><? echo $page->blog_title1 ?></th>
                        </tr>
                        <tr>
                            <th>Blog Title 2</th>
                            <th><? echo $page->blog_title2 ?></th>
                        </tr>
                        <? if(!empty($page->blog_description)) {
                            ?>
                            <tr>
                                <th>Blog Description</th>
                                <th><? echo $page->blog_description ?></th>
                            </tr>
                        <? } ?> -->
                        <? } if ($page->id == 12) {
                        ?>
                        <tr>
                            <th>Company Title 1</th>
                            <th><? echo $page->company_title1 ?></th>
                        </tr>
                        <tr>
                            <th>Company Title 2</th>
                            <th><? echo $page->company_title2 ?></th>
                        </tr>
                        <tr>
                            <th>Company Description</th>
                            <th><? echo $page->company_description ?></th>
                        </tr>
                        <? if ($page->company_image != ""): ?>
                        <tr>
                            <th width="30%">Company Image</th>
                            <th width="70%">
                                <div class="w-50">
                                    <img class="w-100" src="<? echo base_url($page->company_image); ?>">
                                </div>
                            </th>
                        </tr>
                        <? endif; ?>
                       <? if ($page->video_image != ""): ?>
                        <tr>
                            <th width="30%">Video Image</th>
                            <th width="70%">
                                <div class="w-50">
                                    <img class="w-100" src="<? echo base_url($page->video_image); ?>">
                                </div>
                            </th>
                        </tr>
                        <? endif; ?>
                        <tr>
                            <th width="30%">Video Type</th>
                            <th width="70%"><?php
                                if ($page->video_type == 1) {
                                    echo 'Video Embed Code';
                                } else {
                                    echo 'Video';
                                }
                                ?></th>
                        </tr>
                        <?php if ($page->video_type == 2) { ?>
                            <tr>
                                <th width="30%">Video</th>
                                <th width="70%">
                                    <div class="w-50">
                                        <video width="500px" controls class="image-video-display" src="<? echo base_url($page->page_video); ?>" type="video/mp4"></video>
                                    </div>
                                </th>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th width="30%">Video Embed Code</th>
                                <th width="70%"><? echo $page->video_embed_code ?></th>
                            </tr>
                        <?
                        } ?>
                        <tr>
                            <th width="30%">Company Catalogue PDF</th>
                            <th width="70%">
                                <div class="w-50">
                                    <a href="<?php echo base_url() . $page->company_catalogue; ?>" title="report" download><img src='<?= DEFAULT_PDF ?>' style='width: 25px;;padding-top:10px;'></a>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Mission</th>
                            <th><? echo $page->mission ?></th>
                        </tr>
                        <tr>
                            <th>Vision</th>
                            <th><? echo $page->vision ?></th>
                        </tr>
                        <tr>
                            <th>Company Advantage Title</th>
                            <th><? echo $page->company_advantage_title ?></th>
                        </tr>
                        <tr>
                            <th>Company Advantage Description</th>
                            <th><? echo $page->company_advantage_description ?></th>
                        </tr>
                        <!-- <tr>
                            <th>Company Advantage Description1</th>
                            <th><? echo $page->company_advantage_description1 ?></th>
                        </tr> -->

                        <tr>
                            <th>Feature 1 Title</th>
                            <th><? echo $page->feature1_title ?></th>
                        </tr>
                        <tr>
                            <th>Feature 1 Icon</th>
                            <th>
                              <div>
                                  <img src="<? echo base_url().$page->feature1_icon ?>">
                              </div>
                            </th>
                        </tr>

                        <tr>
                            <th>Feature 2 Title</th>
                            <th><? echo $page->feature2_title ?></th>
                        </tr>
                        <tr>
                            <th>Feature 2 Icon</th>
                            <th>
                              <div>
                                  <img src="<? echo base_url().$page->feature2_icon ?>">
                              </div>
                            </th>
                        </tr>

                        <tr>
                            <th>Feature 3 Title</th>
                            <th><? echo $page->feature3_title ?></th>
                        </tr>
                        <tr>
                            <th>Feature 3 Icon</th>
                            <th>
                              <div>
                                  <img src="<? echo base_url().$page->feature3_icon ?>">
                              </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Feature 4 Title</th>
                            <th><? echo $page->feature4_title ?></th>
                        </tr>
                        <tr>
                            <th>Feature 4 Icon</th>
                            <th>
                              <div>
                                  <img src="<? echo base_url().$page->feature4_icon ?>">
                              </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Feature 5 Title</th>
                            <th><? echo $page->feature5_title ?></th>
                        </tr>
                        <tr>
                            <th>Feature 5 Icon</th>
                            <th>
                              <div>
                                  <img src="<? echo base_url().$page->feature5_icon ?>">
                              </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Feature 6 Title</th>
                            <th><? echo $page->feature6_title ?></th>
                        </tr>
                        <tr>
                            <th>Feature 6 Icon</th>
                            <th>
                              <div>
                                  <img src="<? echo base_url().$page->feature6_icon ?>">
                              </div>
                            </th>
                        </tr>


                        <tr>
                            <th>Client Title</th>
                            <th><? echo $page->client_title ?></th>
                        </tr>
                        <tr>
                            <th>Client Description</th>
                            <th><? echo $page->client_description ?></th>
                        </tr>
                    <? } ?>

                    <tr>
                        <th>Meta Title</th>
                        <th><? echo $page->meta_title ?></th>
                    </tr>

                    <? if (!empty($page->meta_keyword)) {
                        ?>
                        <tr>
                            <th>Meta Keyword</th>
                            <th><? echo $page->meta_keyword ?></th>
                        </tr>
                        <?
                    }
                    if (!empty($page->meta_description)) {
                        ?>
                        <tr>
                            <th>Meta Description</th>
                            <th><? echo $page->meta_description ?></th>
                        </tr>
                        <?
                    }
                    ?>
                </thead>
            </table>
        </div>
    </div>
</div>

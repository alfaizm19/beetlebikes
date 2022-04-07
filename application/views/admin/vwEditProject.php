<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/project') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<? if (empty($project)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;
?>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="project_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="project_title">Project Title<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" required class="form-control input-lg m-input" id="project_title" name="project_title"  value="<? echo get_input('project_title', $project->project_title); ?>"  data-msg-required="Please enter project title.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="location">Location<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" required class="form-control input-lg m-input" id="location" name="location"  value="<? echo get_input('location', $project->location); ?>"  data-msg-required="Please enter location.">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="project_image">Project Image <? echo PROJECT_IMAGE_SIZE; ?> </label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file"  class="form-control validImage" name="project_image" id="project_image" data-image-crop="1" data-image-height="<? echo PROJECT_IMAGE_SIZE_HEIGHT; ?>" data-image-width="<? echo PROJECT_IMAGE_SIZE_WIDTH; ?>" data-caption="Image" data-image-path ="project/">
                        </div>
<? if ($project->project_image_thumb != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($project->project_image_thumb); ?>">
                            </div>
<? endif; ?>
                    </div>
                </div> 
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" required data-msg-ckrequired="Please enter description." class="form-control ckerequired description input-lg m-input" rows="3"><? // echo get_input('description', $project->description); ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div> -->
                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i> Save
                                </button>
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/project'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
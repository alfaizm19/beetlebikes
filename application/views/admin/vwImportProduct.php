<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>

        <a style="margin-right: 10px" href="<?php echo base_url('admin/product/sampleImportFile') ?>" class="btn btn-success m-btn m-btn--icon">
            </span>Download Sample File</span>
        </a>

        <a href="<?php echo base_url('admin/product') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
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

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="import_file">Import File (xlsx)<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="file" class="form-control input-lg m-input" id="import_file" name="import_file" required data-msg-required="Please select file.">
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

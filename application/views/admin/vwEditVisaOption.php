<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/visa-options') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<? if (empty($visaOption)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;

$visaOption = $visaOption[0];
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


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="visaType">
                         Visa Type <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="visaType" class="form-control " id="visaType" data-placeholder="Select visa type" required data-msg-required="Please select visa type." data-allow-clear="true" >
                            <option value="">Select Visa Type</option>
                            <?php 
                                if (!empty($visaTypes)):
                                    foreach($visaTypes as $visaType):
                            ?>
                                <option <?php echo $visaOption->visa_type == $visaType->type? 'selected':'' ?> value="<?php echo $visaType->type ?>"><?php echo $visaType->type ?></option>
                            <?php endforeach; endif ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="visa">
                         Visa <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="visa" class="form-control " id="visa" data-placeholder="Select Visa" required data-msg-required="Please select Visa." data-allow-clear="true" >
                            <option value="">Select Visa</option>
                            <?php 
                                if (isset($visas) && !empty($visas)):
                                    foreach($visas as $visa):
                            ?>
                                <option <?php echo $visaOption->visa_id == $visa->id? 'selected':'' ?> value="<?php echo $visa->id ?>"><?php echo $visa->visa_name ?></option>
                            <?php endforeach; endif ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="visaOptionName">
                         Visa Option Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" name="visaOptionName" id="visaOptionName" required data-msg-required="Please enter blog title." value="<?php echo $visaOption->visa_option_name ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="normal">
                         Processing Type
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input <?php echo !empty($visaOption->normal)? 'checked':'' ?> type="checkbox" class="form-control input-lg m-input" value="normal" required name="normal" id="normal" data-msg-required="Please select processing type."> 
                        <label style="position: relative;left: 20px;bottom: 30px" class="col-form-label col-lg-3 col-sm-12" for="normal"> Normal</label>
                    </div>
                </div>

                <div class="normalDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="normalAED"> Price (AED)</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" required class="form-control input-lg m-input" value="<?php echo $visaOption->normal_aed ?>" data-msg-required="Please enter price." name="normalAED" id="normalAED">
                    </div>
                </div>

                <div class="normalDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="normalUSD"> Price (USD)</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" required class="form-control input-lg m-input" value="<?php echo $visaOption->normal_usd ?>" data-msg-required="Please enter price." name="normalUSD" id="normalUSD">
                    </div>
                </div>

                <div class="normalDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="normalDiscount"> Discount (%)</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" required class="form-control input-lg m-input" value="<?php echo $visaOption->normal_discount ?>" data-msg-required="Please enter discount" name="normalDiscount" id="normalDiscount">
                    </div>
                </div>

                <div class="normalDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="normalDuration"> Processing Duration</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" required class="form-control input-lg m-input" value="<?php echo $visaOption->normal_duration ?>" data-msg-required="Please enter processing duration" name="normalDuration" id="normalDuration">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="express">
                         Processing Type
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input <?php echo !empty($visaOption->express)? 'checked':'' ?> type="checkbox" class="form-control input-lg m-input" value="express" name="express" id="express" data-msg-required="Please select processing type."> 
                        <label style="position: relative;left: 20px;bottom: 30px" class="col-form-label col-lg-3 col-sm-12" for="express"> Express</label>
                    </div>
                </div>

                <div class="expressDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="expressAED"> Price (AED)</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $visaOption->express_aed ?>" data-msg-required="Please enter price." name="expressAED" id="expressAED">
                    </div>
                </div>

                <div class="expressDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="expressUSD"> Price (USD)</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $visaOption->express_usd ?>" data-msg-required="Please enter price." name="expressUSD" id="expressUSD">
                    </div>
                </div>

                <div class="expressDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="expressDiscount"> Discount (%)</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $visaOption->express_discount ?>" data-msg-required="Please enter discount" name="expressDiscount" id="expressDiscount">
                    </div>
                </div>

                <div class="expressDiv form-group m-form__group row" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="expressDuration"> Processing Duration</label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $visaOption->express_duration ?>" data-msg-required="Please enter processing duration" name="expressDuration" id="expressDuration">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="validToEnter"> Valid To Enter </label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $visaOption->valid_to_enter ?>" required data-msg-required="Please enter valid to enter" name="validToEnter" id="validToEnter">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="validToStay"> Valid To Stay </label>
                    <div class="col-lg-2 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $visaOption->valid_to_stay ?>" required data-msg-required="Please enter valid to stay" name="validToStay" id="validToStay">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" min="1" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo $visaOption->display_order ?>">
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/visa-options'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    $("#visaType").change(function(event) {
        type = $(this).val();
        url = '<?php echo base_url("admin/VisaOptions/getVisas") ?>';
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {type: type},
            beforeSend: function(){
                $("#flash-message").html('');
            },
            success: function(res) {
                if (res.error == true) {
                    $("#flash-message").html(`
                        <div class="alert alert-danger">${res.msg}</div>
                    `);
                } else {
                    $("#visa").html(res.options)
                }

                setTimeout(function() {
                    $("#flash-message").html('');
                }, 2000);
            }
        })
    });

    $("#normal").click(function(event) {
        isChecked = $(this).is(":checked");
        if (isChecked) {
            $(".normalDiv").show();
        } else {
            $(".normalDiv").hide();
        }
    });

    $("#express").click(function(event) {
        isChecked = $(this).is(":checked");
        if (isChecked) {

            //check if normal processing type is check
            isNormalProcessChecked = $("#normal").is(':checked');

            if (isNormalProcessChecked) {

                $("#normal").attr("required", true);
                $("#normalAED").attr('required', true);
                $("#normalUSD").attr('required', true);
                $("#normalDiscount").attr('required', true);
                $("#normalDuration").attr('required', true);

            } else {

                $("#normal").removeAttr('required');
                $("#normalAED").removeAttr('required');
                $("#normalUSD").removeAttr('required');
                $("#normalDiscount").removeAttr('required');
                $("#normalDuration").removeAttr('required');

            }

            $(".expressDiv").show();
            $("#express").attr("required", true);
            $("#expressAED").attr('required', true);
            $("#expressUSD").attr('required', true);
            $("#expressDiscount").attr('required', true);
            $("#expressDuration").attr('required', true);
        } else {
            $(".expressDiv").hide();
            $("#express").removeAttr('required');
            $("#expressAED").removeAttr('required');
            $("#expressUSD").removeAttr('required');
            $("#expressDiscount").removeAttr('required');
            $("#expressDuration").removeAttr('required');

            $("#normal").attr("required", true);
            $("#normalAED").attr('required', true);
            $("#normalUSD").attr('required', true);
            $("#normalDiscount").attr('required', true);
            $("#normalDuration").attr('required', true);
        }
    });

    jQuery(document).ready(function($) {
        isNormalChecked =  $("#normal").is(':checked');
        isExpressChecked =  $("#express").is(':checked');

        if (isNormalChecked) {
            $(".normalDiv").show();
        }

        if (isExpressChecked) {
            $(".expressDiv").show();   
        }

    });
</script>>
<style type="text/css">
    .inlineCheckbox{
        position: relative;
        margin-left: 30px;
        margin-right: 10px;
        bottom: 20px;
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
        <a href="<? echo base_url('admin/tour-options') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<? if (empty($tourOptions)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;

$tourOpt = $tourOptions[0];
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
                    <label class="col-form-label col-lg-3 col-sm-12" for="tour">
                         Select Tour <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="tour" class="form-control " id="tour" data-placeholder="Select tour" required data-msg-required="Please select tour." data-allow-clear="true" >
                            <option value="">Select Tour</option>
                            <?php 
                                if (!empty($tours)):
                                    foreach($tours as $tour):
                            ?>
                                <option <?php echo $tourOpt->tour_id == $tour->id? 'selected':'' ?> value="<?php echo $tour->id ?>"><?php echo $tour->tour_name ?></option>
                            <?php endforeach; endif; ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourOptionName">
                         Tour Option Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tourOpt->tour_option_name ?>" name="tourOptionName" id="tourOptionName" required data-msg-required="Please enter tour option name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="description"> Description </label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="description" id="description" data-msg-ckrequired="Please enter description." class="form-control input-lg m-input" rows="4"><?php echo $tourOpt->description ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourName">
                        Transfer Option
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <label class="checkbox-inline">
                            <input <?php echo $tourOpt->without_transfer? 'checked':'' ?> type="checkbox" class="withoutTrans form-control input-lg m-input" value="Without Transfer" name="transfer" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Without Transfer</span>
                        </label>

                    </div>
                </div>

                <div <?php echo $tourOpt->without_transfer? '':'style="display:none"' ?> class="withoutTransDiv form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="adultAED">
                        Price for Adult (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->adult_aed) ?>" name="adultAED" id="adultAED" data-msg-required="Please enter Adult AED">
                    </div>
                </div>

                <div <?php echo $tourOpt->without_transfer? '':'style="display:none"' ?> class="withoutTransDiv form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="adultUSD">
                        Price for Adult (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->adult_usd) ?>" name="adultUSD" id="adultUSD" data-msg-required="Please enter Adult USD">
                    </div>
                </div>

                <div <?php echo $tourOpt->without_transfer? '':'style="display:none"' ?> class="withoutTransDiv form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="childAED">
                        Price for Child (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->child_aed) ?>" name="childAED" id="childAED" data-msg-required="Please enter Child AED">
                    </div>
                </div>

                <div <?php echo $tourOpt->without_transfer? '':'style="display:none"' ?> class="withoutTransDiv form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="childUSD">
                        Price for Child (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->child_usd) ?>" name="childUSD" id="childUSD" data-msg-required="Please enter Child USD">
                    </div>
                </div>

                <div <?php echo $tourOpt->without_transfer? '':'style="display:none"' ?> class="withoutTransDiv form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="discount">
                        Discount 
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo ($tourOpt->discount>0)? number_format($tourOpt->discount):'' ?>" name="discount" id="discount" data-msg-required="Please enter Discount">
                    </div>
                </div>

                <div <?php echo $tourOpt->without_transfer? '':'style="display:none"' ?> class="withoutTransDiv form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="transferTimings">
                        Transfer Timings
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tourOpt->transfer_timings ?>" name="transferTimings" id="transferTimings" data-msg-required="Please enter Transfer Timing">
                    </div>
                </div>

                <div <?php echo $tourOpt->without_transfer? '':'style="display:none"' ?> class="withoutTransDiv form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meals">
                        Duration
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tourOpt->duration ?>" name="duration" id="duration" data-msg-required="Please enter duration">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourName">
                        Transfer Option
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        
                        <label class="checkbox-inline">
                            <input <?php echo $tourOpt->sharing_transfer? 'checked':'' ?> type="checkbox" class="shareTransCheckbox form-control input-lg m-input" value="Sharing Transfer" name="sharingTransfer" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Sharing Transfer</span>
                        </label>

                    </div>
                </div>

                <div class="shareTransDiv form-group m-form__group row" <?php echo $tourOpt->sharing_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="adultAED">
                        Price for Adult (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->st_adult_aed) ?>" name="stAdultAED" id="stAdultAED" data-msg-required="Please enter Adult AED">
                    </div>
                </div>

                <div class="shareTransDiv form-group m-form__group row" <?php echo $tourOpt->sharing_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="adultUSD">
                        Price for Adult (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->st_adult_usd) ?>" name="stAdultUSD" id="stAdultUSD" data-msg-required="Please enter Adult USD">
                    </div>
                </div>

                <div class="shareTransDiv form-group m-form__group row" <?php echo $tourOpt->sharing_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="childAED">
                        Price for Child (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->st_child_aed) ?>" name="stChildAED" id="stChildAED" data-msg-required="Please enter Child AED">
                    </div>
                </div>

                <div class="shareTransDiv form-group m-form__group row" <?php echo $tourOpt->sharing_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="childUSD">
                        Price for Child (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->st_child_usd) ?>" name="stChildUSD" id="stChildUSD" data-msg-required="Please enter Child USD">
                    </div>
                </div>

                <div class="shareTransDiv form-group m-form__group row" <?php echo $tourOpt->sharing_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="discount">
                        Discount 
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo $tourOpt->st_discount>0? number_format($tourOpt->st_discount):'' ?>" name="stDiscount" id="stDiscount" data-msg-required="Please enter Discount">
                    </div>
                </div>

                <div class="shareTransDiv form-group m-form__group row" <?php echo $tourOpt->sharing_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="transferTimings">
                        Transfer Timings
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tourOpt->st_transfer_timings ?>" name="stTransferTimings" id="stTransferTimings" data-msg-required="Please enter Transfer Timing">
                    </div>
                </div>

                <div class="shareTransDiv form-group m-form__group row" <?php echo $tourOpt->sharing_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="meals">
                        Duration
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tourOpt->st_duration ?>" name="stDuration" id="stDuration" data-msg-required="Please enter duration">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourName">
                        Transfer Option
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <label class="checkbox-inline">
                            <input <?php echo $tourOpt->private_transfer? 'checked':'' ?> type="checkbox" class="privTransCheckbox form-control input-lg m-input" value="Private Transfer" name="privateTransfer" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Private Transfer</span>
                        </label>

                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="adultAED">
                        Price for Adult (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->pt_adult_aed) ?>" name="ptAdultAED" id="ptAdultAED" data-msg-required="Please enter Adult AED">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="adultUSD">
                        Price for Adult (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->pt_adult_usd) ?>" name="ptAdultUSD" id="ptAdultUSD" data-msg-required="Please enter Adult USD">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="childAED">
                        Price for Child (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->pt_child_aed) ?>" name="ptChildAED" id="ptChildAED" data-msg-required="Please enter Child AED">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="childUSD">
                        Price for Child (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->pt_child_usd) ?>" name="ptChildUSD" id="ptChildUSD" data-msg-required="Please enter Child USD">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="discount">
                        Discount 
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo $tourOpt->pt_discount>0? number_format($tourOpt->pt_discount):'' ?>" name="ptDiscount" id="ptDiscount" data-msg-required="Please enter Discount">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="transferCost">
                        Transfer Cost (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->transfer_cost) ?>" name="transferCost" id="transferCost" data-msg-required="Please enter transfer cost">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="transferCost">
                        Transfer Cost (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->transfer_cost_usd) ?>" name="transferCostUSD" id="transferCostUSD" data-msg-required="Please enter transfer cost">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="guestLimit">
                        Guest Limit <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control input-lg m-input" value="<?php echo number_format($tourOpt->guest_limit) ?>" name="guestLimit" id="guestLimit" data-msg-required="Please enter guest limit">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="transferTimings">
                        Transfer Timings
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tourOpt->pt_transfer_timings ?>" name="ptTransferTimings" id="ptTransferTimings" data-msg-required="Please enter Transfer Timing">
                    </div>
                </div>

                <div class="privTransDiv form-group m-form__group row" <?php echo $tourOpt->private_transfer? '':'style="display:none"' ?>>
                    <label class="col-form-label col-lg-3 col-sm-12" for="meals">
                        Duration
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tourOpt->pt_duration ?>" name="ptDuration" id="ptDuration" data-msg-required="Please enter duration">
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/tours'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    $(".transferOption:checkbox").on('click', function() {
      // in the handler, 'this' refers to the box clicked on
      var $box = $(this);
      if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
        
        $("#transferCostDiv").hide();
        $("#guestLimitDiv").hide();
        $("#transferCost").removeAttr('required');
        $("#guestLimit").removeAttr('required');

        if ($box.val() == 'Private Transfer') {
            $("#transferCostDiv").show();
            $("#guestLimitDiv").show();
            $("#transferCost").attr('required','true');
            $("#guestLimit").attr('required','true');
        }
      } else {
        $box.prop("checked", false);
        $("#transferCostDiv").hide();
        $("#guestLimitDiv").hide();
        $("#transferCost").removeAttr('required');
        $("#guestLimit").removeAttr('required');
      }
    });


    $(".withoutTrans").click(function(event) {
        if ($(this).is(':checked')) {
            $('.withoutTransDiv').show();

            $('#adultAED').attr('required', true);
            $('#adultUSD').attr('required', true);
            $('#childAED').attr('required', true);
            $('#childUSD').attr('required', true);
            $('#discount').attr('required', true);

        } else {
            $('.withoutTransDiv').hide();

            $('#adultAED').removeAttr('required');
            $('#adultUSD').removeAttr('required');
            $('#childAED').removeAttr('required');
            $('#childUSD').removeAttr('required');
            $('#discount').removeAttr('required');
        }
    });

    $(".shareTransCheckbox").click(function(event) {
        if ($(this).is(":checked")) {
            $(".shareTransDiv").show();

            $("#stAdultAED").attr('required', true);
            $("#stAdultUSD").attr('required', true);
            $("#stChildAED").attr('required', true);
            $("#stChildUSD").attr('required', true);

        } else {
            $(".shareTransDiv").hide();

            $("#stAdultAED").removeAttr('required');
            $("#stAdultUSD").removeAttr('required');
            $("#stChildAED").removeAttr('required');
            $("#stChildUSD").removeAttr('required');
        }
    });

    $(".privTransCheckbox").click(function(event) {
        if ($(this).is(":checked")) {
            $(".privTransDiv").show();

            $("#ptAdultAED").attr('required', true);
            $("#ptAdultUSD").attr('required', true);
            $("#ptChildAED").attr('required', true);
            $("#ptChildUSD").attr('required', true);
            $("#transferCost").attr('required', true);
            $("#guestLimit").attr('required', true);

        } else {
            $(".privTransDiv").hide();

            $("#ptAdultAED").removeAttr('required');
            $("#ptAdultUSD").removeAttr('required');
            $("#ptChildAED").removeAttr('required');
            $("#ptChildUSD").removeAttr('required');
            $("#transferCost").removeAttr('required');
            $("#guestLimit").removeAttr('required');
        }
    });

</script>
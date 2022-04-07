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
        <a href="<? echo base_url('admin/gift-card') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
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
                    <label class="col-form-label col-lg-3 col-sm-12" for="giftCardType">
                    </label>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <select id="giftCardType" required name="giftCardType" class="form-control m-input">
                            <option value="display_on_website">Display on Website</option>
                            <option value="send_to_receiver">Send to Receiver</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="giftCardName">
                        Gift Card Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="" name="giftCardName" id="giftCardName" required data-msg-required="Please enter gift card name">
                    </div>
                </div>

                <div class="form-group m-form__group row display_on_website">
                    <label class="col-form-label col-lg-3 col-sm-12" for="price_aed">
                        Price (AED) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="" name="price_aed" id="price_aed" data-msg-required="Please enter price aed">
                    </div>
                </div>

                <div class="form-group m-form__group row display_on_website">
                    <label class="col-form-label col-lg-3 col-sm-12" for="price_usd">
                        Price (USD) <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="" name="price_usd" id="price_usd" data-msg-required="Please enter price usd">
                    </div>
                </div>

                <div class="form-group m-form__group row send_to_receiver" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="currency">
                        Currency <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="currency" class="form-control m-input">
                            <option value="aed">AED</option>
                            <option value="usd">USD</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row send_to_receiver" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="price">
                        Price <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input required type="number" class="form-control input-lg m-input" value="" name="price" id="price" data-msg-required="Please enter price">
                    </div>
                </div>

                <div class="form-group m-form__group row send_to_receiver" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="receiverName">
                        Receiver Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="" name="receiverName" id="receiverName" required data-msg-required="Please enter receiver name">
                    </div>
                </div>

                <div class="form-group m-form__group row send_to_receiver" style="display:none">
                    <label class="col-form-label col-lg-3 col-sm-12" for="receiverEmail">
                        Receiver Email <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="email" class="form-control input-lg m-input" value="" name="receiverEmail" id="receiverEmail" required data-msg-required="Please enter receiver email">
                    </div>
                </div>

                <div class="form-group m-form__group row display_on_website">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo get_input('display_order'); ?>">
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
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/gift-card'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    jQuery(document).ready(function($) {
        $("#giftCardType").change(function(event) {
            type = $(this).val();

            if (type == 'display_on_website') {
                $(".send_to_receiver").hide();
                $(".display_on_website").show();
            } else {
                $(".display_on_website").hide();
                $(".send_to_receiver").show();
            }
        });
    });
</script>
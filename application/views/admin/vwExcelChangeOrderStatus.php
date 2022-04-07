<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>

        <a href="<?php echo base_url('admin/orders') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

        <div class="col-md-12 manageFormBlock">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" id="from_date" name="from_date" value="<?php echo $this->input->get('from_date') ?>" class="form-control from_date m_datepicker m-input " placeholder = "From Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                </div>
                <div class="col-md-3">
                    <input type="text" id="to_date" name="to_date" value="<?php echo $this->input->get('to_date') ?>" class="form-control to_date m_datepicker m-input" placeholder = "To Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <select class="form-control" name="order_status" id="orderStatus">
                                <option value="">All</option>

                                <?php 
                                    $odrStat = $this->input->get('order_status');
                                ?>

                                <option <?= $odrStat == 'order_confirmed'? 'selected':''; ?> value="order_confirmed">Order Confirmed</option>

                                <option <?= $odrStat == 'Approved'? 'selected':''; ?> value="approved">Approved</option>

                                <option <?= $odrStat == 'hold'? 'selected':''; ?> value="hold">Hold</option>

                                <option <?= $odrStat == 'order_shipped'? 'selected':''; ?> value="order_shipped">Order Shipped</option>

                                <option <?= $odrStat == 'order_delivered'? 'selected':''; ?> value="order_delivered">Order Delivered</option>

                                <option <?= $odrStat == 'order_delivery_attempt_failed_rto'? 'selected':''; ?> value="order_delivery_attempt_failed_rto">Order Delivery Attempt Failed - RTO</option>

                                <option <?= $odrStat == 'order_delivery_attempt_failed_refund_processed'? 'selected':''; ?> value="order_delivery_attempt_failed_refund_processed">Order Delivery Attempt Failed- Refund Processed</option>

                                <option <?= $odrStat == 'order_cancellation'? 'selected':''; ?> value="order_cancellation">Order Cancellation</option>

                                <option <?= $odrStat == 'order_cancelled_refund_processed'? 'selected':''; ?> value="order_cancelled_refund_processed">Order Cancelled - Refund Processed</option>

                                <option <?= $odrStat == 'customer_return_initiated_rvp'? 'selected':''; ?> value="customer_return_initiated_rvp">Customer Return Initiated - RVP</option>

                                <option <?= $odrStat == 'reverse_pickup_done'? 'selected':''; ?> value="reverse_pickup_done">Reverse Pickup Done</option>

                                <option <?= $odrStat == 'reverse_pickup_delivered'? 'selected':''; ?> value="reverse_pickup_delivered">Reverse Pickup Delivered</option>

                                <option <?= $odrStat == 'rvp_refund_processed'? 'selected':''; ?> value="rvp_refund_processed">RVP Refund Processed</option>

                                <option <?= $odrStat == 'rvp_refund_denied'? 'selected':''; ?> value="rvp_refund_denied">RVP Refund Denied</option>

                                <option <?= $odrStat == 'order_cancellation_by_customer'? 'selected':''; ?> value="order_cancellation_by_customer">Order Cancellation - By Customer</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!--  <button name="submit" type="submit" id="Submit" value="export" class="btn btn-primary">
                                <i class="fa fa-file-excel-o"></i> Export Data
                            </button> -->                
                            <?php 

                                $buildQuery = http_build_query($_GET);

                                $buildQuery = !empty($buildQuery)? '?'.$buildQuery:'';

                            ?>
                            <a id="exportBtn" href="<?php echo base_url('admin/orders/downloadOrders'.$buildQuery); ?>" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo display_flash('error'); ?>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="order_form" id="order_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="import_file">Select File (xlsx)<span class="text-danger">*</span></label>
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/orders'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
        $("#from_date").change(function(event) {

            $("#exportBtn").attr('href', base_url+"admin/orders/downloadOrders");

            from_date = $(this).val();
            to_date = $("#to_date").val();
            orderStatus = $("#orderStatus").find(':selected').val();

            urlPart = $("#exportBtn").attr('href');

            url = "?from_date="+from_date+"&to_date="+to_date+"&order_status="+orderStatus;

            newURL = urlPart+url;

            $("#exportBtn").attr('href', newURL);

        });

        $("#to_date").change(function(event) {

            $("#exportBtn").attr('href', base_url+"admin/orders/downloadOrders");

            from_date = $("#from_date").val();
            to_date = $(this).val();

            orderStatus = $("#orderStatus").find(':selected').val();

            urlPart = $("#exportBtn").attr('href');

            url = "?from_date="+from_date+"&to_date="+to_date+"&order_status="+orderStatus;

            newURL = urlPart+url;

            $("#exportBtn").attr('href', newURL);

        });

        $("#orderStatus").change(function(event) {

            $("#exportBtn").attr('href', base_url+"admin/orders/downloadOrders");
            
            from_date = $("#from_date").val();
            to_date = $("#to_date").val();

            orderStatus = $(this).find(':selected').val();

            urlPart = $("#exportBtn").attr('href');

            url = "?from_date="+from_date+"&to_date="+to_date+"&order_status="+orderStatus;

            newURL = urlPart+url;

            $("#exportBtn").attr('href', newURL);

        });
    });
</script>

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>

        <!-- <div class="col-md-4">
            <form method="post" action="<?php echo base_url('admin/orders/createxls') ?>">
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" name="country">
                            <option value="all">All</option>
                            <option value="uae">UAE</option>
                            <option value="oman">Oman</option>
                            <option value="qatar">Qatar</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                         <button type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary">
                            <i class="fa fa-file-excel-o"></i> Export Data
                        </button>
                    </div>
                </div>
            </form>
        </div> -->

    <!-- <div class="col-md-12 btns">


        <a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url('admin/orders/createxls') ?>"><i class="fa fa-file-excel-o"></i> Export Data</a>
    </div> -->
      </div>
</div>

<div class="col-sm-12">

    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
         <div class="col-md-12 manageFormBlock">

            <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" style="margin-bottom:10px;">
                <?php echo $this->session->flashdata('error')['message'] ?>
            </div>
            <?php endif; ?>

        <div class="row">
            
    <!-- <div class="col-md-3">
        <select name="plan" class="form-control " id="plan" data-placeholder="Select Plan" >
            <option value="">Select  plan</option>
        </select>
    </div> -->
    <div class="col-md-3">
        <form>
        <input type="text" id="from_date" name="from_date" value="<?php echo $this->input->get('from_date') ?>" class="form-control from_date m_datepicker m-input " placeholder = "From Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
    </div>
    <div class="col-md-3">
        <input type="text" id="to_date" name="to_date" value="<?php echo $this->input->get('to_date') ?>" class="form-control to_date m_datepicker m-input" placeholder = "To Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
    </div>
    <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control" name="order_status" id="orderStatus">
                        <option value="">All</option>

                        <?php 
                            $odrStat = $this->input->get('order_status');
                        ?>

                        <option <?= $odrStat == 'order_confirmed'? 'selected':''; ?> value="order_confirmed">Order Confirmed</option>

                        <option <?= $odrStat == 'approved'? 'selected':''; ?> value="approved">Approved</option>

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
                    <select class="form-control" name="type" id="type">
                        <?php 
                            $type = $this->input->get('type');
                        ?>
                        <option <?php echo $type == 'erp'? 'selected':''; ?> value="erp">ERP</option>
                        <option <?php echo $type == 'erp'? 'selected':''; ?> value="detailed">Detailed</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <?php 

                        $buildQuery = http_build_query($_GET);

                        $buildQuery = !empty($buildQuery)? '?'.$buildQuery:'';

                    ?>
                    <a id="exportBtn" href="<?php echo base_url('admin/orders/createxls'.$buildQuery); ?>" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export</a>
                </div>
            </div>
    </div>
    <!-- <div class="col-md-3">
        <select name="payment_type" class="form-control " id="payment_type" data-placeholder="Select All Payment Type" >
            <option value="">Select  All Payment Type</option>
        </select>
    </div> -->
    <div class="col-md-8 btns">
        <button name="submit" type="submit" value="search" class="btn btn-success">
            Submit
        </button>

        <a class="btn btn-warning" href="<?php echo base_url('admin/orders') ?>" style="color: white">Reset</a>

        </form>
    </div>
</div>
</div>
        <?php if (DISPLAY_ORDER): ?>
            <form class="m-form" action="<?php echo base_url('admin/update_display_order/') ?>" method="post" enctype="multipart/form-data" name="display_order" id="display_order" novalidate="novalidate">
            <?php endif; ?>
            <div class="m-portlet__body">
                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                    <table id="gridTable" class="table table-striped m-table">
                        <thead>
                            <tr class="p-0 ">
                                <!-- <th width="5%" data-orderable="false" class="text-secondary py-3" > 
                                <label class="m-checkbox m-checkbox--single p-0 m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" id="bulkDelete">

                                    <span class="mt-2"></span> 
                                </label>

                                    <a data-method="bulk_delete" role="button" aria-disabled="true" class="btn disabled btn-danger gridTable-delete pull-right gridTable-delete-all btn-sm m-btn m-btn--icon  m-btn--icon-only m-btn--custom m-btn--pill"> <i class="fa fa-3x fa-trash"></i> </a> 
                                </th> -->
                                <th width="10%" class="py-3">Order Id</th>
                                <th width="10%" class="py-3">Invoice No</th>
                                <!-- <th width="10%" class="py-3">Customer Name</th> -->
                                <th width="10%" class="py-3">Email</th>
                                <th width="10%" class="py-3">Status</th>
                                <th width="10%" class="py-3">Order Date</th>
                                <!-- <th width="10%" class="py-3">Mobile</th> -->
                                <th width="10%" class="py-3">Paid Amount</th>
                                <th class="text-center py-3" width="5%" data-orderable="false">View</th>
                                <th class="text-center py-3" width="5%" data-orderable="false">Action</th>
                                <!-- <th class="text-center py-3" width="5%" data-orderable="false">Delete</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#from_date").change(function(event) {

            $("#exportBtn").attr('href', base_url+"admin/orders/downloadOrders");

            from_date = $(this).val();
            to_date = $("#to_date").val();
            orderStatus = $("#orderStatus").find(':selected').val();
            type = $("#type").find(':selected').val();

            urlPart = $("#exportBtn").attr('href');

            url = "?from_date="+from_date+"&to_date="+to_date+"&order_status="+orderStatus+"&type="+type;

            newURL = urlPart+url;

            $("#exportBtn").attr('href', newURL);

        });

        $("#to_date").change(function(event) {

            $("#exportBtn").attr('href', base_url+"admin/orders/downloadOrders");

            from_date = $("#from_date").val();
            to_date = $(this).val();

            orderStatus = $("#orderStatus").find(':selected').val();
            type = $("#type").find(':selected').val();

            urlPart = $("#exportBtn").attr('href');

            url = "?from_date="+from_date+"&to_date="+to_date+"&order_status="+orderStatus+"&type="+type;

            newURL = urlPart+url;

            $("#exportBtn").attr('href', newURL);

        });

        $("#orderStatus").change(function(event) {

            $("#exportBtn").attr('href', base_url+"admin/orders/createxls");
            
            from_date = $("#from_date").val();
            to_date = $("#to_date").val();

            orderStatus = $(this).find(':selected').val();

            type = $("#type").find(':selected').val();

            urlPart = $("#exportBtn").attr('href');

            url = "?from_date="+from_date+"&to_date="+to_date+"&order_status="+orderStatus+"&type="+type;

            newURL = urlPart+url;

            $("#exportBtn").attr('href', newURL);

        });

        $("#type").change(function(event) {

            $("#exportBtn").attr('href', base_url+"admin/orders/createxls");
            
            from_date = $("#from_date").val();
            to_date = $("#to_date").val();

            orderStatus = $("#orderStatus").find(':selected').val();

            type = $(this).find(':selected').val();

            urlPart = $("#exportBtn").attr('href');

            url = "?from_date="+from_date+"&to_date="+to_date+"&order_status="+orderStatus+"&type="+type;

            newURL = urlPart+url;

            $("#exportBtn").attr('href', newURL);

        });
    });
</script>
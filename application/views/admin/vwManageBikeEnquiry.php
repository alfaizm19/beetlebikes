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
    <div class="col-md-4">
        <form>
        <input type="text" id="from_date" name="from_date" value="<?php echo $this->input->get('from_date') ?>" class="form-control from_date m_datepicker m-input " placeholder = "From Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
    </div>
    <div class="col-md-4">
        <input type="text" id="to_date" name="to_date" value="<?php echo $this->input->get('to_date') ?>" class="form-control to_date m_datepicker m-input" placeholder = "To Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
    </div>
    <div class="col-md-4">
            <div class="row">
                <div class="col-md-1">
                    <?php 

                        $buildQuery = http_build_query($_GET);

                        $buildQuery = !empty($buildQuery)? '?'.$buildQuery:'';

                    ?>
                    <a id="exportBtn" href="<?php echo base_url('admin/bike_enquiry/createxls'.$buildQuery); ?>" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export</a>
                </div>
            </div>
    </div>
    <!-- <div class="col-md-3">
        <select name="payment_type" class="form-control " id="payment_type" data-placeholder="Select All Payment Type" >
            <option value="">Select  All Payment Type</option>
        </select>
    </div> -->
    <div class="col-md-12 btns">
        <button name="submit" type="submit" value="search" class="btn btn-success">
            Submit
        </button>

        <a class="btn btn-warning" href="<?php echo base_url('admin/bike_enquiry') ?>" style="color: white">Reset</a>

        </form>
    </div>
</div>
</div>
        <?php if (DISPLAY_ORDER): ?>
            <form class="m-form" action="<?php echo base_url('admin/update_display_order/') ?>" method="post" enctype="multipart/form-data" name="display_order" id="display_order" novalidate="novalidate">
            <?php endif; ?>
            <div class="m-portlet__body">
                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded overflow_x">
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
                                <th width="10%" class="py-3">Name</th>
                                <!-- <th width="10%" class="py-3">Customer Name</th> -->
                                <th width="10%" class="py-3">Email</th>
                                <th width="10%" class="py-3">Phone</th>
                                <th width="10%" class="py-3">City</th>
                                <!-- <th width="10%" class="py-3">Mobile</th> -->
                                <th width="10%" class="py-3">Date</th>
                                <th class="text-center py-3" width="5%" data-orderable="false">View</th>
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
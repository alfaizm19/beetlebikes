<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url('admin/payments/createxls') ?>"><i class="fa fa-file-excel-o"></i> Export Data</a>
      </div>
</div>

<div class="col-sm-12">

    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <div class="col-md-12">
    <div class="col-md-2">
        <select name="plan" class="form-control " id="plan" data-placeholder="Select Plan" >
            <option value="">Select  plan</option>
        </select> 
    </div>
    <div class="col-md-2">
        <input type="text" id="from_date" name="from_date" value="" class="form-control from_date m_datepicker m-input small-textbox" placeholder = "From Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
    </div>
    <div class="col-md-2">
        <input type="text" id="to_date" name="to_date" value="" class="form-control to_date m_datepicker m-input small-textbox" placeholder = "To Date" data-format="dd-mm-yyyy" data-orientation="bottom left" data-autoclose="true" readonly="">
    </div>
    <div class="col-md-2">
        <select name="payment_type" class="form-control " id="payment_type" data-placeholder="Select All Payment Type" >
            <option value="">Select  All Payment Type</option>
        </select> 
    </div>
    <div class="col-md-2">
        <button type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-success">
            Submit
        </button></br></br>
        <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-warning">
            Reset
        </button>
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
                                <!-- <th width="8%" data-orderable="false" class="text-secondary py-3" > <label class="m-checkbox m-checkbox--single p-0 m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" id="bulkDelete">
                                        <span class="mt-2"></span> </label>
                                    <a data-method="bulk_delete" role="button" aria-disabled="true" class="btn disabled btn-danger gridTable-delete pull-right gridTable-delete-all btn-sm m-btn m-btn--icon  m-btn--icon-only m-btn--custom m-btn--pill"> <i class="fa fa-3x fa-trash"></i> </a> </th> -->
                                <th width="10%" class="py-3">Order Id</th>
                                <th width="20%" class="py-3">User Name</th>
                                <th width="20%" class="py-3">Product Name</th>
                                <th width="10%" class="py-3">Paid Amount</th>
                                <th width="30%" class="py-3">Paid Date & Time</th>
                                <th class="text-center py-3" width="10%" data-orderable="false">View</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>

<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
  </div>
  <a href="<? echo base_url('admin/customers') ?>" class="btn btn-success m-btn m-btn--icon">
      <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
  </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

    <div class="m-portlet__body pb-2">
        <table class="table table-bordered tableformat">
            <thead>
                <tr>
                    <th width="30%">Name</th>
                    <th width="70%"><?php echo $customerInfo->name; ?></th>
                </tr>
                <tr>
                    <th width="30%">Email</th>
                    <th width="70%"><?php echo $customerInfo->email; ?></th>
                </tr>
                <tr>
                    <th width="30%">Phone number</th>
                    <th width="70%"><?php echo $customerInfo->phone_number; ?></th>
                </tr>
                <?php if (!empty($customerInfo->pan_no)): ?>
                <tr>
                    <th width="30%">PAN No.</th>
                    <th width="70%"><?php echo $customerInfo->pan_no; ?></th>
                </tr>
                <?php endif ?>

                <?php if (!empty($customerInfo->gst_no)): ?>
                <tr>
                    <th width="30%">GST No.</th>
                    <th width="70%"><?php echo $customerInfo->gst_no; ?></th>
                </tr>
                <?php endif ?>
                
                <tr>
                    <th width="30%">Gender</th>
                    <th width="70%"><?php echo ucwords($customerInfo->gender); ?></th>
                </tr>
                <tr>
                    <th width="30%">Is Active</th>
                    <th width="70%"><?php echo $customerInfo->is_active? 'Yes':'No'; ?></th>
                </tr>
                <tr>
                    <th width="30%">Total Orders</th>
                    <th width="70%"><?php echo $this->db->get_where('orders', array('user_id' => $customerInfo->id))->num_rows(); ?></th>
                </tr>
                <tr>
                    <th width="30%">Registered Date</th>
                    <th width="70%"><?php echo date('d-m-Y h:i:s A', strtotime($customerInfo->created_at)); ?></th>
                </tr>
            </thead>
        </table>

  </div>

</div>
</div>

<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
  </div>
  <a href="<? echo base_url('admin/dealer_enquiry') ?>" class="btn btn-success m-btn m-btn--icon">
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
                    <th width="70%"><?php echo $info->name ?></th>
                </tr>
                <tr>
                    <th width="30%">Email</th>
                    <th width="70%"><?php echo $info->email ?></th>
                </tr>
                <tr>
                    <th width="30%">Subject</th>
                    <th width="70%"><?php echo $info->subject ?></th>
                </tr>
                <tr>
                    <th width="30%">City</th>
                    <th width="70%"><?php echo $info->city ?></th>
                </tr>
                <tr>
                    <th width="30%">Phone</th>
                    <th width="70%"><?php echo $info->phone ?></th>
                </tr>
                <tr>
                    <th width="30%">Store</th>
                    <th width="70%"><?php echo $info->store ?></th>
                </tr>
                <tr>
                    <th width="30%">Message</th>
                    <th width="70%"><?php echo $info->message ?></th>
                </tr>
                <tr>
                    <th width="30%">Date</th>
                    <th width="70%"><?php echo date('d-m-Y', strtotime($info->created_at)) ?></th>
                </tr>
            </thead>
        </table>
  </div>

</div>
</div>

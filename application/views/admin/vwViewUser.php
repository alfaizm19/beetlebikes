<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title">
        <?php echo $page_title ?> </h3>
    </div>
    <a href="<?php echo base_url('admin/user') ?>" class="btn btn-success m-btn m-btn--icon">
      <span>
        <i class="fa fa-arrow-circle-o-left"></i>
        <span></span>Back</span>
    </a>
  </div>
</div>
<?php if(empty($user)): ?>
  <?php $this->load->view('admin/partials/_admin_not_found'); ?>
<?php return FALSE; endif;  ?>
<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">


      <div class="m-portlet__body pb-2">
          <table class="table table-bordered tableformat">
            <thead>
              <tr>
                <th width="30%">First Name</th>
                <th width="70%"><?php echo $user->first_name;?></th>
              </tr>
              <tr>
                <th width="30%">Last Name</th>
                <th width="70%"><?php echo $user->last_name;?></th>
              </tr>
              <tr>
                <th width="30%">Email</th>
                <th width="70%"><?php echo $user->email; ?></th>
              </tr>
              <tr>
                <th width="30%">Company Name</th>
                <th width="70%"><?php echo !empty($address)? $address->company_name:'-'; ?></th>
              </tr>
              <tr>
                <th width="30%">Address 1</th>
                <th width="70%"><?php echo !empty($address)? $address->address1:'-'; ?></th>
              </tr>
              <tr>
                <th width="30%">Address 2</th>
                <th width="70%"><?php echo !empty($address)? $address->address2:'-'; ?></th>
              </tr>
              <tr>
                <th width="30%">City</th>
                <th width="70%"><?php echo !empty($address)? $address->city:'-'; ?></th>
              </tr>
              <tr>
                <th width="30%">Country</th>
                <th width="70%"><?php echo !empty($address)? $this->db->get_where('country', array('id' => $address->country))->row('nicename'):'-'; ?></th>
              </tr>
              <tr>
                <th width="30%">Province</th>
                <th width="70%"><?php echo !empty($address)? $this->db->get_where('province', array('id' => $address->province))->row('province'):'-'; ?></th>
              </tr>
              <tr>
                <th width="30%">Zip Code</th>
                <th width="70%"><?php echo !empty($address)? $address->zip_code:'-' ?></th>
              </tr>
              <tr>
                <th width="30%">Phone no.</th>
                <th width="70%"><?php echo !empty($address)? $address->phone:'-' ?></th>
              </tr>
              <tr>
                <th width="30%">Created Date</th>
                <th width="70%"><?=date('d M Y',strtotime($user->created_at))?></th>
              </tr>
            </thead>
          </table>
    </div>
  </div>
</div>

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
                <th width="30%">Phone No</th>
                <th width="70%"><?php echo $user->phone_number; ?></th>
              </tr>
              <tr>
                <th width="30%">City</th>
                <th width="70%"><?php echo $user->city; ?></th>
              </tr>
              <tr>
                <th width="30%">Country</th>
                <th width="70%"><?php echo $user->country; ?></th>
              </tr>
              <tr>
                <th width="30%">Street Address</th>
                <th width="70%"><?php echo $user->street_address; ?></th>
              </tr>
              <tr>
                <th width="30%">Date of Birth</th>
                <th width="70%"><?php echo $user->dob; ?></th>
              </tr>
              <tr>
                <th width="30%">Zip Code/Postal Code</th>
                <th width="70%"><?php echo $user->zip_code; ?></th>
              </tr>
              <tr>
                <th width="30%">Profile Picture</th>
                <th width="70%"><?php echo $user->profile_picture; ?></th>
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

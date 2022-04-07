<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <?php echo $page_title ?></h3>
    </div>
   <a href="<?php echo base_url('admin/subscription') ?>" class="btn btn-success m-btn m-btn--icon">
              <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
            </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
    

      <div class="m-portlet__body pb-2">
          <table class="table table-bordered tableformat" width="100%">
                    
                     
                    <tr>
                      <th width="30%">Email Or Phone Number</th>
                      <th width="70%"><?=$subscription->phone_or_email?></th>
                    </tr>
                      <tr>
                      <th width="30%">Received Date</th>
                      <th width="70%"><?=date('d M Y',strtotime($subscription->created_at))?></th>
                    </tr>

                  </table>

      </div>
  </div>
</div>

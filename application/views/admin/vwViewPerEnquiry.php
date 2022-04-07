<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
    </div>
   <a href="<? echo base_url('admin/personalized_enquiry') ?>" class="btn btn-success m-btn m-btn--icon">
              <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
            </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

      <div class="m-portlet__body pb-2">
          <table class="table table-bordered tableformat" width="100%">
                     <tr>
                      <th width="30%">Name</th>
                      <th width="70%"><?= $pers->name?></th>
                    </tr>
                    <tr>
                      <th width="30%">Email</th>
                      <th width="70%"><?= $pers->email?></th>
                    </tr>                    
                    <tr>
                      <th width="30%">Phone number</th>
                      <th width="70%"><?= $pers->phone?></th>
                    </tr>
                    <tr>
                      <th width="30%">Lookig For</th>
                      <th width="70%"><?= $this->db->get_where('category', array('id' => $pers->looking_for))->row('category'); ?></th>
                    </tr>
                    <tr>
                      <th width="30%">Photo</th>
                      <th width="70%">
                        <?php if (!empty($pers->photo)): ?>
                          <img style="max-width: 100px" src="<?php echo base_url('uploads/personalized/'.$pers->photo) ?>">
                        <?php endif ?>
                      </th>
                    </tr>
                    <tr>
                      <th width="30%">Message</th>
                      <th width="70%"><?= $pers->message?></th>
                    </tr>
          </table>

      </div>
  </div>
</div>

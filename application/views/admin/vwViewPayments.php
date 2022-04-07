<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
    </div>
   <a href="<? echo base_url('admin/payments') ?>" class="btn btn-success m-btn m-btn--icon">
              <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
            </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
    

      <div class="m-portlet__body pb-2">
          <table class="table table-bordered tableformat" width="100%">
                    
                     <tr>
                      <th width="30%">Order Id</th>
                      <th width="70%"><?=$payments->order_id?></th>
                    </tr>
                    <tr>
                      <th width="30%">User Name</th>
                      <th width="70%"><?=$payments->username?></th>
                    </tr>
                    <tr>
                      <th width="30%">Product Name</th>
                      <th width="70%"><?=$payments->product_name;?></th>
                    </tr>
                      <tr>
                      <th width="30%">Paid Amount</th>
                      <th width="70%"><?=$payments->paid_amount?></th>
                    </tr>
                      <tr>
                      <th width="30%">Paid Date & Time</th>
                      <th width="70%"><?=$payments->paid_date_time?></th>
                    </tr>
                  </table>

      </div>
  </div>
</div>

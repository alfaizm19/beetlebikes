<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
    </div>
   <a href="<? echo base_url('admin/enquiry') ?>" class="btn btn-success m-btn m-btn--icon">
              <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
            </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">


      <div class="m-portlet__body pb-2">
          <table class="table table-bordered tableformat" width="100%">

                     <tr>
                      <th width="30%">Name</th>
                      <th width="70%"><?=$enquiry->enquiry_name?></th>
                    </tr>
                    <tr>
                      <th width="30%">Email</th>
                      <th width="70%"><?=$enquiry->email?></th>
                    </tr>
                    <tr>
                      <th width="30%">Phone / Mobile</th>
                      <th width="70%"><?=$enquiry->phone_number;?></th>
                    </tr>
                    <? if($enquiry->product_category != ""){
                      //get category details
                      $categoryDetails = get_category_details($enquiry->product_category);
                      if($categoryDetails)
                      {
                        $categoryName = $categoryDetails->name;
                      }
                      else
                      {
                        $categoryName = "";
                      }
                      ?>

                    <tr>
                      <th width="30%">Category</th>
                      <th width="70%"><?=$categoryName;?></th>
                    </tr>
                    <? } ?>
                      <tr>
                      <th width="30%">Message</th>
                      <th width="70%"><?=$enquiry->message?></th>
                    </tr>
                      <tr>
                      <th width="30%">Received Date</th>
                      <th width="70%"><?=date('d M Y',strtotime($enquiry->created_at))?></th>
                    </tr>
                  </table>

      </div>
  </div>
</div>

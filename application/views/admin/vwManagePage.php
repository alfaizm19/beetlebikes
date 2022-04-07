<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title">
        <? echo $page_title ?> </h3>
    </div>
    <!-- <a href="<? echo base_url('admin/page/create'); ?>" class="btn btn-success m-btn m-btn--icon text-capitalize">
      <span>
        <i class="fa fa-plus-circle"></i>
        <span></span>Add page </span>
    </a> -->
  </div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
    <div class="m-portlet__body">
      <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
        <table id="gridTable" class="table table-striped m-table ">
          <thead>
            <tr class="p-0 ">
              <th width="80%" class="py-3">Page Name</th>
              <!-- <th width="19%" class="py-3">Page Title</th> -->
              <th class="text-center py-3" width="10%" data-orderable="false">View</th>
              <th class="text-center py-3" width="10%" data-orderable="false">Edit</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
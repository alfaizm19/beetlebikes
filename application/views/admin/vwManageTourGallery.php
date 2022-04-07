<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
    </div>
    <a href="<?php echo base_url('admin/tour-gallery/create/'.$this->uri->segment(3).''); ?>" class="btn btn-success m-btn m-btn--icon text-capitalize manageproject"> <span> <i class="fa fa-plus-circle"></i><span></span>Add Tour Image </span> </a>
    <a href="<?php echo base_url('admin/tours'); ?>" class="btn btn-success  m-btn m-btn--icon text-capitalize"> <span> Tours</span> </a>
  </div>
</div>

<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

<div class="m-portlet__body">
  <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
    <table id="gridTable" class="table table-striped m-table ">
      <thead>
        <tr class="p-0 ">
          <th width="10%" data-orderable="false" class="text-secondary py-3" > <label class="m-checkbox m-checkbox--single p-0 m-checkbox--all m-checkbox--solid m-checkbox--brand">
              <input type="checkbox" id="bulkDelete">
              <span class="mt-2"></span> </label>
            <a data-method="bulk_delete" role="button" aria-disabled="true" class="btn disabled btn-danger gridTable-delete pull-right gridTable-delete-all btn-sm m-btn m-btn--icon  m-btn--icon-only m-btn--custom m-btn--pill"> <i class="fa fa-3x fa-trash"></i> </a> </th>
          <th width="70%" class="text-center py-3">Image</th>
  
          <th class="text-center py-3" width="10%" data-orderable="false">Edit</th>
          <th class="text-center py-3" width="10%" data-orderable="false">Delete</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
</div>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>

        <a href="<? echo base_url('admin/user-rights/create'); ?>" class="btn btn-success m-btn m-btn--icon text-capitalize"> <span> <i class="fa fa-plus-circle"></i><span></span>Add User</span> </a>
      </div>
</div>
<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <?php if (DISPLAY_ORDER): ?>
            <form class="m-form" action="<?php echo base_url('admin/update_display_order/') ?>" method="post" enctype="multipart/form-data" name="display_order" id="display_order" novalidate="novalidate">
            <?php endif; ?>
            <div class="m-portlet__body">
                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded overflow_x">
                    <table id="gridTable" class="table table-striped m-table">
                        <thead>
                            <tr class="p-0 ">
                                <th width="8%" data-orderable="false" class="text-secondary py-3" > <label class="m-checkbox m-checkbox--single p-0 m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" id="bulkDelete">
                                        <span class="mt-2"></span> </label>
                                    <a data-method="bulk_delete" role="button" aria-disabled="true" class="btn disabled btn-danger gridTable-delete pull-right gridTable-delete-all btn-sm m-btn m-btn--icon  m-btn--icon-only m-btn--custom m-btn--pill"> <i class="fa fa-3x fa-trash"></i> </a> </th>
                                <th width="15%" class="py-3">Name</th>
                                <th width="19%" class="py-3">Email</th>
                                <th class="text-center py-3" width="8%" data-orderable="false">Is active</th>
                                <th class="text-center py-3" width="8%" data-orderable="false">Edit</th>
                                <th class="text-center py-3" width="8%" data-orderable="false">Delete</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>

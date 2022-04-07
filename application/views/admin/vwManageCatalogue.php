<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
    </div>
    <!-- <a href="<?php //echo base_url('admin/catalogue/create'); ?>" class="btn btn-success m-btn m-btn--icon text-capitalize"> <span> <i class="fa fa-plus-circle"></i><span></span>Add Catalogue</span> </a> -->
  </div>
</div>
<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
<?php if(DISPLAY_ORDER): ?>
<form class="m-form" action="<?php echo base_url('admin/update_display_order/') ?>" method="post" enctype="multipart/form-data" name="display_order" id="display_order" novalidate="novalidate">
<?php endif; ?>
<div class="m-portlet__body">
  <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
    <table id="gridTable" class="table table-striped m-table ">
      <thead>
        <tr class="p-0 ">
  
          <th width="50%" class="py-3">Catalogue</th>
          <!--<th width="19%" class="py-3">Description</th>-->
          <th width="8%" class="text-center py-3" >PDF</th>
          <?php if(DISPLAY_ORDER): ?>
           <th class="text-center py-3" width="10%">Display order</th>
          <?php endif; ?>
          <th class="text-center py-3" width="8%" >Is active</th>
          <th class="text-center py-3" width="8%" data-orderable="false">Edit</th>
          <!-- <th class="text-center py-3" width="8%" data-orderable="false">Delete</th> -->
        </tr>
      </thead>
    </table>
  </div>
</div>
<?php if(DISPLAY_ORDER): ?>
<div class="m-portlet__foot m-portlet__foot--fit border-top-1 border-secondary">
<input type="hidden" name="message" value="Catalogue has been updated successfully.">
<input type="hidden" name="data_table" value="catalogue">
<div class="m-form__actions py-0">
   <button type="submit" name="submit" id="submit" class="pull-right btn btn-success">Update</button> 
</div>
<form>
</div>
<?php endif; ?>
</div>
</div>

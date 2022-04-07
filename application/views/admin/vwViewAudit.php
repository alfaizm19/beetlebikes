<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
  </div>
  <a href="<? echo base_url('admin/audit') ?>" class="btn btn-success m-btn m-btn--icon">
      <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
  </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

    <div class="m-portlet__body pb-2">
        <table class="table table-bordered tableformat">
            <thead>
                <tr>
                    <th width="30%">Admin Name</th>
                    <th width="70%"><?php echo $this->db->get_where('admins', array('id' => $auditInfo->admin_id))->row('first_name'); ?></th>
                </tr>
                <tr>
                    <th width="30%">Admin Email</th>
                    <th width="70%"><?php echo $auditInfo->admin_email; ?></th>
                </tr>
                <tr>
                    <th width="30%">Module Name</th>
                    <th width="70%"><?php echo $auditInfo->module_name; ?></th>
                </tr>
                <tr>
                    <th width="30%">Table Name</th>
                    <th width="70%"><?php echo $auditInfo->table_name; ?></th>
                </tr>
                <tr>
                    <th width="30%">Type of Change</th>
                    <th width="70%"><?php echo $auditInfo->type_of_change; ?></th>
                </tr>
                <tr>
                    <th width="30%">Old Value</th>
                    <th width="70%">
                        <?php 
                            $oldValue = unserialize($auditInfo->old_value);
                            if(!empty($oldValue)):
                        ?>
                        <table class="table table-bordered tableformat">
                            <thead>
                                <tr>
                                    <td><strong>Column</strong></td>
                                    <td><strong>Data</strong></td>
                                </tr>
                                <?php foreach($oldValue as $okey => $oval): ?>
                                    <tr>
                                        <td><?php echo $okey ?></td>
                                        <td><?php echo $oval ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </thead>
                        </table>
                        <?php endif; ?>
                    </th>
                </tr>
                <tr>
                    <th width="30%">New Value</th>
                    <th width="70%">
                        <?php 
                            $newValue = unserialize($auditInfo->new_value);
                            if(!empty($newValue)):
                        ?>
                        <table class="table table-bordered tableformat">
                            <thead>
                                <tr>
                                    <td><strong>Column</strong></td>
                                    <td><strong>Data</strong></td>
                                </tr>
                                <?php foreach($newValue as $nkey => $nval): ?>
                                    <tr>
                                        <td><?php echo $nkey ?></td>
                                        <td><?php echo $nval ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </thead>
                        </table>
                        <?php endif; ?>
                    </th>
                </tr>
            </thead>
        </table>

  </div>

</div>
</div>

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <div class="m-portlet__body">
            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                <table id="gridTable" class="table table-striped m-table ">
                    <thead>
                        <tr class="p-0 ">
                            <th width="5%">#</th>
                            <th width="50%" class="py-3">Questions</th>
                            <th width="20%" class="py-3">Category</th>
                            <th class="text-center py-3" width="15%" >Is active</th>
                            <th class="text-center py-3" width="10%">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($questions)): ?>
                            <?php $i=1; foreach ($questions as $key => $value): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $value->question ?></td>
                                    <td><?= ucfirst($value->category) ?></td>
                                    <td class="text-center">
                                         <span class="m-switch m-switch--icon  text-center m-switch--success m-switch--sm">
                                            <label>
                                                <input type="checkbox" class="update" data-status="<?= $value->is_active ?>"  data-id="<?= $value->question_id ?>" <?= $value->is_active == 'active'? 'checked':''; ?>>
                                                <span></span>
                                            </label>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a class="btn btn-success btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill" href="<?= base_url('admin/career/edit-question/').$value->question_id; ?>"><i class="fa fa-3x fa-pencil"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">There is no questions.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('change', '.update', function(event) 
    {
        event.preventDefault();
        
        id = $(this).data('id');
        status = $(this).data('status');

        $.ajax({
            url: '<?= base_url("admin/career/updateQuestionStatus") ?>',
            type: 'POST',
            dataType: 'json',
            data: {id: id, status: status},
            success: function(res)
            {
                console.log(res);
            }
        });
        
        
    });
</script>
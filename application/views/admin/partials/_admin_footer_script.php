<? defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<script>
    $(document).ready(function() {
    var bulkdelete_exist = $('#bulkDelete').val(); // = "Index"
    if (bulkdelete_exist == "on"){
    var column_sort = false;
    } else {
    var column_sort = true;
    }
    if ($('#gridTable').length){
    $.post(base_url + 'admin/dashboard/is_login', {}, function (data, textStatus, jqXHR) {
    if (data.success === true){
    dataTable = $('#gridTable').on('order.dt', function () {
    uncheckedbox_gridTable();
    }).on('length.dt', function () {
    uncheckedbox_gridTable();
    }).on('search.dt', function () {
    uncheckedbox_gridTable();
    }).on('page.dt', function () {
    uncheckedbox_gridTable();
    });
    $('#gridTable').dataTable({
<? if (empty($soringCol)) {
    $soringCol = '';
} ?>
<? if (empty($manage_view_path)) {
    $manage_view_path = '';
} ?>
<?= $soringCol; ?>
    "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "bStateSave": true,
            "ajax": "<?= $manage_view_path; ?>",
            "aoColumnDefs": [
            {
            "bSortable": column_sort,
                    "aTargets": [0]
            }
            ],
            "aLengthMenu": [
            [10, 25, 50, 100, - 1],
            ["10", "25", "50", "100", "All" ]
            ],
            "language": {
            "processing": "<div></div><div></div><div></div><div></div><div></div>"
            },
            "initComplete": function(settings, json) {
            if (json.data.length == 0)
            {
            $("#Submit").hide();
            }
            }
    });
    } else{
    window.location.href = $("#current_url").val();
    }
    });
    }
    });
    function uncheckedbox_gridTable()
    {
    $("#bulkDelete").prop('checked', false);
    $('.gridTable-delete-all').addClass('disabled');
    $('#gridTable input[name="delete_all[]"]').prop('checked', $(this).prop('checked'));
    }


function getOrderData()
{
    var dataTable = $('#gridTable1').DataTable
    ({
        destroy: true,
        "processing" : true,
        "serverSide" : true,
        "columnDefs": [
        { "orderable": false, "targets": [0,6,7] },
        { "searchable": false, "targets": [0,6,7] }
        ],
        "columns": [
            { "name": "" },
            { "name": "custom_orderid" },
            { "name": "name" },
            { "name": "email" },
            { "name": "mobile" },
            { "name": "country" },
            { "name": "" },
            { "name": "" },
        ],
        "order" : [],
        "ajax" :
        {
            url: "<?= base_url('admin/orders/getOrdersDataTable') ?>",
            type:"POST"
        }
    });
}

getOrderData();

function getPaymentData()
{
    var dataTable = $('#gridTablePayment').DataTable
    ({
        destroy: true,
        "processing" : true,
        "serverSide" : true,
        "columnDefs": [
        { "orderable": false, "targets": [0] },
        { "searchable": false, "targets": [0] }
        ],
        "columns": [
            { "name": "" },
            { "name": "custom_orderid" },
            { "name": "created_at" },
            { "name": "user_type" },
            { "name": "name" },
            { "name": "mobile" },
            { "name": "email" },
            { "name": "" },
        ],
        "order" : [],
        // "infoFiltered": "",
        "ajax" :
        {
            url: "<?= base_url('admin/payments/getPaymentDataTable') ?>",
            type:"POST"
        }
    });
}

getPaymentData();
</script>

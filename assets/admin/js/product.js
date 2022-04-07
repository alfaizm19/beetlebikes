    $( document ).ready(function() {
   $('#select_product_category').hide();
});
function date_field_display(thisEle)
{
    if (thisEle.checked == true)
        $(".date_field").show();
    else 
        $(".date_field").hide();
}

$(function () {
    var dateFormat = "yyyy-mm-dd",
            from = $(".start_date")
            .datepicker({
                format: "yyyy-mm-dd",
                todayHighlight: true,
                pickerPosition: 'bottom-right',
                autoclose: true
            })
            .on("change", function (e) {
                to.datepicker("option", "minDate", getDate(this));
            }),
            to = $(".end_date").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        pickerPosition: 'bottom-right',
        autoclose: true
    })
            .on("change", function (e) {
                from.datepicker("option", "maxDate", getDate(this));
            });
    function getDate(element) {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var flag = false;
        if (start_date <= end_date) {
            flag = true;
        } else if (start_date >= end_date) {
            flag = false;
            return  $("#end_date").val('');
        }
//                    return element.value;
    }
});

function category(brand_id)
{
    var id = brand_id;
    if (id > 0)
    {
        var dataString = 'id=' + id;
        $.ajax
                ({
                    type: "POST",
                    url: base_url+"admin/product/brandwise_category",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {   
                        $('#select_product_category').show();
                        $("#select_category").html(html);
                    }
                });
    } else
    {
        $("#select_category").html('');
        $('#select_product_category').hide();
    }

}
var current_url = $("#current_url").val(),
    base_url = $("#base_url").val();

function filechangeevent() {
    var e = ["../", "\x3c!--", "--\x3e", "<", ">", "'", '"', "&", "$", "#", "{", "}", "[", "]", "=", ";", "?", "%20", "%22", "%3c", "%253c", "%3e", "%0e", "%28", "%29", "%2528", "%26", "%24", "%3f", "%3b", "%3d"];
    $("input[type='file']").change(function() {
        var a = $(this).val(),
            i = $(this).attr("data-caption"),
            t = $(this).attr("data-image-path"),
            l = a.replace(/C:\\fakepath\\/i, ""),
            d = l.split("."),
            r = l.split("." + d[d.length - 1]).join(""),
            s = $(this).attr("id");
        r = r.replace(/\./g, "");
        for (var n = 1; n <= e.length; n++) {
            if (r.indexOf(e[n]) >= 1) return $(this).val(""), $("#" + s).val(""), $("#Submit").attr("disabled", !0), $("#Priview").attr("disabled", !0), $(".callout-success").hide(), $(".callout-danger").hide(), $("#team_id_2").focus(), get_flash("Sorry, file doest not contain any special character.", "danger"), !1
        }
        r = escape(l), $.ajax({
            type: "POST",
            url: base_url + "admin/dashboard/get_duplicate_image",
            data: {
                image_name: r,
                image_path: t
            },
            cache: !1,
            success: function(e) {
                !0 === e ? ($("#" + s).val(""), $("#Submit").attr("disabled", !0), get_flash("Sorry, You can't use same " + i + " name for " + i, "danger")) : ($("#Submit").attr("disabled", !1), $("#flash-message").html(""))
            }
        })
    })
}

function getAlert() {
    return {
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        icon: "warning",
        buttons: !0,
        dangerMode: !0,
        closeOnCancel: !0
    }
}

function get_flash(e, a) {
    var i = '<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-' + a + ' alert-dismissible fade show" role="alert"> <div class="m-alert__icon"> <i class="la la-info-circle"></i> </div> <div class="m-alert__text">' + e + '</div> <div class="m-alert__close"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> </div> </div>';
    $("#flash-message").html(" ").html(i), $(".close").click(function() {
        $("#flash-message").html("")
    })
}

function galleryType(e) {
    jQuery(".Video").hide(), jQuery(".VideoFile").hide(), jQuery(".Caption").hide(), jQuery(".Image").hide(), "1" == e ? ($(".VideoFile").find("input").prop("required", !1), $(".Video").find("textarea").prop("required", !1), $(".Image").find("input").prop("required", !0), jQuery(".Image").show(), jQuery(".Caption").show()) : "2" == e ? ($(".Image").find("input").prop("required", !1), $(".VideoFile").find("input").prop("required", !1), $(".Video").find("textarea").prop("required", !0), jQuery(".Video").show()) : "3" == e && ($(".Image").find("input").prop("required", !1), $(".Video").find("textarea").prop("required", !1), $(".VideoFile").find("input").prop("required", !0), jQuery(".VideoFile").show())
}
valid_file_video_message = "Please upload valid file. mp4 / mkv .", valid_file_video_accept = ".mp4|.mkv", valid_file_register_accept = ".gif|.GIF|.jpg|.png|.JPG|.PNG|.JPEG|.jpeg|.PDF|.pdf", valid_file_register_message = "Please upload valid file. gif / jpeg / jpg / png / pdf.", valid_file_message = "Please upload valid file. gif / jpeg / jpg / png.", valid_file_accept = "gif|GIF|jpg|png|JPG|PNG|JPEG|jpeg", valid_file_course_pdf_message = "Please upload valid file. pdf.", valid_file_accept_course_pdf = ".pdf|.PDF", valid_file_import_message = "Please upload valid file .xls / .xlsx", valid_file_accept_import = "sheet|ms-excel", valid_latitude_message = "Please enter valid latitude.", valid_longitude_message = "Please enter valid longitude.", $(document).ready(function() {
    $.validator.addClassRules({
        validImage: {
            extension: valid_file_accept
        },
        validPdf: {
            accept: valid_file_accept_course_pdf
        },
        validImageAndPdf: {
            accept: valid_file_register_accept
        },
        validVideo: {
            accept: valid_file_video_accept
        },
        validPhoneNumber: {
            customphone: !0
        },
        validCoinPerAmount: {
            customcointperamount: !0
        },
        validLatLong: {
            number: !0
        },
        validValueNumber: {
            customvalue: !0
        },
        validXlsFile: {
            accept: valid_file_accept_import
        },
        ckerequired: {
            ckrequired: !0
        },
        valid_url: {
            check_url: !0
        },
        valid_custom_url: {
            check_custom_url: !0
        }
    }), $(".m-form").validate({
        ignore: ":hidden",
        errorPlacement: function(e, a) {
            $(a).hasClass("ckerequired") || $(a).hasClass("m_select2_select") ? jQuery(a).closest(".form-group").find(".has-error").append(e) : e.insertAfter(a)
        }
    }), $("#gallery_form").validate({
        ignore: ":hidden",
        errorPlacement: function(e, a) {
            $(a).hasClass("ckerequired") || $(a).hasClass("m_select2_select") ? jQuery(a).closest(".form-group").find(".has-error").append(e) : e.insertAfter(a)
        }
    }), $(".description").rules("ckrequired", {
        ckrequired: !0
    }), $.validator.addMethod("customphone", function(e, a) {
        return this.optional(a) || /^[- +()]*[0-9][- +()0-9]*$/.test(e)
    }, "Please enter a valid phone number"),
    $.validator.addMethod("check_custom_url", function(e, a) {
        return this.optional(a) || /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/.test(e)
    }, "Please enter a valid phone number"),$.validator.addMethod("customvalue", function(e, a) {
        return this.optional(a) || /^([0-9]){0,21}$/.test(e)
    }, "Please enter a valid value"), $.validator.addMethod("customcointperamount", function(e, a) {
        return this.optional(a) || /^[0-9][()0-9]*$/.test(e)
    }, "Please enter a valid coin per amount"), $.validator.addMethod("ckrequired", function(e, a) {
        var i = $(a).attr("id"),
            t = CKEDITOR.instances[i];
        return $(a).val(t.getData()), $(a).val().length > 0
    }), $.validator.addMethod("check_url", function(e, a) {
        return 0 == e.length || (/^(https?|ftp):\/\//i.test(e) || (e = "http://" + e, $(a).val(e)), /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(e))
    }), $(document).on("click", ".gridTable-delete", function() {
        var e = $(this).data("uid"),
            a = $(this).data("method"),
            i = $('#gridTable input[name="delete_all[]"]:checked');
        i.length > 0 ? uid_data = $.map(i, function(e) {
            return $(e).val()
        }) : uid_data = e, $.post(base_url + "admin/dashboard/is_login", {}, function(e, t, l) {
            !0 === e.success ? swal(getAlert()).then(function(e) {
                e && $.post(current_url + "/" + a, {
                    uid: uid_data
                }, function(e, a, t) {
                    !0 === e.success ? (i.length > 0 && ($("#bulkDelete").prop("checked", !1), $(".gridTable-delete-all").addClass("disabled")), get_flash(e.message, e.type), $("#gridTable").dataTable().fnDraw()) : swal(e.title, e.message, e.type)
                })
            }) : window.location.href = base_url + "admin"
        })
    }), $(document).on("change", "#bulkDelete", function(e) {
        $(this).is(":checked") && $("#gridTable tr td").length > 1 ? ($(".gridTable-delete-all").removeClass("disabled"), $('#gridTable input[name="delete_all[]"]').prop("checked", $(this).prop("checked"))) : ($(this).prop("checked", !1), $(".gridTable-delete-all").addClass("disabled"), $('#gridTable input[name="delete_all[]"]').prop("checked", $(this).prop("checked")))
    }), $(document).on("change", '#gridTable input[name="delete_all[]"]', function() {
        $('input[name="delete_all[]"]:checked').length == $('input[name="delete_all[]"]').length ? $("#bulkDelete").prop("checked", !0) : $("#bulkDelete").prop("checked", !1), $(this).is(":checked") ? ($(".gridTable-delete-all").removeClass("disabled"), $(this).prop("checked", !0)) : ($(this).prop("checked", !1), $('input[name="delete_all[]"]:checked').length > 0 ? $(".gridTable-delete-all").removeClass("disabled") : $(".gridTable-delete-all").addClass("disabled"))
    }), $(document).on("click", ".gridTable-is-active", function() {
        var e = $(this).attr("data-active"),
            a = $(this).attr("data-method"),
            i = $(this).val(),
            t = $(this);
        $.post(base_url + "admin/dashboard/is_login", {}, function(l, d, r) {
            !0 === l.success ? $.post(current_url + "/" + a, {
                uid: i,
                active: e
            }, function(a, i, l) {
                !0 === a.success && (1 == e ? t.attr("data-active", 0) : t.attr("data-active", 1), get_flash(a.message, a.type))
            }) : window.location.href = base_url + "admin"
        })
    }), $(document).on("focus", ".m_datepicker", function() {
        var e = $(this),
            a = e.data("orientation"),
            i = e.data("format"),
            t = e.data("autoclose");
        e.datepicker({
            todayHighlight: !0,
            orientation: a,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
            format: i,
            autoclose: t
        })
    }), $(document).on("focus", ".m_timepicker", function() {
        var e = $(this),
            a = e.data("orientation"),
            i = e.data("format"),
            t = e.data("autoclose");
        e.timepicker({
            todayHighlight: !0,
            timeFormat: 'H:i',
            orientation: a,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
            autoclose: t
        })
    }), $(".m_select2_select").length > 0 && $(".m_select2_select").each(function(e, a) {
        var i = $(this);
        $(i).select2()
    }), filechangeevent(),
    $(".m_select2_select_ajax_sku_search").select2({
        closeOnSelect: false,
        ajax: {
            url: base_url+'/admin/ajax/search_by_sku',
            dataType: 'json',
            delay: 250,
            data: function(params){

                subCategoryData = [];
    
                $(".sub_category .select2-selection__choice").each(function(index, el) {
                   subCategoryData.push($(this).attr('title'));
                });

                return {
                    category : $("#category :selected").val(),
                    subCategory : subCategoryData,
                    search : params.term,
                };
            },
            processResults: function (data) {                
              return {
                results: data
              };
            }
        }
    }),
    $(".m_select2_select_ajax_product_search").select2({
        closeOnSelect: false,
        ajax: {
            url: base_url+'/admin/ajax/search_by_product',
            dataType: 'json',
            delay: 250,
            data: function(params){

                subCategoryData = [];
    
                $(".sub_category .select2-selection__choice").each(function(index, el) {
                   subCategoryData.push($(this).attr('title'));
                });

                return {
                    category : $("#category :selected").val(),
                    subCategory : subCategoryData,
                    search : params.term,
                };
            },
            processResults: function (data) {                
              return {
                results: data
              };
            }
        }
    }),
    $(".m_select2_select_ajax_freebee_product_search").select2({
        closeOnSelect: false,
        ajax: {
            url: base_url+'/admin/ajax/search_by_product',
            dataType: 'json',
            delay: 250,
            data: function(params){

                subCategoryData = [];
    
                $(".freebee_sub_category .select2-selection__choice").each(function(index, el) {
                   subCategoryData.push($(this).attr('title'));
                });

                return {
                    category : $("#freebee_category :selected").val(),
                    subCategory : subCategoryData,
                    search : params.term,
                };
            },
            processResults: function (data) {     
              return {
                results: data
              };
            }
        },
    })
});
var activeShowingLoadingPanel = 0;

function StartLoading() {
    0 == activeShowingLoadingPanel && $("#loadingPanel").show(), activeShowingLoadingPanel++
}

function StopLoading() {
    0 == --activeShowingLoadingPanel && $("#loadingPanel").hide()
}
$("#video_embed_codes").hide(), $("#show_cover_images").hide();
var mVal = $("#media_type_id option:selected").val();
if ("1" == mVal ? ($("#show_cover_images").show(), $("#video_embed_codes").hide()) : "2" == mVal && ($("#video_embed_codes").show(), $("#show_cover_images").hide()), $(".imageshapDiv").hide(), $(".imagesDiv").hide(), $("input[type=checkbox]").attr("checked")) {
    $(".imageshapDiv").show(), $(".imagesDiv").show();
    var imgshapVal = $("#image_shap option:selected").val();
    "1" == imgshapVal ? ($(".rectangle").show(), $(".square").hide(), $(".rectangle_disabled").prop("disabled", !1), $(".square_disabled").prop("disabled", !0), $(".imagesDiv").show()) : "2" == imgshapVal && ($(".square").show(), $(".rectangle").hide(), $(".imagesDiv").show(), $(".square_disabled").prop("disabled", !1), $(".rectangle_disabled").prop("disabled", !0))
} else $(".imageshapDiv").hide(), $(".imagesDiv").hide();

function numericOnly(e) {
    var a = event.which ? event.which : window.event.keyCode ? window.event.keyCode : -1,
        i = e.value.split(".");
    return !(2 == i.length && i[1].length > 1) && (a >= 48 && a <= 57 || a >= 96 && a <= 105 || (8 == a || (190 == a || 46 == a && !(e.value && e.value.indexOf(".") >= 0))))
}

function validate_phonenumber(e, a) {
    var i = a.which ? a.which : event.keyCode;
    return !!(a.shiftKey && 187 == i || 8 == i || 46 == i || i >= 35 && i <= 40 || i >= 48 && i <= 57 || i >= 96 && i <= 105 || 107 == i || 32 == i)
}

$(".m-login__signin .close").click(function() {
    $(".alert-dismissible").remove("")
});

$("#shipping_address_1").change(function(event) {
    id = $(this).data('id');
    address = $(this).val();
    action = 'address_1';

    $.ajax({
        url: base_url+'ajax/admin_update_address',
        type: 'POST',
        dataType: 'json',
        data: {id: id, address: address, action: action},
        beforeSend: function() {
            $("#shipping_address_1_Err").text(`
                Updating please wait...
            `);
            $("#shipping_address_1_Err").removeClass('text-danger text-success')
        }, success: function(res) {
            $("#shipping_address_1_Err").text(res.msg);

            if (res.error == true) {
                $("#shipping_address_1_Err").addClass('text-danger');
            } else {
                $("#shipping_address_1_Err").addClass('text-success');
            }

            setTimeout(function() {
                $("#shipping_address_1_Err").text('');
                $("#shipping_address_1_Err").removeClass('text-danger text-success')
            }, 1000);            
        }
    })

});

$("#shipping_address_2").change(function(event) {
    id = $(this).data('id');
    address = $(this).val();
    action = 'address_2';

    $.ajax({
        url: base_url+'ajax/admin_update_address',
        type: 'POST',
        dataType: 'json',
        data: {id: id, address: address, action: action},
        beforeSend: function() {
            $("#shipping_address_2_Err").text(`
                Updating please wait...
            `);
            $("#shipping_address_2_Err").removeClass('text-danger text-success')
        }, success: function(res) {
            $("#shipping_address_2_Err").text(res.msg);

            if (res.error == true) {
                $("#shipping_address_2_Err").addClass('text-danger');
            } else {
                $("#shipping_address_2_Err").addClass('text-success');
            }

            setTimeout(function() {
                $("#shipping_address_2_Err").text('');
                $("#shipping_address_2_Err").removeClass('text-danger text-success')
            }, 1000);            
        }
    })

});

$("#changeOrderStatusForm").submit(function(event) {
    event.preventDefault();

    formData = $(this).serialize();

    $.ajax({
        url: base_url+'/admin/ajax/change_order_status',
        type: 'POST',
        dataType: 'json',
        data: formData,
        beforeSend: function() {
            $("#btnOrderStatus").html('Wait...');
            $("#orderStatusMsg").html('');
            $(".removeErr").html('');
        },
        success: function(res) {
            console.log(res);

            if (res.error == true) {
                if (res.type == 'final') {
                    $("#orderStatusMsg").html(res.msg);
                }

                if (res.type == 'field') {
                    $.each(res, function(index, val) {
                        $("#"+index+"Err").text(val);
                    });
                }
            } else {
                $("#orderStatusMsg").html(res.msg);
                $("#orderStatusHistoryData").html(res.history);
            }

            $("#btnOrderStatus").html('Save');
            
            setTimeout(function() {
                $("#orderStatusMsg").html('');
            }, 1500);
        }
    });

});

$("#category").change(function (e) {
    e.preventDefault();

    category = $(this).val();

    $.ajax({
        url: base_url+'/admin/ajax/get_sub_category',
        type: 'POST',
        dataType: 'json',
        data: {category:category},
        success: function(res) {
            if (res.error == false) {
                $("#sub_category").html(res.data);
                $("#exclusion_sub_category").html(res.data);
            }
        }
    });
});

$("#freebee_category").change(function (e) {
    e.preventDefault();

    category = $(this).val();

    $.ajax({
        url: base_url+'/admin/ajax/get_sub_category',
        type: 'POST',
        dataType: 'json',
        data: {category:category},
        success: function(res) {
            if (res.error == false) {
                $("#freebee_sub_category").html(res.data);
            }
        }
    });
});

$("#usage").change(function(event) {
    event.preventDefault();

    if ($(this).val() == 'single') {
        $(".max_used_div").hide();
        $("#max_used").removeAttr('required');
    } else {
        $(".max_used_div").show();
        $("#max_used").attr('required', true);
    }

});
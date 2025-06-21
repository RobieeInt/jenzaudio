function fetchDropdownList(
    url,
    obj_parameters,
    elementId,
    functionCallback = function () {}
) {
    var base_url = $("#base_url").val();

    $.ajax({
        type: "GET",
        url: url,
        data: obj_parameters,
        dataType: "json",
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            $(elementId).html(response.list).show();
            functionCallback();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            Swal.fire(
                "Oops...",
                xhr.status + "\n" + xhr.responseText + "\n" + thrownError,
                "error"
            );
        },
    });
}

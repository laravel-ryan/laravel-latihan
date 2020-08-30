let save_method, idEdit;
$(function () {
    save_method = "create";
    loadThisTable();
    $("#formMaster")
        .unbind("submit")
        .bind("submit", function (e) {
            e.preventDefault();
            let url, method;
            if (save_method === "edit") {
                url = "/master/" + idEdit;
                method = "PUT";
            } else {
                url = "/master";
                method = "POST";
            }
            let form = $("#formMaster");
            $.ajax({
                url: url,
                type: method,
                data: form.serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success === true) {
                        $("#alert").removeClass("d-none");
                        $("#textAlert").text(response.messages);
                        if (save_method === "create") {
                            form[0].reset();
                        }
                        loadThisTable();
                    }
                },
            });
        });
});

function cancel() {
    $("#formMaster")[0].reset();
    save_method = "create";
    $("#btnCancel").addClass("d-none");
}

function loadThisTable() {
    $("#tableMaster").load("/master/load/table");
}

function edit(id = null) {
    save_method = "edit";
    $("#btnCancel").removeClass("d-none");
    if (id) {
        idEdit = id;
        $.ajax({
            url: "/master/" + id + "/edit",
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#nama").val(response.nama);
                $("#alamat").val(response.alamat);
            },
        });
    }
}

function hapus(id = null) {
    if (id) {
        let csrf = $("[name=_token]").val();
        $.ajax({
            url: "/master/" + id,
            type: "DELETE",
            data: { _token: csrf },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.success === true) {
                    loadThisTable();
                }
            },
        });
    }
}

user.create = function() {
    let data = $("#modal-create").serialize();
    $.ajax({
        url: "/users",
        type: "POST",
        data: data,
        success: function(response) {
            swal("Created", `Created new user ${response.username}!`, "success");
            // toastr.success(`Created new user ${response.username}!`);
            $(".btn-create").prop("disabled", true);
            $("#ShowModal").modal("hide");
            $(".reset_form").click();
            $(".create_modal")
                .removeClass("is-invalid")
                .removeClass("is-valid");
            user.drawTable();
        },
        error: function(data) {
            if (data.status == 401) {
                swal("Unauthorized", "You don't have permission !", "error");
                $("#ShowModal").modal("hide");
                // toastr.error("You don't have permission !");
            } else if (data.status == 422) {
                user.printErrorMsg(data.responseJSON.errors);
            }
        },
    });
};
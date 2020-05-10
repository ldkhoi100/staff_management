$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function() {

    //Destroy user to trash
    $(".destroy_object").on("click", function() {
        var url = $(this).data("url");
        var username = $(this).data("username");
        var conf = confirm(`Do you want remove user ${username}?`);
        $.ajax({
            url: url,
            type: "DELETE",
        }).done(function() {
            if (conf) {
                toastr.success(`Removed user ${username}!`);
                reloadTable(); //reload table
            }
        });
    });

    //Block user by Id
    $(".block_object").on("click", function() {
        var url = $(this).data("url");
        var username = $(this).data("username");
        var conf = confirm(`Do you want change block column user ${username}?`);
        $.ajax({
            url: url,
            type: "get",
        }).done(function() {
            if (conf) {
                toastr.success(`Changed column block of user ${username}!`);
                reloadTable(); //reload table
            }
        });
    });

    //Show modal edit user by Id
    $(".show-modal-edit").click(function() {
        var url = $(this).data("url");
        $("#ShowModal").modal("show");
        $(".edit_modal").removeClass("is-invalid").removeClass("is-valid"); // Remove all class is-invalid and is-valid
        $("#show-create-modal").css("display", "none"); // Hide modal create
        $("#show-edit-modal").css("display", "flex"); // Show modal update
        $.ajax({
            type: "GET",
            url: url,
            success: function(response) {
                $(".print-error-msg").css("display", "none");
                $("#ShowModal").find("#id").val(response.id);
                $("#ShowModal").find("#username").val(response.username);
                $("#ShowModal").find("#email").val(response.email);
                if (response.block == 1) {
                    $("#ShowModal").find("#block").prop("checked", true);
                } else {
                    $("#ShowModal").find("#block").prop("checked", false);
                }
            },
        });
    });

    //Edit user
    $(".btn-edit").click(function(e) {
        e.preventDefault();
        let data = $(this.form).serialize();
        var id = $("input[name='id']").val();
        var username = $("#username").val();
        $.ajax({
            url: "/users/" + id,
            type: "PUT",
            data: data,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css("display", "none");
                    toastr.success(`Updated user ${username}!`);
                    $("#ShowModal").modal("hide");
                    $(".edit_modal")
                        .removeClass("is-invalid")
                        .removeClass("is-valid");
                } else {
                    printErrorMsg(data.error);
                }
            },
        });
        reloadTable(); //Reload table
    });

    //Show modal create
    $(".show-modal-create").click(function(e) {
        $("#ShowModal").modal("show");
        $("#show-create-modal").css("display", "flex");
        $("#show-edit-modal").css("display", "none");
        $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
        $(".print-error-msg").css("display", "none");
    });

    //Create user
    $(".btn-create").click(function(e) {
        e.preventDefault();
        let data = $(this.form).serialize();
        var username = $("#username-create").val();
        $.ajax({
            url: "/users",
            type: "POST",
            data: data,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css("display", "none");
                    toastr.success(`Created new user ${username}!`);
                    $("#ShowModal").modal("hide");
                    $(".reset_form").click();
                    $(".create_modal")
                        .removeClass("is-invalid")
                        .removeClass("is-valid");
                } else {
                    printErrorMsg(data.error);
                }
            },
        });
        reloadTable(); //reload table
    });
});

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html("");
    $(".print-error-msg").css("display", "block");
    $(".create_modal").removeClass("is-invalid").addClass("is-valid");
    $(".passwordConfirm").removeClass("is-valid");
    $.each(msg, function(key, value) {
        // $(".print-error-msg")
        //     .find("ul")
        //     .append("<li>" + value + "</li>");
        $(`.alert-${key}`).html(value);
        $(`input[name=${key}]`).addClass("is-invalid");
    });
}

//Relaod table when change action
function reloadTable() {
    $.ajax({
        url: "/usersAjax",
        type: "GET",
    }).done(function(res) {
        $("#reload_table").html(res);
        $("#dataTable").dataTable();

        //Show modal edit user by Id
        $(".show-modal-edit").click(function() {
            var url = $(this).data("url");
            $("#ShowModal").modal("show");
            $(".edit_modal").removeClass("is-invalid").removeClass("is-valid");
            $("#show-create-modal").css("display", "none"); // Hide modal create
            $("#show-edit-modal").css("display", "flex"); // Show modal update
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $(".print-error-msg").css("display", "none");
                    $("#ShowModal").find("#id").val(response.id);
                    $("#ShowModal").find("#username").val(response.username);
                    $("#ShowModal").find("#email").val(response.email);
                    if (response.block == 1) {
                        $("#ShowModal").find("#block").prop("checked", true);
                    } else {
                        $("#ShowModal").find("#block").prop("checked", false);
                    }
                },
            });
        });

        //Destroy user to trash
        $(".destroy_object").on("click", function() {
            var url = $(this).data("url");
            var username = $(this).data("username");
            var conf = confirm(`Do you want remove user ${username}?`);
            $.ajax({
                url: url,
                type: "DELETE",
            }).done(function() {
                if (conf) {
                    toastr.success(`Removed user ${username}!`);
                    reloadTable(); //reload table
                }
            });
        });

        //Block user by Id
        $(".block_object").on("click", function() {
            var url = $(this).data("url");
            var username = $(this).data("username");
            var conf = confirm(`Do you want change block column user ${username}?`);
            $.ajax({
                url: url,
                type: "get",
            }).done(function() {
                if (conf) {
                    toastr.success(`Changed column block of user ${username}!`);
                    reloadTable(); //reload table
                }
            });
        });
    });
}
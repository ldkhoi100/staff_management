var user = user || {};

user.drawTable = function() {
    $.ajax({
        url: "/users/all",
        type: "GET",
        success: function(res) {
            $("#reload_table").html(res);
            $("#dataTable").dataTable();
        },
        error: function() {
            if (data.status = 401) {
                toastr.error("You don't have permission !");
            }
        }
    });
};

user.trashTable = function() {
    $.ajax({
        url: "/users/trash",
        type: "GET",
        success: function(res) {
            $("#reload_trash").html(res);
            $("#dataTableTrash").dataTable();
        },
        error: function() {
            if (data.status = 401) {
                toastr.error("You don't have permission !");
            }
        }
    });
};

user.modalCreate = function() {
    $("#ShowModal").modal("show");
    $("#modal-title").text("Create new user");
    $("#show-create-modal").css("display", "flex");
    $("#show-edit-modal").css("display", "none");
    $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
    $(".btn-create").prop("disabled", false);
    user.selectRole();
};

user.modalEdit = function(id) {
    $("#ShowModal").modal("show");
    $(".edit_modal").removeClass("is-invalid").removeClass("is-valid"); // Remove all class is-invalid and is-valid
    $("#show-create-modal").css("display", "none"); // Hide modal create
    $("#show-edit-modal").css("display", "flex"); // Show modal update
    $(".btn-edit").prop("disabled", false);
    $.ajax({
        type: "GET",
        url: "/users/" + id,
        success: function(response) {
            $("#ShowModal").find("#id").val(response[0].id);
            $("#ShowModal").find("#username").val(response[0].username);
            $("#ShowModal").find("#email").val(response[0].email);
            if (response[0].block == 1) {
                $("#ShowModal").find("#block").prop("checked", true);
            } else {
                $("#ShowModal").find("#block").prop("checked", false);
            }
            // more
            user.selectRoleUpdate(response[1]);
            $(".password").val("").prop("disabled", true);
            $("#changePassword").prop("checked", false);
            $("#changePassword").on("change", function() {
                if ($(this).is(":checked")) {
                    $(".password")
                        .prop("disabled", false)
                        .attr("placeholder", "Password")
                        .removeClass("is-invalid")
                        .removeClass("is-valid")
                        .css("cursor", "unset");
                    $(".hide-password").css("display", "block");
                } else {
                    $(".password")
                        .prop("disabled", true)
                        .removeClass("is-invalid")
                        .removeClass("is-valid")
                        .attr("placeholder", "")
                        .css("cursor", "not-allowed");
                    $(".hide-password").css("display", "none");
                }
            });
        },
        error: function() {
            if (data.status = 401) {
                toastr.error("You don't have permission !");
            }
        }
    });
};

user.create = function() {
    let data = $("#modal-create").serialize();
    $.ajax({
        url: "/users",
        type: "POST",
        data: data,
        success: function(response) {
            toastr.success(`Created new user ${response.username}!`);
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
                toastr.error("You don't have permission !");
            } else if (data.status == 422) {
                user.printErrorMsg(data.responseJSON.errors);
            }
        },
    });
};

user.update = function() {
    let data = $("#modal-update").serialize();
    var id = $("input[name='id']").val();
    $.ajax({
        url: "/users/" + id,
        type: "PUT",
        data: data,
        success: function(response) {
            toastr.success(`Updated user ${response.username}!`);
            $("#ShowModal").modal("hide");
            $(".edit_modal").removeClass("is-invalid").removeClass("is-valid");
            $(".btn-edit").prop("disabled", true);
            user.drawTable();
            user.trashTable();
        },
        error: function(data) {
            if (data.status == 401) {
                toastr.error("You don't have permission !");
            } else if (data.status == 422) {
                user.printErrorMsg(data.responseJSON.errors);
            }
        },
    });
};

user.alertDestroy = function(id, username) {
    swal({
        title: `Do you want remove user ${username}?`,
        text: "You can restore this user in the trash !",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            swal({
                title: 'Removed!',
                text: `User ${username} are successfully removed!`,
                icon: 'success'
            }).then(function() {
                user.destroy(isConfirm, id, username);
            });
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
};

user.destroy = function(isConfirm, id, username) {
    // var conf = confirm(`Do you want remove user ${username}?`);
    // // var conf = user.sweetalert();
    // swal({
    //     title: `Do you want remove user ${username}?`,
    //     text: "You can restore this user in the trash !",
    //     icon: "warning",
    //     buttons: [
    //         'No, cancel it!',
    //         'Yes, I am sure!'
    //     ],
    //     dangerMode: true,
    // }).then(function(isConfirm) {
    //     if (isConfirm) {
    //         swal({
    //             title: 'Removed!',
    //             text: `User ${username} are successfully removed!`,
    //             icon: 'success'
    //         }).then(function() {
    // var conf = user.sweetalert();
    // console.log(isConfirm);
    if (isConfirm) {
        $.ajax({
            url: "/users/" + id,
            type: "DELETE",
            success: function() {
                user.trashTable();
                user.drawTable();
                toastr.success(`Removed user ${username}!`);

            },
            error: function() {
                toastr.error("You don't have permission !");
            }
        });
    }
    // });
    // }
    // else {
    //     swal("Cancelled", "Your imaginary file is safe :)", "error");
    // }
    // });
};

user.restore = function(id, username) {
    var conf = confirm(`Do you want restore user ${username}?`);
    $.ajax({
        url: "/users/restore/" + id,
        type: "GET",
        success: function() {
            if (conf) {
                user.trashTable();
                user.drawTable();
                toastr.success(`Restored user ${username}!`);
            }
        },
        error: function() {
            toastr.error("You don't have permission !");
        }
    });
};

user.forceDelete = function(id, username) {
    var conf = confirm(`Do you want delete user ${username}?`);
    $.ajax({
        url: "/users/delete/" + id,
        type: "GET",
        success: function() {
            if (conf) {
                user.trashTable();
                user.drawTable();
                toastr.success(`Deleted user ${username}!`);
            }
        },
        error: function() {
            toastr.error("You don't have permission !");
        }
    });
};

user.block = function(id, username) {
    var conf = confirm(`Do you want change block column user ${username}?`);
    $.ajax({
        url: "users/block/" + id,
        type: "get",
        success: function() {
            if (conf) {
                user.trashTable();
                user.drawTable();
                toastr.success(`Changed column block of user ${username}!`);
            }
        },
        error: function() {
            toastr.error("You don't have permission !");
        }
    });
};

user.selectRole = function() {
    $.ajax({
        url: "/users/select/role",
        type: "GET",
    }).done(function(data) {
        $(".role-select").empty();
        $(".role-select").append(
            `<option value="${data.id}">${data.name}</option>`
        );
    });
};

user.selectRoleUpdate = function(role) {
    $.ajax({
        url: "/users/select/role",
        type: "GET",
    }).done(function(data) {
        $(".role-select").empty();
        $(".role-select").append(role[0] != null && role[0].id == data.id ? `<option value="${data.id}" selected>${data.name}</option>` :
            `<option value="${data.id}">${data.name}</option>`
        );
    });
};

user.printErrorMsg = function(msg) {
    $(".create_modal").removeClass("is-invalid").addClass("is-valid");
    $(".edit_modal").removeClass("is-invalid").addClass("is-valid");
    toastr.warning(`The data you entered is incorrect !`);
    $.each(msg, function(key, value) {
        $(`.alert-${key}`).html(value);
        $(`input[name=${key}]`).addClass("is-invalid");
    });
};

user.sweetalert = function() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            swal({
                title: 'Shortlisted!',
                text: 'Candidates are successfully shortlisted!',
                icon: 'success'
            }).then(function() {});
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
};

user.init = function() {
    user.drawTable();
    user.trashTable();
    $(".role-select").select2();
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    user.init();
});
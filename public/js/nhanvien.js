var staff = staff || {};

staff.drawTable = function() {
    $.ajax({
        url: "/staff/all",
        type: "GET",
        success: function(res) {
            $("#reload_table").html(res);
            $("#dataTable").dataTable();
        },
        error: function(data) {
            if (data.status = 500) {
                swal("Unauthorized", "You don't have permission !", "error");
            }
        }
    });
};

staff.trashTable = function() {
    $.ajax({
        url: "/staff/trash",
        type: "GET",
        success: function(res) {
            $("#reload_trash").html(res);
            $("#dataTableTrash").dataTable();
        },
        error: function(data) {
            if (data.status = 500) {
                swal("Unauthorized", "You don't have permission !", "error");
            }
        }
    });
};

staff.modalCreate = function() {
    $("#ShowModal").modal("show");
    $("#modal-title").text("Create new user");
    $("#show-create-modal").css("display", "flex");
    $("#show-edit-modal").css("display", "none");
    $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
    $(".btn-create").prop("disabled", false);
    staff.selectRole();
};

staff.hash;
staff.modalEdit = function(id) {
    $("#ShowModal").modal("show");
    $(".edit_modal").removeClass("is-invalid").removeClass("is-valid"); // Remove all class is-invalid and is-valid
    $("#show-create-modal").css("display", "none"); // Hide modal create
    $("#show-edit-modal").css("display", "flex"); // Show modal update
    $(".btn-edit").prop("disabled", false);
    $.ajax({
        type: "GET",
        url: "/staff/" + id,
        success: function(response) {
            staff.hash = response[0].hash;
            $("#ShowModal").find("#id").val(response[0].id);
            $("#ShowModal").find("#username").val(response[0].username);
            $("#ShowModal").find("#email").val(response[0].email);
            if (response[0].block == 1) {
                $("#ShowModal").find("#block").prop("checked", true);
            } else {
                $("#ShowModal").find("#block").prop("checked", false);
            }
            // more
            staff.selectRoleUpdate(response[1]);
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

staff.create = function() {
    let data = $("#modal-create").serialize();
    $.ajax({
        url: "/staff",
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
            staff.drawTable();
        },
        error: function(data) {
            if (data.status == 401) {
                swal("Unauthorized", "You don't have permission !", "error");
                $("#ShowModal").modal("hide");
                // toastr.error("You don't have permission !");
            } else if (data.status == 422) {
                staff.printErrorMsg(data.responseJSON.errors);
            }
        },
    });
};

staff.update = function() {
    let data = $("#modal-update").serialize();
    data += `&hash=${staff.hash}`;
    var id = $("input[name='id']").val();
    $.ajax({
        url: "/staff/" + id,
        type: "PUT",
        data: data,
        success: function(response) {
            swal("Updated", `Updated user ${response.username}!`, "success");
            $("#ShowModal").modal("hide");
            $(".edit_modal").removeClass("is-invalid").removeClass("is-valid");
            $(".btn-edit").prop("disabled", true);
            staff.drawTable();
            staff.trashTable();
        },
        error: function(data) {
            if (data.status == 401) {
                swal("Unauthorized", "You don't have permission !", "error");
            } else if (data.status == 422) {
                staff.printErrorMsg(data.responseJSON.errors);
            }
        },
    });
};

staff.destroy = function(id, username) {
    swal({
        title: `Do you want remove user ${username}?`,
        text: `You can restore user ${username} in the trash !`,
        icon: "warning",
        buttons: ['No, cancel it!', 'Yes, I am sure!'],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "/staff/" + id,
                type: "DELETE",
                success: function() {
                    staff.trashTable();
                    staff.drawTable();
                    swal('Removed!', `User ${username} are successfully removed!`, 'success');
                },
                error: function(data) {
                    if (data.status == 401) {
                        swal("Unauthorized", "You don't have permission !", "error");
                    }
                }
            });
        } else {
            swal("Cancelled", "This user is safe :)", "error");
        }
    });
};

staff.restore = function(id, username) {
    swal({
        title: `Do you want restore user ${username}?`,
        text: `User ${username} will be restore !`,
        icon: "warning",
        buttons: ['No, cancel it!', 'Yes, I am sure!'],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "/staff/restore/" + id,
                type: "GET",
                success: function() {
                    staff.trashTable();
                    staff.drawTable();
                    swal('Restored!', `Restored user ${username}!`, 'success');
                },
                error: function(data) {
                    if (data.status == 401) {
                        swal("Unauthorized", "You don't have permission !", "error");
                    }
                }
            });
        } else {
            swal("Cancelled", "This user is safe :)", "error");
        }
    });
};

staff.forceDelete = function(id, username) {
    swal({
        title: `Do you want delete user ${username}?`,
        text: `User ${username} cannot be recovered !`,
        icon: "warning",
        buttons: ['No, cancel it!', 'Yes, I am sure!'],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "/staff/delete/" + id,
                type: "GET",
                success: function() {
                    staff.trashTable();
                    staff.drawTable();
                    swal('Deleted!', `Deleted user ${username} forever!`, 'success');
                },
                error: function(data) {
                    if (data.status == 401) {
                        swal("Unauthorized", "You don't have permission !", "error");
                    }
                }
            });
        } else {
            swal("Cancelled", "This user is safe :)", "error");
        }
    });
};

staff.block = function(id, username) {
    swal({
        title: `Do you want change block column user ${username}?`,
        text: `User ${username} will be change block column !`,
        icon: "warning",
        buttons: ['No, cancel it!', 'Yes, I am sure!'],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "users/block/" + id,
                type: "get",
                success: function() {
                    staff.trashTable();
                    staff.drawTable();
                    swal('Success!', `Changed column block of user ${username}!`, 'success');
                },
                error: function(data) {
                    if (data.status == 401) {
                        swal("Unauthorized", "You don't have permission !", "error");
                    }
                }
            });
        } else {
            swal("Cancelled", "This user is safe :)", "error");
        }
    });
};

staff.selectRole = function() {
    $.ajax({
        url: "/staff/select/role",
        type: "GET",
    }).done(function(data) {
        $(".role-select").empty();
        $(".role-select").append(
            `<option value="${data.id}">${data.name}</option>`
        );
    });
};

staff.selectRoleUpdate = function(role) {
    $.ajax({
        url: "/staff/select/role",
        type: "GET",
    }).done(function(data) {
        $(".role-select").empty();
        $(".role-select").append(role[0] != null && role[0].id == data.id ? `<option value="${data.id}" selected>${data.name}</option>` :
            `<option value="${data.id}">${data.name}</option>`
        );
    });
};

staff.printErrorMsg = function(msg) {
    $(".create_modal").removeClass("is-invalid").addClass("is-valid");
    $(".edit_modal").removeClass("is-invalid").addClass("is-valid");
    toastr.warning(`The data you entered is incorrect !`);
    $.each(msg, function(key, value) {
        $(`.alert-${key}`).html(value);
        $(`input[name=${key}]`).addClass("is-invalid");
    });
};

staff.init = function() {
    staff.drawTable();
    staff.trashTable();
    $(".role-select").select2();
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    staff.init();
});
var user = user || {};

user.drawTable = function() {
    $.ajax({
        url: "/users/all",
        type: "GET",
    }).done(function(res) {
        $("#reload_table").html(res);
        $("#dataTable").dataTable();
    });
};

user.trashTable = function() {
    $.ajax({
        url: "/users/trash",
        type: "GET",
    }).done(function(res) {
        $("#reload_trash").html(res);
        $("#dataTableTrash").dataTable();
    });
};

user.modalCreate = function() {
    $("#ShowModal").modal("show");
    $("#modal-title").text("Create new user");
    $("#show-create-modal").css("display", "flex");
    $("#show-edit-modal").css("display", "none");
    $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
    user.selectRole();
};

user.modalEdit = function(id) {
    $("#ShowModal").modal("show");
    $(".edit_modal").removeClass("is-invalid").removeClass("is-valid"); // Remove all class is-invalid and is-valid
    $("#show-create-modal").css("display", "none"); // Hide modal create
    $("#show-edit-modal").css("display", "flex"); // Show modal update
    $.ajax({
        type: "GET",
        url: "/users/" + id,
        success: function(response) {
            $(".print-error-msg").css("display", "none");
            $("#ShowModal").find("#id").val(response[0].id);
            $("#ShowModal").find("#username").val(response[0].username);
            $("#ShowModal").find("#email").val(response[0].email);
            if (response[0].block == 1) {
                $("#ShowModal").find("#block").prop("checked", true);
            } else {
                $("#ShowModal").find("#block").prop("checked", false);
            }
            user.selectRoleUpdate(response[1]);
        },
    });
};

user.create = function() {
    let data = $("#modal-create").serialize();
    var username = $("#username-create").val();
    $.ajax({
        url: "/users",
        type: "POST",
        data: data,
        success: function() {
            toastr.success(`Created new user ${username}!`);
            $("#ShowModal").modal("hide");
            $(".reset_form").click();
            $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
        },
        error: function(data) {
            user.printErrorMsg(data.responseJSON.errors);
        }
    });
    user.drawTable(); //reload table
};

user.update = function() {
    let data = $("#modal-update").serialize();
    var id = $("input[name='id']").val();
    var username = $("#username").val();
    $.ajax({
        url: "/users/" + id,
        type: "PUT",
        data: data,
        success: function() {
            $(".print-error-msg").css("display", "none");
            toastr.success(`Updated user ${username}!`);
            $("#ShowModal").modal("hide");
            $(".edit_modal").removeClass("is-invalid").removeClass("is-valid");
        },
        error: function(data) {
            user.printErrorMsg(data.responseJSON.errors);
        }
    });
    user.drawTable();
    user.trashTable();
};

user.destroy = function(id, username) {
    var conf = confirm(`Do you want remove user ${username}?`);
    $.ajax({
        url: "/users/" + id,
        type: "DELETE",
    }).done(function() {
        if (conf) {
            user.drawTable(); //reload table
            user.trashTable();
            toastr.success(`Removed user ${username}!`);
        }
    });
};

user.restore = function(id, username) {
    var conf = confirm(`Do you want restore user ${username}?`);
    $.ajax({
        url: "/users/restore/" + id,
        type: "GET",
    }).done(function() {
        if (conf) {
            user.drawTable(); //reload table
            user.trashTable();
            toastr.success(`Restored user ${username}!`);
        }
    });
};

user.forceDelete = function(id, username) {
    var conf = confirm(`Do you want delete user ${username}?`);
    $.ajax({
        url: "/users/delete/" + id,
        type: "GET",
    }).done(function() {
        if (conf) {
            user.drawTable(); //reload table
            user.trashTable();
            toastr.success(`Deleted user ${username}!`);
        }
    });
};

user.block = function(id, username) {
    var conf = confirm(`Do you want change block column user ${username}?`);
    $.ajax({
        url: "users/block/" + id,
        type: "get",
    }).done(function() {
        if (conf) {
            user.trashTable();
            user.drawTable();
            toastr.success(`Changed column block of user ${username}!`);
        }
    });
};

user.selectRole = function() {
    $.ajax({
        url: "/users/select/role",
        type: "GET",
    }).done(function(data) {
        $(".role-select").empty();
        $.each(data, function(key, value) {
            $('.role-select').append(
                `<option value="${value.id}">${value.name}</option>`
            );
        });
    });
};

user.selectRoleUpdate = function(role) {
    $.ajax({
        url: "/users/select/role",
        type: "GET",
    }).done(function(data) {
        $(".role-select").empty();
        $.each(data, function(key, value) {
            $('.role-select').append(
                (role[key] != null && role[key].id == value.id) ?
                `<option value="${value.id}" selected>${value.name}</option>` :
                `<option value="${value.id}">${value.name}</option>`
            );
        });
    });
};

user.printErrorMsg = function(msg) {
    $(".create_modal").removeClass("is-invalid").addClass("is-valid");
    $(".edit_modal").removeClass("is-invalid").addClass("is-valid");
    toastr.warning(`The data you entered is incorrect !`);
    $.each(msg, function(key, value) {
        $(`.alert-${key}`).text(value);
        $(`input[name=${key}]`).addClass("is-invalid");
    });
    console.clear();
};

user.init = function() {
    user.drawTable();
    $('.role-select').select2();
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    user.init();
});
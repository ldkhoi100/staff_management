var user = user || {};

user.drawTable = function() {
    $.ajax({
        url: "/usersAjax",
        type: "GET",
    }).done(function(res) {
        $("#reload_table").html(res);
        $("#dataTable").dataTable();
    });
}

user.modalCreate = function() {
    $("#ShowModal").modal("show");
    $("#modal-title").text("Create new user");
    $("#show-create-modal").css("display", "flex");
    $("#show-edit-modal").css("display", "none");
    $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
    // user.selectRole();
};

user.modalEdit = function(id) {
    $("#ShowModal").modal("show");
    $(".edit_modal").removeClass("is-invalid").removeClass("is-valid"); // Remove all class is-invalid and is-valid
    $("#show-create-modal").css("display", "none"); // Hide modal create
    $("#show-edit-modal").css("display", "flex"); // Show modal update
    $.ajax({
        type: "GET",
        url: "/users/" + id + "/edit",
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
};

user.create = function() {
    let data = $("#modal-create").serialize();
    console.log(data);
    var username = $("#username-create").val();
    $.ajax({
        url: "/users",
        type: "POST",
        data: data,
        success: function(data) {
            if ($.isEmptyObject(data.error)) {
                toastr.success(`Created new user ${username}!`);
                $("#ShowModal").modal("hide");
                $(".reset_form").click();
                $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
            } else {
                toastr.warning(`The data you entered is incorrect !`);
                user.printErrorMsg(data.error);
            }
        },
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
        success: function(data) {
            if ($.isEmptyObject(data.error)) {
                $(".print-error-msg").css("display", "none");
                toastr.success(`Updated user ${username}!`);
                $("#ShowModal").modal("hide");
                $(".edit_modal").removeClass("is-invalid").removeClass("is-valid");
            } else {
                user.printErrorMsg(data.error);
            }
        },
    });
    user.drawTable();
};

user.destroy = function(id, username) {
    var conf = confirm(`Do you want remove user ${username}?`);
    $.ajax({
        url: "/users/" + id,
        type: "DELETE",
    }).done(function() {
        if (conf) {
            toastr.success(`Removed user ${username}!`);
            user.drawTable(); //reload table
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
            toastr.success(`Changed column block of user ${username}!`);
            user.drawTable();
        }
    });
};

user.selectRole = function() {
    $.ajax({
        url: "/select/role",
        type: "GET",
    }).done(function(data) {
        $(".role-select").empty();
        $.each(data, function(index, value) {
            $('.role-select').append(
                `<option value="${value.id}">${value.name}</option>`
            );
        });
    });
};

user.printErrorMsg = function(msg) {
    $(".create_modal").removeClass("is-invalid").addClass("is-valid");
    $(".edit_modal").removeClass("is-invalid").addClass("is-valid");
    $.each(msg, function(key, value) {
        $(`.alert-${key}`).text(value);
        $(`input[name=${key}]`).addClass("is-invalid");
    });
};

user.init = function() {
    user.drawTable();
};

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function() {
    user.init();
    $('.role-select').select2();
});
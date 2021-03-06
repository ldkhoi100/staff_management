var staff = staff || {};

staff.drawTable = function() {
    $.ajax({
        url: "/staff/all",
        type: "GET",
        success: function(res) {
            $("#reload_table").html(res);
            $("#dataTable").dataTable({
                "iDisplayLength": 50
            });
        },
        error: function(data) {
            if ((data.status = 500)) {
                swal("Unauthorized", "You don't have permission !", "error");
            }
        },
    });
};

staff.trashTable = function() {
    $.ajax({
        url: "/staff/trash",
        type: "GET",
        success: function(res) {
            $("#reload_trash").html(res);
            $("#dataTableTrash").dataTable({
                "iDisplayLength": 50
            });
        },
        error: function(data) {
            if ((data.status = 500)) {
                swal("Unauthorized", "You don't have permission !", "error");
            }
        },
    });
};

staff.modalCreate = function() {
    $("#ShowModal").modal("show");
    $("#modal-title").text("Create new user");
    $("#show-create-modal").css("display", "flex");
    $("#show-edit-modal").css("display", "none");
    $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
    $(".btn-create").prop("disabled", false);
    $("#zoom").attr("src", "#");
    staff.selectMaCV();
    staff.selectHSL();
};

staff.hash;
staff.modalEdit = function(id) {
    $(".edit_modal").removeClass("is-invalid").removeClass("is-valid"); // Remove all class is-invalid and is-valid
    $(".create_modal").removeClass("is-invalid").removeClass("is-valid");
    $("#show-create-modal").css("display", "none"); // Hide modal create
    $("#show-edit-modal").css("display", "flex"); // Show modal update
    $(".btn-edit").prop("disabled", false);
    $.ajax({
        type: "GET",
        url: "/staff/" + id,
        success: function(response) {
            staff.hash = response.hash;
            $.each(response, (key, data) => {
                $(`#modal-update [name=${key}]`).not(`#modal-update [name=Anh_Dai_Dien]`).val(data);
            });
            $("#ShowModal").find("#EditStaff").html(`Edit Staff ${response.Ho_Ten}`);
            if (response.Gioi_Tinh == "Male") {
                $("#Gioi_Tinh3").prop("checked", true);
            } else if (response.Gioi_Tinh == "Female") {
                $("#Gioi_Tinh4").prop("checked", true);
            }
            // select MaCV and HSL
            staff.selectMaCVUpdate(response.MaCV);
            staff.selectHSLUpdate(response.Ca_Lam);
            $("#ShowModal").modal("show");
            response.Anh_Dai_Dien != null ? $("#zoomEdit").attr("src", `img/${response.Anh_Dai_Dien}`) : $("#zoomEdit").attr("src", "#");
        },
        error: function() {
            if ((data.status = 401)) {
                swal("Unauthorized", "You don't have permission !", "error");
            }
        },
    });
};

staff.create = function(btn) {
    $("#create-button").text("Creating . . .").prop("disabled", true).addClass("button-clicked");

    let data = new FormData(btn.form);
    $.ajax({
        url: "/staff",
        type: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            toastr.success(`Created new staff ${response.Ho_Ten} !`);
            $(".btn-create").prop("disabled", true).prop("disabled", false).removeClass("button-clicked");
            $("#ShowModal").modal("hide");
            $(".reset_form").click();
            $("#create-button").text("Create");
            staff.init();
        },
        error: function(data) {
            $("#create-button").text("Create").prop("disabled", false).removeClass("button-clicked");
            if (data.status == 401) {
                swal("Unauthorized", "You don't have permission !", "error");
                $("#ShowModal").modal("hide");
            } else if (data.status == 422) {
                staff.printErrorMsg(data.responseJSON.errors);
            }
        },
    });
};

staff.update = function(btn) {
    $("#edit-button").text("Saving . . .").prop("disabled", true).addClass("button-clicked");
    let data = new FormData(btn.form);
    data.append("hash", `${staff.hash}`);
    var id = $("input[name='id']").val();
    $.ajax({
        url: "/staff/" + id,
        type: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            $("#edit-button").text("Save Changes").prop("disabled", false).removeClass("button-clicked");
            toastr.success(`Updated staff ${response.Ho_Ten} !`);
            $("#ShowModal").modal("hide");
            $(".btn-edit").prop("disabled", true);
            staff.init();
        },
        error: function(data) {
            $("#edit-button").text("Save Changes").prop("disabled", false).removeClass("button-clicked");
            if (data.status == 401) {
                swal("Unauthorized", "You don't have permission !", "error");
            } else if (data.status == 422) {
                staff.printErrorMsg(data.responseJSON.errors);
            }
        },
    });
};

staff.modalShow = function(id) {
    $("#show-data-modal").css("display", "flex"); // Show modal detail
    $.ajax({
        type: "GET",
        url: "/staff/show/" + id,
        success: function(response) {
            response_query = response["data"];
            response_table = response["data"]["data"];
            $("#ShowStaff").text(`STAFF ${response_table.Ho_Ten}`);
            $.each(response_query, (key, data) => {
                $(`#showId #${key}`).text(data);
            });
            $.each(response_table, (key, data) => {
                $(`#showId #${key}`).text(data);
            });
            $("#ShowIdModal").modal("show");
            response_table.Anh_Dai_Dien != null ? $("#ImageShow").attr("src", `img/${response_table.Anh_Dai_Dien}`) : $("#ImageShow").attr("src", "#");
        },
        error: function() {
            if (data.status = 401) {
                toastr.error("You don't have permission !");
            }
        },
    });
};

staff.destroy = function(id, username) {
    swal({
        title: `Do you want remove staff ${username}?`,
        text: `You can restore staff ${username} in the trash !`,
        icon: "warning",
        buttons: ["No, cancel it!", "Yes, I am sure!"],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "/staff/" + id,
                type: "DELETE",
                success: function() {
                    staff.init();
                    toastr.success(`Staff ${username} are successfully removed!`);
                },
                error: function(data) {
                    if (data.status == 401) {
                        swal("Unauthorized", "You don't have permission !", "error");
                    }
                },
            });
        } else {
            // swal("Cancelled", "This staff is safe :)", "error");
        }
    });
};

staff.restore = function(id, username) {
    swal({
        title: `Do you want restore staff ${username}?`,
        text: `Staff ${username} will be restore !`,
        icon: "warning",
        buttons: ["No, cancel it!", "Yes, I am sure!"],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "/staff/restore/" + id,
                type: "GET",
                success: function() {
                    staff.init();
                    toastr.success(`Staff ${username} are successfully Restored!`);
                },
                error: function(data) {
                    if (data.status == 401) {
                        swal("Unauthorized", "You don't have permission !", "error");
                    }
                },
            });
        } else {
            // swal("Cancelled", "This staff is safe :)", "error");
        }
    });
};

staff.forceDelete = function(id, username) {
    swal({
        title: `Do you want delete staff ${username}?`,
        text: `Staff ${username} cannot be recovered. And this employee's account will be deleted !`,
        icon: "warning",
        buttons: ["No, cancel it!", "Yes, I am sure!"],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "/staff/delete/" + id,
                type: "GET",
                success: function() {
                    staff.init();
                    toastr.success(`Staff ${username} are successfully deleted forever !`);
                },
                error: function(data) {
                    if (data.status == 401) {
                        swal("Unauthorized", "You don't have permission !", "error");
                    }
                },
            });
        } else {
            // swal("Cancelled", "This staff is safe :)", "error");
        }
    });
};

staff.selectMaCV = function() {
    $.ajax({
        url: "/staff/select/maCV",
        type: "GET",
    }).done(function(data) {
        $(".position").empty();
        $.each(data, function(key, value) {
            $(".position").append(
                `<option value="${value.id}">${value.Ten_CV}</option>`
            );
        });
    });
};

staff.selectHSL = function() {
    $.ajax({
        url: "/staff/select/HSL",
        type: "GET",
    }).done(function(data) {
        $(".HSL").empty();
        $.each(data, function(key, value) {
            $(".HSL").append(
                `<option value="${value.id}">${value.Mo_Ta + " (" + value.Gio_Lam + ")"}</option>`
            );
        });
    });
};

staff.selectMaCVUpdate = function(macv) {
    $.ajax({
        url: "/staff/select/maCV",
        type: "GET",
    }).done(function(data) {
        $(".positionEdit").empty();
        $.each(data, function(key, value) {
            $(".positionEdit").append(
                macv != null && macv == value.id ?
                `<option value="${value.id}" selected>${value.Ten_CV}</option>` :
                `<option value="${value.id}">${value.Ten_CV}</option>`
            );
        });
    });
};

staff.selectHSLUpdate = function(hsl) {
    $.ajax({
        url: "/staff/select/HSL",
        type: "GET",
    }).done(function(data) {
        $(".HSLEdit").empty();
        $.each(data, function(key, value) {
            $(".HSLEdit").append(
                hsl != null && hsl == value.id ?
                `<option value="${value.id}" selected>${value.Mo_Ta + " (" + value.Gio_Lam + ")"}</option>` :
                `<option value="${value.id}">${value.Mo_Ta + " (" + value.Gio_Lam + ")"}</option>`
            );
        });
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
    $(".select2").select2();
    staff.selectMaCV();
    $(".lazy").Lazy();
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    staff.init();
});

//Image onchange create
function readURL(event) {
    if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function() {
            let output = document.getElementById("zoom");
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
}

//Image onchange update
function readURLEdit(event) {
    if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function() {
            let output = document.getElementById("zoomEdit");
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
}
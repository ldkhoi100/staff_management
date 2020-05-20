let Dxp = {} || Dxp;

Dxp.table;
Dxp.tableTrash;

Dxp.drawTable = function() {
    Dxp.table = $('#fs-table').DataTable({
        processing: true,
        ajax: {
            url: '/donxinphep/all',
            dataSrc: function(jsons) {
                let i = 1;
                return jsons.map(json => {
                    return {
                        Key: i++,
                        Cv: json.nhanvien_name,
                        Cv1: json.TieuDe,
                        Cv2: json.NoiDung,
                        action: `
                            <a class="btn btn-success text-light" onclick="Dxp.show(${json.id})">Show</a>
                            <a class="btn btn-secondary text-light" onclick="Dxp.edit(${json.id})">Edit</a>
                            <a class="btn btn-warning text-dark" onclick="Dxp.trash(${json.id})">Trash</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "Key"
            },
            {
                data: "Cv"
            },
            {
                data: "Cv1"
            },
            {
                data: "Cv2"
            },

            {
                data: "action"
            }
        ]

    });
};

Dxp.drawTableTrash = function() {
    Dxp.tableTrash = $('#fs-table-trash').DataTable({
        processing: true,
        ajax: {
            url: '/donxinphep/trash',
            dataSrc: function(jsons) {
                return jsons.map(json => {
                    return {
                        Key: i++,
                        Cv: json.nhanvien_name,
                        Cv1: json.TieuDe,
                        Cv2: json.NoiDung,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Dxp.undo(${json.id})">Undo</a>
                            <a class="btn btn-warning text-dark" onclick="Dxp.delete(${json.id})">Delete</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "Key"
            },
            {
                data: "Cv"
            },
            {
                data: "Cv1"
            },
            {
                data: "Cv2"
            },
            {
                data: "action"
            }
        ]

    });
};

Dxp.trash = function(id) {
    if (confirm('Move this to Trash')) {
        $.ajax({
            url: `/donxinphep/${id}`,
            method: "delete",
            success: function(msg) {
                Dxp.success(msg);
                Dxp.table.ajax.reload();
                Dxp.tableTrash.ajax.reload();
            }
        });
    }
}


Dxp.edit = function(id) {
    $.get(`/donxinphep/${id}`).done(function(Obj) {
        $.each(Obj, (i, v) => {
            $(`#fs-modal input[name=${i}]`).val(v);
            $(`#fs-modal textarea[name=${i}]`).val(v);
        });
        $('#fs-modal #fs-modal-title').text("Edit Factor Salary");
        $('#fs-modal #btn-save').data('id', Obj.id);
        $('#fs-modal').modal('show');
        $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
        $('small.badge').remove();
    });
}

Dxp.create = function() {
    $('#fs-modal form')[0].reset();
    $('#fs-modal #fs-modal-title').text("Create Factor Salary");
    $('#fs-modal #btn-save').removeData('id');
    $('#fs-modal').modal("show");
    $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
    $('small.badge').remove();
}

Dxp.show = function(id) {
    $('#dx-modal').modal("show");
    $.ajax({
        type: "GET",
        url: "/donxinphep/show/" + id,
        success: function(response) {
            response_nhanvien = response['data'];
            response_query = response['data']['data'];
            $("#dx-modal").find("#MaNV").text(response_nhanvien.NhanVien);
            $("#dx-modal").find("#TieuDe").text(response_query.TieuDe);
            $("#dx-modal").find("#NoiDung").text(response_query.NoiDung);
        },
        error: function() {},
    });

}

Dxp.undo = function(id) {
    if (confirm("Undo this")) {
        $.ajax({
            url: `/donxinphep/${id}/restore`,
            method: 'PUT',
            success: function(msg) {
                Dxp.success(msg);
                Dxp.tableTrash.ajax.reload();
                Dxp.table.ajax.reload();
            },
            error: function(errors) {
                alert('undo errors');
            }
        });
    }
}

Dxp.delete = function(id) {
    if (confirm('Delete this')) {
        $.ajax({
            url: `/donxinphep/${id}/delete`,
            method: 'delete',
            success: function(msg) {
                Dxp.success(msg);
                Dxp.tableTrash.ajax.reload();
            },
            error: function(errors) {
                alert('Delete errors');
            }
        });
    }
}

Dxp.save = function(btn) {
    let id = $(btn).data('id');
    let data = $(btn.form).serializeJSON();
    console.log(id);
    console.log(data);
    if (id) {
        if (confirm('Save change')) {
            $.ajax({
                url: `/donxinphep/${id}`,
                method: 'PUT',
                data: data,
                success: function(Obj) {
                    Dxp.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Dxp.success("Update success!");
                },
                error: function(errors) {
                    Dxp.errors(errors.responseJSON.errors);
                }
            });
        }
    } else {
        if (confirm('Save this data')) {
            $("#btn-save").text("Sending mail, please wait . . .");
            $.ajax({
                url: `/donxinphep`,
                method: 'post',
                data: data,
                success: function() {
                    Dxp.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Dxp.success("Create success");
                    $("#btn-save").text("Send Mail");
                    profile.init();
                },
                error: function(errors) {
                    Dxp.errors(errors);
                    $("#btn-save").text("Send Mail");
                }
            });
        }
    }
}

Dxp.success = function(msg) {
    $.toast({
        heading: 'Success',
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: 'success'
    });
}

// Dxp.errors = function(msg) {
//     $(`#fs-modal input`).each(function() {
//         $(this).addClass('is-valid');
//     });
//     $('small.badge').each(function() {
//         console.log(this);
//         $(this).remove();
//     });
//     $.each(msg, function(i, v) {
//         $(`#fs-modal input[name=${i}]`).addClass('is-invalid').before(`<small class="badge badge-danger mx-auto">${v}</small>`);
//     });
// }


Dxp.errors = function(errors) {
    // console.log(errors);
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;
        $(`#fs-modal .is-invalid`).removeClass('is-invalid');
        $(`#fs-modal .is-valid`).removeClass('is-valid');
        $(`#fs-modal .field`).addClass('is-valid');
        $('small.text').remove();
        $.each(msg, function(i, v) {
            $(`#fs-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
        });
    } else {
        $('#fs-modal').modal('hide');
        Dxp.success("You are not authorized for this action", "Error", 'error');
    }
}


Dxp.init = function() {
    Dxp.drawTable();
    Dxp.drawTableTrash();
}

$(document).ready(function() {
    Dxp.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
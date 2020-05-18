let Ws = {} || Ws;

Ws.table;
Ws.tableTrash;

Ws.drawTable = function () {
    Ws.table = $('#ws-table').DataTable({
        processing: true,
        ajax: {
            url: '/work-shift/all',
            dataSrc: function (jsons) {
                return jsons.map(json => {
                    return {
                        ca: json.Ca,
                        hs: json.He_So,
                        crt: json.created_at,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Ws.edit(${json.id})">Edit</a>
                            <a class="btn btn-warning text-dark" onclick="Ws.trash(${json.id})">Trash</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "ca"
            },
            {
                data: "hs"
            },
            {
                data: "crt"
            },
            {
                data: "action"
            }
        ]

    });
};

Ws.drawTableTrash = function () {
    Ws.tableTrash = $('#ws-table-trash').DataTable({
        processing: true,
        ajax: {
            url: '/work-shift/trash',
            dataSrc: function (jsons) {
                return jsons.map(json => {
                    return {
                        ca: json.Ca,
                        hs: json.He_So,
                        dlt: json.deleted_at,
                        action: `
                            <a class="btn btn-primary text-light" onclick="Ws.undo(${json.id})">Undo</a>
                            <a class="btn btn-danger text-light" onclick="Ws.delete(${json.id})">Delete</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "ca"
            },
            {
                data: "hs"
            },
            {
                data: "dlt"
            },
            {
                data: "action"
            }
        ]

    });
};

Ws.trash = function (id) {
    if (confirm('Move this to Trash')) {
        $.ajax({
            url: `/work-shift/${id}`,
            method: "delete",
            success: function (msg) {
                Ws.success(msg);
                Ws.table.ajax.reload();
                Ws.tableTrash.ajax.reload();
            },
            error: function (errors) {
                Ws.errors(errors);
            }
        });
    }
}


Ws.edit = function (id) {
    $.get(`/work-shift/${id}`).done(function (Obj) {
        $.each(Obj, (i, v) => {
            $(`#ws-modal [name=${i}]`).val(v);
        });
        $('#ws-modal #btn-save').data('id', Obj.id);
        Ws.openModal(1);
    }).fail(function (errors) {
        Ws.errors(errors);
    });
}

Ws.openModal = function (edit = null) {
    if (edit) {
        $('#ws-modal #ws-modal-title').text("Edit Work Shift");
    } else {
        $('#ws-modal form')[0].reset();
        $('#ws-modal #ws-modal-title').text("Create Work Shift");
        $('#ws-modal #btn-save').removeData('id');
    }
    $(`#ws-modal .is-valid`).removeClass('is-valid');
    $(`#ws-modal .is-invalid`).removeClass('is-invalid');
    $('small.text').remove();
    $('#ws-modal').modal('show');
}

Ws.create = function () {
    Ws.openModal();
}

Ws.undo = function (id) {
    if (confirm("Undo this")) {
        $.ajax({
            url: `/work-shift/${id}/restore`,
            method: 'PUT',
            success: function (msg) {
                Ws.success(msg);
                Ws.tableTrash.ajax.reload();
                Ws.table.ajax.reload();
            },
            error: function (errors) {
                Ws.errors(errors);
            }
        });
    }
}

Ws.delete = function (id) {
    if (confirm('Delete this')) {
        $.ajax({
            url: `/work-shift/${id}/delete`,
            method: 'delete',
            success: function (msg) {
                Ws.success(msg);
                Ws.tableTrash.ajax.reload();
            },
            error: function (errors) {
                Ws.errors(errors);
            }
        });
    }
}

Ws.save = function (btn) {
    let id = $(btn).data('id');
    let data = $(btn.form).serializeJSON();
    console.log(id);
    console.log(data);
    if (id) {
        if (confirm('Save change')) {
            $.ajax({
                url: `/work-shift/${id}`,
                method: 'PUT',
                data: data,
                success: function (Obj) {
                    Ws.table.ajax.reload();
                    $('#ws-modal').modal("hide");
                    Ws.success("Update success!");
                },
                error: function (errors) {
                    Ws.errors(errors);
                }
            });
        }
    } else {
        if (confirm('Save this data')) {
            $.ajax({
                url: `/work-shift`,
                method: 'post',
                data: data,
                success: function (data) {
                    Ws.table.ajax.reload();
                    $('#ws-modal').modal("hide");
                    Ws.success("Create success");
                },
                error: function (errors) {
                    Ws.errors(errors);
                }
            });
        }
    }
}

Ws.success = function (msg, status = "Success", icon = "success") {
    $.toast({
        heading: status,
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: icon
    });
}

Ws.errors = function (errors) {
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;
        $(`#ws-modal .field`).removeClass('is-invalid');
        $(`#ws-modal .field`).removeClass('is-valid');
        $(`#ws-modal .field`).addClass('is-valid');
        $('small.text').remove();
        $.each(msg, function (i, v) {
            $(`#ws-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
        });
    } else {
        $('#ws-modal').modal('hide');
        Ws.success("You are not authorized for this action", "Error", 'error');
    }
}

Ws.init = function () {
    Ws.drawTable();
    Ws.drawTableTrash();
}

$(document).ready(function () {
    Ws.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

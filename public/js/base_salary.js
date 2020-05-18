let Bs = {} || Bs;

Bs.table;
Bs.tableTrash;

Bs.drawTable = function () {
    Bs.table = $('#bs-table').DataTable({
        processing: true,
        ajax: {
            url: '/base-salary/all',
            dataSrc: function (jsons) {
                return jsons.map(json => {
                    return {
                        tl: json.Tien_Luong,
                        mt: json.Mo_Ta,
                        crt: json.created_at,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Bs.edit(${json.id})">Edit</a>
                            <a class="btn btn-warning text-dark" onclick="Bs.trash(${json.id})">Trash</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "tl"
            },
            {
                data: "mt"
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

Bs.drawTableTrash = function () {
    Bs.tableTrash = $('#bs-table-trash').DataTable({
        processing: true,
        ajax: {
            url: '/base-salary/trash',
            dataSrc: function (jsons) {
                return jsons.map(json => {
                    return {
                        tl: json.Tien_Luong,
                        mt: json.Mo_Ta,
                        dlt: json.deleted_at,
                        action: `
                            <a class="btn btn-primary text-light" onclick="Bs.undo(${json.id})">Undo</a>
                            <a class="btn btn-danger text-light" onclick="Bs.delete(${json.id})">Delete</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "tl"
            },
            {
                data: "mt"
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

Bs.trash = function (id) {
    if (confirm('Move this to Trash')) {
        $.ajax({
            url: `/base-salary/${id}`,
            method: "delete",
            success: function (msg) {
                Bs.success(msg);
                Bs.table.ajax.reload();
                Bs.tableTrash.ajax.reload();
            },
            error: function (errors) {
                Bs.errors(errors);
            }
        });
    }
}

Bs.edit = function (id) {
    $.get(`/base-salary/${id}`).done(function (Obj) {
        $.each(Obj, (i, v) => {
            $(`#bs-modal [name=${i}]`).val(v);
        });
        $('#bs-modal #btn-save').data('id', Obj.id);
        Bs.openModal(1);
    }).fail(function (errors) {
        Bs.errors(errors);
    });
}

Bs.openModal = function (edit = null) {
    if (edit) {
        $('#bs-modal #bs-modal-title').text("Edit Base Salary");
    } else {
        $('#bs-modal form')[0].reset();
        $('#bs-modal #bs-modal-title').text("Create Base Salary");
        $('#bs-modal #btn-save').removeData('id');
    }
    $(`#bs-modal .is-valid`).removeClass('is-valid');
    $(`#bs-modal .is-invalid`).removeClass('is-invalid');
    $('small.text').remove();
    $('#bs-modal').modal('show');
}

Bs.create = function () {
    Bs.openModal();
}

Bs.undo = function (id) {
    if (confirm("Undo this")) {
        $.ajax({
            url: `/base-salary/${id}/restore`,
            method: 'PUT',
            success: function (msg) {
                Bs.success(msg);
                Bs.tableTrash.ajax.reload();
                Bs.table.ajax.reload();
            },
            error: function (errors) {
                Bs.errors(errors);
            }
        });
    }
}

Bs.delete = function (id) {
    if (confirm('Delete this')) {
        $.ajax({
            url: `/base-salary/${id}/delete`,
            method: 'delete',
            success: function (msg) {
                Bs.success(msg);
                Bs.tableTrash.ajax.reload();
            },
            error: function (errors) {
                Bs.errors(errors);
            }
        });
    }
}

Bs.save = function (btn) {
    let id = $(btn).data('id');
    let data = $(btn.form).serializeJSON();
    if (id) {
        if (confirm('Save change')) {
            $.ajax({
                url: `/base-salary/${id}`,
                method: 'PUT',
                data: data,
                success: function (Obj) {
                    Bs.table.ajax.reload();
                    $('#bs-modal').modal("hide");
                    Bs.success("Update success!");
                },
                error: function (errors) {
                    Bs.errors(errors);
                }
            });
        }
    } else {
        if (confirm('Save this data')) {
            $.ajax({
                url: `/base-salary`,
                method: 'post',
                data: data,
                success: function (data) {
                    Bs.table.ajax.reload();
                    $('#bs-modal').modal("hide");
                    Bs.success("Create success");
                },
                error: function (errors) {
                    Bs.errors(errors);
                }
            });
        }
    }
}

Bs.success = function (msg, status = "Success", icon = "success") {
    $.toast({
        heading: status,
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: icon
    });
}

Bs.errors = function (errors) {
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;
        $(`#bs-modal .is-invalid`).removeClass('is-invalid');
        $(`#bs-modal .is-valid`).removeClass('is-valid');
        $(`#bs-modal .field`).addClass('is-valid');
        $('small.text').remove();
        $.each(msg, function (i, v) {
            $(`#bs-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
        });
    } else {
        $('#bs-modal').modal('hide');
        Bs.success("You are not authorized for this action", "Error", 'error');
    }
}

Bs.init = function () {
    Bs.drawTable();
    Bs.drawTableTrash();
}

$(document).ready(function () {
    Bs.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

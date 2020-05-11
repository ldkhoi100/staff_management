let Fs = {} || Fs;

Fs.table;
Fs.tableTrash;

Fs.drawTable = function() {
    Fs.table = $('#fs-table').DataTable({
        processing: true,
        // serverSide: true,
        ajax: {
            url: '/factor-salary/all',
            dataSrc: function(jsons) {
                return jsons.map(json => {
                    return {
                        fs: json.Bac_Luong,
                        crt: json.created_at.split(' ', 1)[0],
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Fs.edit(${json.id})">Edit</a>
                            <a class="btn btn-warning text-dark" onclick="Fs.trash(${json.id})">Trash</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "fs"
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

Fs.drawTableTrash = function() {
    Fs.tableTrash = $('#fs-table-trash').DataTable({
        processing: true,
        // serverSide: true,
        ajax: {
            url: '/factor-salary/trash',
            dataSrc: function(jsons) {
                return jsons.map(json => {
                    return {
                        fs: json.Bac_Luong,
                        crt: json.deleted_at.split(' ', 1)[0],
                        action: `
                            <a class="btn btn-primary text-light" onclick="Fs.undo(${json.id})">Undo</a>
                            <a class="btn btn-danger text-light" onclick="Fs.delete(${json.id})">Delete</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "fs"
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

Fs.trash = function(id) {
    if (confirm('Move this to Trash')) {
        $.ajax({
            url: `/factor-salary/${id}`,
            method: "delete",
            success: function(msg) {
                Fs.success(msg);
                Fs.table.ajax.reload();
                Fs.tableTrash.ajax.reload();
            }
        });
    }
}


Fs.edit = function(id) {
    $.get(`/factor-salary/${id}`).done(function(Obj) {
        $.each(Obj, (i, v) => {
            $(`#fs-modal input[name=${i}]`).val(v);
        });
        $('#fs-modal #fs-modal-title').text("Edit Factor Salary");
        $('#fs-modal #btn-save').data('id', Obj.id);
        $('#fs-modal').modal('show');
        $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
        $('small.badge').remove();
    });
}

Fs.create = function() {
    $('#fs-modal form')[0].reset();
    $('#fs-modal #fs-modal-title').text("Create Factor Salary");
    $('#fs-modal #btn-save').removeData('id');
    $('#fs-modal').modal("show");
    $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
    $('small.badge').remove();
}

Fs.undo = function(id) {
    if (confirm("Undo this")) {
        $.ajax({
            url: `/factor-salary/${id}/restore`,
            method: 'PUT',
            success: function(msg) {
                Fs.success(msg);
                Fs.tableTrash.ajax.reload();
                Fs.table.ajax.reload();
            },
            error: function(errors) {
                alert('undo errors');
            }
        });
    }
}

Fs.delete = function(id) {
    if (confirm('Delete this')) {
        $.ajax({
            url: `/factor-salary/${id}/delete`,
            method: 'delete',
            success: function(msg) {
                Fs.success(msg);
                Fs.tableTrash.ajax.reload();
            },
            error: function(errors) {
                alert('Delete errors');
            }
        });
    }
}

Fs.save = function(btn) {
    let id = $(btn).data('id');
    let data = $(btn.form).serializeJSON();
    console.log(id);
    console.log(data);
    if (id) {
        if (confirm('Save change')) {
            $.ajax({
                url: `/factor-salary/${id}`,
                method: 'PUT',
                data: data,
                success: function(Obj) {
                    Fs.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Fs.success("Update success!");
                },
                error: function(errors) {
                    Fs.errors(errors.responseJSON.errors);
                }
            });
        }
    } else {
        if (confirm('Save this data')) {
            $.ajax({
                url: `/factor-salary`,
                method: 'post',
                data: data,
                success: function() {
                    Fs.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Fs.success("Create success");
                },
                error: function(errors) {
                    Fs.errors(errors.responseJSON.errors);
                }
            });
        }
    }
}

Fs.success = function(msg) {
    $.toast({
        heading: 'Success',
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: 'success'
    });
}

Fs.errors = function(msg) {
    $(`#fs-modal input`).each(function() {
        $(this).addClass('is-valid');
    });
    $('small.badge').each(function() {
        console.log(this);
        $(this).remove();
    });
    $.each(msg, function(i, v) {
        $(`#fs-modal input[name=${i}]`).addClass('is-invalid').before(`<small class="badge badge-danger mx-auto">${v}</small>`);
    });
}

Fs.init = function() {
    Fs.drawTable();
    Fs.drawTableTrash();
}

$(document).ready(function() {
    Fs.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

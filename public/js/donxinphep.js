let Dxp = {} || Dxp;

Dxp.table;
Dxp.tableTrash;

Dxp.drawTable = function() {
    Dxp.table = $('#fs-table').DataTable({
        processing: true,
        ajax: {
            url: '/chuc-vu/all',
            dataSrc: function(jsons) {
                return jsons.map(json => {
                    return {
                        Dxp: json.Ten_CV,
                        Cv1: json.Cong_Viec,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Dxp.edit(${json.id})">Edit</a>
                            <a class="btn btn-warning text-dark" onclick="Dxp.trash(${json.id})">Trash</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "Dxp"
            },
            {
                data: "Cv1"
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
            url: '/chuc-vu/trash',
            dataSrc: function(jsons) {
                return jsons.map(json => {
                    return {
                        Dxp: json.Ten_CV,
                        Cv1: json.Cong_Viec,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Dxp.undo(${json.id})">Undo</a>
                            <a class="btn btn-warning text-dark" onclick="Dxp.delete(${json.id})">Delete</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "Dxp"
            },
            {
                data: "Cv1"
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
            url: `/chuc-vu/${id}`,
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
    $.get(`/chuc-vu/${id}`).done(function(Obj) {
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

Dxp.create = function() {
    $('#fs-modal form')[0].reset();
    $('#fs-modal #fs-modal-title').text("Create Factor Salary");
    $('#fs-modal #btn-save').removeData('id');
    $('#fs-modal').modal("show");
    $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
    $('small.badge').remove();
}

Dxp.undo = function(id) {
    if (confirm("Undo this")) {
        $.ajax({
            url: `/chuc-vu/${id}/restore`,
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
            url: `/chuc-vu/${id}/delete`,
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
                url: `/chuc-vu/${id}`,
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
            $.ajax({
                url: `/chuc-vu`,
                method: 'post',
                data: data,
                success: function() {
                    Dxp.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Dxp.success("Create success");
                },
                // error: function(errors) {
                //     Dxp.errors(errors.responseJSON.errors);
                // }
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
        icon: 'error'
    });
}

Dxp.errors = function(msg) {
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


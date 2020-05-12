let Cv = {} || Cv;

Cv.table;
Cv.tableTrash;

Cv.drawTable = function() {
    Cv.table = $('#fs-table').DataTable({
        processing: true,
        ajax: {
            url: '/chuc-vu/all',
            dataSrc: function(jsons) {
                return jsons.map(json => {
                    return {
                        Cv: json.Ten_CV,
                        Cv1: json.Cong_Viec,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Cv.edit(${json.id})">Edit</a>
                            <a class="btn btn-warning text-dark" onclick="Cv.trash(${json.id})">Trash</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "Cv"
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

Cv.drawTableTrash = function() {
    Cv.tableTrash = $('#fs-table-trash').DataTable({
        processing: true,
        ajax: {
            url: '/chuc-vu/trash',
            dataSrc: function(jsons) {
                return jsons.map(json => {
                    return {
                        Cv: json.Ten_CV,
                        Cv1: json.Cong_Viec,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Cv.undo(${json.id})">Undo</a>
                            <a class="btn btn-warning text-dark" onclick="Cv.delete(${json.id})">Delete</a>
                        `
                    }
                });
            }
        },
        columns: [{
                data: "Cv"
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

Cv.trash = function(id) {
    if (confirm('Move this to Trash')) {
        $.ajax({
            url: `/chuc-vu/${id}`,
            method: "delete",
            success: function(msg) {
                Cv.success(msg);
                Cv.table.ajax.reload();
                Cv.tableTrash.ajax.reload();
            }
        });
    }
}


Cv.edit = function(id) {
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

Cv.create = function() {
    $('#fs-modal form')[0].reset();
    $('#fs-modal #fs-modal-title').text("Create Factor Salary");
    $('#fs-modal #btn-save').removeData('id');
    $('#fs-modal').modal("show");
    $(`#fs-modal input`).removeClass(['is-valid', 'is-invalid']);
    $('small.badge').remove();
}

Cv.undo = function(id) {
    if (confirm("Undo this")) {
        $.ajax({
            url: `/chuc-vu/${id}/restore`,
            method: 'PUT',
            success: function(msg) {
                Cv.success(msg);
                Cv.tableTrash.ajax.reload();
                Cv.table.ajax.reload();
            },
            error: function(errors) {
                alert('undo errors');
            }
        });
    }
}

Cv.delete = function(id) {
    if (confirm('Delete this')) {
        $.ajax({
            url: `/chuc-vu/${id}/delete`,
            method: 'delete',
            success: function(msg) {
                Cv.success(msg);
                Cv.tableTrash.ajax.reload();
            },
            error: function(errors) {
                alert('Delete errors');
            }
        });
    }
}

Cv.save = function(btn) {
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
                    Cv.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Cv.success("Update success!");
                },
                error: function(errors) {
                    Cv.errors(errors.responseJSON.errors);
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
                    Cv.table.ajax.reload();
                    $('#fs-modal').modal("hide");
                    Cv.success("Create success");
                },
                error: function(errors) {
                    Cv.errors(errors.responseJSON.errors);
                }
            });
        }
    }
}

Cv.success = function(msg) {
    $.toast({
        heading: 'Success',
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: 'error'
    });
}

Cv.errors = function(msg) {
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


Cv.init = function() {
    Cv.drawTable();
    Cv.drawTableTrash();
}

$(document).ready(function() {
    Cv.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
<<<<<<< HEAD
});
=======
});

>>>>>>> e2ac1cf48f2c1a073034bedb0f8b5e1acf3dbbbb

let Ws = {} || Ws;
<<<<<<< HEAD
Ws.table;
Ws.tableTrash;
Ws.drawTable = function () {
=======

Ws.table;
Ws.tableTrash;

Ws.drawTable = function() {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    Ws.table = $('#ws-table').DataTable({
        processing: true,
        ajax: {
            url: '/work-shift/all',
<<<<<<< HEAD
            dataSrc: function (jsons) {
=======
            dataSrc: function(jsons) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                let i = 1;
                return jsons.map(json => {
                    return {
                        key: i++,
                        ca: json.Ca,
                        gio: json.Gio_Lam,
                        nhanvien: json.count_staff,
                        mt: json.Mo_Ta,
                        action: `
                            <a class="btn btn-secondary text-light" onclick="Ws.edit(${json.id})">Edit</a>
                            <a class="btn btn-warning text-dark" onclick="Ws.trash(${json.id})">Trash</a>
                        `
                    }
                });
            }
        },
        columns: [{
            data: "key"
        }, {
            data: "ca"
        }, {
            data: "gio"
        }, {
            data: "nhanvien"
        }, {
            data: "mt"
        }, {
            data: "action"
        }]
    });
};
<<<<<<< HEAD
Ws.drawTableTrash = function () {
=======

Ws.drawTableTrash = function() {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    Ws.tableTrash = $('#ws-table-trash').DataTable({
        processing: true,
        ajax: {
            url: '/work-shift/trash',
<<<<<<< HEAD
            dataSrc: function (jsons) {
=======
            dataSrc: function(jsons) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                let i = 1;
                return jsons.map(json => {
                    return {
                        key: i++,
                        ca: json.Ca,
                        gio: json.Gio_Lam,
                        mt: json.Mo_Ta,
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
            data: "key"
        }, {
            data: "ca"
        }, {
            data: "gio"
        }, {
            data: "mt"
        }, {
            data: "dlt"
        }, {
            data: "action"
        }]
    });
};
<<<<<<< HEAD
Ws.trash = function (id) {
=======

Ws.trash = function(id) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    if (confirm('Move this to Trash')) {
        $.ajax({
            url: `/work-shift/${id}`,
            method: "delete",
<<<<<<< HEAD
            success: function (msg) {
=======
            success: function(msg) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                Ws.success(msg);
                Ws.table.ajax.reload();
                Ws.tableTrash.ajax.reload();
            },
<<<<<<< HEAD
            error: function (errors) {
=======
            error: function(errors) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                Ws.errors(errors);
            }
        });
    }
}
<<<<<<< HEAD
Ws.edit = function (id) {
    $.get(`/work-shift/${id}`).done(function (Obj) {
=======


Ws.edit = function(id) {
    $.get(`/work-shift/${id}`).done(function(Obj) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
        $.each(Obj, (i, v) => {
            $(`#ws-modal [name=${i}]`).val(v);
        });
        $('#ws-modal #btn-save').data('id', Obj.id);
        Ws.openModal(1);
<<<<<<< HEAD
    }).fail(function (errors) {
        Ws.errors(errors);
    });
};
Ws.openModal = function (edit = null) {
=======
    }).fail(function(errors) {
        Ws.errors(errors);
    });
};

Ws.openModal = function(edit = null) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
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
<<<<<<< HEAD
Ws.create = function () {
    Ws.openModal();
}
Ws.undo = function (id) {
=======

Ws.create = function() {
    Ws.openModal();
}

Ws.undo = function(id) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    if (confirm("Undo this")) {
        $.ajax({
            url: `/work-shift/${id}/restore`,
            method: 'PUT',
<<<<<<< HEAD
            success: function (msg) {
=======
            success: function(msg) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                Ws.success(msg);
                Ws.tableTrash.ajax.reload();
                Ws.table.ajax.reload();
            },
<<<<<<< HEAD
            error: function (errors) {
=======
            error: function(errors) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                Ws.errors(errors);
            }
        });
    }
}
<<<<<<< HEAD
Ws.delete = function (id) {
=======

Ws.delete = function(id) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    if (confirm('Delete this')) {
        $.ajax({
            url: `/work-shift/${id}/delete`,
            method: 'delete',
<<<<<<< HEAD
            success: function (msg) {
                Ws.success(msg);
                Ws.tableTrash.ajax.reload();
            },
            error: function (errors) {
=======
            success: function(msg) {
                Ws.success(msg);
                Ws.tableTrash.ajax.reload();
            },
            error: function(errors) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                Ws.errors(errors);
            }
        });
    }
}
<<<<<<< HEAD
Ws.save = function (btn) {
=======

Ws.save = function(btn) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    let id = $(btn).data('id');
    let data = $(btn.form).serializeJSON();
    if (id) {
        if (confirm('Save change')) {
            $.ajax({
                url: `/work-shift/${id}`,
                method: 'PUT',
                data: data,
<<<<<<< HEAD
                success: function (Obj) {
=======
                success: function(Obj) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                    Ws.table.ajax.reload();
                    $('#ws-modal').modal("hide");
                    Ws.success("Update success!");
                },
<<<<<<< HEAD
                error: function (errors) {
=======
                error: function(errors) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
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
<<<<<<< HEAD
                success: function (data) {
=======
                success: function(data) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                    Ws.table.ajax.reload();
                    $('#ws-modal').modal("hide");
                    Ws.success("Create success");
                },
<<<<<<< HEAD
                error: function (errors) {
=======
                error: function(errors) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
                    Ws.errors(errors);
                }
            });
        }
    }
}
<<<<<<< HEAD
Ws.success = function (msg, status = "Success", icon = "success") {
=======

Ws.success = function(msg, status = "Success", icon = "success") {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    $.toast({
        heading: status,
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: icon
    });
}
<<<<<<< HEAD
Ws.errors = function (errors) {
=======

Ws.errors = function(errors) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    if (errors.status == 422) {
        let msg = errors.responseJSON.errors;
        $(`#ws-modal .field`).removeClass('is-invalid');
        $(`#ws-modal .field`).removeClass('is-valid');
        $(`#ws-modal .field`).addClass('is-valid');
        $('small.text').remove();
<<<<<<< HEAD
        $.each(msg, function (i, v) {
=======
        $.each(msg, function(i, v) {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
            $(`#ws-modal [name=${i}]`).addClass('is-invalid').after(`<small class="text text-danger mx-auto">${v}</small>`);
        });
    } else {
        $('#ws-modal').modal('hide');
        Ws.success("You are not authorized for this action", "Error", 'error');
    }
}
<<<<<<< HEAD
Ws.init = function () {
    Ws.drawTable();
    Ws.drawTableTrash();
};
$(document).ready(function () {
=======

Ws.init = function() {
    Ws.drawTable();
    Ws.drawTableTrash();
};

$(document).ready(function() {
>>>>>>> 0511514258332f8744685bce24807e7749639c16
    Ws.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
<<<<<<< HEAD
});
=======
});
>>>>>>> 0511514258332f8744685bce24807e7749639c16

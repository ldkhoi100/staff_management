var role = role || {};

role.showData = function () {
    $.ajax({
        url: '/role',
        method: 'GET',
        dataType: "json",
        success: function (data) {
            $('#dataDrawtable').empty();
            $.each(data, function (i, v) {
                $('#dataDrawtable').append(
                    `
                <tr>
                    <td>${v.name}</td>
                    <td>${v.description}</td>
                    <td>
                    <a href="javascript:;" onclick="role.getDetail(${v.id})"><i class="fa fa-edit"></i></a>
                    <a href="javascript:;" onclick="role.remove(${v.id})"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                `
                );
            });
            $('#data').DataTable();
        }
    });
};

role.RemoteTrash = function () {
    $.ajax({
        url: '/role/trash',
        method: 'GET',
        dataType: "json",
        success: function (data) {
            $('#dataDrawtable').empty();
            $.each(data, function (i, v) {
                $('#dataDrawtable').append(
                    `
                <tr>
                    <td>${v.name}</td>
                    <td>${v.description}</td>
                    <td>
                    <a href="javascript:;" onclick="role.undo(${v.id})"><i class="fas fa-trash-restore"></i></a>

                   <a href="javascript:;" onclick="role.delete(${v.id})"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                `
                );
            });

        }
    });
};

role.undo = function (id) {
    $.ajax({
        url: '/role/' + id + "/restore",
        method: 'PUT',
        success: function (data) {
            bootbox.alert("Khôi phục thành công");
            role.RemoteTrash();

        }
    });
};

role.getDetail = function (id) {
    $.ajax({
        url: '/role/' + id,
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            // console.log('dfghj');
            $('#name').val(data.name);
            $('#description').val(data.description);
            // role.setId(id)
            $('#Roles').val(id);
            $('#addRole').find('.modal-title').text('Update roles');
            $('.modal-footer').find('a').text('Update');
            $('#addRole').modal('show');
        }
    })
};

role.delete = function (id) {
    bootbox.confirm({
        title: "Loại bỏ Roles",
        message: "Bạn có muốn xóa không",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Không'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Có'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: '/role/' + id + '/delete',
                    method: "DELETE",
                    dataType: "json",
                    contentType: 'application/json',
                    success: function (data) {
                        bootbox.alert("Xóa thành công");
                        role.RemoteTrash();
                    }
                });
            }
        }
    });
};

role.remove = function (id) {
    bootbox.confirm({
        title: "Loại bỏ Roles",
        message: "Bạn có muốn xóa không",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Không'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Có'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: '/role/' + id,
                    method: "DELETE",
                    dataType: "json",
                    contentType: 'application/json',
                    success: function (data) {
                        bootbox.alert("Xóa thành công");
                        role.showData();
                    }
                });
            }
        }
    });
};


role.resetForm = function () {
    $('#name').val("");
    $('#description').val("");
    $('#Roles').val("0");
    $('#addRole').find('.modal-title').text('Update roles');
    $('.modal-footer').find('a').text('Create');
    var form = $('#addeditRoles').validate();
    form.resetForm();

};

role.showModal = function () {
    role.resetForm();
    $('#addRole').modal('show')
};

role.save = function () {
    //create
    if ($('#addeditRoles').valid()) {

        if ($('#Roles').val() == 0) {
            // console.log("dsadsadsa");
            var ojjAdd = {};
            ojjAdd.name = $('#name').val();
            ojjAdd.description = $('#description').val();
            // console.log("dsadsadsadsdsa111");
            $.ajax({
                url: '/role',
                method: "Post",
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(ojjAdd),
                success: function (data) {
                    bootbox.alert("Tạo mới thành công");
                    role.showData();
                    $('#addRole').modal('hide');

                },
                error: function (errors) {
                    console.log(errors);
                    role.errors(errors.responseJSON.errors);

                }

            });
        }
        // update
        else {
            var objectEdit = {};

            objectEdit.name = $('#name').val();
            objectEdit.description = $('#description').val();
            objectEdit.id = $('#Roles').val();
            $.ajax({
                url: '/role/' + objectEdit.id,
                method: 'PUT',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(objectEdit),
                success: function (data) {
                    bootbox.alert("Chỉnh sửa thành công");
                    role.showData();
                    $('#addRole').modal('hide');
                    // console.log('fdhg');

                },
                error: function (errors) {
                    role.errors(errors.responseJSON.errors);
                }
            })
        }

    }
};

role.errors = function (msg) {
    console.log(msg);
    $(`#addRole input`).each(function () {
        $(this).addClass('is-valid');
    });
    $('small.badge').each(function () {
        console.log(this);
        $(this).remove();
    });
    $.each(msg, function (i, v) {
        $(`#addRole input[name=${i}]`).addClass('is-invalid').before(`<small class="badge badge-danger mx-auto">${v}</small>`);
    });
};

role.resetForm = function () {
    $('#name').val("");
    $('#description').val("");
    $('#addRole').find('.modal-title').text('Create new Role')
};

role.init = function () {
    role.RemoteTrash();
    role.showData();

};

$(document).ready(function () {
    role.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

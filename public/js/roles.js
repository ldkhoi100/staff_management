let Role = {} || Role;
Role.RenderData = function () {
    $.get('/role').done(function (data) {
        $('.table-responsive').html(data);
        $("#data-table").DataTable();
    });
};

Role.Create = function () {
    $.get('/role/create').done(function (data) {
        $('.crud-role').html(data).find('.modal').modal('show');
    });
};

Role.Edit = function (btn) {
    let url = $(btn).data('url');
    $.get(url).done(function (data) {
        $('.crud-role').html(data).find('.modal').modal('show');
    });
};


Role.Delete = function (btn) {
    let url = $(btn).data('url');
    if (confirm('Bạn có muốn xóa')) {
        $.ajax({
            url: url,
            method: 'delete'
        }).done(function (data) {
            Role.Noti(data);
        });
    }
};

    Role.Store = function (btn) {
        // e.preventDefault();
        let data = $(btn.form).serialize();
        $.post('/role', data).done(function (data) {
            if (data) {
                $.each(data, function (k, v) {
                    Role.Errors(k, v);
                });
            } else {
                Role.Noti('Create success');
            }
        });
    };

    Role.Update = function (btn) {
        let url = $(btn).data('url');
        let data = $(btn.form).serialize();
        $.ajax({
            url: url,
            method: 'put',
            data: data
        }).done(function (data) {
            if (data) {
                $.each(data, function (k, v) {
                    Role.Errors(k, v);
                });
            } else {
                Role.Noti('Update Success');
            }
        });
    };

    Role.Noti = function (msg) {
        Role.RenderData();
        $('.modal').modal('hide');
        $('.container-fluid').prepend($('<div>').addClass('alert alert-success').text(msg));
        setTimeout(function () {
            $('.alert').remove();
        }, 5000);
    };
    Role.Errors = function (k, v) {
        $(`input[name=${k}]`).addClass('is-invalid').data('content', v[0]).data('placement', 'top').data('toggle', 'popover').popover("show");
        $('.crud-fator-salary').change(function () {
            $('.is-invalid').removeClass('is-invalid').removeData('placement').removeData('toggle').removeData('content');
        });
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        Role.RenderData();
        $('.btn-create').click(function () {
            Role.Create();
        });
    });

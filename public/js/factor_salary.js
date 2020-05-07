let FS = {} || FS;

FS.id = '';

FS.RenderData = function () {
    $.get('/factor-salary').done(function (data) {
        $('.render-data').html(data);
        $('.btn-edit').click(function () {
            FS.Edit(this);
        });

        $('.btn-trash').click(function () {
            confirm('Confirm Delete') ? FS.Delete(this) : '';
        });

        $('.btn-show').click(function () {
            FS.Show(this);
        });
    });
}

FS.setId = function (id) {
    return this.id = id;
}

FS.getId = function () {
    return this.id;
};

FS.Create = function () {
    $.get('/factor-salary/create').done(function (data) {
        let modal = $('.modal-fator-salary').html(data).find('.modal').modal('show');
        modal.find('.btn-store').click(function (e) {
            e.preventDefault();
            confirm('Confirm save data') ? FS.Store(this) : '';
        });
    });
}

FS.Edit = function (btn) {
    let id = $(btn).parent().find('.id').val();
    id = FS.setId(id);
    let url = `/factor-salary/${id}/edit`;
    $.get(url).done(function (data) {
        let modal = $('.modal-fator-salary').html(data).find('.modal').modal('show');
        modal.find('.btn-update').click(function (e) {
            e.preventDefault();
            confirm('Confirm Update') ? FS.Update(this) : '';
        });
    });
}

// FS.Show = function (btn) {
//     let url = $(btn).data('url');
//     $.get(url).done(function (data) {
//         $('.modal-fator-salary').html(data).find('.modal').modal('show');
//     });
// }

FS.Delete = function (btn) {
    let id = $(btn).parent().find('.id').val();
    let url = `/factor-salary/${id}`;
    $.ajax({
        url: url,
        method: 'delete'
    }).done(function (data) {
        FS.Noti(data);
    });
}

FS.Store = function (btn) {
    let data = $(btn.form).serialize();
    $.post('/factor-salary', data).done(function (data) {
        if (data) {
            $.each(data, function (k, v) {
                FS.Errors(k, v);
            });
        } else {
            FS.Noti('Create success');
        }
    });
}

FS.Update = function (btn) {
    let id = FS.getId();
    let url = `/factor-salary/${id}`;
    let data = $(btn.form).serialize();
    $.ajax({
        url: url,
        method: 'put',
        data: data
    }).done(function (data) {
        if (data) {
            $.each(data, function (k, v) {
                FS.Errors(k, v);
            });
        } else {
            FS.Noti('Update Success');
        }
    });
}

FS.Noti = function (msg) {
    FS.RenderData();
    $('.modal').modal('hide');
    $.toast({
        heading: 'Success',
        text: msg,
        hideAfter: 5000,
        position: 'bottom-right',
        showHideTransition: 'slide',
        icon: 'success'
    })
}

FS.Errors = function (k, v) {
    $(`input[name=${k}]`).addClass('is-invalid').data('content', v[0]).data('placement', 'top').data('toggle', 'popover').popover("show");
    $('.modal-fator-salary').change(function () {
        $('.is-invalid').removeClass('is-invalid').removeData('placement').removeData('toggle').removeData('content');
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    FS.RenderData();
    $('.btn-create').click(function () {
        FS.Create();
    });
});

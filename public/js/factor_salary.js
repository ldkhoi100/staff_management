let FS = {} || FS;

FS.RenderData = function () {
    $.get('/factor-salary').done(function (data) {
        $('.render-data').html(data);
    });
}

FS.Create = function () {
    $.get('/factor-salary/create').done(function (data) {
        $('.crud-fator-salary').html(data).find('.modal').modal('show');
    });
}

FS.Edit = function (btn) {
    let url = $(btn).data('url');
    $.get(url).done(function (data) {
        $('.crud-fator-salary').html(data).find('.modal').modal('show');
    });
}

// FS.Show = function (btn) {
//     let url = $(btn).data('url');
//     $.get(url).done(function (data) {
//         $('.crud-fator-salary').html(data).find('.modal').modal('show');
//     });
// }

FS.Delete = function (btn) {
    let url = $(btn).data('url');
    $.ajax({
        url: url,
        method: 'delete'
    }).done(function (data) {
        FS.Noti(data);
    });
}

FS.Store = function (form) {
    let data = $(form).serialize();
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
    let url = $(btn).data('url');
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
    $('.modal').modal('hide')
    $('.container').prepend($('<div>').addClass('alert alert-success').text(msg));
    setTimeout(function () {
        $('.alert').remove();
    }, 5000);
}

FS.Errors = function (k, v) {
    $(`input[name=${k}]`).addClass('is-invalid').data('content', v[0]).data('placement', 'top').data('toggle', 'popover').popover("show");
    $('.crud-fator-salary').change(function () {
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
});

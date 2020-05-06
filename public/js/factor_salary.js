$(document).ready(function () {
    $('.btn-create').click(function () {
        let url = $(this).data('url');

        $('.modal-body').load(url, function () {
            $('.btn-submit').click(function (e) {
                e.preventDefault();
                let url = $(this).data('url');
                let data = $(this).parent('form').serialize();

                $.post(url, data).done(function (data) {
                    if (!data) {
                        $('.modal').modal('hide');
                        loadTable();
                    } else {
                        $.each(data, function (k, v) {
                            $(`input[name=${k}]`).addClass('is-invalid');
                            $(`input[name=${k}]`).parent('div').find('small').attr('class', 'alert alert-warning p-0').html(v);
                        });
                    }
                });
            });
        });

        $('.modal').modal('show');
    });

    $('.allfs').load('/factor-salary/index', function () {
        $('.btn-show').click(function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            $.get(url, function (data) {

            });
        });

        $('.btn-edit').click(function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            $('.modal-body').load(url, function () {

                $('.btn-submit').click(function (e) {
                    e.preventDefault();
                    let url = $(this).data('url');
                    let data = $(this).parent('form');
                    $.ajax({
                            url: url,
                            method: 'patch',
                            data: {
                                "_token": data.find('input[name=_token]').val(),
                                "Bac_Luong": data.find('input[name=Bac_Luong]').val()
                            }
                        })
                        .done(function (data) {
                            if (data) {
                                $.each(data, function (k, v) {
                                    $(`input[name=${k}]`).addClass('is-invalid');
                                    $(`input[name=${k}]`).parent('div').find('small').attr('class', 'alert alert-warning p-0').html(v);
                                });
                            } else {
                                $('.modal').modal('hide');
                                loadTable();
                            }
                        });
                });
            });

            $('.modal').modal('show');

        });

    });
});

function loadTable() {
    $('.allfs').load('/factor-salary/index', function () {
        $('.btn-show').click(function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            $.get(url, function (data) {

            });
        });

        $('.btn-edit').click(function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            $('.modal-body').load(url);
            $('.modal').modal('show');
        });

    });
}

let Ts = {} || Ts;

Ts.listCustomer = function () {
    $('#bang-chamcong').DataTable({
        ajax: {
            url: '/timesheets/all',
            dataSrc: function (jsons) {
                let i = 0;
                return jsons.map(obj => {
                    return {
                        no: ++i,
                        col1: obj.MaNV,
                        col2: obj.Ca_Lam,
                        col3: `<input type="checkbox" disabled class="holiday">`,
                        col4: `<input type="checkbox">`,
                        col5: `<input type="button" class="btn btn-success" value="Description" onclick="Ts.description(${obj.id})">`,
                    };
                });
            }
        },
        columns: [{
            data: 'no'
        }, {
            data: 'col1'
        }, {
            data: 'col2'
        }, {
            data: 'col3'
        }, {
            data: 'col4'
        }, {
            data: 'col5'
        }]
    });
};

Ts.base = function () {
    $.ajax({
        url: '/base-salary/all',
        method: 'get',
        success: function (data) {
            data.forEach(bs => {
                $('select').append(`<option value="${bs.id}">${bs.Tien_Luong}</option>`);
            });
        }
    });
}

Ts.description = function(id){
    // $.ajax({
    //     url: `/timesheets/${id}`,
    //     method: 'get',
    //     success: function(){}
    // });
    $('#them-mota').modal('show');
    $('#luu-them-mota').data('id', id).bind('click', function(){
        $.ajax({
            url: `timesheets/${id}/`,
            method: 'put',
            data: {
                'Ngay_Hien_Tai': $("#current-day").val(),
                'Mo_Ta': $("#mota-chitiet").val()
            },
            success: function(){
                alert('success');
            }
        });
    });
}

Ts.init = function () {
    Ts.listCustomer();
    Ts.base();
};

$(document).ready(function () {
    Ts.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

let Ts = {} || Ts;
Ts.table;
Ts.listCustomer = function (url = $('#current-day').val()) {
    Ts.table = $('#bang-chamcong').DataTable({
        ajax: {
            url: `/timesheets/${url}/get`,
            dataSrc: function (jsons) {
                let i = 0;
                return jsons.map(obj => {
                    return {
                        no: ++i,
                        col1: obj.NV,
                        col2: obj.Ca,
                        col3: `
                        <select class="form-control salary" onchange="Ts.updateSalary(${obj.id},this.value)">
                            <option value="100" ${obj.Luong==100?'selected':''}>100%</option>
                            <option value="90" ${obj.Luong==90?'selected':''}>90%</option>
                            <option value="80" ${obj.Luong==80?'selected':''}>80%</option>
                            <option value="70" ${obj.Luong==70?'selected':''}>70%</option>
                            <option value="60" ${obj.Luong==60?'selected':''}>60%</option>
                            <option value="50" ${obj.Luong==50?'selected':''}>50%</option>
                            <option value="40" ${obj.Luong==40?'selected':''}>40%</option>
                            <option value="30" ${obj.Luong==30?'selected':''}>30%</option>
                            <option value="20" ${obj.Luong==20?'selected':''}>20%</option>
                            <option value="10" ${obj.Luong==10?'selected':''}>10%</option>
                            <option value="0" ${obj.Luong==0?'selected':''}>0%</option>
                        </select>
                        `,
                        col4: `<input type="button" class="btn btn-success" value="Description" onclick="Ts.description(${obj.id})">`,
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
        }]
    });
    $.ajax({
        url: `/timesheets/${url}/get`,
        method: 'get',
        success: function (data) {
            if (data) {
                let obj = data[0];
                $(`#baseSalary>option[value=${obj.LuongCB}]`).attr('selected',"");
                if (obj.Ngay_Le) {
                    $('#holiday').attr('checked', "");
                }
            }
        }
    });
};

Ts.base = function () {
    $.ajax({
        url: '/base-salary/all',
        method: 'get',
        success: function (data) {
            data.forEach(bs => {
                $('#baseSalary').append(`<option value="${bs.id}">${bs.Tien_Luong}</option>`);
            });
        }
    });
}

Ts.updateBaseSalary = function (base) {
    let day = $('#current-day').val();
    $.ajax({
        url: `/timesheets/${base}/${day}/basesalary`,
        method: 'put',
        success: function () {
            // alert('thành công');
        }
    });
}

Ts.description = function (id) {
    $.ajax({
        url: `/timesheets/${id}`,
        method: 'get',
        success: function(obj){
            $("#mota-chitiet").val(obj.Ghi_Chu);
            $('#them-mota').modal('show');
            $('#luu-them-mota').unbind('click').bind('click', function () {
                $.ajax({
                    url: `timesheets/${obj.id}/`,
                    method: 'put',
                    data: {
                        'Ghi_Chu': $("#mota-chitiet").val()
                    },
                    success: function () {
                        $('#them-mota').modal('hide');
                    }
                });
            });
        }
    });

}

Ts.holiday = function () {
    $('#holiday').click(function () {
        console.log($(this).prop('checked'));
        if (!$(this).prop('checked')) {
            $(':checkbox.holiday').removeAttr('checked');
            Ts.updateHoliday(0);
        } else {
            $(':checkbox.holiday').attr('checked', 'checked');
            Ts.updateHoliday(1);
        }
    });
}

Ts.updateHoliday = function (status) {
    let day = $('#current-day').val();
    $.ajax({
        url: `/timesheets/${status}/${day}/holiday`,
        method: 'put',
        success: function () {
            // alert('thành công');
        }
    });
};

Ts.updateSalary = function (id, value) {
    $.ajax({
        url: `/timesheets/${id}`,
        method: 'put',
        data: {
            'Luong': value
        },
        success: function () {
            console.log('Wow gâu gâu');
        }
    });
}

Ts.day = function () {
    $('#current-day').change(function () {
        Ts.table.destroy();
        let day = $(this).val();
        Ts.listCustomer(day);
    });
}

Ts.init = function () {
    Ts.base();
    Ts.listCustomer();
    Ts.day();
    Ts.holiday();
};

$(document).ready(function () {
    Ts.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

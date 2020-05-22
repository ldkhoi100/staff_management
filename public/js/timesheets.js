let Ts = {} || Ts;

Ts.table;
Ts.listCustomer = function(url = $('#current-day').val()) {
    $.ajax({
        url: `/timesheets/${url}/get`,
        method: 'get',
        success: function(data) {
            if (data) {
                let obj = data[0];
                $(`#baseSalary>option[value=${obj.LuongCB}]`).attr('selected', "");
                if (obj.Ngay_Le) {
                    $('#holiday').attr('checked', "");
                }
            }
        }
    });

    Ts.table = $('#bang-chamcong').DataTable({
        ajax: {
            url: `/timesheets/${url}/get`,
            dataSrc: function(jsons) {
                let i = 0;
                return jsons.map(obj => {
                    return {
                        no: ++i,
                        col1: "Id: NV" + obj.id + "<br>" + obj.NV,
                        col6: obj.CV,
                        col2: obj.Ca,
                        col5: ` <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="sabbatical${obj.id}" onclick="Ts.sabbatical(${obj.id})" ${obj.Nghi_Phep ? 'checked' : ''}>
                                <label class="custom-control-label" for="sabbatical${obj.id}"></label>
                                </div>
                                `,
                        col3: `
                        <select class="form-control salary" onchange="Ts.updateSalary(${obj.id},this.value)">
                            <option value="50"  ${obj.Luong==150?'selected':''}>150%</option>
                            <option value="40"  ${obj.Luong==140?'selected':''}>140%</option>
                            <option value="30"  ${obj.Luong==130?'selected':''}>130%</option>
                            <option value="20"  ${obj.Luong==120?'selected':''}>120%</option>
                            <option value="10"  ${obj.Luong==110?'selected':''}>110%</option>
                            <option value="100" ${obj.Luong==100?'selected':''}>100%</option>
                            <option value="90"  ${obj.Luong==90?'selected':''}>90%</option>
                            <option value="80"  ${obj.Luong==80?'selected':''}>80%</option>
                            <option value="70"  ${obj.Luong==70?'selected':''}>70%</option>
                            <option value="60"  ${obj.Luong==60?'selected':''}>60%</option>
                            <option value="50"  ${obj.Luong==50?'selected':''}>50%</option>
                            <option value="40"  ${obj.Luong==40?'selected':''}>40%</option>
                            <option value="30"  ${obj.Luong==30?'selected':''}>30%</option>
                            <option value="20"  ${obj.Luong==20?'selected':''}>20%</option>
                            <option value="10"  ${obj.Luong==10?'selected':''}>10%</option>
                            <option value="0"   ${obj.Luong==0?' selected':''}>0%</option>
                        </select>
                        `,
                        col4: `<input type="button" class="btn btn-success" value="Description" onclick="Ts.description(${obj.id})"> ${obj.Ghi_Chu ? '<i class="fas fa-check"></i>' : '<i class="far fa-calendar-times"></i>'}`,
                    };
                });
            }
        },
        columns: [{
            data: 'no'
        }, {
            data: 'col1'
        }, {
            data: 'col6'
        }, {
            data: 'col2'
        }, {
            data: 'col5'
        }, {
            data: 'col3'
        }, {
            data: 'col4'
        }]
    });
};

Ts.base = function() {
    $.ajax({
        url: '/base-salary/all',
        method: 'get',
        success: function(data) {
            data.forEach(bs => {
                $('#baseSalary').append(`<option value="${bs.id}">${bs.Tien_Luong}</option>`);
            });
        }
    });
};

Ts.updateBaseSalary = function(base) {
    let day = $('#current-day').val();
    $.ajax({
        url: `/timesheets/${base}/${day}/basesalary`,
        method: 'put',
        success: function() {
            toastr.success(`Updated Base Salary !`);
        }
    });
};

Ts.description = function(id) {
    $.ajax({
        url: `/timesheets/${id}`,
        method: 'get',
        success: function(obj) {
            $("#mota-chitiet").val(obj.Ghi_Chu);
            $('#them-mota').modal('show');
            $('#luu-them-mota').unbind('click').bind('click', function() {
                $.ajax({
                    url: `timesheets/${obj.id}/`,
                    method: 'put',
                    data: {
                        'Ghi_Chu': $("#mota-chitiet").val()
                    },
                    success: function() {
                        if ($("#mota-chitiet").val() != null) {
                            toastr.success(`Updated Description !`);
                        }
                        $('#them-mota').modal('hide');
                        Ts.table.ajax.reload(null, false);
                    }
                });
            });
        }
    });
};

Ts.sabbatical = function(id) {
    if (!$(`:checkbox#sabbatical${id}`).prop('checked')) {
        Ts.updateSabbatical(0, id);
        Ts.updateSalary(id, 100);
        Ts.table.ajax.reload(null, false);
        toastr.success(`Updated Sabbatical of this staff to NO !`);
    } else {
        Ts.updateSabbatical(1, id);
        Ts.updateSalary(id, 0);
        Ts.table.ajax.reload(null, false);
        toastr.success(`Updated Sabbatical of this staff to YES !`);
    }
};

Ts.updateSabbatical = function(id, status) {
    $.ajax({
        url: `/timesheets/${status}/${id}/sabbatical`,
        method: 'put',
        success: function() {
            // console.log('Wow gâu gâu');
        }
    });
};

Ts.holiday = function() {
    $('#holiday').click(function() {
        if (!$(this).prop('checked')) {
            Ts.updateHoliday(0);
            toastr.success(`Updated Holiday to NO !`);
        } else {
            Ts.updateHoliday(1);
            toastr.warning(`Updated Holiday to YES !`);
        }
    });
};

Ts.updateHoliday = function(status) {
    let day = $('#current-day').val();
    $.ajax({
        url: `/timesheets/${status}/${day}/holiday`,
        method: 'put',
        success: function() {
            // alert('thành công');
        }
    });
};

Ts.updateSalary = function(id, value) {
    $.ajax({
        url: `/timesheets/${id}`,
        method: 'put',
        data: {
            'Luong': value
        },
        success: function() {
            // console.log('Wow gâu gâu');
        }
    });
}

Ts.day = function() {
    $('#current-day').change(function() {
        Ts.table.destroy();
        let day = $(this).val();
        Ts.listCustomer(day);
    });
}

Ts.init = function() {
    Ts.base();
    Ts.listCustomer();
    Ts.day();
    Ts.holiday();
};

$(document).ready(function() {
    Ts.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
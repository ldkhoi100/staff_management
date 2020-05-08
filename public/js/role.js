var role = role || {};

role.drawData = function (){
    $.ajax({
        method: 'GET',
        url: "/role",
        success: function(data) {
            $('.table-responsive').html(data);
            // console.log(data);
            // $.each(data, function (index, value) {
            //
            //     $("#reload_table").append(
            //         `
            //      <tr>
            //           <td>${value.id}</td>
            //           <td>${value.name}</td>
            //           <td>${value.description}</td>
            //       </tr>
            //
            //     `
            //     );
            // });
            $("#data-table").DataTable();
        },
    });
};

role.store = function (){
    var objdata = {};
    objdata.name = $("#name").val();
    objdata.description = $("#description").val();
    $.ajax({
        url: "/role",
        method:'POST',
        data: JSON.stringify(objdata),
        success: function(data) {
            role.drawData();
        },
    });
};

role.init = function (){
    role.drawData();
};

$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    role.init();
});

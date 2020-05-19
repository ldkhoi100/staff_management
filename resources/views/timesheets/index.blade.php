<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js">
    </script>
    <title>Document</title>
</head>

<body>
    <table id="bang-chamcong" class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Họ Tên</th>
                <th>Ca Làm</th>
                <th>Ngày Lễ</th>
                <th>Trừ Lương(1/2)</th>
                <th>Ghi Chú</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>
{{-- <script src="js/work_shift.js"></script> --}}
<script>
    let Ts = {} || Ts;

    Ts.listCustomer = function(){
        $('#bang-chamcong').DataTable({
            ajax: {
                url: '/timesheets/all',
                dataSrc: function(jsons){
                    return jsons.map(obj=>{
                        return {
                            no: obj,
                            no: obj,
                            no: obj,
                            no: obj,
                            no: obj,
                            no: obj,
                            no: obj,
                            no: obj,
                        };
                    });
                }
            },
            columns: [{
                data: 'no'
                },{
                    data:
            }]
        });
    };

    Ts.init = function(){

    }

    $(document).ready(function(){
        Ts.init();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

</html>
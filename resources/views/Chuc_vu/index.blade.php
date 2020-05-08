<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
       <button type="button" class="btn btn-primary btn-create" data-url='{{ route('chucvu.create') }}'>
           Create
         </button>
       <a href="" class="btn btn-danger">Thùng rác</a>
   </p>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
     <div class="col-sm-12">@include('partials.message')</div>

       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                   style="font-size: 14.5px;">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Ten_CV</th>
                           <th>Cong_Viec</th>
                           <th>Thời gian nhập</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                           <th>ID</th>
                           <th>Ten_CV</th>
                           <th>Cong_Viec</th>
                           <th>Thời gian nhập</th>
                       </tr>
                   </tfoot>
                   <tbody class="data-table"  >

                       @include('Chuc_vu.dataTable')

                   </tbody>
               </table>
           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->
<!--add modal -->
<!-- Button to Open the Modal -->


 <!-- Modal -->

<div class="crud-chucvu"></div>




</body>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(document).ready(function() {

        $('.data-table').load('/chucvu');

        $('.btn-create').click(function(e){
            e.preventDefault();
            let data = $(this.form).serialize();
            let url = $(this).data('url');
            $.get(url).done(function(data){
                $('.crud-chucvu').html(data).find('.modal').modal('show');
                $('.btn-save-data').click(function(e){
                    e.preventDefault();
                    let data = $(this.form).serialize();
                    let url = $(this).data('url');
                    $.post(url,data).done(function(){
                        // if(data){
                            $('.modal').modal('hide');
                        // }
                    });
                });
            });
        });


        // $('#addform').on('submit' , function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "POST",
        //         url: "/chucvu/create",
        //         data: $('#addform').serialize(),
        //         success: function () {
        //             $('#chucvu').modal('hide');
        //             $('.data-table').load('/chucvu');
        //             alert('Tạo thành công');
        //         },
        //     });
        // });
    });

 </script>
</html>


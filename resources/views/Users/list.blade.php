@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')

@include('users.modal.showModal')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <button onclick="user.selectRole()">role</button>
        <button class="btn btn-success" onclick="user.modalCreate()">Create user</button>
        <a href="{{ route('users.trash') }}" class="btn btn-danger" style="float: right">Trash</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manager user</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body" id="reload_table">
            @include('users.ajax.list')
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection


@push('CRUD')

<<<<<<< HEAD
<script src="js/users/CRUDE.js"></script>
=======
<<<<<<< HEAD
<script>
    //Block user
    function block(id){
        var conf = confirm("Do you want block this user?");
        $.ajax({
            url : 'users/block/'+id,
            type : 'get'
        }).done(function(res){
            if(conf){
                $("#reload_table").html(res);
                toastr.success("Update coupons success");
            }
        });
    }
</script>

<script>
    $(document).ready(function() {

        //Modal edit user
        $('.editUser').click(function(){
            var url = $(this).data('url');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    $(".print-success-msg").css('display','none');
                    $(".print-error-msg").css('display','none');
                    $('#editUser').find('#id').val(response.id);
                    $('#editUser').find('#username').val(response.username);
                    $('#editUser').find('#email').val(response.email);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //
                }
            });
        });

        //Edit user
        $(".btn-edit").click(function(e){
            e.preventDefault();

            var id = $("input[name='id']").val();
            var username = $("input[name='username-edit']").val();
            var email = $("input[name='email-edit']").val();
            var _token = $("meta[name=token]").attr('content');
            $.ajax({
                url: "/users/"+id,
                type:'PUT',
                data: {_token:_token, username:username, email:email},
                success: function(data) {
                if($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display','none');
                    $(".print-success-msg").css('display','block');
                    $(".print-success-msg").html(data.success);
                }else {
                        $(".print-success-msg").css('display','none');
                        printErrorMsg(data.error);
                    }
                }
            });

            $.ajax({
                url: "/usersAjax",
                type:'GET',
            }).done(function(res) {
                $("#reload_table").html(res);

                $('.editUser').click(function(){
                    var url = $(this).data('url');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(response) {
                            $(".print-success-msg").css('display','none');
                            $(".print-error-msg").css('display','none');
                            $('#editUser').find('#id').val(response.id);
                            $('#editUser').find('#username').val(response.username);
                            $('#editUser').find('#email').val(response.email);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //
                        }
                    });
                });
            });
        });

        //Create user
        $(".btn-create").click(function(e){
            e.preventDefault();

            var username = $("input[name='username-create']").val();
            var email = $("input[name='email-create']").val();
            var password = $("input[name='password-create']").val();
            var password_confirmation = $("input[name='password_confirmation-create']").val();
            var _token = $("meta[name=token]").attr('content');
            $.ajax({
                url: "/users",
                type:'POST',
                data: {_token: _token, username:username, email:email, password:password, password_confirmation:password_confirmation},
                success: function(data) {
                if($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display','none');
                    $(".print-success-msg").css('display','block');
                    $(".print-success-msg").html(data.success);
                } else {
                        $(".print-success-msg").css('display','none');
                        printErrorMsg(data.error);
                    }
                }
            });

            $.ajax({
                url: "/usersAjax",
                type:'GET',
            }).done(function(res) {
                $("#reload_table").html(res);

                $('.editUser').click(function(){
                    var url = $(this).data('url');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(response) {
                            $(".print-success-msg").css('display','none');
                            $(".print-error-msg").css('display','none');
                            $('#editUser').find('#id').val(response.id);
                            $('#editUser').find('#username').val(response.username);
                            $('#editUser').find('#email').val(response.email);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //
                        }
                    });
                });
            });
        });
    });

    function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

</script>
=======
<script src="js/users/crud.js"></script>
>>>>>>> 5da86670d875b43805bca95e1d1bf0a1c894c7e4
>>>>>>> e1ebe3fbb539c89df2361243889e2550204dc433

@endpush

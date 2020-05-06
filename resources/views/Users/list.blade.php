@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')

@include('users.modal.create')
@include('users.modal.edit')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <button class="btn btn-success show-modal-create">Create user</button>
        <a href="{{ route('users.trash') }}" class="btn btn-danger" style="float: right">Trash</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manager user</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Block</th>
                            <th>Verified Mail</th>
                            <th>Created at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Block</th>
                            <th>Verified Mail</th>
                            <th>Created at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody id="reload_table">

                        @include('users.ajax.list')

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection


@push('CRUD')

<script>
    //Block user
    function block(id){
        var conf = confirm("Do you want change block column this user?");
        $.ajax({
            url : 'users/block/'+id,
            type : 'get' 
        }).done(function(res){
            if(conf){
                $("#reload_table").html(res);
                toastr.success("Changed column block of this user!");

                $('.editUser').click(function(){
                    var url = $(this).data('url');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(response) {
                            $(".print-success-msg").css('display','none');
                            $(".print-error-msg").css('display','none');
                            $('.edit_modal').removeClass('is-invalid').removeClass('is-valid');
                            $('#editUser').find('#id').val(response.id);
                            $('#editUser').find('#username').val(response.username);
                            $('#editUser').find('#email').val(response.email);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //
                        }
                    });
                });
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
                    toastr.success("Updated this user!");
                    $("#editUser").modal("hide");
                    $('.edit_modal').removeClass('is-invalid').removeClass('is-valid');
                }else {
                        $(".print-success-msg").css('display','none');
                        printErrorMsgEdit(data.error, '-edit');
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
                            $('.edit_modal').removeClass('is-invalid').removeClass('is-valid');
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

        //Show modal create
        $(".show-modal-create").click(function(e){
            $("#createUser").modal("show");
            $('.create_modal').removeClass('is-invalid').removeClass('is-valid');
            $(".print-error-msg").css('display', 'none');
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
                    toastr.success("Created new user!");
                    $("#createUser").modal("hide");
                    $(".reset_form").click();
                    $('.create_modal').removeClass('is-invalid').removeClass('is-valid');
                } else {
                        $(".print-success-msg").css('display','none');
                        printErrorMsgCreate(data.error,'-create');
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

    function printErrorMsgCreate (msg, text) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $('.create_modal').removeClass('is-invalid').addClass('is-valid');
        $(".passwordConfirm").removeClass('is-valid');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            $(`input[name=${key}${text}]`).addClass('is-invalid');
        });
    }

    function printErrorMsgEdit (msg, text) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $('.edit_modal').removeClass('is-invalid').addClass('is-valid');
        $(".passwordConfirm").removeClass('is-valid');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            $(`input[name=${key}${text}]`).addClass('is-invalid');
        });
    }
    

</script>

@endpush
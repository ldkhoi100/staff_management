@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')

@include('edit')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <button href="{{ route('users.create') }}" class="btn btn-success" data-toggle="modal"
            data-target="#createModal">Create user</button>
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
                    <tbody>

                        @foreach ($users as $key => $user)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                {{ $role->name }}
                                @endforeach
                            </td>

                            @if($user->block == 1)
                            <td><a href="" style="color:#32CD32; font-weight: bold;"
                                    onclick="return confirm('Do you want removed block this user?')">Yes</a>
                            </td>
                            @else
                            <td><a href="" style="color:red; font-weight: bold;"
                                    onclick="return confirm('Do you want block this user?')">No</a>
                            </td>
                            @endif

                            <td>
                                @if(!empty($user->email_verified_at))
                                {{ date("d-m-y H:i:s", strtotime($user->email_verified_at)) }}
                                @endif</td>

                            <td>{{ date("d-m-y H:i:s", strtotime($user->created_at)) }}</td>

                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>

                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="my-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete user {{$user->name}} ?')"
                                        class="btn btn-danger btn-sm" id="btn-submit" style="border: none"><i
                                            class="fa fa-backspace"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Create user
    $(document).ready(function() {

        $('.showUser').click(function(){
            var url = $(this).data('url');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    $('h4#username').html(response.data.username)
                    $('span#email').html("Email: " + response.data.email)
                    $('span#created_at').html("Created at: " + response.data.created_at)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //
                }
            })
        });

        $('.editUser').click(function(){
            var url = $(this).data('url');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    $(".print-success-msg-edit").css('display','none');
                    $(".print-error-msg-edit").css('display','none');
                    $('#editUser').find('#id').val(response.id);
                    $('#editUser').find('#username').val(response.username);
                    $('#editUser').find('#email').val(response.email);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //
                }
            });
        });

        $(".btn-edit").click(function(e){
            e.preventDefault();

            var id = $("input[name='id']").val();
            var username = $("input[name='username-edit']").val();
            var email = $("input[name='email-edit']").val();
            $.ajax({
                url: "/test/"+id,
                type:'PUT',
                data: {username:username, email:email},
                success: function(data) {
                if($.isEmptyObject(data.error)) {
                    $(".print-error-msg-edit").css('display','none');
                    $(".print-success-msg-edit").css('display','block');
                    $(".print-success-msg-edit").html(data.success);
                }else {
                        $(".print-success-msg-edit").css('display','none');
                        printErrorMsg(data.error);
                    }
                }
            });
            $.ajax({
                url: "/test2",
                type:'GET',
            }).done(function(res) {
                $("#tableuser").html(res);
                $('.showUser').click(function(){
                    var url = $(this).data('url');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(response) {
                            $('h4#username').html(response.data.username)
                            $('span#email').html("Email: " + response.data.email)
                            $('span#created_at').html("Created at: " + response.data.created_at)
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //
                        }
                    });
                });

                $('.editUser').click(function(){
                    var url = $(this).data('url');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(response) {
                            $(".print-success-msg-edit").css('display','none');
                            $(".print-error-msg-edit").css('display','none');
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

        $(".btn-create").click(function(e){
            e.preventDefault();

            var username = $("input[name='username-create']").val();
            var email = $("input[name='email-create']").val();
            var password = $("input[name='password-create']").val();
            var password_confirmation = $("input[name='password_confirmation-create']").val();
            $.ajax({
                url: "/test",
                type:'POST',
                data: {username:username, email:email, password:password, password_confirmation:password_confirmation},
                success: function(data) {
                if($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display','none');
                    $(".print-success-msg").css('display','block');
                    $(".print-success-msg").html(data.success);
                }else {
                        printErrorMsg(data.error);
                    }
                }
            });
            $.ajax({
                url: "/test2",
                type:'GET',
            }).done(function(res) {
                $("#tableuser").html(res);
                $('.showUser').click(function(){
                    var url = $(this).data('url');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(response) {
                            $('h4#username').html(response.data.username)
                            $('span#email').html("Email: " + response.data.email)
                            $('span#created_at').html("Created at: " + response.data.created_at)
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //
                        }
                    });
                });
                $('.editUser').click(function(){
                    var url = $(this).data('url');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(response) {
                            $(".print-success-msg-edit").css('display','none');
                            $(".print-error-msg-edit").css('display','none');
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

@endpush
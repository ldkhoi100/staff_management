@extends('layouts.app')

@section('content')
@include('edit')
<div id="tableuser">
    <table>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>

            <td><button data-url="{{ route('test.show',$user->id) }}" ​ type="button" data-target="#show"
                    data-toggle="modal" class="btn btn-info showUser btn-sm">Detail</button></td>

            <td><button data-url="{{ route('test.edit',$user->id) }}" ​ type="button" data-target="#editUser"
                    data-toggle="modal" class="btn btn-info editUser btn-sm">Edit</button></td>

            <td><a href="">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>

<br><br>

{{-- Modal show chi tiết --}}
<div class="modal fade bd-example-modal-xl" id="show">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="col-12 modal-title text-center" id="username" style="color:blue; font-weight: bold;"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <h1 id="descriptor"></h1>
                <span id="email"></span><br>
                <span id="created_at"></span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
    Create user
</button>

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
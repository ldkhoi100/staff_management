@extends('admin.layouts')

@section('title', 'Manager Users')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create user</a>
        <a href="{{ route('users.trash') }}" class="btn btn-danger">Trash</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manager users</h6>
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

                        @foreach ($userss as $key => $users)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $users->username }}</td>
                            <td>{{ $users->email }}</td>
                            <td>
                                @foreach ($users->roles as $role)
                                {{ $role->name }}
                                @endforeach
                            </td>

                            @if($users->block == 1)
                            <td><a href="{{ route('users.block', $users->id) }}"
                                    style="color:#32CD32; font-weight: bold;"
                                    onclick="return confirm('Do you want removed block this user?')">Yes</a>
                            </td>
                            @else
                            <td><a href="{{ route('users.block', $users->id) }}" style="color:red; font-weight: bold;"
                                    onclick="return confirm('Do you want block this user?')">No</a>
                            </td>
                            @endif

                            <td>
                                @if(!empty($users->email_verified_at))
                                {{ date("d-m-y H:i:s", strtotime($users->email_verified_at)) }}
                                @endif</td>

                            <td>{{ date("d-m-y H:i:s", strtotime($users->created_at)) }}</td>

                            <td>{{ date("d-m-y H:i:s", strtotime($users->updated_at)) }}</td>

                            <td><a href="{{ route('users.edit', $users->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>

                            <td>
                                <form action="{{ route('users.destroy', $users->id) }}" method="POST" id="my-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete users {{$users->name}} ?')"
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
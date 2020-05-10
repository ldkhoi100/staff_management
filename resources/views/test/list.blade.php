@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')

@include('users.modal.showModal')

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

        <div class="card-body" id="reload_table">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAjax" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Username</th>
                            {{-- <th>Role</th> --}}
                            <th>Block</th>
                            <th>Verified Mail</th>
                            <th>Created at</th>
                            {{-- <th>Edit</th>
                            <th>Delete</th> --}}
                        </tr>
                    </thead>
                    {{-- <tfoot>
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
                    </tfoot> --}}
                    <tbody>

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
    $(function() {
    $('#dataTableAjax').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('test.dataTable') !!}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'block',
                name: 'block'
            },
            {
                data: 'email_verified_at',
                name: 'email_verified_at'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
        ]
    });
});
</script>

<script src="js/users/crud.js"></script>

@endpush
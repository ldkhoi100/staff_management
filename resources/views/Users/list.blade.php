@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')

@include('users.modal.showModal')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
<<<<<<< HEAD
        <button onclick="user.selectRole()">role</button>
=======
>>>>>>> d74a4e1ac98fed932c4131475a14958a22dd441b
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
<script src="js/users/CRUD.js"></script>
>>>>>>> d74a4e1ac98fed932c4131475a14958a22dd441b

@endpush
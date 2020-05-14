@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')

@include('users.modal.showModal')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn-block btn btn-outline-primary" data-toggle="pill" href="#home">Manager
                User
            </a>
        </li>
        <li class="nav-item mr-auto ml-3">
            <a class="nav-link btn-block btn btn-outline-success" href="javascript:void(0);"
                onclick="user.modalCreate()">Create user</a>
        </li>
        <li class="nav-item ml-auto">
            <a class="nav-link btn-block btn btn-outline-danger" onclick="user.trashTable()" data-toggle="pill"
                href="#trash">Trash</a>
        </li>
    </ul>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manager user -
                Your role:<span style="color: brown">
                    @if(count(Auth::user()->roles) > 0)
                    {{ Auth::user()->roles[0]->name }}
                    @endif
                </span>
            </h6>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="card-body" id="reload_table">
                    @include('users.ajax.list')
                </div>
            </div>
            <div class="tab-pane fade" id="trash">
                <div class="card-body" id="reload_trash">
                    @include('users.ajax.trash')
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection


@push('CRUD')

<script src="js/users.js"></script>

@endpush
@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')

{{--    @include('Role.modal.edit')--}}
    @include('Role.modal.create')
    <div class="container-fluid">
        <p class="mb-4">
            <button class="btn btn-success btn-create" data-url="{{ route('role.create')  }}">Create Role</button>
        <a href="{{route('role.trash')}}" class="btn btn-danger" style="float: right">Trash</a>
        </p>

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manager user</h6>
            </div>

            <div class="col-sm-12">@include('partials.message')</div>

            <div class="card-body">
                <div class="table-responsive">
                </div>
            </div>
        </div>
        <div class="crud-role">

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('jquery-api')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="/js/roles.js"></script>

@endpush

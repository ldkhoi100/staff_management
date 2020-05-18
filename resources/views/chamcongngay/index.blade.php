@extends('admin.layouts')

@section('title', 'Manager User')

@section('content')
    @include('Role.modal.create')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active btn-block btn btn-outline-primary" href="" data-toggle="pill" onclick="role.showData()">Roles</a>
            </li>
            <li class="nav-item mr-auto ml-3">
                <a class="nav-link btn-success btn" href="javascript:void(0);" onclick="role.showModal()">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-block btn btn-outline-danger" data-toggle="pill"
                   href="javascript:;" onclick="role.RemoteTrash()">Trash</a>
            </li>
        </ul>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manager user</h6>
            </div>

            <div class="col-sm-12">@include('partials.message')</div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data" width="100%" cellspacing="0"
                           style="font-size: 14.5px;">
                        <thead>
                        <tr>
                            <th>MaNV</th>
                            <th>LuongCB</th>
                            <th>Ca_Lam</th>
                            <th>Ngay_Hien_Tai</th>
                            <th>Ngay_Le</th>
                            <th>Tru_Luong</th>
                            <th>Ghi_Chu</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="dataDrawtable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection

@push('jquery-api')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.js"></script>
    <script src="/js/role.js"></script>



@endpush

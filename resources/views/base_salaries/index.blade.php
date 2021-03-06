@extends('admin.layouts')
@section('content')
<div class="container-fluid">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn-block btn btn-outline-primary" data-toggle="pill"
                href="#pills-main_table">Base Salary</a>
        </li>
        <li class="nav-item mr-auto ml-3">
            <a class="nav-link btn-success btn" href="javascript:void(0);" onclick="Bs.create()">Create</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-block btn btn-outline-secondary" data-toggle="pill"
                href="#pills-trash_table">Trash</a>
        </li>
    </ul>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold mt-1 text-primary">Table Base Salary</h6>
        </div>
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">

                {{-- table main --}}
                <div class="tab-pane fade show active" id="pills-main_table">
                    @include('base_salaries.table.main_table')
                </div>
                {{-- end main table --}}
                {{-- table trash --}}

                <div class="tab-pane fade" id="pills-trash_table">
                    @include('base_salaries.table.trash_table')
                </div>

                {{-- end table trash --}}

            </div>
        </div>
    </div>

    {{-- Modal --}}

    {{-- Modal base salary --}}

    @include('base_salaries.modal.base_salary_modal')

    {{-- End modal base salary --}}

</div>
@endsection
@push('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js">
</script>
<script src="js/base_salary.js"></script>
@endpush
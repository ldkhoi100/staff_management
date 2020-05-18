@extends('admin.layouts')
@section('content')
<div class="container-fluid">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn-block btn btn-outline-primary" data-toggle="pill"
                href="#pills-main_table">Factor Salary</a>
        </li>
        <li class="nav-item mr-auto ml-3">
            <a class="nav-link btn-success btn" href="javascript:void(0);" onclick="Fs.create()">Create</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-block btn btn-outline-secondary" data-toggle="pill"
                href="#pills-trash_table">Trash</a>
        </li>
    </ul>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Factor Salary</h6>
        </div>
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">

                {{-- table main --}}
                <div class="tab-pane fade show active" id="pills-main_table">
                    @include('factor_salaries.table.main_table')
                </div>
                {{-- end main table --}}
                {{-- table trash --}}

                <div class="tab-pane fade" id="pills-trash_table">
                    @include('factor_salaries.table.trash_table')
                </div>

                {{-- end table trash --}}

            </div>
        </div>
    </div>

    {{-- Modal --}}

    {{-- Modal factor salary --}}

    @include('factor_salaries.modal.factor_salary_modal')

    {{-- End modal factor salary --}}

</div>
@endsection
@push('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js">
</script>
<script src="js/factor_salary.js"></script>
@endpush
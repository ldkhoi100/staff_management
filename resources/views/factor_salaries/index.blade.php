@extends('admin.layouts')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn-block btn btn-outline-primary" data-toggle="pill" href="#pills-home">Factor
                Salary</a>
        </li>
        <li class="nav-item mr-auto ml-3">
            <a class="nav-link btn-success btn" href="javascript:void(0);" onclick="Fs.create()">Create</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-block btn btn-outline-danger" data-toggle="pill" href="#pills-table-trash">Trash</a>
        </li>
    </ul>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Factor Salary</h6>
        </div>

        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <table id="fs-table" class="table table-borderless table-hover" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>Factor Salary</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Factor Salary</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-table-trash" role="tabpanel"
                    aria-labelledby="pills-table-trash-tab">
                    <table id="fs-table-trash" class="table table-borderless table-hover" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>Factor Salary</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Factor Salary</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div id="fs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
                    data-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="fs-modal-title">Create Factor Salary</h5>
                                    <button class="btn btn-dark" type="button" aria-label="Close"
                                        onclick="confirm()?$('#fs-modal').modal('hide'):''">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body container">
                                    <div class="container">
                                        <span>Value</span><br>
                                        <input class="form-control col" type="number" min="1" max="5" name="Bac_Luong">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn-save" class="btn btn-success btn-block"
                                            onclick="Fs.save(this)">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js">
</script>
<script src="js/factor_salary.js"></script>

@endpush
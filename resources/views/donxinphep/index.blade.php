@extends('admin.layouts')
@section('content')
<div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn-block btn btn-outline-success" data-toggle="pill" href="#pills-home">
                Statistic Of Leave</a>
        </li>
        <li class="nav-item mx-auto">
            {{-- <a class="nav-link btn-info btn" onclick="Dxp.create()">Create</a> --}}
        </li>
        <li class="nav-item">
            <a class="nav-link btn-block btn btn-outline-secondary" data-toggle="pill"
                href="#pills-table-trash">Trash</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table id="fs-table" class="table table-borderless table-hover" width="100%">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Staff</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Staff</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="tab-pane fade" id="pills-table-trash" role="tabpanel" aria-labelledby="pills-table-trash-tab">
            <table id="fs-table-trash" class="table table-borderless table-hover" width="100%">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Staff</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Staff</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="fs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
            data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5>Create Factor Salary</h5>
                            <button class="btn btn-dark" type="button" aria-label="Close"
                                onclick="$('#fs-modal').modal('hide')">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body container">
                            <div class="container">
                                <span>Title</span><br>
                                <input class="form-control col" type="text" name="TieuDe">
                            </div>
                            <div class="container">
                                <span>Content</span><br>
                                <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn-save" class="btn btn-success btn-block"
                                    onclick="Dxp.save(this)">Send Mail
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="dx-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Show Sabbatical Leave</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h3>
                    <table>
                        <tr>
                            <td>Name: </td>
                            <td for="" id="MaNV"></td>
                        </tr>
                        <tr>
                            <td>Title: </td>
                            <td for="" id="TieuDe"></td>
                        </tr>
                        <tr>
                            <td>Content: </td>
                            <td for="" id="NoiDung"></td>
                        </tr>
                    </table>
                </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<script src="js/donxinphep.js"></script>

@endpush
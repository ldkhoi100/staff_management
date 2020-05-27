@extends('admin.layouts')

@section('title', 'Manager Staff')

@section('content')

<style>
    .fa-check {
        color: green;
    }

    .fa-calendar-times {
        color: #ee4d2d;
    }
</style>

<div class="container-fluid">
    <nav class="nav">
        <li class="nav-item">
            <div class="form-group">
                <div>
                    <div class="form-group">
                        <label>Base Salary</label>
                        <select id="baseSalary" class="form-control"
                            onchange="Ts.updateBaseSalary(this.value)"></select>
                    </div>

                </div>

            </div>
        </li>

        <li class="nav-item mx-auto">
            <button type="button" class="btn btn-info" onclick="Ts.statistic()">TimeSheets Statistic</button>
        </li>

        <li class="nav-item">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="holiday">
                <label class="custom-control-label" for="holiday">Holiday</label>
            </div>
        </li>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <span style="float: left">Manager Timesheets<br>
                    Your role:<span style="color: brown">
                        @if(count(Auth::user()->roles) > 0)
                        {{ Auth::user()->roles[0]->name }}
                        @endif
                    </span>
                </span>
                <div class="form-group" style="float: right">
                    <label>Current Day</label>
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="current-day">
                </div>
            </h6>

        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="card-body" id="reload_table">
                    <table id="bang-chamcong" class="table table-striped mt-2" style="text-align: center">
                        <thead class="thead-dark">
                            <tr>
                                <th width="1%">#</th>
                                <th>Full Name</th>
                                <th>Position</th>
                                <th width="20%">Work Shift</th>
                                <th>Sabbatical Leave</th>
                                <th width="11%">Salary</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="1%">#</th>
                                <th>Full Name</th>
                                <th>Position</th>
                                <th width="20%">Work Shift</th>
                                <th>Sabbatical Leave</th>
                                <th width="11%">Salary</th>
                                <th>Description</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="them-mota" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body w-100">
                <div class="form-group">
                    <label>Add new Description</label>
                    <textarea class="form-control" id="mota-chitiet"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-25 float-right" id="luu-them-mota">Save</button>
            </div>
        </div>
    </div>
    <div class="d-none" id="data-export">
        @include('timesheets.export.table')
    </div>
</div>

@include('timesheets.modal.timesheet_statistic_modal')

@endsection

@push('CRUD')

<script src="js/timesheets.js"></script>

@endpush
<div id="statistic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title w-100 text-center" style="text-shadow: 1px 1px #ee4d2d; color: #ee4d2d">
                        Timekeeping Statistic
                    </h1>
                </div>


                <div class="modal-title d-flex ml-auto over" id="my-modal-title">
                    <span style="word-wrap: normal;">Select Month: </span><input type="month" class="form-control"
                        value="{{ date("Y-m") }}" id="month" onchange="Ts.statistic()">
                </div>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  overflow-auto" style="font-size: 11px" id="month-salary">
                <table class="table table-striped table-bordered" style="font-size: 11px" id="statistic_table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            @for ($i = 1; $i <= 31; $i++) <th>{{ $i }}</th>
                                @endfor
                                <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="mr-auto">
                    <h4 style="color:blue">Note:</h4>
                    <div class="row">
                        <div class="col">
                            <span>F : Full Working</span> <br>
                            <span>V : Absent</span> <br>
                            <span>L : Holiday</span> <br>
                            <span>B : Bonus </span> <br>
                            <span>X : Deduction Of Salary</span>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="Ts.exportSalary()">Export Excel</a>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="/export/month-salary" id="month-salary-form">
        @csrf
        <input type="text" name="data" id="month-salary-data">
    </form>
</div>
<div id="statistic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title d-flex" id="my-modal-title">
                    Select Month<select id="month" class="form-control" onchange="Ts.statistic()">
                        @for ($i = 1; $i <= 12; $i++)
                            <option @if($i == date('m')) selected @endif value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    Select Year
                    <select id="year" class="form-control" onchange="Ts.statistic()">
                        @for ($i = 2020; $i <= date('Y'); $i++)
                            <option @if($i == date('Y')) selected @endif value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  overflow-auto" style="font-size: 11px">
                <table class="table table-striped table-bordered" style="font-size: 11px" id="statistic_table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            @for ($i = 1; $i <= 31; $i++)
                                <th>{{ $i }}</th>
                            @endfor
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                Footer
            </div>
        </div>
    </div>
</div>
<!-- Modal Sabbatical Leave History-->
<div id="SLH" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title w-100 text-center" style="color: blue">Sabbatical Leave History</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover" id="Sabbatical">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="20%">Title</th>
                            <th scope="col" width="60%">Content</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(count($nghiPhep) == 0)
                        <td colspan="4" style="text-align: center">
                            You Have Not Taken Any Leave</td>
                        @else

                        @foreach ($nghiPhep as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->TieuDe }}</td>
                            <td>{{ $item->NoiDung }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal Work History-->
<div id="WorkHistory" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title w-100 text-center" style="color: blue">Work History</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <form>
                            Select Month: <input type="month" name="month" class="form-control"
                                onchange="profile.workHistory(this)">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center" style="color: #ee4d2d" id="selectMonth">Month: {{ date("m-Y") }}</h2>
                        <h3 class="text-center" style="color: orange" id="totalSalary">Total Salary:
                            ${{ number_format($total, 0) }}</h3>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="work_history"
                        style="font-size: 15px;">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">Date</th>
                                <th scope="col" width="13%">Shift Work</th>
                                <th scope="col" width="5%">Holiday (x2)</th>
                                <th scope="col" width="1%">Actually Received</th>
                                <th scope="col" width="1%">Sabbatical Leave</th>
                                <th scope="col">Description</th>
                                <th scope="col">Salary On Day</th>
                            </tr>
                        </thead>
                        <tbody align="center" style="font-weight: bold">

                            @foreach ($result as $key => $value)

                            @if($value != "0")
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->Ca_Lam }}</td>
                                <td>
                                    @if($value->Ngay_Le == "0")
                                    <span></span>
                                    @elseif($value->Ngay_Le == 1)
                                    <span style="color: rgb(10, 177, 10)">Yes</span>
                                    @endif
                                </td>
                                <td>
                                    @if($value->Luong != null)
                                    {{ $value->Luong . "%" }}
                                    @else
                                    0%
                                    @endif
                                <td>
                                    @if($value->TieuDe != null)
                                    <span style="color: #ee4d2d">Yes</span>
                                    @endif
                                </td>
                                <td>{{ $value->Ghi_Chu }}</td>
                                <td>
                                    @if($value->TieuDe == null)
                                    ${{ number_format($value->Tien_Luong * strlen($value->So_Ca_Lam) * ($value->Ngay_Le + 1) * ($value->Luong / 100), 0) }}
                                    @else
                                    0
                                    @endif
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal Create Sabbatical -->
<div id="fs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5>Create New Sabbatical Leave</h5>
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
                        <textarea class="form-control" name="NoiDung" rows="6"></textarea>
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
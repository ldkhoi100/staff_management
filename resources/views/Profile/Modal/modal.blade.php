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
                <table class="table table-striped table-hover">
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
                <h3 class="modal-title w-100 text-center" style="color: blue">Sabbatical Leave History</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        Select Date: <input type="date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
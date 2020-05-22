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
                <table class="table table-striped table-hover" id="Sabbatical" style="text-align: center">
                    @include(" Profile.ajax.nghiPhep")
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
                                onchange="profile.workHistory()">
                        </form>
                    </div>
                </div>
                <div class="row" id="WorkHistory_body">
                    @include("Profile.ajax.index")
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
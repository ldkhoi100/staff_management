<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Create new Factor Salary</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row">
                    <span class="ml-5">New Factor Salary</span>
                    <input type="number" min="1" max="10" required class="form-control mx-auto" name="Bac_Luong" value="1">
                    <input type="button" class="btn btn-success mx-auto my-2" value="Save" onclick="FS.Store(this.form)">
                </form>
            </div>
        </div>
    </div>
</div>
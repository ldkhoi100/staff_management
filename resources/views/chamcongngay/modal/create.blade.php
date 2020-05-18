<!-- Modal -->
<div class="modal fade" tabindex="-1"  id="addRole" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addeditRoles">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" id="Roles" name="Roles" value="0">
                <div class="modal-body">
                    <div class="form-group has-error has-feedback">
                        <label>Name role:</label>
                        <input type="text" name="name" id="name" class="form-control"
                               placeholder="name role">
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label>Description role:</label>
                        <input type="text" name="description" id="description" class="form-control"
                               placeholder="description role">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" class="btn btn-danger"  onclick="role.save()">Create</a>

                </div>
            </form>
        </div>
    </div>
</div>

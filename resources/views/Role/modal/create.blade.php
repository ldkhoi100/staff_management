<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group has-error has-feedback">
                    <label>Name role:</label>
                    <input type="text" name="name" class="form-control"
                           placeholder="name role">
                </div>
                <div class="form-group has-error has-feedback">
                    <label>Description role:</label>
                    <input type="text" name="description" id="description" class="form-control"
                           placeholder="description role">
                </div>
            </div>
            <div class="modal-footer">
{{--                <a href="javascript:void(0);" class="btn btn-primary" onclick="role.store()" >Save changes</a>--}}
                <button class="btn btn-primary" onclick="event.preventDefault();Role.Store(this)" >Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

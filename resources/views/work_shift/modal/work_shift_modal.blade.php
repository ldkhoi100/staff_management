<div id="ws-modal" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="ws-modal-title">Create Factor Salary</h5>
                    <button class="btn btn-dark" type="button"
                        onclick="confirm('Close modal this')?$('#ws-modal').modal('hide'):''">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body container">
                    <div class="row">
                        <span>Name</span><br>
                        <input class="form-control field" type="text" name="Ca">
                    </div>
                    <div class="row">
                        <span>Factor</span><br>
                        <input class="form-control field" type="number" min="1" max="5" name="He_So">
                    </div>
                    <div class="row">
                        <span>Description</span><br>
                        <textarea name="Mo_Ta" class="form-control field"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-save" class="btn btn-success btn-block" onclick="Ws.save(this)">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
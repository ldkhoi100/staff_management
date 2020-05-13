<div id="fs-modal" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="fs-modal-title">Create Factor Salary</h5>
                    <button class="btn btn-dark" type="button"
                        onclick="confirm('Close modal this')?$('#fs-modal').modal('hide'):''">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body container">
                    <div class="container">
                        <span>Value</span><br>
                        <input class="form-control col" type="number" min="1" max="5" name="Bac_Luong">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-save" class="btn btn-success btn-block" onclick="Fs.save(this)">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="chucvu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
         <form>
            <input type="text" name="Ten_CV">
            <input type="text" name="Cong_Viec">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-save-data" data-url="{{ route('chucvu.store') }}">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

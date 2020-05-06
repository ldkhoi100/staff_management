<!-- Modal Create User-->
<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>

                <div class="alert alert-success print-success-msg" style="display:none">
                </div>

                <form>
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="username-create" class="form-control create_modal"
                            placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email-create" class="form-control create_modal" placeholder="email">
                    </div>

                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password-create" class="form-control create_modal"
                            placeholder="password">
                    </div>
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        <input type="password" name="password_confirmation-create"
                            class="form-control passwordConfirm create_modal" placeholder="password">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-warning reset_form">Reset</button>
                <button type="button" class="btn btn-primary btn-create">Create</button>
            </div>

            </form>

        </div>
    </div>
</div>
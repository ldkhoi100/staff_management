<!-- Modal Create User-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                <form>
                    <div class="form-group">
                        <label>Username:</label>
<<<<<<< HEAD
                        <input type="text" name="username-create" class="form-control is-invalid"
                               placeholder="Username">
=======
                        <input type="text" name="username-create" class="form-control create_modal"
                            placeholder="Username">
>>>>>>> 5da86670d875b43805bca95e1d1bf0a1c894c7e4
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
<<<<<<< HEAD
                        <input type="password" name="password_confirmation-create" class="form-control"
                               placeholder="password">
=======
                        <input type="password" name="password_confirmation-create"
                            class="form-control passwordConfirm create_modal" placeholder="password">
>>>>>>> 5da86670d875b43805bca95e1d1bf0a1c894c7e4
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-warning reset_form">Reset</button>
                <button type="button" class="btn btn-primary btn-create">Create</button>
            </div>


        </div>
    </div>
</div>

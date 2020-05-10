<!-- Modal Create User-->
<div class="modal fade" id="ShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    data-keyboard="true" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">

        {{-- Create data --}}
        <div class="modal-content" id="show-create-modal" style="display: none">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="modal-create">
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="username" id="username-create" class="form-control create_modal"
                            placeholder="Username">

                        <span class="invalid-feedback">
                            <strong class="alert-username"></strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control create_modal" placeholder="email">

                        <span class="invalid-feedback">
                            <strong class="alert-email"></strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control create_modal" placeholder="password">

                        <span class="invalid-feedback">
                            <strong class="alert-password"></strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        <input type="password" name="password_confirmation" class="form-control passwordConfirm"
                            placeholder="password">
                        <span class="invalid-feedback">
                            <strong class="alert-password" id="passwordConfirm"></strong>
                        </span>
                    </div>

                    {{-- <div class="form-group">
                        <strong>Role:</strong> <br>
                        <select name="roles[]" id="roles" class="form-control role-select" multiple="multiple">
                            <option value="" class="role-option"></option>
                        </select>
                    </div> --}}

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="blockUser" name="block">
                        <label class="custom-control-label" for="blockUser">Block user</label>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-warning reset_form">Reset</button>
                <button type="button" class="btn btn-primary" onclick="user.create()">Create</button>
                </form>
            </div>

        </div>

        {{-- Update data --}}
        <div class="modal-content" id="show-edit-modal" style="display: none">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="modal-update">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" name="username" class="form-control edit_modal">
                        <span class="invalid-feedback">
                            <strong class="alert-username"></strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control edit_modal">
                        <span class="invalid-feedback">
                            <strong class="alert-email"></strong>
                        </span>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="block" name="block">
                        <label class="custom-control-label" for="block">Block user</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-edit" onclick="user.update()">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
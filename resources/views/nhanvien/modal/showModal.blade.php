<!-- Modal Create User-->
<div class="modal fade" id="ShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    data-keyboard="true" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">

        {{-- Create data --}}
        <div class="modal-content" id="show-create-modal" style="display: none">
            <div class="modal-header">
                <h1 class="modal-title w-100 text-center" id="exampleModalLabel"
                    style="text-shadow: 1px 1px #ee4d2d; color: #ee4d2d">
                    Create New Staff
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="modal-create">
                    <div class="row border-bottom-secondary mb-3">
                        <h2 class="col-12" style="color:blue; text-decoration: underline;">Register User:</h2>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username" class="form-control create_modal"
                                    placeholder="Username">

                                <span class="invalid-feedback">
                                    <strong class="alert-username"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Password:</strong>
                                <input type="password" name="password" class="form-control create_modal"
                                    placeholder="New Password">

                                <span class="invalid-feedback">
                                    <strong class="alert-password alert"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control create_modal" placeholder="Email">

                                <span class="invalid-feedback">
                                    <strong class="alert-email"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Confirm Password:</strong>
                                <input type="password" name="password_confirmation" class="form-control passwordConfirm"
                                    placeholder="Confirm Password">
                                <span class="invalid-feedback">
                                    <strong class="alert-password" id="passwordConfirm"></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h2 class="col-12" style="color:blue; text-decoration: underline;">Create Profile Staff:</h2>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" name="Ho_Ten" class="form-control create_modal"
                                    placeholder="Full Name">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ho_Ten"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Gender:</label> <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Gioi_Tinh1" name="Gioi_Tinh" class="custom-control-input"
                                        value="Male">
                                    <label class="custom-control-label" for="Gioi_Tinh1">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Gioi_Tinh2" name="Gioi_Tinh" class="custom-control-input"
                                        value="Female">
                                    <label class="custom-control-label" for="Gioi_Tinh2">Female</label>
                                </div>

                                <span class="invalid-feedback">
                                    <strong class="alert-Gioi_Tinh"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Date Of Birth:</label>
                                <input type="date" name="Ngay_Sinh" class="form-control create_modal"
                                    placeholder="Date Of Birth">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Sinh"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Phone Number:</label>
                                <input type="number" name="So_Dien_Thoai" class="form-control create_modal"
                                    placeholder="Phone Number">

                                <span class="invalid-feedback">
                                    <strong class="alert-So_Dien_Thoai"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" name="Dia_Chi" class="form-control create_modal"
                                    placeholder="Address">

                                <span class="invalid-feedback">
                                    <strong class="alert-Dia_Chi"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Starting Date:</label>
                                <input type="date" name="Ngay_Bat_Dau_Lam" class="form-control create_modal"
                                    placeholder="Starting Date">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Bat_Dau_Lam"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Position:</label> <br>
                                <select name="MaCV" id="" class="form-control position">

                                </select>

                                <span class="invalid-feedback">
                                    <strong class="alert-MaCV"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Coefficients Salary:</label> <br>
                                <select name="He_So_Luong" id="" class="form-control">

                                </select>

                                <span class="invalid-feedback">
                                    <strong class="alert-He_So_Luong"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" name="Ngay_Sinh" class="form-control create_modal"
                                    placeholder="Date Of Birth">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Sinh"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-warning reset_form">Reset</button>
                <button type="button" class="btn btn-primary btn-create" onclick="user.create()">Create</button>
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
                        <input type="checkbox" class="custom-control-input" id="changePassword">
                        <label class="custom-control-label" for="changePassword">Change password</label>
                    </div>

                    <div class="hide-password" style="display: none">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" class="form-control edit_modal password"
                                style="cursor: not-allowed" disabled>

                            <span class="invalid-feedback">
                                <strong class="alert-password"></strong>
                            </span>
                        </div>

                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            <input type="password" name="password_confirmation"
                                class="form-control passwordConfirm password" style="cursor: not-allowed" disabled>

                            <span class="invalid-feedback">
                                <strong class="alert-password" id="passwordConfirm"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Role:</strong> <br>
                        <select name="roles[]" id="roles" class="form-control role-select" multiple="multiple">

                        </select>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="block" name="block">
                        <label class="custom-control-label" for="block">Block user</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-edit" onclick="user.update()">Save
                    changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
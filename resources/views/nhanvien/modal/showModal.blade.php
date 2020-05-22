<!-- Modal Create And Update-->
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

                <form id="modal-create" action="javascript:void(0)">
                    <div class="row border-bottom-secondary mb-3">
                        <h2 class="col-12" style="color:blue; text-decoration: underline;">Register User:</h2>
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Username:</strong>
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
                                <strong>Email:</strong>
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
                                <strong>Full Name:</strong>
                                <input type="text" name="Ho_Ten" class="form-control create_modal"
                                    placeholder="Full Name">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ho_Ten"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Gender:</strong> <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Gioi_Tinh1" name="Gioi_Tinh" class="custom-control-input"
                                        value="Male" checked>
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
                                <strong>Date Of Birth:</strong>
                                <input type="date" name="Ngay_Sinh" class="form-control create_modal"
                                    placeholder="Date Of Birth">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Sinh"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Phone Number:</strong>
                                <input type="number" name="So_Dien_Thoai" class="form-control create_modal" min="0"
                                    placeholder="Phone Number">

                                <span class="invalid-feedback">
                                    <strong class="alert-So_Dien_Thoai"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Address:</strong>
                                <input type="text" name="Dia_Chi" class="form-control create_modal"
                                    placeholder="Address">

                                <span class="invalid-feedback">
                                    <strong class="alert-Dia_Chi"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Starting Date:</strong>
                                <input type="date" name="Ngay_Bat_Dau_Lam" class="form-control create_modal"
                                    placeholder="Starting Date">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Bat_Dau_Lam"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Position:</strong> <br>
                                <select name="MaCV" id="" class="form-control position select2" style="width: 100%;">

                                </select>

                                <span class="invalid-feedback">
                                    <strong class="alert-MaCV"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Shift work:</strong> <br>
                                <select name="Ca_Lam" id="Ca_Lam_Create" style="width: 100%;"
                                    class="form-control HSL select2">

                                </select>

                                <span class="invalid-feedback">
                                    <strong class="alert-He_So_Luong"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Avatar:</strong>
                                <input type="file" name="Anh_Dai_Dien" class="form-control create_modal Anh_Dai_Dien"
                                    onchange="readURL(event)">

                                <span class="invalid-feedback">
                                    <strong class="alert-Anh_Dai_Dien"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <img id="zoom" src="#" alt="" srcset="" width="250">
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-warning reset_form">Reset</button>
                <button type="button" class="btn btn-primary btn-create" onclick="staff.create(this)">Create</button>
                </form>
            </div>

        </div>

        {{-- Update data --}}
        <div class="modal-content" id="show-edit-modal" style="display: none">
            <div class="modal-header">
                <h2 class="modal-title w-100 text-center" style="color:blue" id="EditStaff"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="modal-update">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <strong>Full Name:</strong>
                                <input type="text" name="Ho_Ten" id="Ho_Ten" class="form-control create_modal"
                                    placeholder="Full Name">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ho_Ten"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Gender:</strong> <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Gioi_Tinh3" name="Gioi_Tinh" class="custom-control-input"
                                        value="Male">
                                    <label class="custom-control-label" for="Gioi_Tinh3">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Gioi_Tinh4" name="Gioi_Tinh" class="custom-control-input"
                                        value="Female">
                                    <label class="custom-control-label" for="Gioi_Tinh4">Female</label>
                                </div>

                                <span class="invalid-feedback">
                                    <strong class="alert-Gioi_Tinh"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Date Of Birth:</strong>
                                <input type="date" name="Ngay_Sinh" id="Ngay_Sinh" class="form-control create_modal"
                                    placeholder="Date Of Birth">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Sinh"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Phone Number:</strong>
                                <input type="number" name="So_Dien_Thoai" id="So_Dien_Thoai"
                                    class="form-control create_modal" min="0" placeholder="Phone Number">

                                <span class="invalid-feedback">
                                    <strong class="alert-So_Dien_Thoai"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Address:</strong>
                                <input type="text" name="Dia_Chi" id="Dia_Chi" class="form-control create_modal"
                                    placeholder="Address">

                                <span class="invalid-feedback">
                                    <strong class="alert-Dia_Chi"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Starting Date:</strong>
                                <input type="date" name="Ngay_Bat_Dau_Lam" id="Ngay_Bat_Dau_Lam"
                                    class="form-control create_modal" placeholder="Starting Date">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Bat_Dau_Lam"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>End Date:</strong>
                                <input type="date" name="Ngay_Nghi_Viec" id="Ngay_Nghi_Viec"
                                    class="form-control create_modal" placeholder="Starting Date">

                                <span class="invalid-feedback">
                                    <strong class="alert-Ngay_Nghi_Viec"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Position:</strong> <br>
                                <select name="MaCV" id="MaCV" class="form-control positionEdit select2"
                                    style="width: 100%;">

                                </select>

                                <span class="invalid-feedback">
                                    <strong class="alert-MaCV"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Shift work:</strong> <br>
                                <select name="Ca_Lam" id="He_So_Luong" class="form-control HSLEdit select2"
                                    style="width: 100%;">

                                </select>

                                <span class="invalid-feedback">
                                    <strong class="alert-He_So_Luong"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Avatar:</strong>
                                <input type="file" name="Anh_Dai_Dien" class="form-control create_modal Anh_Dai_Dien"
                                    onchange="readURLEdit(event)">

                                <span class="invalid-feedback">
                                    <strong class="alert-Anh_Dai_Dien"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-6"></div>

                        <div class="col-6">
                            <img id="zoomEdit" src="#" alt="" srcset="" width="250">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-edit" onclick="staff.update(this)">Save
                    Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Show Staff by Id-->
<div class="modal fade" id="ShowIdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    data-keyboard="true" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">

        {{-- Show data by Id --}}
        <div class="modal-content" id="show-data-modal" style="display: none">
            <div class="modal-header">
                <h2 class="modal-title w-100 text-center" style="color:blue" id="ShowStaff"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>
                    <table>
                        <tr>
                            <td>Full Name:</td>
                            <td for="" id="Ho_Ten"></td>
                        </tr>

                        <tr>
                            <td>Username:</td>
                            <td for="" id="username"></td>
                        </tr>

                        <tr>
                            <td>Position:</td>
                            <td for="" id="position"></td>
                        </tr>

                        <tr>
                            <td>Shift work:</td>
                            <td for="" id="salary"></td>
                        </tr>

                        <tr>
                            <td>Date Of Birth:</td>
                            <td for="" id="dob"></td>
                        </tr>

                        <tr>
                            <td>Gender:</td>
                            <td for="" id="gender"></td>
                        </tr>

                        <tr>
                            <td>Phone Number:</td>
                            <td for="" id="phone"></td>
                        </tr>

                        <tr>
                            <td>Address:</td>
                            <td for="" id="Dia_Chi_Show"></td>
                        </tr>

                        <tr>
                            <td>Starting date:</td>
                            <td for="" id="Ngay_Bat_Dau_Lam_Show"></td>
                        </tr>

                        <tr>
                            <td>End date:</td>
                            <td for="" id="Ngay_Nghi_Viec_Show"></td>
                        </tr>

                        <tr>
                            <td>Avatar:</td>
                            <td><img id="ImageShow" src="#" alt="" srcset="" width="250"></td>
                        </tr>
                    </table>
                </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
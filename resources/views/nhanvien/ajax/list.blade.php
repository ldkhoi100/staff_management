<div class="table-responsive">
    <table class="table table-striped table-hover p-2 text-center" id="dataTable" width="100%" cellspacing="0">
        <thead class="alert-success">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Level</th>
                <th>Coefficients salary</th>
                <th>Image</th>
                <th>Gender</th>
                <th>Starting date</th>
                <th>Leaving date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Level</th>
                <th>Coefficients salary</th>
                <th>Image</th>
                <th>Gender</th>
                <th>Starting date</th>
                <th>Leaving date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($staffs as $key => $staff)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ ucwords($staff->Ho_Ten) }}</td>
                <td>{{ $staff->user->username }}</td>
                <td>{{ $staff->chuc_vu->Ten_CV }}</td>
                <td>{{ $staff->he_so_luong->He_So_Luong }}</td>
                <td>{{ $staff->Anh_Dai_Dien }}</td>
                <td>{{ $staff->Gioi_Tinh }}</td>
                <td>{{ $staff->Ngay_Bat_Dau_Lam }}</td>
                <td>{{ $staff->Ngay_Nghi_Viec }}</td>

                <td>
                    <button type="button" onclick="staff.modalEdit({{ '\'' . Crypt::encrypt($staff->id) . '\'' }})"
                        class="btn btn-info show-modal-edit btn-sm">
                        <i class="fa fa-edit" title="Edit"></i>
                    </button>
                </td>

                <td>
                    <button type="button" class="btn btn-danger show-modal-destroy destroy_object btn-sm"
                        onclick="staff.destroy({{ '\'' . Crypt::encrypt($staff->id) . '\'' }}, {{ '\''. $staff->username . '\'' }})"><i
                            class="fa fa-backspace" title="Destroy"></i></button>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
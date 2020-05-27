<div class="table-responsive">
    <table class="table table-striped table-hover p-2 text-center" id="dataTable" width="100%" cellspacing="0">
        <thead class="alert-success">
            <tr>
                <th width="1%">#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Position</th>
                <th width="1%">Shift Work</th>
                <th width="1%">Avatar</th>
                <th width="1%">Gender</th>
                <th>Date Start Work</th>
                <th>Date End Work</th>
                <th>Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="1%">#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Position</th>
                <th width="1%">Shift Work</th>
                <th width="1%">Avatar</th>
                <th width="1%">Gender</th>
                <th>Date Start Work</th>
                <th>Date End Work</th>
                <th>Detail</th>
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
                <td>{{ $staff->ca_lam->Mo_Ta }}</td>
                @if($staff->Anh_Dai_Dien != null)
                <td><img src="img/{{ $staff->Anh_Dai_Dien }}" class="lazy" alt="" width="100"></td>
                @else
                <td><img src="#" alt="" width="100"></td>
                @endif
                <td>{{ $staff->Gioi_Tinh }}</td>
                <td>{{ $staff->Ngay_Bat_Dau_Lam }}</td>
                <td>{{ $staff->Ngay_Nghi_Viec }}</td>

                <td><button type="button" onclick="staff.modalShow({{ '\'' . Crypt::encrypt($staff->id) . '\'' }})"
                        class="btn btn-info show-modal-edit btn-sm">
                        <i class="fa fa-eye" title="Detail"></i>
                    </button></td>

                <td>
                    <button type="button" onclick="staff.modalEdit({{ '\'' . Crypt::encrypt($staff->id) . '\'' }})"
                        class="btn btn-warning show-modal-edit btn-sm">
                        <i class="fa fa-edit" title="Edit"></i>
                    </button>
                </td>

                <td>
                    <button type="button" class="btn btn-danger show-modal-destroy destroy_object btn-sm"
                        onclick="staff.destroy({{ '\'' . Crypt::encrypt($staff->id) . '\'' }}, {{ '\''. $staff->Ho_Ten . '\'' }})"><i
                            class="fa fa-backspace" title="Destroy"></i></button>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
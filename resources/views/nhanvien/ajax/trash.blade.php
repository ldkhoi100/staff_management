<div class="table-responsive table-striped table-hover p-2">
    <table class="table" id="dataTableTrash" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Coefficients salary</th>
                <th>Avatar</th>
                <th>Gender</th>
                <th>Date Start Work</th>
                <th>Date End Work</th>
                <th>Deleted at</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Position</th>
                <th>Coefficients salary</th>
                <th>Avatar</th>
                <th>Gender</th>
                <th>Date Start Work</th>
                <th>Date End Work</th>
                <th>Deleted at</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($staffs as $key => $staff)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $staff->Ho_Ten }}</td>
                <td>{{ $staff->user->username }}</td>
                <td>{{ $staff->chuc_vu->Ten_CV }}</td>
                <td>{{ $staff->ca_lam->Mo_Ta }}</td>
                @if($staff->Anh_Dai_Dien != null)
                <td><img src="img/{{ $staff->Anh_Dai_Dien }}" alt="" width="100"></td>
                @else
                <td><img src="#" alt="" width="100"></td>
                @endif
                <td>{{ $staff->Gioi_Tinh }}</td>
                <td>{{ $staff->Ngay_Bat_Dau_Lam }}</td>
                <td>{{ $staff->Ngay_Nghi_Viec }}</td>

                <td>{{ date("d-m-y H:i:s", strtotime($staff->deleted_at)) }}</td>

                <td>
                    <button type="button" onclick="staff.modalEdit({{ '\'' . Crypt::encrypt($staff->id) . '\'' }})"
                        class="btn btn-info show-modal-edit btn-sm">
                        <i class="fa fa-edit" title="Edit"></i>
                    </button>
                </td>

                <td>
                    <button type="button"
                        onclick="staff.restore({{ '\'' . Crypt::encrypt($staff->id) . '\'' }}, {{ '\''. $staff->Ho_Ten . '\'' }})"
                        class="btn btn-warning show-modal-restore btn-sm">
                        <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i>
                    </button>
                </td>

                <td>
                    <button type="button" class="btn btn-danger show-modal-destroy destroy_object btn-sm"
                        onclick="staff.forceDelete({{ '\'' . Crypt::encrypt($staff->id) . '\'' }}, {{ '\''. $staff->Ho_Ten . '\'' }})"><i
                            class="fa fa-backspace" title="Destroy"></i></button>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
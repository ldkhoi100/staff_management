<div class="table-responsive table-striped table-hover p-2">
    <table class="table" id="dataTableTrash" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Level</th>
                <th>Coefficients salary</th>
                <th>Image</th>
                <th>Full Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Starting date</th>
                <th>Leaving date</th>
                <th>Deleted at</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Level</th>
                <th>Coefficients salary</th>
                <th>Image</th>
                <th>Full Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Starting date</th>
                <th>Leaving date</th>
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
                <td>{{ $staff->MaCV }}</td>
                <td>{{ $staff->He_So_Luong }}</td>
                <td>{{ $staff->Anh_Dai_Dien }}</td>
                <td>{{ $staff->Ho_Ten }}</td>
                <td>{{ $staff->Ngay_Sinh }}</td>
                <td>{{ $staff->Gioi_Tinh }}</td>
                <td>{{ $staff->So_Dien_Thoai }}</td>
                <td>{{ $staff->Dia_Chi }}</td>
                <td>{{ $staff->Ngay_Bat_Dau_Lam }}</td>
                <td>{{ $staff->Ngay_Nghi_Viec }}</td>
                <td>{{ $staff->Phu_Cap }}</td>
                <td>{{ $staff->Tam_Ung }}</td>

                <td>
                    @if(!empty($staff->email_verified_at))
                    {{ date("d-m-y H:i:s", strtotime($staff->email_verified_at)) }}
                    @endif
                </td>

                <td>{{ date("d-m-y H:i:s", strtotime($staff->deleted_at)) }}</td>

                <td>
                    <button type="button" onclick="staff.modalEdit({{ '\'' . Crypt::encrypt($staff->id) . '\'' }})"
                        class="btn btn-info show-modal-edit btn-sm">
                        <i class="fa fa-edit" title="Edit"></i>
                    </button>
                </td>

                <td>
                    <button type="button"
                        onclick="staff.restore({{ '\'' . Crypt::encrypt($staff->id) . '\'' }}, {{ '\''. $staff->username . '\'' }})"
                        class="btn btn-warning show-modal-restore btn-sm">
                        <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i>
                    </button>
                </td>

                <td>
                    <button type="button" class="btn btn-danger show-modal-destroy destroy_object btn-sm"
                        onclick="staff.forceDelete({{ '\'' . Crypt::encrypt($staff->id) . '\'' }}, {{ '\''. $staff->username . '\'' }})"><i
                            class="fa fa-backspace" title="Destroy"></i></button>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Block</th>
                <th>Verified Mail</th>
                <th>Created at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Block</th>
                <th>Verified Mail</th>
                <th>Created at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($users as $key => $user)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                    {{ $role->name }}
                    @endforeach
                </td>

                @if($user->block == 1)
                <td><a href="javascript:void(0);" style="color:#32CD32; font-weight: bold;" class="block_object"
                        onclick="user.block({{ $user->id }}, {{ '\''. $user->username . '\'' }})">Yes</a>
                </td>
                @else
                <td><a href="javascript:void(0);" style="color:red; font-weight: bold;" class="block_object"
                        onclick="user.block({{ $user->id }}, {{ '\''. $user->username . '\'' }})">No</a>
                </td>
                @endif

                <td>
                    @if(!empty($user->email_verified_at))
                    {{ date("d-m-y H:i:s", strtotime($user->email_verified_at)) }}
                    @endif
                </td>

                <td>{{ date("d-m-y H:i:s", strtotime($user->created_at)) }}</td>

                <td>
                    <button type="button" onclick="user.modalEdit({{ $user->id }})"
                        class="btn btn-info show-modal-edit btn-sm">
                        <i class="fa fa-edit" title="Edit"></i>
                    </button>
                </td>

                <td>
                    <button type="button" class="btn btn-danger show-modal-destroy destroy_object btn-sm"
                        onclick="user.destroy({{ $user->id }}, {{ '\''. $user->username . '\'' }})"><i
                            class="fa fa-backspace" title="Destroy"></i></button>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>
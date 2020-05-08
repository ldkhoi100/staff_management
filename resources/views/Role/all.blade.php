<table class="table table-bordered" id="data-table" width="100%" cellspacing="0"
       style="font-size: 14.5px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Email</th>
        <th>description</th>
        <th>Action</th>

    </tr>
    </thead>

    <tbody id="reload_table">
    @forelse($roles as $no => $role)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $role->name  }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <button data-url="{{route('role.edit', $role)}}" onclick="Role.Edit(this)"
                        class="btn btn-info editUser btn-sm">
                    <i class="fa fa-edit" title="Edit"></i></button>

                <button data-url="{{route('role.destroy', $role)}}" onclick= "Role.Delete(this)"
                        class="btn btn-info editUser btn-sm">
                    <i class="fas fa-trash-alt" title="Delete"></i></button>
            </td>
        </tr>
    @empty

    @endforelse
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Email</th>
        <th>description</th>
        <th>Action</th>
    </tr>
    </tfoot>
</table>

<table>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>

        <td><button data-url="{{ route('test.show',$user->id) }}" ​ type="button" data-target="#show"
                data-toggle="modal" class="btn btn-info showUser btn-sm">Detail</button></td>

        <td><button data-url="{{ route('test.edit',$user->id) }}" ​ type="button" data-target="#editUser"
                data-toggle="modal" class="btn btn-info editUser btn-sm">Edit</button></td>
        <td><a href="">Delete</a></td>
    </tr>
    @endforeach
</table>
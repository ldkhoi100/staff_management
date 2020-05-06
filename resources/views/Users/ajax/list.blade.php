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
    <td><a href="javascript:void(0);" style="color:#32CD32; font-weight: bold;" onclick="block({{ $user->id }})">Yes</a>
    </td>
    @else
    <td><a href="javascript:void(0);" style="color:red; font-weight: bold;" onclick="block({{ $user->id }})">No</a>
    </td>
    @endif

    <td>
        @if(!empty($user->email_verified_at))
        {{ date("d-m-y H:i:s", strtotime($user->email_verified_at)) }}
        @endif</td>

    <td>{{ date("d-m-y H:i:s", strtotime($user->created_at)) }}</td>

    <td><button data-url="{{ route('users.edit', $user->id) }}" type="button" data-target="#editModal"
            data-toggle="modal" class="btn btn-info editModal btn-sm">
            <i class="fa fa-edit" title="Edit"></i></button>
    </td>

    <td>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="my-form">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Do you want delete user {{$user->name}} ?')"
                class="btn btn-danger btn-sm" id="btn-submit" style="border: none"><i
                    class="fa fa-backspace"></i></button>
        </form>
    </td>
</tr>

@endforeach
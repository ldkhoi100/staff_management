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
    <td><a href="" style="color:#32CD32; font-weight: bold;"
            onclick="return confirm('Do you want removed block this user?')">Yes</a>
    </td>
    @else
    <td><a href="" style="color:red; font-weight: bold;" onclick="return confirm('Do you want block this user?')">No</a>
    </td>
    @endif

    <td>
        @if(!empty($user->email_verified_at))
        {{ date("d-m-y H:i:s", strtotime($user->email_verified_at)) }}
        @endif</td>

    <td>{{ date("d-m-y H:i:s", strtotime($user->created_at)) }}</td>

    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
            <i class="fa fa-edit" title="Edit"></i></a>
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
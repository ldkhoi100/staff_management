<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col" width="20%">Title</th>
        <th scope="col" width="60%">Content</th>
        <th scope="col">Created At</th>
    </tr>
</thead>
<tbody>

    @if(count($nghiPhep) == 0)
    <td colspan="4" style="text-align: center">
        You Have Not Taken Any Leave</td>
    @else

    @foreach ($nghiPhep as $key => $item)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $item->TieuDe }}</td>
        <td>{{ $item->NoiDung }}</td>
        <td>{{ $item->created_at }}</td>
    </tr>
    @endforeach

    @endif
</tbody>
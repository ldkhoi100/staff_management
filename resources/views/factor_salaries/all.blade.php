@isset ($factorSalaries)
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th class="text-right">Lương cơn bản</th>
            <th class="text-right">Bậc lương</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($factorSalaries as $no => $fs)
        <tr>
            <td>{{ ++$no }}</td>
            <td class="text-right">{{ $fs->luong_co_ban->Tien_Luong }}</td>
            <td class="text-right">{{ $fs->Bac_Luong }}</td>
            <td class="text-center d-flex">
                {{-- <button class="btn btn-show btn-success" data-url="{{ route('fs.show', $fs) }}" onclick="FS.Show(this)">Show</button> --}}
                <button class="btn btn-edit btn-success" data-url="{{ route('fs.edit', $fs) }}" onclick="FS.Edit(this)">Edit</button>
                <button class="btn btn-trash btn-success" data-url="{{ route('fs.destroy', $fs) }}" onclick="FS.Delete(this)">Trash</button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Ngày nào mới xong</td>       
        </tr>            
        @endforelse
    </tbody>
</table>
@endisset
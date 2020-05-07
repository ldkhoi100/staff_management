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
            <td class="text-center">
                <input type="hidden" class="id" value="{{ $fs->id }}">
                <button class="btn btn-edit btn-warning">
                    <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-trash btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
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
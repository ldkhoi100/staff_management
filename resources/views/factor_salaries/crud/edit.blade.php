<form>
    @csrf
    @isset($factorSalary )
        <div class="form-group">
            <label>Bậc Lương</label>
            <small></small>
            <input class="form-control" type="number" name="Bac_Luong" value="{{ $factorSalary->Bac_Luong }}">
        </div>
        <button class="btn btn-submit btn-success" data-url="{{ route('fs.update', $factorSalary) }}">Confirm Change</button>
    @else
        <div class="form-group">
            <label>Bậc Lương</label>
            <small></small>
            <input class="form-control" type="number" name="Bac_Luong">
        </div>
        <button class="btn btn-submit btn-success" data-url="{{ route('fs.store') }}">Confirm Create</button>
    @endisset
</form>

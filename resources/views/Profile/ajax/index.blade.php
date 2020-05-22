<div class="col-12">
    <h2 class="text-center" style="color: #ee4d2d" id="selectMonth">Month: {{ $selectMonth }}</h2>
    <h3 class="text-center" style="color: orange" id="totalSalary">Total Salary:
        ${{ number_format($total, 0) }} (Worked {{ $count }} {{ $count > 1 ? "Days" : "Day" }})</h3>
</div>
<table class="table table-striped table-hover table-bordered" id="work_history"
    style="font-size: 15px; text-align: center">
    <thead>
        <tr>
            <th scope="col" width="1%">Date</th>
            <th scope="col" width="13%">Shift Work</th>
            <th scope="col" width="5%">Holiday (x2)</th>
            <th scope="col" width="1%">Actually Received</th>
            <th scope="col" width="1%">Sabbatical Leave</th>
            <th scope="col">Description</th>
            <th scope="col">Salary On Day</th>
        </tr>
    </thead>
    <tbody style="font-weight: bold">

        @foreach ($result as $key => $value)

        @if($value != "0")
        <tr>
            <td>{{ ++$key }}</td>

            <td style="color: #000000">{{ $value->Ca_Lam }}</td>

            <td>
                @if($value->Ngay_Le == "0")
                <span></span>
                @elseif($value->Ngay_Le == 1)
                <span style="color: rgb(10, 177, 10)">Yes</span>
                @endif
            </td>

            <td style="color: #A52A2A">
                {{ $value->Luong . "%" }}

            <td>
                @if($value->Nghi_Phep == 1)
                <span style="color: #ee4d2d">Yes</span>
                @endif
            </td>

            <td>{{ $value->Ghi_Chu }}</td>
            <td>
                @if($value->Nghi_Phep == 0)
                ${{ number_format($value->Tien_Luong * strlen($value->So_Ca_Lam) * ($value->Ngay_Le + 1) * ($value->Luong / 100) * $value->nhan_vien->chuc_vu->Bac_Luong, 0) }}
                @else
                $0
                @endif
            </td>
        </tr>
        @else
        <tr>
            <td>{{ ++$key }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
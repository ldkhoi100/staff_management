<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Employee Name</th>
            @for ($i = 1; $i <= 31; $i++) <th>{{ $i }}</th>
                @endfor
                <th>Total</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <th>Note:</th>
        <th>F : Full Working</th>
        <th>V : Absent</th>
        <th>L : Holiday</th>
        <th>B : Bonus</th>
        <th>X : Deduction Of Salary</th>
    </tfoot>
</table>
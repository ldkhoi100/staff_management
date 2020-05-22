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
</table>
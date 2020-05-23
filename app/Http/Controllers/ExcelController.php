<?php

namespace App\Http\Controllers;

use App\Exports\MonthSalaryExport;
use Illuminate\Http\Request;
use App\Model\ChucVu;
use Excel;

class ExcelController extends Controller
{

    public function monthSalary(Request $request)
    {
        return Excel::download(new MonthSalaryExport($request->data), date("Y-m") . '-Statistic.xlsx');
    }
}
<?php

namespace App\Http\Controllers;

use App\Model\BaseSalary;
use App\Model\NhanVien;
use App\Model\TimeSheets;
use App\Services\BaseSalaryService;
use Illuminate\Http\Request;
use App\Services\TimeSheetsService;

class TimeSheetsController extends Controller
{
    protected $timeSheetsService;
    protected $baseSalaryService;

    public function __construct(TimeSheetsService $timeSheetsService, BaseSalaryService $baseSalaryService)
    {
        $this->middleware('AjaxRequest')->except('index');
        $this->timeSheetsService = $timeSheetsService;
    }

    public function index()
    {
        $timeSheets = TimeSheets::where('Ngay_Hien_tai', date('Y-m-d'))->first();
        if (!$timeSheets) {
            $nhavien = NhanVien::all()->each(function($u) {
                $bs = BaseSalary::orderBy('desc')->first();
                $u->cham_cong()->create(['LuongCS'=> $bs->id, 'Ca_Lam' =>$u->Ca_Lam,'Ngay_Hien_Tai'=> date('Y-m-d')]);
            });
        }

        return view('timesheets.index');
    }

    public function getAll()
    {
        $timeSheets = $this->timeSheetsService->getAll();

        return response()->json($timeSheets);
    }

    public function findById($id)
    {
        $timeSheets = $this->timeSheetsService->findById($id);

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }

    public function create(Request $request)
    {
        $timeSheets = $this->timeSheetsService->create($request->all());

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }

    public function update(Request $request, $id)
    {
        $timeSheets = $this->timeSheetsService->update($request->all(), $id);

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }


    public function moveToTrash($id)
    {
        $timeSheets = $this->timeSheetsService->destroy($id);

        return response()->json($timeSheets['msg'], $timeSheets['status']);
    }

    public function getTrash()
    {
        $timeSheets = $this->timeSheetsService->getSoftDeletes();

        return response()->json($timeSheets);
    }

    public function findTrashById($id)
    {
        $timeSheets = $this->timeSheetsService->findOnlyTrashed($id);

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }

    public function restore($id)
    {
        $timeSheets = $this->timeSheetsService->restore($id);

        return response()->json($timeSheets['msg'], $timeSheets['status']);
    }

    public function delete($id)
    {
        $timeSheets = $this->timeSheetsService->delete($id);

        return response()->json($timeSheets['msg'], $timeSheets['status']);
    }
}

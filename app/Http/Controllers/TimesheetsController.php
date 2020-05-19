<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TimeSheetsService;

class TimeSheetsController extends Controller
{
    protected $timeSheetsService;

    public function __construct(TimeSheetsService $timeSheetsService)
    {
        $this->middleware('AjaxRequest')->except('index');
        $this->timeSheetsService = $timeSheetsService;
    }

    public function index()
    {
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

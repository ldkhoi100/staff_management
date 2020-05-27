<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkShiftRequest;
use App\Services\WorkShiftService;
use Illuminate\Http\Request;

class WorkShiftController extends Controller
{
    protected $workShiftService;

    public function __construct(WorkShiftService $workShiftService)
    {
        $this->middleware('AjaxRequest')->except('index');
        $this->workShiftService = $workShiftService;
    }

    public function index()
    {
        return view('work_shift.index');
    }

    public function getAll()
    {
        $workShift = $this->workShiftService->getAll();
        foreach ($workShift as $value) {
            $value['count_staff'] = count($value->nhan_vien);
        }
        // dd($workShift);

        return response()->json($workShift);
    }

    public function findById($id)
    {
        $workShift = $this->workShiftService->findById($id);

        return response()->json($workShift['data'], $workShift['status']);
    }

    public function create(WorkShiftRequest $request)
    {
        $workShift = $this->workShiftService->create($request->all());

        return response()->json($workShift['data'], $workShift['status']);
    }

    public function update(WorkShiftRequest $request, $id)
    {
        $workShift = $this->workShiftService->update($request->all(), $id);

        return response()->json($workShift['data'], $workShift['status']);
    }


    public function moveToTrash($id)
    {
        $workShift = $this->workShiftService->destroy($id);

        return response()->json($workShift['msg'], $workShift['status']);
    }

    public function getTrash()
    {
        $workShift = $this->workShiftService->getSoftDeletes();

        return response()->json($workShift);
    }

    public function findTrashById($id)
    {
        $workShift = $this->workShiftService->findOnlyTrashed($id);

        return response()->json($workShift['data'], $workShift['status']);
    }

    public function restore($id)
    {
        $workShift = $this->workShiftService->restore($id);

        return response()->json($workShift['msg'], $workShift['status']);
    }

    public function delete($id)
    {
        $workShift = $this->workShiftService->delete($id);

        return response()->json($workShift['msg'], $workShift['status']);
    }
}
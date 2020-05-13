<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DonXinPhepService;
class DonXinPhepController extends Controller
{
    protected $donxinphepService;

    public function __construct(DonXinPhepService $donxinphepService)
    {
        // $this->middleware('auth');
        // $this->middleware('role:admin|superAdmin')->except(['create', 'delete','restore', 'moveToTrash']);
        // $this->middleware('role:superAdmin')->only(['create', 'delete','restore', 'moveToTrash']);
        // $this->middleware('AjaxRequest')->except('index');
        $this->donxinphepService = $donxinphepService;
    }

    public function index()
    {
        return view('donxinphep.index');
    }

    public function getAll()
    {
        $factorSalaries = $this->donxinphepService->getAll();

        return response()->json($factorSalaries);
    }

    public function findById($id)
    {
        $donxinphep = $this->donxinphepService->findById($id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function create(Request $request)
    {
        $donxinphep = $this->donxinphepService->create($request->all());

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function update(Request $request, $id)
    {
        $donxinphep = $this->donxinphepService->update($request->all(), $id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }


    public function moveToTrash($id)
    {
        $donxinphep = $this->donxinphepService->destroy($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }

    public function getTrash()
    {
        $factorSalaries = $this->donxinphepService->getSoftDeletes();

        return response()->json($factorSalaries);
    }

    public function findTrashById($id)
    {
        $donxinphep = $this->donxinphepService->findOnlyTrashed($id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function restore($id)
    {
        $donxinphep = $this->donxinphepService->restore($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }

    public function delete($id)
    {
        $donxinphep = $this->donxinphepService->delete($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }
}

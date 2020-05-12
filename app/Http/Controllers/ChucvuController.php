<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChucvuService;
use App\Http\Requests\ChucvuRequest;
class ChucvuController extends Controller
{

    protected $chucvuService;

    public function __construct(ChucvuService $chucvuService)
    {
        // $this->middleware('auth');
        // $this->middleware('role:admin|superAdmin')->except(['create', 'delete','restore', 'moveToTrash']);
        // $this->middleware('role:superAdmin')->only(['create', 'delete','restore', 'moveToTrash']);
        // $this->middleware('AjaxRequest')->except('index');
        $this->chucvuService = $chucvuService;
    }

    public function index()
    {
        return view('Chuc_vu.index');
    }

    public function getAll()
    {
        $factorSalaries = $this->chucvuService->getAll();

        return response()->json($factorSalaries);
    }

    public function findById($id)
    {
        $chucvu = $this->chucvuService->findById($id);

        return response()->json($chucvu['data'], $chucvu['status']);
    }

    public function create(ChucvuRequest $request)
    {
        $chucvu = $this->chucvuService->create($request->all());

        return response()->json($chucvu['data'], $chucvu['status']);
    }

    public function update(ChucvuRequest $request, $id)
    {
        $chucvu = $this->chucvuService->update($request->all(), $id);

        return response()->json($chucvu['data'], $chucvu['status']);
    }


    public function moveToTrash($id)
    {
        $chucvu = $this->chucvuService->destroy($id);

        return response()->json($chucvu['msg'], $chucvu['status']);
    }

    public function getTrash()
    {
        $factorSalaries = $this->chucvuService->getSoftDeletes();

        return response()->json($factorSalaries);
    }

    public function findTrashById($id)
    {
        $chucvu = $this->chucvuService->findOnlyTrashed($id);

        return response()->json($chucvu['data'], $chucvu['status']);
    }

    public function restore($id)
    {
        $chucvu = $this->chucvuService->restore($id);

        return response()->json($chucvu['msg'], $chucvu['status']);
    }

    public function delete($id)
    {
        $chucvu = $this->chucvuService->delete($id);

        return response()->json($chucvu['msg'], $chucvu['status']);
    }
}

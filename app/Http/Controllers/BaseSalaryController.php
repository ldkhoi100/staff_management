<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseSalaryRequest;
use App\Services\BaseSalaryService;
use Illuminate\Http\Request;

class BaseSalaryController extends Controller
{
    protected $baseSalaryService;

    public function __construct(BaseSalaryService $baseSalaryService)
    {
        $this->middleware('AjaxRequest')->except('index');
        $this->baseSalaryService = $baseSalaryService;
    }

    public function index()
    {
        return view('base_salaries.index');
    }

    public function getAll()
    {
        $baseSalary = $this->baseSalaryService->getAll();

        return response()->json($baseSalary);
    }

    public function findById($id)
    {
        $baseSalary = $this->baseSalaryService->findById($id);

        return response()->json($baseSalary['data'], $baseSalary['status']);
    }

    public function create(BaseSalaryRequest $request)
    {
        $baseSalary = $this->baseSalaryService->create($request->all());

        return response()->json($baseSalary['data'], $baseSalary['status']);
    }

    public function update(BaseSalaryRequest $request, $id)
    {
        $baseSalary = $this->baseSalaryService->update($request->all(), $id);

        return response()->json($baseSalary['data'], $baseSalary['status']);
    }


    public function moveToTrash($id)
    {
        $baseSalary = $this->baseSalaryService->destroy($id);

        return response()->json($baseSalary['msg'], $baseSalary['status']);
    }

    public function getTrash()
    {
        $baseSalary = $this->baseSalaryService->getSoftDeletes();

        return response()->json($baseSalary);
    }

    public function findTrashById($id)
    {
        $baseSalary = $this->baseSalaryService->findOnlyTrashed($id);

        return response()->json($baseSalary['data'], $baseSalary['status']);
    }

    public function restore($id)
    {
        $baseSalary = $this->baseSalaryService->restore($id);

        return response()->json($baseSalary['msg'], $baseSalary['status']);
    }

    public function delete($id)
    {
        $baseSalary = $this->baseSalaryService->delete($id);

        return response()->json($baseSalary['msg'], $baseSalary['status']);
    }
}

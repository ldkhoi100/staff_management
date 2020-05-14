<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseSalaryRequest;
use App\Http\Requests\FactorSalaryRequest;
use App\Services\FactorSalaryService;
use App\Services\LuongCoBanService;

class FactorSalaryController extends Controller
{

    protected $factorSalaryService;
    protected $baseSalary;

    public function __construct(FactorSalaryService $factorSalaryService, LuongCoBanService $luongcoban)
    {
        $this->middleware('AjaxRequest')->except('index');
        $this->factorSalaryService = $factorSalaryService;
        $this->baseSalary = $luongcoban;
    }

    public function index()
    {
        return view('factor_salaries.index');
    }

    public function getAll()
    {
        $factorSalaries = $this->factorSalaryService->getAll();

        return response()->json($factorSalaries);
    }

    public function findById($id)
    {
        $factorSalary = $this->factorSalaryService->findById($id);

        return response()->json($factorSalary['data'], $factorSalary['status']);
    }

    public function create(FactorSalaryRequest $request)
    {
        $factorSalary = $this->factorSalaryService->create($request->all());

        return response()->json($factorSalary['data'], $factorSalary['status']);
    }

    public function update(FactorSalaryRequest $request, $id)
    {
        $factorSalary = $this->factorSalaryService->update($request->all(), $id);

        return response()->json($factorSalary['data'], $factorSalary['status']);
    }


    public function moveToTrash($id)
    {
        $factorSalary = $this->factorSalaryService->destroy($id);

        return response()->json($factorSalary['msg'], $factorSalary['status']);
    }

    public function getTrash()
    {
        $factorSalaries = $this->factorSalaryService->getSoftDeletes();

        return response()->json($factorSalaries);
    }

    public function findTrashById($id)
    {
        $factorSalary = $this->factorSalaryService->findOnlyTrashed($id);

        return response()->json($factorSalary['data'], $factorSalary['status']);
    }

    public function restore($id)
    {
        $factorSalary = $this->factorSalaryService->restore($id);

        return response()->json($factorSalary['msg'], $factorSalary['status']);
    }

    public function delete($id)
    {
        $factorSalary = $this->factorSalaryService->delete($id);

        return response()->json($factorSalary['msg'], $factorSalary['status']);
    }

    public function getBaseSalary()
    {
        $baseSalary = $this->baseSalary->get();

        return response()->json($baseSalary, 200);
    }

    public function updateBaseSalary(BaseSalaryRequest $request)
    {
        $baseSalary = $this->baseSalary->update($request->all());

        return response()->json($baseSalary['data'], $baseSalary['status']);
    }
}

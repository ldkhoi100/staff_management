<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactorSalary;
use App\Services\BacLuongService;
use Illuminate\Http\Request;

class BacLuongController extends Controller
{

    protected $factorSalaryService;

    public function __construct(BacLuongService $factorSalaryService)
    {
        // $this->middleware(function ($request, $next) {
        //     if ($request->ajax()) {
        //         return $next($request);
        //     }
        //     abort(404);
        // });

        $this->factorSalaryService = $factorSalaryService;
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

    public function create(FactorSalary $request)
    {
        $factorSalary = $this->factorSalaryService->create($request->all());

        return response()->json($factorSalary['data'], $factorSalary['status']);
    }

    public function update(FactorSalary $request, $id)
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
}

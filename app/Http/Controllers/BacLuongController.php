<?php

namespace App\Http\Controllers;

use App\Services\BacLuongService;
use Illuminate\Http\Request;

class BacLuongController extends Controller
{

    protected $factorSalaryService;

    public function __construct(BacLuongService $factorSalaryService)
    {
        // $this->middleware('role:ROLE_ADMIN|ROLE_SUPERADMIN');
        $this->factorSalaryService = $factorSalaryService;
    }

    public function index()
    {
        $factorSalaries = $this->factorSalaryService->getAll();

        return response()->json($factorSalaries, 200);
    }


    public function create()
    {
        return view('factorSalarys.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $factorSalary = $this->factorSalaryService->create($data);

        return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
    }

    public function show($id)
    {
        $factorSalary = $this->factorSalaryService->findById($id);

        return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
    }


    public function edit($id)
    {
        $factorSalary = $this->factorSalaryService->findById($id);

        return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
    }


    public function update(Request $request, $id)
    {
        $factorSalary = $this->factorSalaryService->update($request->all(), $id);

        return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
    }


    public function destroy($id)
    {
        $factorSalary = $this->factorSalaryService->destroy($id);

        return response()->json($factorSalary['message'], $factorSalary['statusCode']);
    }

    public function getSoftDeletes()
    {
        $factorSalary = $this->factorSalaryService->getSoftDeletes();

        return response()->json($factorSalary, 200);
    }

    public function restore($id)
    {
        $factorSalary = $this->factorSalaryService->restore($id);

        return response()->json($factorSalary['message'], $factorSalary['statusCode']);
    }

    public function delete($id)
    {
        $factorSalary = $this->factorSalaryService->delete($id);

        return response()->json($factorSalary['message'], $factorSalary['statusCode']);
    }
}

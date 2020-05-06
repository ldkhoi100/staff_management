<?php

namespace App\Http\Controllers;

use App\Services\BacLuongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BacLuongController extends Controller
{

    protected $factorSalaryService;

    public function __construct(BacLuongService $factorSalaryService)
    {
        // $this->middleware('auth');
        // $this->middleware('role:ROLE_ADMIN')->only(['index', 'show']);
        // $this->middleware('role:ROLE_SUPERADMIN');
        $this->factorSalaryService = $factorSalaryService;
    }

    public function index()
    {
        $factorSalaries = $this->factorSalaryService->getAll();

        return view('factor_salaries.all', compact('factorSalaries'));

        // return response()->json($factorSalaries, 200);
    }


    public function create()
    {
        return view('factor_salaries.crud.edit');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $validator = Validator::make($data, [
            'Bac_Luong' => ['required', 'min:1', 'max:5', 'unique:bac_luong']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->messages(), 202);
        } else {
            $factorSalary = $this->factorSalaryService->create($data);

            // return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
        }
    }

    public function show($id)
    {
        $factorSalary = $this->factorSalaryService->findById($id)['bac_luong'];

        return view('factor_salaries.crud.show', compact('factorSalary'));

        // $factorSalary = $this->factorSalaryService->findById($id);

        // return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
    }


    public function edit($id)
    {
        $factorSalary = $this->factorSalaryService->findById($id)['bac_luong'];

        return view('factor_salaries.crud.edit', compact('factorSalary'));

        // $factorSalary = $this->factorSalaryService->findById($id);

        // return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'Bac_Luong' => ['required', 'min:1', 'max:5', "unique:bac_luong,Bac_Luong,$id,id"]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->messages(), 202);
        } else {
            $factorSalary = $this->factorSalaryService->update($request->all(), $id);

            // return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
        }
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

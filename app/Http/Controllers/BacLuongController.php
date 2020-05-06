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
        // $this->middleware('role:ROLE_ADMIN')->only('index');
        // $this->middleware('role:ROLE_SUPERADMIN');
        $this->middleware(function ($request, $next) {
            if ($request->ajax()) {
                return $next($request);
            }
            abort(404);
        });

        $this->factorSalaryService = $factorSalaryService;
    }

    public function index()
    {
        $factorSalaries = $this->factorSalaryService->getAll();

        $data =  view('factor_salaries.all', compact('factorSalaries'));

        return response()->make($data, 200);

        // return view('factor_salaries.all', compact('factorSalaries'));

        // return response()->json($factorSalaries, 200);
    }


    public function create()
    {
        $data = view('factor_salaries.crud.create');

        return response()->make($data, 200);
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $validator = Validator::make($data, [
            'Bac_Luong' => ['required', 'numeric', 'min:1', 'max:5', 'unique:bac_luong']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->messages(), 202);
        } else {
            $factorSalary = $this->factorSalaryService->create($data);
            return response('', 200);
            // return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
        }
    }

    // public function show($id)
    // {
    //     $factorSalary = $this->factorSalaryService->findById($id)['bac_luong'];

    // return view('factor_salaries.crud.show', compact('factorSalary'));

    // $factorSalary = $this->factorSalaryService->findById($id);

    // return response()->json($factorSalary['bac_luong'], $factorSalary['statusCode']);
    // }


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
            'Bac_Luong' => ['required', 'numeric', 'min:1', 'max:5', "unique:bac_luong"]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->messages(), 202);
        } else {
            $factorSalary = $this->factorSalaryService->update($request->all(), $id);

            return response()->json('', $factorSalary['statusCode']);
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

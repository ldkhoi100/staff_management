<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RolesController extends Controller
{
    protected $Role_Service;

    public function __construct(RoleService $Role_Service)
    {
        $this->Role_Service = $Role_Service;
    }

    public function index()
    {
        $roles = $this->Role_Service->getAll();
        return view('Role.all',compact('roles'));

//        return response()->json($factorSalaries, 200);
    }

    public function create()
    {
        return view('Role.modal.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $factorSalary = $this->Role_Service->create($data);

        return response()->json('', $factorSalary['statusCode']);

//        return response()->json($factorSalary['role'], $factorSalary['statusCode']);
    }

    public function show($id)
    {
        $factorSalary = $this->Role_Service->findById($id);

        return response()->json($factorSalary['role'], $factorSalary['statusCode']);
    }


    public function edit($id)
    {
        $roles = $this->Role_Service->findById($id);
        return response()->make(view('Role.modal.edit',['role'=>$roles['role']]),$roles['statusCode']);
//        return response()->json($factorSalary['role'], $factorSalary['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'name'=>['required','min:1','max:255']
        ]);
        if ($validator -> fails()){
            return response()->json($validator->errors()->messages(),202);
        } else {
            $role = $this->Role_Service->update($request->all(),$id);
            return response()->json('',$role['statusCode']);
        }



//        $roles = $this->Role_Service->update($request->all(), $id);
//        return response()->json($factorSalary['role'], $factorSalary['statusCode']);
    }


    public function destroy($id)
    {
        $factorSalary = $this->Role_Service->destroy($id);

        return response()->json($factorSalary['message'], $factorSalary['statusCode']);
    }

    public function getSoftDeletes()
    {
        $factorSalary = $this->Role_Service->getSoftDeletes();

        return response()->json($factorSalary, 200);
    }

    public function restore($id)
    {
        $factorSalary = $this->Role_Service->restore($id);

        return response()->json($factorSalary['message'], $factorSalary['statusCode']);
    }

    public function delete($id)
    {
        $factorSalary = $this->Role_Service->delete($id);

        return response()->json($factorSalary['message'], $factorSalary['statusCode']);
    }
}

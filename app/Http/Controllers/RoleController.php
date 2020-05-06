<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;


class RoleController extends Controller
{
    protected $Role_Service;

    public function __construct(RoleService $Role_Service)
    {
        $this->Role_Service = $Role_Service;
    }

    public function index()
    {
        $factorSalaries = $this->Role_Service->getAll();

        return response()->json($factorSalaries, 200);
    }

    public function create()
    {
        return view('Role.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $factorSalary = $this->Role_Service->create($data);

        return response()->json($factorSalary['roles'], $factorSalary['statusCode']);
    }

    public function show($id)
    {
        $factorSalary = $this->Role_Service->findById($id);

        return response()->json($factorSalary['roles'], $factorSalary['statusCode']);
    }


    public function edit($id)
    {
        $factorSalary = $this->Role_Service->findById($id);

        return response()->json($factorSalary['roles'], $factorSalary['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $factorSalary = $this->Role_Service->update($request->all(), $id);

        return response()->json($factorSalary['roles'], $factorSalary['statusCode']);
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

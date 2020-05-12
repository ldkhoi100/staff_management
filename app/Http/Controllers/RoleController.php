<?php

namespace App\Http\Controllers;
use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;



class RoleController extends Controller
{
    protected $Role_Service;

    public function __construct(RoleService $Role_Service)
    {
        $this->Role_Service = $Role_Service;
    }

    public function index()
    {
        $role = $this->Role_Service->getAll();
//        return view('Role.list',compact($factorSalaries));

        return response()->json($role, 200);
    }
    public function getSoftDeletes(){
        $role = $this->Role_Service->getSoftDeletes();

        return response()->json($role, 200);
    }

    public function create(RoleRequest $request)
    {
        $RoleRequest = $this->Role_Service->create($request->all());

        return response()->json($RoleRequest['role'], $RoleRequest['status']);

//        return view('Role.create');
    }

    public function store(RoleRequest $request)
    {
        $data = $request->all();
        $role = $this->Role_Service->create($data);

        return response()->json($role['role'], $role['statusCode']);
    }

    public function show($id)
    {
        $role = $this->Role_Service->findById($id);

        return response()->json($role['role'], $role['statusCode']);
    }


    public function edit($id)
    {
        $role = $this->Role_Service->findById($id);

        return response()->json($role['role'], $role['statusCode']);
    }

    public function update(RoleRequest $request, $id)
    {
        $role = $this->Role_Service->update($request->all(), $id);

        return response()->json($role['role'], $role['statusCode']);
    }


    public function destroy($id)
    {
        $role = $this->Role_Service->destroy($id);

        return response()->json($role['message'], $role['statusCode']);
    }

    public function restore($id)
    {
        $role = $this->Role_Service->restore($id);

        return response()->json($role['message'], $role['statusCode']);
    }

    public function delete($id)
    {
        $role = $this->Role_Service->delete($id);

        return response()->json($role['message'], $role['statusCode']);
    }
}

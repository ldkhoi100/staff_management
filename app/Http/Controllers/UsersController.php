<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Services\UserService;
use Validator;
use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\RoleService;

class UsersController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        // $this->middleware('role:ROLE_ADMIN', ['only' => ['index']]);
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return view('users.index', compact('users'));
    }

    public function indexAjax()
    {
        $users = $this->userService->getAll();

        return view('users.ajax.list', compact('users'));
    }


    public function selectRole()
    {
        $roles = $this->roleService->getAll();

        return response()->json($roles, 200);
    }

    // public function show($id)
    // {
    //     $data = $this->userService->findById($id);
    //     return response()->json(['data' => $data]);
    // }

    public function store(UserCreateRequest $request)
    {
        $data = $request->except('block', 'password', 'roles');
        $data['password'] = Hash::make($request->password);
        $data['block'] = $request->block ? 1 : 0;
        $data = $this->userService->create([$data, $request->roles]);

        return response()->json($data['data'], $data['statusCode']);
    }

    public function edit($id)
    {
        $data = $this->userService->findWithTrashed($id);
        $role = $data['data']->roles;

        return response()->json([$data['data'], $role], 200);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $requestData = $request->except('id', 'block', 'roles');
        $requestData['block'] = $request->block ? 1 : 0;

        $data = $this->userService->update([$requestData, $request->roles], $id);

        return response()->json($data['data'], $data['statusCode']);
    }

    public function moveToTrash($id)
    {
        $data = $this->userService->destroy($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function getSoftDeletes()
    {
        $users = $this->userService->getSoftDeletes();

        return view('users.ajax.trash', compact('users'));
    }

    public function restore($id)
    {
        $data = $this->userService->restore($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function delete($id)
    {
        $data = $this->userService->delete($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function block($id)
    {
        $data = $this->userService->blockUser($id);

        return response()->json($data['message'], $data['statusCode']);
    }
}
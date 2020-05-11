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

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        // $this->middleware('role:ROLE_ADMIN', ['only' => ['index']]);
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return view('users.list', compact('users'));
    }

    public function indexAjax()
    {
        $users = $this->userService->getAll();

        return view('users.ajax.list', compact('users'));
    }


    // public function selectRole()
    // {
    //     $roles = Role::all();
    //     return response()->json($roles, 200);
    // }

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
        $data = $this->userService->create($data);

        // $this->userService->selectRole($request->username, $request->roles);

        return response()->json($data['users'], $data['statusCode']);
    }

    public function edit($id)
    {
        $data = $this->userService->findWithTrashed($id);

        return response()->json($data['users'], $data['statusCode']);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $requestData = $request->except('id', 'block');
        $requestData['block'] = $request->block ? 1 : 0;

        $data = $this->userService->update($requestData, $id);

        return response()->json($data['users'], $data['statusCode']);
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
        $this->userService->blockUser($id);

        return response()->json(['success' => 'Updated this user.']);
    }
}
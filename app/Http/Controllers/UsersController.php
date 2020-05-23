<?php

namespace App\Http\Controllers;

use Str;
use App\Model\Role;
use App\Services\UserService;
use Validator;
use App\User;
use Hash;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\RoleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->middleware('auth');
        $this->middleware('AjaxRequest')->except('index');
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return view('Users.index', compact('users'));
    }

    public function indexAjax()
    {
        $users = $this->userService->getAll();

        return view('Users.ajax.list', compact('users'));
    }


    public function selectRole()
    {
        $roles = $this->roleService->findById(1);

        return response()->json($roles['role'], $roles['statusCode']);
    }

    // public function show($id)
    // {
    //     $data = $this->userService->findById($id);
    //     return response()->json(['data' => $data]);
    // }

    public function store(UserCreateRequest $request)
    {
        $hash = $this->userService->getAll()->pluck('hash')->toArray();
        $data = $request->except('block', 'password', 'roles', 'hash');
        $data['password'] = Hash::make($request->password);
        $data['block'] = $request->block ? 1 : 0;

        $data['hash'] = rand(1000000000, 9999999999);
        while (in_array($data['hash'], $hash)) {
            $data['hash'] = rand(1000000000, 9999999999);
        }

        $data = $this->userService->create([$data, $request->roles]);

        return response()->json($data['data'], $data['statusCode']);
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->userService->findWithTrashed($id);
        $role = $data['data']->roles;

        return response()->json([$data['data'], $role], 200);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        if ($request->roles[0] == "2") {
            $request->roles = null;
        }
        $requestData = $request->except('id', 'block', 'roles');
        $requestData['block'] = $request->block ? 1 : 0;
        $data = $this->userService->update([$requestData, $request->roles], $id, $request->hash);

        return response()->json($data['data'], $data['statusCode']);
    }

    public function moveToTrash($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->userService->destroy($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function getSoftDeletes()
    {
        $users = $this->userService->getSoftDeletes();

        return view('Users.ajax.trash', compact('users'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->userService->restore($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->userService->delete($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function block($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->userService->blockUser($id);

        return response()->json($data['message'], $data['statusCode']);
    }
}
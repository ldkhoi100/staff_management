<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Services\UserService;
use Validator;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('role:ROLE_ADMIN', ['only' => ['index']]);
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

    public function selectRole()
    {
        $roles = Role::all();
        return response()->json($roles, 200);
    }

    // public function show($id)
    // {
    //     $dataUser = $this->userService->findById($id);
    //     return response()->json(['data' => $dataUser]);
    // }

    public function store(Request $request)
    {
        // dd($request->roles);
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9]{5,}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/ix'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->passes()) {
            $data = $request->except('block', 'password', 'roles');
            $data['password'] = Hash::make($request->password);
            $data['block'] = $request->block ? 1 : 0;
            $data = $this->userService->create($data);

            $this->userService->selectRole($request->username, $request->roles);

            return response()->json($data['users'], $data['statusCode']);
        } else {
            return response()->json(['error' => $validator->errors()->messages()]);
        }
    }

    public function edit($id)
    {
        $dataUser = $this->userService->findWithTrashed($id);
        return response()->json($dataUser['users'], $dataUser['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9]{5,}$/', 'unique:users,username,' . $id],
            'email' => ['required', 'email',  'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/ix', 'unique:users,email,' . $id]
        ]);

        if ($validator->passes()) {
            $requestData = $request->except('id', 'block');
            $requestData['block'] = $request->block ? 1 : 0;

            $data = $this->userService->update($requestData, $id);

            return response()->json($data['users'], $data['statusCode']);
        } else {
            return response()->json(['error' => $validator->errors()->messages()]);
        }
    }

    public function destroy($id)
    {
        $dataUser = $this->userService->destroy($id);

        return response()->json($dataUser['message'], $dataUser['statusCode']);
    }

    public function getSoftDeletes()
    {
        $dataUser = $this->userService->getSoftDeletes();

        return response()->json($dataUser, 200);
    }

    public function restore($id)
    {
        $dataUser = $this->userService->restore($id);

        return response()->json($dataUser['message'], $dataUser['statusCode']);
    }

    public function delete($id)
    {
        $dataUser = $this->userService->delete($id);

        return response()->json($dataUser['message'], $dataUser['statusCode']);
    }

    public function block($id)
    {
        $this->userService->blockUser($id);
        return response()->json(['success' => 'Updated this user.']);
    }
}
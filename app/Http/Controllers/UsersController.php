<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Validator;
use Illuminate\Http\Request;
use App\User;
use Hash;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view('users.list', compact('users'));
        // return response()->json($users, 200);
    }

    public function showUserAjax()
    {
        $users = $this->userService->getAll();
        return view('users.ajax.list', compact('users'));
        // return response()->json($users, 200);
    }

    // public function show($id)
    // {
    //     $dataUser = $this->userService->findById($id);
    //     return response()->json(['data' => $dataUser]);
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9]{5,}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/ix'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        if ($validator->passes()) {
            $user = [];
            $user['username'] = request('username');
            $user['email'] = request('email');
            $user['password'] = Hash::make(request('password'));
            $this->userService->create($user);
            return response()->json(['success' => 'Added new records.']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function edit($id)
    {
        // dd($id);
        $dataUser = $this->userService->findById($id);
        return response()->json($dataUser);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $id, 'regex:/^[a-zA-Z0-9]{5,}$/'],
            'email' => ['required', 'email',  'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/ix', 'unique:users,email,' . $id]
        ]);

        if ($validator->passes()) {
            $user = [];
            $user['username'] = request('username');
            $user['email'] = request('email');
            
            $this->userService->update($user, $id);

            return response()->json(['success' => 'Updated new records.']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        
        // $dataUser = $this->userService->update($request->all(), $id);
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
}
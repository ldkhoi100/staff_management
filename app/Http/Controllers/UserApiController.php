<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return response()->json($users, 200);
    }

    public function show($id)
    {
        $dataUser = $this->userService->findById($id);

        return response()->json($dataUser['users'], $dataUser['statusCode']);
    }

    public function store(Request $request)
    {
        $array = [];
        $array = $request->except($request->password);
        $array['password'] = bcrypt($request->password);
        $dataUser = $this->userService->create($array);

        return response()->json($dataUser['users'], $dataUser['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataUser = $this->userService->update($request->all(), $id);

        return response()->json($dataUser['users'], $dataUser['statusCode']);
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
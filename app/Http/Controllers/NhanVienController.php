<?php

namespace App\Http\Controllers;

use App\Services\NhanVienService;
use App\Services\ChucvuService;
use Str;
use Validator;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NhanVienController extends Controller
{
    protected $staffService;
    protected $chucVuService;

    public function __construct(NhanVienService $staffService, ChucvuService $chucVuService)
    {
        $this->middleware('auth');
        $this->middleware('AjaxRequest')->except('index');
        $this->staffService = $staffService;
        $this->chucVuService = $chucVuService;
    }

    public function index()
    {
        $staffs = $this->staffService->getAll();

        return view('nhanvien.index', compact('staffs'));
    }

    public function indexAjax()
    {
        $staffs = $this->staffService->getAll();

        return view('nhanvien.ajax.list', compact('staffs'));
    }


    public function selectMaCV()
    {
        $maCV = $this->chucVuService->getAll();

        return response()->json($maCV, 200);
    }

    // public function show($id)
    // {
    //     $data = $this->staffService->findById($id);
    //     return response()->json(['data' => $data]);
    // }

    public function store(UserCreateRequest $request)
    {
        $hash = $this->staffService->getAll()->pluck('hash')->toArray();
        $data = $request->except('block', 'password', 'roles', 'hash');
        $data['password'] = Hash::make($request->password);
        $data['block'] = $request->block ? 1 : 0;

        $data['hash'] = rand(1000000000, 2147483640);
        while (in_array($data['hash'], $hash)) {
            $data['hash'] = rand(1000000000, 2147483640);
        }

        $data = $this->staffService->create([$data, $request->roles]);

        return response()->json($data['data'], $data['statusCode']);
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->findWithTrashed($id);
        $role = $data['data']->roles;

        return response()->json([$data['data'], $role], 200);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $requestData = $request->except('id', 'block', 'roles');
        $requestData['block'] = $request->block ? 1 : 0;
        $data = $this->staffService->update([$requestData, $request->roles], $id, $request->hash);

        return response()->json($data['data'], $data['statusCode']);
    }

    public function moveToTrash($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->destroy($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function getSoftDeletes()
    {
        $staffs = $this->staffService->getSoftDeletes();

        return view('nhanvien.ajax.trash', compact('staffs'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->restore($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->delete($id);

        return response()->json($data['message'], $data['statusCode']);
    }

    public function block($id)
    {
        $id = Crypt::decrypt($id);
        $data = $this->staffService->blockUser($id);

        return response()->json($data['message'], $data['statusCode']);
    }
}
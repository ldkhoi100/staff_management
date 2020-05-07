<?php

namespace App\Http\Controllers;

use App\Services\NhanVienService;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    protected $nhan_vien_Service;

    public function __construct(NhanVienService $nhan_vien_Service)
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN')->only(['index', 'show']);
        $this->middleware('role:ROLE_SUPERADMIN')->only(['index', 'show']);
        $this->nhan_vien_Service = $nhan_vien_Service;
    }

    public function index()
    {
        $nhan_vien = $this->nhan_vien_Service->getAll();
        return response()->json($nhan_vien, 200);
    }

    public function show($id)
    {
        $dataNhanVien = $this->nhan_vien_Service->findById($id);

        return response()->json($dataNhanVien['users'], $dataNhanVien['statusCode']);
    }

    public function store(Request $request)
    {
        $array = [];
        $array = $request->except($request->password);
        $array['password'] = bcrypt($request->password);
        $dataNhanVien = $this->nhan_vien_Service->create($array);

        return response()->json($dataNhanVien['users'], $dataNhanVien['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataNhanVien = $this->nhan_vien_Service->update($request->all(), $id);

        return response()->json($dataNhanVien['users'], $dataNhanVien['statusCode']);
    }

    public function destroy($id)
    {
        $dataNhanVien = $this->nhan_vien_Service->destroy($id);

        return response()->json($dataNhanVien['message'], $dataNhanVien['statusCode']);
    }

    public function getSoftDeletes()
    {
        $dataNhanVien = $this->nhan_vien_Service->getSoftDeletes();

        return response()->json($dataNhanVien, 200);
    }

    public function restore($id)
    {
        $dataNhanVien = $this->nhan_vien_Service->restore($id);

        return response()->json($dataNhanVien['message'], $dataNhanVien['statusCode']);
    }

    public function delete($id)
    {
        $dataNhanVien = $this->nhan_vien_Service->delete($id);

        return response()->json($dataNhanVien['message'], $dataNhanVien['statusCode']);
    }
}
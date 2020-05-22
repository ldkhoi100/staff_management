<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonxinphepRequest;
use Illuminate\Http\Request;
use App\Services\DonXinPhepService;
use App\Services\NhanVienService;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMail;
use App\Model\NhanVien;
use App\Model\Role;
use App\User;
use Auth;

class DonXinPhepController extends Controller
{
    protected $donxinphepService;
    protected $nhanVienService;

    public function __construct(DonXinPhepService $donxinphepService, NhanVienService $nhanVienService)
    {
        // $this->middleware('auth');
        // $this->middleware('AjaxRequest')->except('index');
        $this->donxinphepService = $donxinphepService;
        $this->nhanVienService = $nhanVienService;
    }

    public function index()
    {
        return view('donxinphep.index');
    }

    public function getAll()
    {
        $factorSalaries = $this->donxinphepService->getAll()->toArray();

        foreach ($factorSalaries as $key => $value) {
            $factorSalaries[$key]['nhanvien_name'] = NhanVien::find($value['MaNV'])->Ho_Ten;
        }

        return response()->json($factorSalaries);
    }


    public function show($id)
    {

        $data = $this->donxinphepService->findById($id);
        $data['NhanVien'] = NhanVien::find($data['data']['MaNV'])->Ho_Ten;

        return response()->json(['data' => $data], 200);
    }

    public function findById($id)
    {
        $donxinphep = $this->donxinphepService->findById($id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function sendmail($email, $name, $TieuDe, $NoiDung)
    {
        Mail::to($email)->send(new ReplyMail($name, $TieuDe, $NoiDung));
    }

    public function create(DonxinphepRequest $request)
    {
        $array = $request->all();
        $array['MaNV'] = Auth::id();

        $donxinphep = $this->donxinphepService->create($array);
        $fullName = $this->nhanVienService->findFullName();

        $users = User::all();

        foreach ($users as $user) {
            if (count($user->roles) > 0) {
                $this->sendmail($user->email, $fullName['data'], $donxinphep['data'], $request->NoiDung);
            }
        }

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function update(DonxinphepRequest $request, $id)
    {
        $donxinphep = $this->donxinphepService->update($request->all(), $id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }


    public function moveToTrash($id)
    {
        $donxinphep = $this->donxinphepService->destroy($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }

    public function getTrash()
    {
        $factorSalaries = $this->donxinphepService->getSoftDeletes();

        foreach ($factorSalaries as $key => $value) {
            $factorSalaries[$key]['nhanvien_name'] = NhanVien::find($value['MaNV'])->Ho_Ten;
        }

        return response()->json($factorSalaries);
    }

    public function findTrashById($id)
    {
        $donxinphep = $this->donxinphepService->findOnlyTrashed($id);

        return response()->json($donxinphep['data'], $donxinphep['status']);
    }

    public function restore($id)
    {
        $donxinphep = $this->donxinphepService->restore($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }

    public function delete($id)
    {
        $donxinphep = $this->donxinphepService->delete($id);

        return response()->json($donxinphep['msg'], $donxinphep['status']);
    }
}
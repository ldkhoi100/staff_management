<?php

namespace App\Http\Controllers;

use App\Model\DonXinPhep;
use App\Model\NhanVien;
use App\Services\DonXinPhepService;
use App\Services\NhanVienService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct(UserService $userService, NhanVienService $nhanVienService)
    {
        $this->userService = $userService;
        $this->nhanVienService = $nhanVienService;
    }

    public function index()
    {
        $staff = NhanVien::where("id", Auth::id())->first();
        $nghiPhep = DonXinPhep::where("MaNV", Auth::id())->orderBy("created_at", "DESC")->get();

        // Cham

        return view('Profile.index', compact('staff', 'nghiPhep'));
    }

    // public function lichSuNghi()
    // {

    //     return response()->json($donXinPhep, 200);
    // }
}
<?php

namespace App\Http\Controllers;

use App\Model\TimeSheets;
use App\Services\DonXinPhepService;
use App\Services\NhanVienService;
use App\Services\TimeSheetsService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    protected $userService;
    protected $nhanVienService;
    protected $donXinPhep;
    protected $timeSheetsService;

    public function __construct(UserService $userService, NhanVienService $nhanVienService, DonXinPhepService $donXinPhep, TimeSheetsService $timeSheetsService)
    {
        $this->middleware("auth");
        $this->middleware('AjaxRequest')->except('index');
        $this->userService = $userService;
        $this->nhanVienService = $nhanVienService;
        $this->donXinPhep = $donXinPhep;
        $this->timeSheetsService = $timeSheetsService;
    }

    public function index(Request $request)
    {
        if (count(Auth::user()->roles) > 0 && Auth::user()->roles[0]->name == "ROLE_SUPERADMIN") {
            $error = "Access area for staff and management";
            return response()->json($error, 401);
        }

        $staff = $this->nhanVienService->findIdAuth()['data'];
        $nghiPhep = $this->donXinPhep->findMaNV(Auth::id());

        $month = $request->month ? date("m", strtotime($request->month)) : date("m");
        $year = $request->month ? $year = date("Y", strtotime($request->month)) : date("Y");
        $month_year = $request->month ? date("m-Y", strtotime($request->month)) : date("m-Y");

        $date_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $result = [];
        $total = 0;
        $count = 0;

        for ($i = 0; $i < $date_in_month; $i++) {
            $chamCong = $this->timeSheetsService->findMaNV($i, $month)['data'];

            if ($chamCong != null) {
                if ($chamCong->Nghi_Phep == 0) {
                    $total += $chamCong->luongCB->Tien_Luong * ($chamCong->Luong / 100) * ($chamCong->Ngay_Le + 1) * (strlen($chamCong->nhan_vien->ca_lam->Ca)) * $chamCong->nhan_vien->chuc_vu->Bac_Luong;
                    $count += 1;
                }
                $chamCong['Ca_Lam'] = ($this->nhanVienService->findWithTrashed(Auth::id()))['data']->ca_lam->Mo_Ta;
                $chamCong['So_Ca_Lam'] = ($this->nhanVienService->findWithTrashed(Auth::id()))['data']->ca_lam->Ca;
                $chamCong['Tien_Luong'] = $chamCong->luongCB->Tien_Luong;
                $result[] = $chamCong;
            } else {
                $result[] = 0;
            }
        }

        $check_chamCong = TimeSheets::where("MaNV", Auth::id())->where("Ngay_Hien_Tai", date("Y-m-d"))->first();
        if ($check_chamCong != null) {
            $base_salary = $check_chamCong->luongCB->Tien_Luong;
        } else {
            $base_salary = "Not Update";
        }

        $selectMonth = $month_year;

        if ($request->month != null) {
            return view('Profile.ajax.index', compact('result', 'total', 'selectMonth', 'count'));
        } else {
            return view('Profile.index', compact('staff', 'nghiPhep', 'result', 'total', 'selectMonth', 'count', 'base_salary'));
        }
    }

    public function nghiPhep()
    {
        $nghiPhep = $this->donXinPhep->findMaNV();

        return view('Profile.ajax.nghiPhep', compact('nghiPhep'));
    }
}
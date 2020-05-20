<?php

namespace App\Http\Controllers;

use App\Model\ChamCong;
use App\Services\DonXinPhepService;
use App\Services\NhanVienService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    protected $userService;
    protected $nhanVienService;
    protected $donXinPhep;

    public function __construct(UserService $userService, NhanVienService $nhanVienService, DonXinPhepService $donXinPhep)
    {
        $this->middleware("auth");
        $this->userService = $userService;
        $this->nhanVienService = $nhanVienService;
        $this->donXinPhep = $donXinPhep;
    }

    public function index()
    {
        $staff = $this->nhanVienService->findIdAuth()['data'];
        $nghiPhep = $this->donXinPhep->findMaNV();

        $date_in_month = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
        $result = [];
        $total = 0;

        for ($i = 0; $i < $date_in_month; $i++) {
            $chamCong = ChamCong::whereDay("Ngay_Hien_Tai", $i + 1)->whereMonth("Ngay_Hien_Tai", date("m"))->where("MaNV", Auth::id())->first();
            if ($chamCong) {
                $total += $chamCong->luongCB->Tien_Luong * ($chamCong->Luong / 100) * ($chamCong->Ngay_Le + 1) * (strlen($chamCong->nhan_vien->ca_lam->Ca));
                $XinPhep = ($this->donXinPhep->findWithDatePicker(++$i, date("m")))['data'];
                if ($XinPhep) {
                    $result[] = $XinPhep;
                } else {
                    $chamCong['Ca_Lam'] = ($this->nhanVienService->findWithTrashed(Auth::id()))['data']->ca_lam->Mo_Ta;
                    $chamCong['So_Ca_Lam'] = ($this->nhanVienService->findWithTrashed(Auth::id()))['data']->ca_lam->Ca;
                    $chamCong['Tien_Luong'] = $chamCong->luongCB->Tien_Luong;
                    $result[] = $chamCong;
                }
            } else {
                $result[] = 0;
            }
        }

        return view('Profile.index', compact('staff', 'nghiPhep', 'result', 'total'));
    }

    public function select_month(Request $request)
    {
        $month = date("m", strtotime($request->month));
        $year = date("Y", strtotime($request->month));

        $date_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $result = [];
        $total = 0;

        for ($i = 0; $i < $date_in_month; $i++) {
            $chamCong = ChamCong::whereDay("Ngay_Hien_Tai", $i + 1)->whereMonth("Ngay_Hien_Tai", $month)->where("MaNV", Auth::id())->first();
            if ($chamCong) {
                $total += $chamCong->luongCB->Tien_Luong * ($chamCong->Luong / 100) * ($chamCong->Ngay_Le + 1) * (strlen($chamCong->nhan_vien->ca_lam->Ca));
                $XinPhep = ($this->donXinPhep->findWithDatePicker(++$i, date("m")))['data'];
                if ($XinPhep) {
                    $result[] = $XinPhep;
                } else {
                    $chamCong['Ca_Lam'] = ($this->nhanVienService->findWithTrashed(Auth::id()))['data']->ca_lam->Mo_Ta;
                    $chamCong['So_Ca_Lam'] = ($this->nhanVienService->findWithTrashed(Auth::id()))['data']->ca_lam->Ca;
                    $chamCong['Tien_Luong'] = $chamCong->luongCB->Tien_Luong;
                    $result[] = $chamCong;
                }
            } else {
                $result[] = 0;
            }
        }

        return view('Profile.ajax.index', compact('result', 'total'));
    }

    public function changeMonth(Request $request)
    {
        $month = date("m", strtotime($request->month));
        $year = date("Y", strtotime($request->month));

        $date_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $data = [];
        $total = 0;

        for ($i = 0; $i < $date_in_month; $i++) {
            $chamCong = ChamCong::whereDay("Ngay_Hien_Tai", $i + 1)->whereMonth("Ngay_Hien_Tai", $month)->where("MaNV", Auth::id())->first();
            if ($chamCong) {
                $total += $chamCong->luongCB->Tien_Luong * ($chamCong->Luong / 100) * ($chamCong->Ngay_Le + 1) * (strlen($chamCong->nhan_vien->ca_lam->Ca));
            }
        }
        $data['month'] = date("m-Y", strtotime($request->month));
        $data['total'] = $total;

        return response()->json($data, 200);
    }

    public function nghiPhep()
    {
        $nghiPhep = $this->donXinPhep->findMaNV();

        return view('Profile.ajax.nghiPhep', compact('nghiPhep'));
    }
}
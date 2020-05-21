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
        $this->userService = $userService;
        $this->nhanVienService = $nhanVienService;
        $this->donXinPhep = $donXinPhep;
        $this->timeSheetsService = $timeSheetsService;
    }

    public function index()
    {
        // if (count(Auth::user()->roles) > 0 && Auth::user()->roles[0]->name == "ROLE_SUPERADMIN") {
        //     return \abort(401);
        // }

        $staff = $this->nhanVienService->findIdAuth()['data'];
        $nghiPhep = $this->donXinPhep->findMaNV();

        $date_in_month = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
        $result = [];
        $total = 0;

        for ($i = 0; $i < $date_in_month; $i++) {
            $chamCong = $this->timeSheetsService->findMaNV($i + 1, date("m"))['data'];

            if ($chamCong != null) {
                $total += $chamCong->luongCB->Tien_Luong * ($chamCong->Luong / 100) * ($chamCong->Ngay_Le + 1) * (strlen($chamCong->nhan_vien->ca_lam->Ca)) * $chamCong->nhan_vien->chuc_vu->Bac_Luong;
                $XinPhep = ($this->donXinPhep->findWithDatePicker($i + 1, date("m")))['data'];
                if ($XinPhep != null) {
                    $XinPhep['Ghi_Chu'] = $chamCong->Ghi_Chu;
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
        // dd($result);

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
            $chamCong = $this->timeSheetsService->findMaNV($i + 1, $month)['data'];
            if ($chamCong != null) {
                $total += $chamCong->luongCB->Tien_Luong * ($chamCong->Luong / 100) * ($chamCong->Ngay_Le + 1) * (strlen($chamCong->nhan_vien->ca_lam->Ca)) * $chamCong->nhan_vien->chuc_vu->Bac_Luong;
                $XinPhep = ($this->donXinPhep->findWithDatePicker($i + 1, $month))['data'];
                if ($XinPhep != null) {
                    $XinPhep['Ghi_Chu'] = $chamCong->Ghi_Chu;
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
            $chamCong = $this->timeSheetsService->findMaNV($i + 1, $month)['data'];
            if ($chamCong != null) {
                $total += $chamCong->luongCB->Tien_Luong * ($chamCong->Luong / 100) * ($chamCong->Ngay_Le + 1) * (strlen($chamCong->nhan_vien->ca_lam->Ca)) * $chamCong->nhan_vien->chuc_vu->Bac_Luong;
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
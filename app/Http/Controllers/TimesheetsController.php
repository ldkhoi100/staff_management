<?php

namespace App\Http\Controllers;

use App\Model\BaseSalary;
use App\Model\DonXinPhep;
use App\Model\NhanVien;
use App\Model\TimeSheets;
use App\Services\BaseSalaryService;
use App\Services\NhanVienService;
use Illuminate\Http\Request;
use App\Services\TimeSheetsService;

class TimeSheetsController extends Controller
{
    protected $timeSheetsService;
    protected $baseSalaryService;
    protected $nhanVienService;

    public function __construct(TimeSheetsService $timeSheetsService, BaseSalaryService $baseSalaryService, NhanVienService $nhanVienService)
    {
        $this->middleware('AjaxRequest')->except('index');
        $this->timeSheetsService = $timeSheetsService;
        $this->nhanVienService = $nhanVienService;
    }

    public function index()
    {
        return view('timesheets.index');
    }

    /**
     * Lấy  bảng chấm công theo ngày; nếu là ngày mới tự tạo ra bảng mới
     */
    public function getDay($date)
    {
        $timeSheets = $this->timeSheetsService->getDay($date);

        return response()->json($timeSheets, 200);
    }

    /**
     * Cập nhật trường ngày lễ
     */
    public function holiday($status, $date)
    {
        $status = ['Ngay_Le' => $status];
        $timeSheets = $this->timeSheetsService->holiday($status, $date);

        return response()->json($timeSheets);
    }

    /**
     *
     */
    public function sabbatical($id, $status)
    {
        $status = ['Nghi_Phep' => $status];
        $timeSheets = $this->timeSheetsService->update($status, $id);

        return response()->json($timeSheets);
    }

    /**
     * Lương cơ bản
     */
    public function baseSalary($base, $date)
    {
        $base = ['LuongCB'=>$base];
        $timeSheets = $this->timeSheetsService->baseSalary($base,$date);

        return response()->json($timeSheets);
    }

    /**
     * lấy tất cả #chưa sử dụng
     */
    public function getAll()
    {
        $timeSheets = $this->timeSheetsService->getAll();

        return response()->json($timeSheets, 200);
    }

    /**
     * Thống kê tháng
     */

     public function monthStatistic(Request $request)
     {
        $statistic = $this->timeSheetsService->monthStatistic($request->month, $request->year);
        $stt = [];
        foreach($statistic as $st){
            $days = $st->Ngay_Hien_Tai;
            $day = explode("-",$days)[2];
            if($st->Ngay_Le == 1){
                $stt[$st->nhan_vien->Ho_Ten]['day'][$day] = "L";
            }elseif($st->Luong == 0){
                $stt[$st->nhan_vien->Ho_Ten]['day'][$day] ="V";
            }elseif($st->Luong == 100){
                $stt[$st->nhan_vien->Ho_Ten]['day'][$day] = "A";
            }elseif($st->Luong > 100){
                $stt[$st->nhan_vien->Ho_Ten]['day'][$day] = "Th";
            }else{
                $stt[$st->nhan_vien->Ho_Ten]['day'][$day] = "Tr";
            }

            if (isset($stt[$st->nhan_vien->Ho_Ten]['total'])) {
                $stt[$st->nhan_vien->Ho_Ten]['total'] += $st->Luong;
            }else{
                $stt[$st->nhan_vien->Ho_Ten]['total'] = $st->Luong;
            }
        }
        foreach($stt as $key => $nv){
            for ($i=1; $i <=31 ; $i++) {
                if (!array_key_exists($i, $nv['day'])) {
                    $stt[$key]['day'][$i] = "-";
                }
            }
        }

        // $nhanvien = [];
        // $count = 0;
        // foreach($stt as $nv){
        //     dd($nv);
        //     $day = $days;
        //     $nglv = implode('-',$nv->Ngay_Hien_Tai)[2];
        //     // if();
        //     // $nhanvien[$nv->nhan_vien->Ho_Ten][];
        // }
        // $nv;
        return response()->json($stt, 200);
     }

    /**
     * Chưa sử dụng
     */
    public function findById($id)
    {
        $timeSheets = $this->timeSheetsService->findById($id);

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }

    /**
     * Chưa sử dụng
     */
    public function create(Request $request)
    {
        $timeSheets = $this->timeSheetsService->create($request->all());

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }

    /**
     * Chưa sử dụng
     */
    public function update(Request $request, $id)
    {
        $timeSheets = $this->timeSheetsService->update($request->all(), $id);

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }

    /**
     * Chưa sử dụng
     */
    public function moveToTrash($id)
    {
        $timeSheets = $this->timeSheetsService->destroy($id);

        return response()->json($timeSheets['msg'], $timeSheets['status']);
    }

    /**
     * Chưa sử dụng
     */
    public function getTrash()
    {
        $timeSheets = $this->timeSheetsService->getSoftDeletes();

        return response()->json($timeSheets);
    }

    /**
     * Chưa sử dụng
     */
    public function findTrashById($id)
    {
        $timeSheets = $this->timeSheetsService->findOnlyTrashed($id);

        return response()->json($timeSheets['data'], $timeSheets['status']);
    }

    /**
     * Chưa sử dụng
     */
    public function restore($id)
    {
        $timeSheets = $this->timeSheetsService->restore($id);

        return response()->json($timeSheets['msg'], $timeSheets['status']);
    }

    /**
     * Chưa sử dụng
     */
    public function delete($id)
    {
        $timeSheets = $this->timeSheetsService->delete($id);

        return response()->json($timeSheets['msg'], $timeSheets['status']);
    }
}

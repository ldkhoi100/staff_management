<?php

namespace App\Services\Impl;

use App\Repositories\BaseSalaryRepository;
use App\Repositories\NhanVienRepository;
use App\Repositories\TimeSheetsRepository;
use App\Repositories\WorkShiftRepository;
use App\Services\TimeSheetsService;

class TimeSheetsServiceImpl implements TimeSheetsService
{
    protected $timeSheetsRepository;
    protected $baseSalary;
    protected $nhavien;
    protected $workShiftRepository;

    public function __construct(TimeSheetsRepository $timeSheetsRepository, BaseSalaryRepository $baseSalary, NhanVienRepository $nhavien, WorkShiftRepository $workShiftRepository)
    {
        $this->timeSheetsRepository = $timeSheetsRepository;
        $this->baseSalary = $baseSalary;
        $this->nhavien = $nhavien;
        $this->workShiftRepository = $workShiftRepository;
    }

    public function getAll()
    {
        $timeSheets = $this->timeSheetsRepository->getAll();

        return $timeSheets;
    }

    public function findById($id)
    {
        $timeSheets = $this->timeSheetsRepository->findById($id);

        $status = 200;
        if (!$timeSheets)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $timeSheets
        ];

        return $data;
    }

    public function create($request)
    {
        $timeSheets = $this->timeSheetsRepository->create($request);

        $status = 201;
        if (!$timeSheets)
            $status = 500;

        $data = [
            'status' => $status,
            'data' => $timeSheets
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $timeSheets = $this->timeSheetsRepository->findById($id);

        if (!$timeSheets) {
            $newtimeSheets = null;
            $status = 404;
        } else {
            $newtimeSheets = $this->timeSheetsRepository->update($request, $timeSheets);
            $status = 200;
        }

        $data = [
            'status' => $status,
            'data' => $newtimeSheets
        ];

        return $data;
    }

    public function destroy($id)
    {
        $timeSheets = $this->timeSheetsRepository->findById($id);

        $status = 404;
        $msg = "This work shift not found";
        if ($timeSheets) {
            $this->timeSheetsRepository->destroy($timeSheets);
            $status = 200;
            $msg = "Move to trash success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }

    public function getSoftDeletes()
    {
        $timeSheetstrash = $this->timeSheetsRepository->getSoftDeletes();

        return $timeSheetstrash;
    }

    public function findOnlyTrashed($id)
    {
        $timeSheets = $this->timeSheetsRepository->findOnlyTrashed($id);
        $status = 200;

        if (!$timeSheets)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $timeSheets
        ];

        return $data;
    }

    public function restore($id)
    {
        $timeSheets = $this->timeSheetsRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This work shift not found";
        if ($timeSheets) {
            $this->timeSheetsRepository->restore($timeSheets);
            $status = 200;
            $msg = "Restore success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }

    public function delete($id)
    {
        $timeSheets = $this->timeSheetsRepository->findOnlyTrashed($id);

        $status = 404;
        $msg = "This work shift not found";

        if ($timeSheets) {
            $this->timeSheetsRepository->delete($timeSheets);
            $status = 200;
            $msg = "Delete success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }

    public function getDay($date)
    {
        $timeSheets = $this->timeSheetsRepository->getDay($date)->first();
        $dates = strtotime($date);
        $now = strtotime(date('Y-m-d'));
        if (!$timeSheets && $dates == $now) {
            $nhavien = $this->nhavien->getAll();
            $bs = $this->baseSalary->getAll()->first();
            foreach($nhavien as $nv){
                $nv->cham_cong()->create(['Ngay_Hien_Tai'=> $date, 'LuongCB'=>$bs->id]);
            }
        }

        $timeSheets = $this->timeSheetsRepository->getDay($date);

        foreach($timeSheets as $no => $ts){
            $nv = $this->nhavien->findById($ts->MaNV);
            $timeSheets[$no]['NV'] = $nv->Ho_Ten;
            $timeSheets[$no]['Ca'] = $nv->ca_lam->Mo_Ta;
        }

        return $timeSheets;
    }

    public function holiday($status,$date)
    {
        $timeSheets = $this->timeSheetsRepository->getDay($date);

        foreach($timeSheets as $ts){
            $ud = $this->timeSheetsRepository->update($status,$ts);
        }

        $timeSheets = $this->timeSheetsRepository->getDay($date);

        return $timeSheets;
    }

    public function baseSalary($base,$date)
    {
        $timeSheets = $this->timeSheetsRepository->getDay($date);

        foreach($timeSheets as $ts){
            $ud = $this->timeSheetsRepository->update($base,$ts);
        }

        $timeSheets = $this->timeSheetsRepository->getDay($date);

        return $timeSheets;
    }
}

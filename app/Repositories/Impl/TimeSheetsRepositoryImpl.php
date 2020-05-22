<?php

namespace App\Repositories\Impl;

use App\Model\TimeSheets;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\TimeSheetsRepository;
use Illuminate\Support\Facades\Auth;

class TimeSheetsRepositoryImpl extends EloquentRepository implements TimeSheetsRepository
{
    public function getModel()
    {
        $model = TimeSheets::class;

        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();

        return $result;
    }

    public function findMaNV($i, $month)
    {
        $result = $this->model->whereDay("Ngay_Hien_Tai", $i + 1)->whereMonth("Ngay_Hien_Tai", $month)->where("MaNV", Auth::id())->first();

        return $result;
    }

    public function getDay($date)
    {
        $result = $this->model->where('Ngay_Hien_Tai', $date)->get();

        return $result;
    }

    public function monthStatistic($month, $year){
        $result = $this->model->whereMonth("Ngay_Hien_Tai", $month)->whereYear("Ngay_Hien_Tai", $year)->get();

        return $result;
    }
}

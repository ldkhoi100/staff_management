<?php

namespace App\Repositories\Impl;

use App\Model\DonXinPhep;
use App\Repositories\DonXinPhepRepository;
use App\Repositories\Eloquent\EloquentRepository;
use Auth;

class DonXinPhepRepositoryImpl extends EloquentRepository  implements DonXinPhepRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = DonXinPhep::class;

        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();

        return $result;
    }

    public function findMaNV()
    {
        $result = $this->model->withTrashed()->where("MaNV", Auth::id())->orderBy("created_at", "DESC")->get();

        return $result;
    }

    public function findWithDatePicker($i, $month)
    {
        $result = $this->model->withTrashed()->whereDay("created_at", $i)->whereMonth("created_at", $month)->where("MaNV", Auth::id())->first();

        return $result;
    }
}
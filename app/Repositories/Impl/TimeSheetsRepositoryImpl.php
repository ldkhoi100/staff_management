<?php

namespace App\Repositories\Impl;

use App\Model\TimeSheets;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\TimeSheetsRepository;

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
}

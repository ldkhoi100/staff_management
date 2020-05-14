<?php

namespace App\Repositories\Impl;

use App\Model\WorkShift;
use App\Repositories\WorkShiftRepository;
use App\Repositories\Eloquent\EloquentRepository;

class WorkShiftRepositoryImpl extends EloquentRepository implements WorkShiftRepository
{
    public function getModel()
    {
        $model = WorkShift::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();
        return $result;
    }
}

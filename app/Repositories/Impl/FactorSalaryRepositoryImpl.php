<?php

namespace App\Repositories\Impl;

use App\Model\FactorSalary;
use App\Repositories\FactorSalaryRepository;
use App\Repositories\Eloquent\EloquentRepository;

class FactorSalaryRepositoryImpl extends EloquentRepository implements FactorSalaryRepository
{
    public function getModel()
    {
        $model = FactorSalary::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();
        return $result;
    }
}

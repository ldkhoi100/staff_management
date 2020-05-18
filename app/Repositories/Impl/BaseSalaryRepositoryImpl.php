<?php

namespace App\Repositories\Impl;

use App\Model\BaseSalary;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\BaseSalaryRepository;

class BaseSalaryRepositoryImpl extends EloquentRepository implements BaseSalaryRepository
{
    public function getModel()
    {
        $model = BaseSalary::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->find($id);
        return $result;
    }
}

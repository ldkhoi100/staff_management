<?php

namespace App\Repositories\Impl;

use App\Model\Role;
use App\Repositories\ChamCongNgayRepository;
use App\Repositories\Eloquent\EloquentRepository;

class ChamCongNgayRepositoryImpl extends EloquentRepository implements ChamCongNgayRepository
{
    public function getModel()
    {
        $model = Role::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed()->find($id);
        return $result;
    }
}

<?php

namespace App\Repositories\Impl;

use App\Model\Role;
use App\Repositories\RoleRepository;
use App\Repositories\Eloquent\EloquentRepository;

class RoleRepositoryImpl extends EloquentRepository implements RoleRepository
{
    public function getModel()
    {
        $model = Role::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();
        return $result;
    }
}

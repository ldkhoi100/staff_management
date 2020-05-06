<?php

namespace App\Repositories\Impl;

use App\User;
use App\Repositories\UserRepository;
use App\Repositories\Eloquent\EloquentRepository;

class UserRepositoryImpl extends EloquentRepository implements UserRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = User::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed()->find($id);
        return $result;
    }
}
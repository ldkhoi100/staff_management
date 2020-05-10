<?php

namespace App\Repositories\Impl;

use App\Model\ChucVu;

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

    public function findUsername($username)
    {
        $result = $this->model->where('username', $username)->first();
        return $result;
    }

    public function selectRole($user, $role)
    {
        $model = $user->roles()->attach($role);
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed()->find($id);

        return $result;
    }

    public function findWithTrashed($id)
    {
        $result = $this->model->withTrashed()->find($id);

        return $result;
    }

    public function blockUser($object)
    {
        $object->block = !$object->block;
        $object->save();

        return $object;
    }
}
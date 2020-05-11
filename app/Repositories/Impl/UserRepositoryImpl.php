<?php

namespace App\Repositories\Impl;

use App\Model\ChucVu;

use App\User;
use App\Model\Role;
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

    public function create($data)
    {
        try {
            $object = $this->model->create($data[0]);
            $object->roles()->attach($data[1]);
        } catch (\Exception $e) {
            return null;
        }
        return $object;
    }

    public function update($data, $object)
    {
        try {
            $object->update($data[0]);
            $object->roles()->sync($data[1]);
        } catch (\Exception $e) {
            return null;
        }
        return $object;
    }

    public function delete($object)
    {
        $object->roles()->detach();
        $object->forceDelete();
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
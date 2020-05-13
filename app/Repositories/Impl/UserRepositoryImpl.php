<?php

namespace App\Repositories\Impl;

use App\Model\ChucVu;

use App\User;
use App\Repositories\UserRepository;
use App\Repositories\Eloquent\EloquentRepository;
use Auth;

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

    public function getAll()
    {
        // if (Auth::user()->roles[0]->name == "ROLE_SUPERADMIN") {
        //     $result = User::where('id', '<>', Auth::user()->id)->get();
        // } elseif (Auth::user()->roles[0]->name == "ROLE_ADMIN") {
        //     $users = $this->model->where('id', '<>', Auth::user()->id)->get();
        //     $result = [];
        //     foreach ($users as $user) {
        //         if (count($user->roles) == 0) {
        //             $result[] = $user;
        //         }
        //     }
        // }
        $result = User::all();
        return $result;
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

    public function findHashId($id, $hash)
    {
        $result = $this->model->withTrashed()->where('id', $id)->where('hash', $hash)->first();

        return $result;
    }

    public function findRoleUser($id)
    {
        $findId = $this->model->find($id);

        $result =  $findId->roles;

        return $result;
    }

    public function blockUser($object)
    {
        $object->block = !$object->block;
        $object->save();

        return $object;
    }
}
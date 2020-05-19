<?php

namespace App\Repositories\Impl;

use App\Model\NhanVien;
use App\Repositories\NhanVienRepository;
use App\Repositories\Eloquent\EloquentRepository;
use Auth;

class NhanVienRepositoryImpl extends EloquentRepository implements NhanVienRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = NhanVien::class;
        return $model;
    }

    // public function getAll()
    // {
    //     if (Auth::user()->roles[0]->name == "ROLE_SUPERADMIN") {
    //         $result = User::where('id', '<>', Auth::user()->id)->get();
    //     } elseif (Auth::user()->roles[0]->name == "ROLE_ADMIN") {
    //         $users = $this->model->where('id', '<>', Auth::user()->id)->get();
    //         $result = [];
    //         foreach ($users as $user) {
    //             if (count($user->roles) == 0) {
    //                 $result[] = $user;
    //             }
    //         }
    //     }
    //     // $result = User::all();
    //     return $result;
    // }

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

    public function findFullName()
    {
        $result = ($this->model->withTrashed()->where('id', Auth::id())->first())->Ho_Ten;

        return $result;
    }

    public function destroy($object)
    {
        $object->cham_cong()->delete();
        $object->don_xin_phep()->delete();
        $object->delete();
    }

    public function restore($object)
    {
        $object->cham_cong()->restore();
        $object->don_xin_phep()->restore();
        $object->restore();
    }

    public function delete($object)
    {
        $object->cham_cong()->forceDelete();
        $object->don_xin_phep()->forceDelete();
        if (!empty($object->Anh_Dai_Dien)) {
            unlink("img/" . $object->Anh_Dai_Dien);
        }
        $object->forceDelete();
        $object->user()->forceDelete();
    }
}
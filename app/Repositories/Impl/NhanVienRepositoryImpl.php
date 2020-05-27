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

    public function findIdAuth()
    {
        $result = $this->model->withTrashed()->find(Auth::id());

        return $result;
    }

    public function destroy($object)
    {
        $object->cham_cong()->delete();
        $object->don_xin_phep()->delete();
        $object->delete();
        $object->user()->delete();
    }

    public function restore($object)
    {
        $object->cham_cong()->restore();
        $object->don_xin_phep()->restore();
        $object->restore();
        $object->user()->restore();
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
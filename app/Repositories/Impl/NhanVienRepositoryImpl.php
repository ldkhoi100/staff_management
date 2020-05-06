<?php

namespace App\Repositories\Impl;

use App\Model\NhanVien;
use App\Repositories\NhanVienRepository;
use App\Repositories\Eloquent\EloquentRepository;

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
}
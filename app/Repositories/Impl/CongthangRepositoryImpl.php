<?php
namespace App\Repositories\Impl;

use App\Model\ChamCongThang;
use App\Repositories\CongthangRepository;
use App\Repositories\Repository;
use App\Repositories\Eloquent\EloquentRepository;


class CongthangRepositoryImpl extends EloquentRepository implements CongthangRepository
{
    public function getModel()
    {
       $model = ChamCongThang::class;
       return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed()->find($id);
        return $result ;
    }
}


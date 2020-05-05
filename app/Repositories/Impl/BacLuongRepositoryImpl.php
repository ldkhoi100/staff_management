<?php

namespace App\Repositories\Impl;

use App\Model\BacLuong;
use App\Repositories\BacLuongRepository;
use App\Repositories\Eloquent\EloquentRepository;

class BacLuongRepositoryImpl extends EloquentRepository implements BacLuongRepository
{
    public function getModel()
    {
        $model = BacLuong::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->get();
        return $result;
    }
}

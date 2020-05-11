<?php
namespace App\Repositories\Impl;

use App\Model\ChucVu;
use App\Repositories\ChucvuRepository;
use App\Repositories\Eloquent\EloquentRepository;

class ChucvuRepositoryImpl extends EloquentRepository  implements ChucvuRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Chucvu::class;
        return $model;
    }
    
    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();
        return $result;
    }
}

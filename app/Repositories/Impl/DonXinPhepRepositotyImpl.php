<?php
namespace App\Repositories\Impl;

use App\Model\DonXinPhep;
use App\Repositories\DonXinPhepRepository;
use App\Repositories\Eloquent\EloquentRepository;

class DonXinPhepRepositoryImpl extends EloquentRepository  implements DonXinPhepRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = DonXinPhep::class;
        return $model;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();
        return $result;
    }
}

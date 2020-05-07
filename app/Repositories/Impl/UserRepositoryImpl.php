<?php

namespace App\Repositories\Impl;
use App\Model\ChucVu;

use App\Repositories\CustomerRepository;
use App\Repositories\Eloquent\EloquentRepository;

class CustomerRepositoryImpl extends EloquentRepository  implements CustomerRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = ChucVu::class;
        return $model;
    }

}

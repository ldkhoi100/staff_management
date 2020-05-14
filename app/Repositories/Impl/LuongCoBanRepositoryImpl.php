<?php

namespace App\Repositories\Impl;

use App\Model\LuongCoBan;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\LuongCoBanRepository;

class LuongCoBanRepositoryImpl extends EloquentRepository implements LuongCoBanRepository
{
    public function getModel()
    {
        $model = LuongCoBan::class;
        return $model;
    }
}

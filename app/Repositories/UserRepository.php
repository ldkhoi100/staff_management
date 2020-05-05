<?php

namespace App\Repositories;


interface UserRepository extends Repository
{
    public function getSoftDeletes();

    public function restore($object);

    public function delete($object);
}
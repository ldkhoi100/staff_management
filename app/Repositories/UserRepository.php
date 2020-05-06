<?php

namespace App\Repositories;


interface UserRepository extends Repository
{
    public function getSoftDeletes();

    public function restore($object);

    public function delete($object);

    public function findOnlyTrashed($id);

    public function blockUser($id);
}
<?php

namespace App\Repositories;


interface WorkShiftRepository extends Repository
{
    public function getSoftDeletes();

    public function restore($object);

    public function delete($object);

    public function findOnlyTrashed($id);
}

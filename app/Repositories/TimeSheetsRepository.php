<?php

namespace App\Repositories;


interface TimeSheetsRepository extends Repository
{
    public function getSoftDeletes();

    public function restore($object);

    public function delete($object);

    public function findOnlyTrashed($id);

    public function getDay($date);

    public function findMaNV($i, $month);

    public function monthStatistic($month, $year);
}

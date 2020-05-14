<?php
namespace App\Repositories;

interface DonXinPhepRepository extends Repository
{
    public function getSoftDeletes();

    public function restore($object);

    public function delete($object);

    public function findOnlyTrashed($id);
}
